<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Models\inquiry;
use App\Models\transection_user;
use App\Models\transection_driver;
use App\Models\d_trip_book;
use App\Models\booktaxi;
use App\Models\dbprofile;
use App\Models\outcity;
use App\Models\cars;
use App\Models\cartype;
use App\Models\book_package;
use App\Models\users;
use App\Models\city_log;
use App\Models\round_log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use App\Models\local_amt_log;
use App\Models\Mobile;
use App\Models\Customer;
use Illuminate\Support\Facades\Cache;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;
use Razorpay\Api\Api;
use Illuminate\Support\Str;




class Homecontroller extends Controller
{
    function inquiry_submit(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        // if ( !Session::has( 'mobile' ) ) {
        //     return redirect( 'Login' )->with( 'error', 'Please log in to access this page.' );
        // }

        $input = $request->all();
        $validator = Validator::make($input, [
            // 'number' => 'required|digits:10',
            'start_point' => 'required',
            // 'name' => 'required',
            'end_point' => 'required',
            'date' => 'required',
        ]);

        $inqid = rand(0, 99999999);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $city = outcity::where('city', $request->start_point)->first();

            if ($city == null) {
                return redirect()->back()->with('error', 'Start point not found.');
            }

            $cityamt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')
                ->where('city_logs.to', $request->end_point)
                ->where('cities.id', $city->id)
                ->first();

            if ($cityamt == null) {
                return redirect()->back()->with('error', 'Route not available.');
            }

            $inquiry = new inquiry();
            // $inquiry->mobile = $request->number;
            $inquiry->pickup_ct = $request->start_point;
            $inquiry->drop_ct = $request->end_point;
            $inquiry->date = $request->date;
            // $inquiry->name = $request->name;
            $inquiry->inq_id = $inqid;
            $inquiry->save();

            $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')
                ->get(['cars.*', 'cartypes.name as car_type']);

            $check = inquiry::where('inq_id', $inqid)->first();
            if ($check->paid == 1) {
                return redirect('https://safarmobility.in/');
            } else {
                return view('route', compact('inqid', 'cars', 'cityamt'));
            }
        }
    }






    function route($inqid)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get('cars.*');
        $check = inquiry::where('inq_id', $inqid)->first();
        if ($check->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {
            return view('route', compact('inqid', 'cars'));
        }
        // echo $inqid;
    }

    function car_confirm(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $check = inquiry::where('inq_id', $request->inq_id)->first();
        $referer = $request->headers->get('referer');

        if ($check->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {


            // $user= users::where('id',Session::has('userid'))->first();

            inquiry::where('inq_id', $request->inq_id)->update([
                'car_type' => $request->typeid,
                'gst' => $request->gst,
                'allowance' => $request->allowance,
                'kmrate' => $request->kmrate,
                'base_fare' => $request->total,
                'total_amt' => $request->fare,
            ]);
            $data = inquiry::where('inq_id', $request->inq_id)->first();

            // $pickup=city::where('id',$data->pickup_ct)->first();
            // $drop=city::where('id',$data->drop_ct)->first();
            $ctype = cartype::where('id', $request->typeid)->first();

            if ($referer == 'https://safarmobility.in/inquiry_round_submit') {
                return redirect()->route('booking1', [
                    'id' => $request->inq_id,
                    'type' => $request->typeid,
                ]);
            }
            if ($referer == 'https://safarmobility.in/inquiry_local_submit') {
                return redirect()->route('local_booking', [
                    'id' => $request->inq_id,
                    'type' => $request->typeid,
                ]);
            } else {
                return redirect()->route('booking', [
                    'id' => $request->inq_id,
                    'type' => $request->typeid,
                ]);
            }
        }
    }

    function order_book(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'pick_time' => 'required',
            'number' => 'required|digits:10',
            'date' => 'required',
        ]);
        $data = inquiry::where('inq_id', $request->inqid)->first();

        if ($data->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {


            if ($validator->fails()) {
                // $ctype=cartype::where('id',$data->car_type)->first();

                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                if (Session::has('userid')) {

                    $pending = $request->final_amt - $request->amt;
                    if ($request->amt == $request->final_amt) {
                        $remaining = 0;
                    } else {
                        $remaining = $pending;
                    }
                    // $user=users::where('number',$request->number)->first();
                    $user = Mobile::select('customer.*')->join('customer', 'mobile.mid', '=', 'customer.mid')->where('mobile.mobileno', $request->number)->first();

                    inquiry::where('inq_id', $request->inqid)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'mobile' => $request->number,
                        // 'pickup_address'=>$request->pick_addr,
                        // 'drop_address'=>$request->drop_addr,
                        'pickup_time' => $request->pick_time,
                        'date' => $request->date,
                        'uid' => $user->cid,

                    ]);

                    // $ch = curl_init();

                    // curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
                    // curl_setopt($ch, CURLOPT_HEADER, FALSE);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
                    // curl_setopt($ch, CURLOPT_HTTPHEADER,
                    //             array("X-Api-Key:test_86dce622ac60d029d7df685a1d0",
                    //                 "X-Auth-Token:test_92b5364c121a108db972bad4215"));
                    // $payload = Array(
                    //     'purpose' => $request->dest,
                    //     'amount' =>  $request->amt,
                    //     'phone' => $request->number,
                    //     'buyer_name' => $request->name,
                    //     'redirect_url' => "http://127.0.0.1:8000/order_booked/$request->inqid/$request->final_amt/$request->amt/$remaining",
                    //     'send_email' => true,
                    //     'send_sms' => true,
                    //     'email' => $request->email,
                    //     'allow_repeated_payments' => false
                    // );




                    // curl_setopt($ch, CURLOPT_POST, true);
                    // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
                    // $response = curl_exec($ch);
                    // curl_close($ch); 

                    //   $this->order_booked($request->inqid,$request->final_amt,$request->amt,$remaining);

                    inquiry::where('inq_id', $request->inqid)->update([
                        'paid' => 1,
                        'total_amt' => $request->final_amt,
                        'amt_paid' => $request->amt,
                        'amt_pending' => $remaining
                    ]);
                    session()->flash('paid', 'Payment successfully!');


                    return redirect('https://safarmobility.in/');
                    //     $ch = curl_init();
                    //     $headers = array(
                    //     'Accept: application/json',
                    //     'Content-Type: application/json',

                    //     );
                    //     curl_setopt($ch, CURLOPT_URL,  "https://safarmobility.in/order_booked/$request->inqid/$request->final_amt/$request->amt/$remaining");
                    //     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    //     curl_setopt($ch, CURLOPT_HEADER, 0);
                    //     $body = '{}';

                    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
                    //     curl_setopt($ch, CURLOPT_POSTFIELDS,$body);
                    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                    //     curl_setopt($ch, CURLOPT_TIMEOUT, 30);




                    //     $response = curl_exec($ch);


                    //     $err = curl_error($ch);
                    //     if ($err) {
                    //         curl_close($ch);
                    //         $data = array("status" => "0", "data" => array("msg" => "OTP not Send try again"));
                    //     } else {
                    //         curl_close($ch);
                    //         $data = array("status" => "1", "data" => array("msg" => "OTP Send successfully"));
                    //     }

                    // $p=json_decode($response);




                } else {
                    return redirect('login');
                }
            }
        }
    }

    function order_booked($inq, $total, $paid, $pending)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        inquiry::where('inq_id', $inq)->update([
            'paid' => 1,
            'total_amt' => $total,
            'amt_paid' => $paid,
            'amt_pending' => $pending
        ]);
        session()->flash('paid', 'Payment successfully!');


        return redirect('https://safarmobility.in/');
    }

    function contact_mail(Request $req)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $input = $req->all();
        $validator = Validator::make($input, [
            'number' => 'required|digits:10',
            'name' => 'required',
        ])->validateWithBag('contact');


        if ($validator) {
            $info = array(
                'number' => $req->number,
                'msg' => $req->msg,
                'name' => $req->name,
            );

            Mail::send('feedback', $info, function ($message) {
                $message->to('rajeshmunot2@gmail.com', 'Rajesh')
                    ->from('rajeshmunot2@gmail.com', 'Rajesh')
                    ->subject('Inquiry by client');
            });
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    function login(Request $req)
    {

        $referer = $req->headers->get('referer');

        return view('login', compact('referer'));
    }

    function login_type()
    {
        return view('login_type');
    }

    public function userlogin(Request $request)
    {
        $messages = [
            'mobile.required' => 'Please Enter Mobile No.',
            'mobile.digits' => 'Please Enter 10 digits Mobile No.',
            'mobile.regex' => 'Please Enter Valid 10 digits Mobile No.',
            'otp.required' => 'Please Enter OTP.',
            'otp.digits' => 'Please Enter a 6 digits OTP.'
        ];

        $validator = Validator::make($request->all(), [
            'mobile' => 'required_without:otp|digits:10|regex:/^[6-9][0-9]{9}$/',
            'otp' => 'required_without:mobile|digits:6'
        ], $messages);

        if ($validator->fails()) {
            return redirect('login')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->has('mobile')) {
            $mobile = $request->input('mobile');
            $otp = rand(100000, 999999);

            $request->session()->put('mobile', $mobile);
            $request->session()->put('otp', $otp);
            $request->session()->put('otp_sent', true);

            return redirect('login')->with([
                'message' => 'OTP sent to your mobile number.',
            ]);
        } elseif ($request->has('otp')) {
            $inputOtp = $request->input('otp');
            $mobile = $request->session()->get('mobile');
            $storedOtp = $request->session()->get('otp');

            $existingUser = DB::table('profile')->where('mobile', $mobile)->first();

            if ($inputOtp != $storedOtp) {
                return redirect('login')->with('error', 'Invalid OTP. Please try again.');
            } else {
                $request->session()->forget('otp');
                $request->session()->forget('otp_sent'); // Clear otp_sent session variable

                if ($existingUser) {
                    $redirectUrl = url('/');
                } else {
                    $redirectUrl = url('/Profile');
                }
                return redirect($redirectUrl)->with('success', 'OTP verified successfully.');
            }
        }

        return redirect('login')->with('error', 'Invalid request.');
    }

    function driver_login()
    {
        return view('driver.driver_login');
    }

    public function driverlogin(Request $request)
    {
        $messages = [
            'mobile.required' => 'Please Enter Mobile No.',
            'mobile.digits' => 'Please Enter 10 digits Mobile No.',
            'mobile.regex' => 'Please Enter Valid 10 digits Mobile No.',
            'otp.required' => 'Please Enter OTP.',
            'otp.digits' => 'Please Enter a 6 digits OTP.'
        ];

        $validator = Validator::make($request->all(), [
            'mobile' => 'required_without:otp|digits:10|regex:/^[6-9][0-9]{9}$/',
            'otp' => 'required_without:mobile|digits:6'
        ], $messages);

        if ($validator->fails()) {
            return redirect('driver_login')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->has('mobile')) {
            $mobile = $request->input('mobile');
            $otp = rand(100000, 999999);

            $request->session()->put('drivermobile', $mobile);
            $request->session()->put('otp', $otp);
            $request->session()->put('otp_sent', true);

            return redirect('driver_login')->with([
                'message' => 'OTP sent to your mobile number.',
            ]);
        } elseif ($request->has('otp')) {
            $inputOtp = $request->input('otp');
            $mobile = $request->session()->get('drivermobile');
            $storedOtp = $request->session()->get('otp');

            $existingUser = DB::table('driver')->where('mobile', $mobile)->first();

            if ($inputOtp != $storedOtp) {
                return redirect('driver_login')->with('error', 'Invalid OTP. Please try again.');
            } else {
                $request->session()->forget('otp');
                $request->session()->forget('otp_sent'); // Clear otp_sent session variable

                if ($existingUser) {
                    if ($existingUser->status == 'inactive') {
                        return redirect('driver_login')->with('error', 'Your account is inactive. Please activate your account.');
                    } else {
                        $redirectUrl = url('/driver');
                    }
                } else {
                    $redirectUrl = url('/driver-profile');
                }
                return redirect($redirectUrl)->with('success', 'OTP verified successfully.');
            }
        }

        return redirect('driver_login')->with('error', 'Invalid request.');
    }


    function user_logout()
    {
        Session::forget('mobile');

        return redirect('/')->with('success', 'You have been logged out successfully.');
    }

    function driver_logout()
    {
        Session::forget('drivermobile');

        return redirect('login-type')->with('success', 'You have been logged out successfully.');
    }

    public function Profile()
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }

        $userdata = Session::get('mobile');
        $data = compact('userdata');

        return view('profile', $data);
    }

    public function show_profile()
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }

        $mobile = Session::get('mobile');
        $userdata = Mobile::where('mobile', $mobile)->first();

        $userdata_book = DB::table('taxi_book')->where('mobile', $mobile)
            ->orderBy('created_at', 'desc')
            ->get();

        $recordCount = $userdata_book->count();

        $recordCountComplete = DB::table('taxi_book')
            ->where('mobile', $mobile)
            ->where('trip_status', 'Completed')
            ->count();

        $userdata_package = DB::table('toor_package_wishlist')->where('user_mobile', $mobile)->get();
        $wishlist = $userdata_package->count();

        $transection = DB::table('transection_user')->where('user_mobile', $mobile)->get();

        return view('profile_show', compact('userdata', 'userdata_book', 'recordCount', 'userdata_package', 'wishlist', 'transection', 'recordCountComplete'));
    }

    function profile_edit($id)
    {
        $GetData = Mobile::all();
        $new = Mobile::find($id);
        $url = url('/profile-edit/' . $id);
        $data = compact('GetData', 'new', 'url');
        return view('profile_edit', $data);
    }

    public function user_profile(Request $request)
    {
        $messages = [
            'fullname.required' => 'Please Enter Your Full Name.',
            'email.required' => 'Please Enter Your Email Id.',
            'email.email' => 'Please Enter Your Valid Email Id.',
            'mobile.required' => 'Please Enter Your Mobile No.',
            'mobile.size' => 'Please Enter 10 Digits Mobile No.',
            'mobile.regex' => 'Please Enter 10 Digits Mobile No.',
            'gender.required' => 'Please Select Your Gender',
            'address.required' => 'Please Enter Your Address.',
            'photo.required' => 'Please Upload Your Profile Photo.',
            'photo.image' => 'The profile photo must be an image.',
            'photo.mimes' => 'The profile photo must be a file of type: jpeg, png, jpg.',
            'photo.max' => 'The profile photo may not be greater than 2048 kilobytes.'
        ];

        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|size:10|regex:/^[0-9]{10}$/',
            'gender' => 'required',
            'address' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ], $messages);

        $pro = new Mobile();

        $pro->fullname = $request->input('fullname');
        $pro->email = $request->input('email');
        $pro->mobile = $request->input('mobile');
        $pro->gender = $request->input('gender');
        $pro->address = $request->input('address');

        if ($request->hasFile('photo')) {
            $imagename = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('uploads/Profile Photo'), $imagename);
            $pro->profile_photo = $imagename;
        }

        $pro->save();

        Session::flash('success', 'Profile Created Successfully');

        return redirect('/');
    }

    function inquiry_submitt()
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $cities = outcity::get();
        $cartypes = cartype::get();
        $inqid = rand(0, 99999999);
        $inquiry = new inquiry();
        $inquiry->inq_id = $inqid;
        $inquiry->save();
        return view('inquiry_submitt', compact('cities', 'cartypes', 'inqid'));
    }

    function submit_inquiry(Request $req)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $input = $req->all();
        $validator = Validator::make($input, [
            'type' => 'required',
            'pick' => 'required',
            'date' => 'required',
            'name' => 'required',
            'drop' => 'required',
            'email' => 'required',
            'number' => 'required|digits:10',
        ]);
        $data = inquiry::where('inq_id', $req->inqid)->first();
        if ($data->paid == 0) {
            if ($req->amt == 'NOT Available') {
                return redirect()->back()->with('undefined_route', 'Not Available !!');
            }



            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                inquiry::where('inq_id', $req->inqid)->update([

                    'mobile' => $req->number,
                    'pickup_ct' => $req->pick,
                    'drop_ct' => $req->drop,
                    'date' => $req->date,
                    'name' => $req->name,
                    'email' => $req->email,
                    'base_fare' => $req->amt,
                    'total_amt' => $req->amt,
                    'car_type' => $req->type,
                ]);
                $data = inquiry::where('inq_id', $req->inqid)->first();

                $ctype = cartype::where('id', $req->type)->first();
                return redirect()->route('booking', [
                    'id' => $req->inqid,
                    'type' => $req->type,
                ]);
            }
        } else {
            return redirect('https://safarmobility.in/');
        }
    }


    function logout()
    {
        Session::forget('userid');
        return redirect('/');
    }

    function user_register(Request $req)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $input = $req->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'password' => 'required|min:6',
            'cemail' => 'required|unique:customer|email',
            'mobileno' => 'required|digits:10|unique:mobile',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            // $users= new users();
            // $users->number=$req->number;
            // $users->name=$req->name;
            // $users->email=$req->email;
            // $users->password=Hash::make($req->password);
            // $users->save();
            $mobile = new Mobile();
            $mobile->mobileno = $req->mobileno;
            $mobile->type = 1;
            $mobile->status = 1;
            $mobile->save();


            $users = new Customer();
            $users->cname = $req->name;
            $users->cemail = $req->cemail;
            $users->mid = $mobile->id;
            $users->cpassword = Hash::make($req->password);
            $users->save();

            $usr = Customer::where('cemail', $req->cemail)->first();

            Session::put('userid', $usr->cid);
            Session::put('number', $req->mobileno);
            Session::put('name', $req->name);
            Session::put('email', $req->cemail);

            return redirect('https://safarmobility.in/');
        }
    }

    function booking(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }


        $inq = $request->input('id');
        $type = $request->input('type');
        $data = inquiry::where('inq_id', $inq)->first();
        $amt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')->where('cities.city', $data->pickup_ct)->where('city_logs.to', $data->drop_ct)->first();
        if ($data->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {
            if ($type == 1) {
                $amount = $amt->hatchback;
            } elseif ($type == 2) {
                $amount = $amt->sedan;
            } elseif ($type == 3) {
                $amount = $amt->suv;
            }
            inquiry::where('inq_id', $inq)->update([
                'car_type' => $type,
                'base_fare' => $amount,
                'total_amt' => $amount,
            ]);

            $data = inquiry::where('inq_id', $inq)->first();

            $ctype = cartype::where('id', $type)->first();

            return view('order_book', compact('data', 'ctype'));
        }
    }

    public function taxi_booking(Request $request, $id)
    {
        // Check if user is logged in
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }

        // Fetch necessary data (assuming these are unchanged)
        $getData = Cartype::findOrFail($id);
        $cars = Cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get(['cars.*']);
        $GetData = Cartype::all();
        $mobile = Session::get('mobile');
        $userdata_book = DB::table('taxi_book')->where('mobile', $mobile)
            ->orderBy('created_at', 'desc')
            ->get();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'pickup' => 'required|string|max:255',
            'route' => 'required|string|max:255',
            'totalkm' => 'required|numeric',
            'per_km_rate' => 'required|numeric',
            'base_fare' => 'required|numeric',
            'car_type' => 'required|string|max:255',
            'car_name' => 'required|array',
            'car_name.*' => 'required|string|max:255',
            'pick_time' => 'required',
            'amt' => 'required|numeric',
            'pick_date' => 'required'
        ]);

        $carNames = implode(',', $request->input('car_name'));

        $time = $request->input('pick_time');
        $pickTime = date("h:i A", strtotime($time));

        $mobile = Session::get('mobile');
        $userdata = Mobile::where('mobile', $mobile)->first();

        if ($userdata->wallet < 100) {
            return redirect()->back();
            // return redirect()->back()->with('error', 'Insufficient wallet balance to book a taxi.');
        }

        $userdata->wallet -= 100;
        $userdata->save();

        $bookTaxi = new Customer();
        $bookTaxi->name = $request->input('name');
        $bookTaxi->mobile = $request->input('number');
        $bookTaxi->email = $request->input('email');
        $bookTaxi->pickup_point = $request->input('pickup');
        $bookTaxi->travel_root = $request->input('route');
        $bookTaxi->inquiry_no = $request->input('inqid');
        $bookTaxi->total_km = $request->input('totalkm');
        $bookTaxi->per_km_rate = $request->input('per_km_rate');
        $bookTaxi->base_fare = $request->input('base_fare');
        $bookTaxi->car_type = $request->input('car_type');
        $bookTaxi->available_cabs = $carNames;
        $bookTaxi->pickup_time = $pickTime;
        $bookTaxi->total_fare = $request->input('amt');
        $bookTaxi->pickup_date = $request->input('pick_date');
        $bookTaxi->status = 'Unaccept';
        $bookTaxi->save();

        $mobiledriver = Session::get('drivermobile');
        $driverdata = Mobile::where('mobile', $mobiledriver)->first();

        $tranxid = 'debit_' . Str::random(12);
        $currentDateTime = now()->format('Y-m-d h:i:s A');

        $transaction = new transection_user();
        $transaction->amount = 100;
        $transaction->description = 'Debit in Wallet';
        $transaction->trnx_id = $tranxid;
        $transaction->date = $currentDateTime;
        $transaction->user_name = $userdata->fullname;
        $transaction->user_mobile = $userdata->mobile;
        $transaction->cr_dr = 'D';
        $transaction->save();

        $request->session()->flash('success', 'Booking successfully submitted!');

        return view('book_taxi', ['getData' => $getData, 'cars' => $cars, 'GetData' => $GetData, 'id' => $id, 'driverdata' => $driverdata, 'userdata' => $userdata, 'userdata_book' => $userdata]);
    }

    public function processPayment(Request $request)
    {
        $input = $request->all();
        $mobile = Session::get('drivermobile');
        $driver = inquiry::where('mobile', $mobile)->first();

        $RAZORPAY_KEY = "rzp_test_NXkmOvfVPrzbBy";
        $RAZORPAY_SECRET = "PnycMlHPhYCP7oM64Fcjk23G";
        $api = new Api($RAZORPAY_KEY, $RAZORPAY_SECRET);

        if ($input['razorpay_order_id']) {
            // Update driver's wallet
            $driver->wallet += $input['amount'];
            $driver->save();

            // Save transaction
            $transaction = new transection_driver();
            $transaction->amount = $input['amount'];
            $transaction->description = 'Credit in Wallet';
            $transaction->trnx_id = $input['razorpay_payment_id'];
            $transaction->date = now();
            $transaction->driver_name = $driver->name;
            $transaction->driver_mobile = $driver->mobile;
            $transaction->cr_dr = 'C';
            $transaction->save();

            return redirect()->back()->with('paymentsuccess', 'Payment successful');
        } else {
            return redirect()->back()->with('paymenterror', 'Payment verification failed');
        }
    }


    public function processPaymentUser(Request $request)
    {
        $input = $request->all();

        $mobile = Session::get('mobile');
        $user = Mobile::where('mobile', $mobile)->first();
        $currentDateTime = now()->format('Y-m-d h:i:s A');


        $RAZORPAY_KEY = "rzp_test_NXkmOvfVPrzbBy";
        $RAZORPAY_SECRET = "PnycMlHPhYCP7oM64Fcjk23G";
        $api = new Api($RAZORPAY_KEY, $RAZORPAY_SECRET);

        if ($input['razorpay_order_id']) {
            // Update user's wallet balance
            $user->wallet += $input['amount'];
            $user->save();

            // Save transaction details
            $transaction = new transection_user();
            $transaction->amount = $input['amount'];
            $transaction->description = 'Credit in Wallet';
            $transaction->trnx_id = $input['razorpay_payment_id'];
            $transaction->date = $currentDateTime;
            $transaction->user_name = $user->fullname;
            $transaction->user_mobile = $user->mobile;
            $transaction->cr_dr = 'C';
            $transaction->save();

            return redirect()->back()->with('paymentsuccess', 'Payment successful');
        } else {
            return redirect()->back()->with('paymenterror', 'Payment verification failed');
        }
    }

    public function startTrip(Request $request, $id)
    {
        $dmobile = Session::get('drivermobile');

        $transection = DB::table('transection_driver')->where('driver_mobile', $dmobile)->get();

        $trip = Customer::find($id);

        if (!$trip) {
            return redirect()->back()->with('error', 'Customer not found');
        }

        $trip->trip_status = 'Started';

        if ($request->hasFile('trip_start_photo')) {
            $trip_start_photo = $request->file('trip_start_photo');
            $filename = time() . '_trip.' . $trip_start_photo->getClientOriginalExtension();
            $trip_start_photo->move(public_path('uploads/trip'), $filename);
            $trip->trip_start_photo = $filename;
        }

        $trip->start_km = $request->input('start_km');

        $user = inquiry::where('mobile', Session::get('drivermobile'))->first();
        if ($user) {
            if ($user->wallet < 100) {
                return redirect()->back();
                // return redirect()->back()->with('error', 'Insufficient balance in wallet. Please add funds.');
            }

            $user->wallet -= 100;
            $user->save();
        }

        $mobile = Session::get('drivermobile');
        $userdata = inquiry::where('mobile', $mobile)->first();

        // Generate tranxid
        $tranxid = 'debit_' . Str::random(12);

        // Format current date and time with AM/PM
        $currentDateTime = now()->format('Y-m-d h:i:s A');

        // Save transaction details
        $transaction = new transection_driver();
        $transaction->amount = 100;
        $transaction->description = 'Debit in Wallet';
        $transaction->trnx_id = $tranxid;
        $transaction->date = $currentDateTime;
        $transaction->driver_name = $userdata->name;
        $transaction->driver_mobile = $userdata->mobile;
        $transaction->cr_dr = 'D';
        $transaction->save();

        $trip->save();

        DB::table('driver_trip_history')->insert([
            'trip_id' => $request->input('id'),
            'driver_mobile' => $request->input('driver_mobile'),
            'name' => $request->input('name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
            'pickup_point' => $request->input('pickup_point'),
            'pickup_date' => $request->input('pickup_date'),
            'travel_root' => $request->input('travel_root'),
            'inquiry_no' => $request->input('inquiry_no'),
            'total_km' => $request->input('total_km'),
            'per_km_rate' => $request->input('per_km_rate'),
            'base_fare' => $request->input('base_fare'),
            'car_type' => $request->input('car_type'),
            'available_cabs' => $request->input('available_cabs'),
            'pickup_time' => $request->input('pickup_time'),
            'total_fare' => $request->input('total_fare'),
        ]);

        return redirect()->back()->with('message', 'Trip started successfully');
    }

    public function bookTrip(Request $request, $id)
    {
        $request->validate([
            'd_mobile' => 'required|string',
        ]);
    
        $trip = Customer::find($id);
    
        if ($trip) {
            $trip->status = 'accepted'; 
            $trip->save();
    
    
            if ($trip) {
                $trip->d_mobile = $request['d_mobile'];
                $trip->save();
            }
    
            return redirect()->back()->with('success', 'Trip accepted successfully.');
        }
    
        return redirect()->back()->with('error', 'Trip acceptance failed.');
    }
    
        

    public function endTrip(Request $request, $id)
    {
        $trip = Customer::find($id);

        if (!$trip) {
            abort(404);
        }

        // Validate the request
        $request->validate([
            'trip_end_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'end_km' => 'required',
        ]);

        if ($request->hasFile('trip_end_photo')) {
            $trip_end_photo = $request->file('trip_end_photo');
            $filename = time() . '_trip_end.' . $trip_end_photo->getClientOriginalExtension();
            $trip_end_photo->move(public_path('uploads/trip'), $filename);
            $trip->trip_end_photo = $filename;
        }

        // Update trip details
        $trip->end_km = $request->end_km;
        $trip->trip_status = 'Completed'; // Update as per your database schema

        $trip->save();

        return redirect()->back()->with('message', 'Trip ended successfully.');
    }




    public function toggleStatusTaxi($id)
    {
        $TaxiToggle = Customer::find($id);
        if ($TaxiToggle) {
            if ($TaxiToggle->status == 'Accept') {
                $TaxiToggle->status = 'Unaccept';
            } elseif ($TaxiToggle->status == 'Unaccept') {
                $TaxiToggle->status = 'Accept';
            }
            $TaxiToggle->save();
        }

        return redirect()->back();
    }

    function viewAvailableCabs($id)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $cars = cars::all();
        $getData = cartype::findOrFail($id);
        $GetData = cartype::all();

        return view('book_taxi', compact('cars', 'id', 'GetData', 'getData'));
    }


    function booking1(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $inq = $request->input('id');
        $type = $request->input('type');
        $data = inquiry::where('inq_id', $inq)->first();
        if ($data->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {
            // $data= inquiry::select('round_amt_log.*')->join('round_amt_log','inquiries.car_type','=','round_amt_log.type')->where('inquiries.inq_id',$inq)->first();
            $d1 = DB::table('round_logs')->where('from', $data->pickup_ct)->where('to', $data->drop_ct)->first();
            $d2 = DB::table('round_amt_log')->where('type', $type)->first();


            $total = $d1->kilometer * $d2->kmrate;
            $allwance = $data->days * $d2->allowance;
            $gst = ($total + $allwance) * $d2->gst / 100;

            $gstd = $gst;
            $allwance = $allwance;
            $percent_gst = $d2->gst;
            $amount = $total;
            $kmrate = $d2->kmrate;
            $km = $d1->kilometer;
            $final = round($total + $allwance + $gst);


            //    $amt= city_log::join('cities','city_logs.from','=','cities.id')->where('cities.city',$data->pickup_ct)->where('city_logs.to',$data->drop_ct)->first();
            //    if($type==1){
            //     $amount=$amt->hatchback;
            //    }
            //    elseif($type==2){
            //     $amount=$amt->sedan;
            //    }
            //    elseif($type==3){
            //     $amount=$amt->suv;
            //    }
            inquiry::where('inq_id', $inq)->update([
                'car_type' => $type,
                'gst' => $gstd,
                'base_fare' => $amount,
                'allowance' => $allwance,
                'total_amt' => $final,
                'total_km' => $km,
                'gst_in' => $percent_gst,
                'kmrate' => $kmrate,
                'trip_type' => 'round',
            ]);

            $data = inquiry::where('inq_id', $inq)->first();

            $ctype = cartype::where('id', $type)->first();

            return view('order_book', compact('data', 'ctype'));
        }
    }

    function price_confirm(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $from = $request->input('from');
        $to = $request->input('to');
        $type = $request->input('type');

        $city = outcity::where('city', $from)->first();
        $cityamt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')->where('city_logs.to', $to)->where('cities.id', $city->id)->first();
        if ($cityamt) {

            if ($type == '1') {
                $amt = $cityamt->hatchback;
            } elseif ($type == '2') {
                $amt = $cityamt->sedan;
            } elseif ($type == '3') {
                $amt =  $cityamt->suv;
            }
        } else {
            $amt = 'NOT Available';
        }

        return json_encode($amt);
    }

    function amt_route(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $amtid = $request->key;
        $from = $request->from;
        $to = $request->to;
        $cities = outcity::get();

        $cityamt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')->where('city_logs.id', $amtid)->first();
        $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get('cars.*');



        $inqid = rand(0, 99999999);
        $inquiry = new inquiry();
        $inquiry->inq_id = $inqid;
        $inquiry->pickup_ct = $from;
        $inquiry->drop_ct = $to;
        $inquiry->save();

        if (Session::has('userid')) {
            inquiry::where('inq_id', $inqid)->update([
                'name' => Session::get('name'),
                'email' => Session::get('email'),
                'mobile' => Session::get('number'),
            ]);
        }
        return view('amt_route', compact('cityamt', 'cars', 'inqid', 'cities'));
    }


    function amt_change(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $from = $request->input('from');
        $to = $request->input('to');

        $city = outcity::where('city', $from)->first();
        $cityamt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')->where('city_logs.to', $to)->where('cities.id', $city->id)->first();
        if ($cityamt) {

            $inqid = rand(0, 99999999);
            $inquiry = new inquiry();
            $inquiry->inq_id = $inqid;
            $inquiry->pickup_ct = $from;
            $inquiry->drop_ct = $to;
            $inquiry->save();

            if (Session::has('userid')) {
                inquiry::where('inq_id', $inqid)->update([
                    'name' => Session::get('name'),
                    'email' => Session::get('email'),
                    'mobile' => Session::get('number'),
                ]);
            }

            $data['amt'] = $cityamt;
            $data['inqid'] = $inqid;

            return json_encode($data);
        } else {
            return json_encode('NOT Available');
        }
    }

    function inquiry_round_submit(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'number' => 'required|digits:10',
            'start_point' => 'required',
            // 'name' => 'required',
            'end_point' => 'required',
            'days' => 'required',
        ]);

        $inqid = rand(0, 99999999);



        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $city = outcity::where('city', $request->start_point)->first();
            $amt = round_log::where('round_logs.to', $request->end_point)->where('round_logs.from', $request->start_point)->first();
            if ($amt == null) {
                return redirect()->back()->with('undefined_route', 'Not Available !!');
            }

            $kms = DB::table('round_amt_log')->get();
            $cityamt = array();
            foreach ($kms as $km) {
                $total = $amt->kilometer * $km->kmrate;
                $allwance = $request->days * $km->allowance;
                $gst = ($total + $allwance) * $km->gst / 100;
                $cars = cars::where('type_id', $km->type)->get();

                $cartype = cartype::where('id', $km->type)->first();
                $cardata = array();

                foreach ($cars as $car) {

                    array_push($cardata, $car->cars);
                }


                $payment['gst'] = $gst;
                $payment['cars'] = $cardata;
                $payment['cartype'] = $cartype->type;
                $payment['allwance'] = $allwance;
                $payment['total'] = $total;
                $payment['type'] = $km->type;
                $payment['kmrate'] = $km->kmrate;
                $payment['final'] = round($total + $allwance + $gst);


                array_push($cityamt, $payment);
            }
            //     echo json_encode($cityamt);

            //  die;
            $inquiry = new inquiry();
            $inquiry->pickup_ct = $request->start_point;
            $inquiry->drop_ct = $request->end_point;
            $inquiry->days = $request->days;
            $inquiry->inq_id = $inqid;
            $inquiry->trip_type = 'round';
            $inquiry->save();



            $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get('cars.*');
            $check = inquiry::where('inq_id', $inqid)->first();
            if ($check->paid == 1) {
                return redirect('https://safarmobility.in/');
            } else {
                return view('round_route', compact('inqid', 'cars', 'cityamt'));
            }
        }
    }
    function local_destiny(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $from = $request->input('from');
        $city = outcity::where('city', $from)->first();
        $local_amt_logs = local_amt_log::where('ct_id', $city->id)->get();
        $data = array();

        foreach ($local_amt_logs as $local_amt_log) {
            if ($local_amt_log->hrs == NULL && $local_amt_log->place == NULL) {
                $result = array(
                    'result' => ucfirst($local_amt_log->km . 'km |')
                );
            } elseif ($local_amt_log->hrs == NULL) {
                $result = array(
                    'result' => ucfirst($local_amt_log->place . ' | ' . $local_amt_log->km . 'km |')
                );
            } elseif ($local_amt_log->place == NULL) {
                $result = array(
                    'result' => ucfirst($local_amt_log->km . 'km | ' . $local_amt_log->hrs . 'hrs |')
                );
            } else {


                $result = array(
                    'result' => ucfirst($local_amt_log->place . ' | ' . $local_amt_log->km . 'km | ' . $local_amt_log->hrs . 'hrs')
                );
            }

            array_push($data, $result);
        }
        return json_encode($data);
    }
    function inquiry_local_submit(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'number' => 'required|digits:10',
            'start_point' => 'required',
            // 'name' => 'required',
            'end_point' => 'required',
            'time' => 'required',
        ]);

        $inqid = rand(0, 99999999);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $parts = explode("|", $request->end_point);
            $tithalValue = $parts[0];


            $inquiry = new inquiry();
            $inquiry->pickup_ct = $request->start_point;
            $inquiry->drop_ct = $request->end_point;
            $inquiry->pickup_time = $request->time;
            $inquiry->inq_id = $inqid;
            $inquiry->trip_type = 'local';
            $inquiry->save();
            $city = outcity::where('city', $request->start_point)->first();
            $cityamt = local_amt_log::where('ct_id', $city->id)->where('place', $tithalValue)->first();

            $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get('cars.*');
            $check = inquiry::where('inq_id', $inqid)->first();

            if ($check->paid == 1) {
                return redirect('https://safarmobility.in');
            } else {
                return view('local_route', compact('inqid', 'cars', 'cityamt', 'check'));
            }
        }
    }

    function local_booking(Request $request)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }


        $inq = $request->input('id');
        $type = $request->input('type');
        $data = inquiry::where('inq_id', $inq)->first();
        $city = outcity::where('city', $data->pickup_ct)->first();
        if ($data->paid == 1) {
            return redirect('https://safarmobility.in/');
        } else {
            $parts = explode("|", $data->drop_ct);
            $drop_place = $parts[0];

            $amt = local_amt_log::where('ct_id', $city->id)->where('place', $drop_place)->first();
            if ($type == 1) {
                $amount = $amt->hatchback;
            } elseif ($type == 2) {
                $amount = $amt->sedan;
            } elseif ($type == 3) {
                $amount = $amt->suv;
            }
            inquiry::where('inq_id', $inq)->update([
                'car_type' => $type,
                'base_fare' => $amount,
                'total_amt' => $amount,
            ]);

            $data = inquiry::where('inq_id', $inq)->first();

            $ctype = cartype::where('id', $type)->first();

            return view('order_book', compact('data', 'ctype'));
        }
    }
    function user_booking()
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $uid = Session::get('userid');
        $data = inquiry::where('uid', $uid)->get();

        return view('user_booking', compact('data'));
    }

    function package_booking()
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }

        return view('book_package');
    }

    public function book_package(Request $request, $id)
    {
        if (!Session::has('mobile')) {
            return redirect('login')->with('error', 'Please log in to access this page.');
        }
        $getData = round_log::findOrFail($id);
        $GetData = round_log::all();

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'number' => 'required',
                'pickup' => 'required',
                'pick_time' => 'required',
                'pick_date' => 'required|date',
                'adult' => 'required|integer',
                'child' => 'required|integer',
                'price' => 'required',
                'root_name' => 'required',
                'package_id' => 'required'
            ]);

            $time = $request->input('pick_time');
            $pickTime = date("h:i A", strtotime($time));

            $booking = new local_amt_log();
            $booking->name = $request->input('name');
            $booking->email = $request->input('email');
            $booking->number = $request->input('number');
            $booking->pickup_point = $request->input('pickup');
            $booking->pickup_time = $pickTime;
            $booking->booking_date = $request->input('pick_date');
            $booking->adult = $request->input('adult');
            $booking->child = $request->input('child');
            $booking->price = $request->input('price');
            $booking->root_name = $request->input('root_name');
            $booking->package_id = $request->input('package_id');

            $booking->save();

            return redirect()->back()->with('success', 'Booking successful!');
        }

        return view('book_package', [
            'id' => $id,
            'getData' => $getData,
            'GetData' => $GetData,
        ]);
    }

    function contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        DB::table('contact')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Your Request Submited Successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'package_photo' => 'required|string',
            'root_start_stop' => 'required|string',
            'root_end_stop' => 'required|string',
            'time' => 'required|string',
            'time_explain' => 'required|string',
            'trip_flight' => 'required|string',
            'meals' => 'required|string',
            'activity' => 'required|string',
            'hotel' => 'required|string',
            'package_price' => 'required|numeric',
            'package_id' => 'required|integer',
            'mobile' => 'required',
        ]);

        DB::table('toor_package_wishlist')->insert([
            'package_photo' => $request->input('package_photo'),
            'root_start_stop' => $request->input('root_start_stop'),
            'root_end_stop' => $request->input('root_end_stop'),
            'time' => $request->input('time'),
            'time_explain' => $request->input('time_explain'),
            'trip_flight' => $request->input('trip_flight', null),
            'meals' => $request->input('meals', null),
            'activity' => $request->input('activity', null),
            'hotel' => $request->input('hotel', null),
            'package_price' => $request->input('package_price'),
            'package_id' => $request->input('package_id'),
            'user_mobile' => $request->input('mobile')
        ]);

        return redirect()->back()->with('success_p', 'Package added to wishlist successfully.');
    }

    function driver_home()
{
    if (!Session::has('drivermobile')) {
        return redirect('driver_login')->with('error', 'Please log in to access this page.');
    }

    $taxi = DB::table('taxi_book')
        ->where('trip_status', '!=', 'Completed')
        ->orderBy('created_at', 'desc')
        ->get();

    $mobile = Session::get('drivermobile');
    $driverdata = inquiry::where('mobile', $mobile)->first();
    $driverdataa = DB::table('driver')->where('mobile', $mobile)->first();

    $book = compact('taxi', 'driverdata', 'driverdataa');

    $tripdata = DB::table('driver_trip_history')
        ->leftJoin('taxi_book', 'driver_trip_history.trip_id', '=', 'taxi_book.id')
        ->select(
            'driver_trip_history.trip_id',
            'driver_trip_history.travel_root',
            'driver_trip_history.total_fare',
            'driver_trip_history.name',
            'driver_trip_history.mobile',
            'driver_trip_history.email',
            'driver_trip_history.pickup_point',
            'driver_trip_history.pickup_date',
            'driver_trip_history.pickup_time',
            'driver_trip_history.inquiry_no',
            'driver_trip_history.total_km',
            'driver_trip_history.car_type',
            'driver_trip_history.available_cabs',
            'driver_trip_history.per_km_rate',
            'driver_trip_history.base_fare',
            'taxi_book.start_km',
            'taxi_book.end_km'
        )
        ->where('driver_trip_history.driver_mobile', $mobile)
        ->orderBy('driver_trip_history.pickup_date', 'desc')
        ->get();

    return view('driver.driver_home', array_merge($book, ['tripdata' => $tripdata]));
}



    function driver()
    {
        if (!Session::has('drivermobile')) {
            return redirect('driver_login')->with('error', 'Please log in to access this page.');
        }

        return view('driver.driver_profile');
    }

    

    public function driverprofile()
    {
        // Check if 'drivermobile' session exists
        if (!Session::has('drivermobile')) {
            return redirect('driver_login')->with('error', 'Please log in to access this page.');
        }

        $mobile = Session::get('drivermobile');

        $driverdata = inquiry::where('mobile', $mobile)->first();

        $tripdata = DB::table('driver_trip_history')
        ->leftJoin('taxi_book', 'driver_trip_history.trip_id', '=', 'taxi_book.id')
        ->select(
            'driver_trip_history.trip_id', 
            'driver_trip_history.travel_root', 
            'driver_trip_history.total_fare', 
            'driver_trip_history.name', 
            'driver_trip_history.mobile', 
            'driver_trip_history.email', 
            'driver_trip_history.pickup_point', 
            'driver_trip_history.pickup_date', 
            'driver_trip_history.pickup_time', 
            'driver_trip_history.inquiry_no', 
            'driver_trip_history.total_km', 
            'driver_trip_history.car_type', 
            'driver_trip_history.available_cabs', 
            'driver_trip_history.per_km_rate', 
            'driver_trip_history.base_fare', 
            'taxi_book.start_km', 
            'taxi_book.end_km'
        )
        ->where('driver_trip_history.driver_mobile', $mobile)
        ->orderBy('driver_trip_history.pickup_date', 'desc') 
        ->get();
    


        $recordCount = $tripdata->count();

        $transection = DB::table('transection_driver')->where('driver_mobile', $mobile)->get();


        return view('driver.show_profile', compact('driverdata', 'tripdata', 'recordCount', 'transection'));
    }


    function driver_profile(Request $request)
    {
        // Define custom error messages
        $message = [
            'fullname.required' => 'Please Enter Your Full Name.',
            'email.required' => 'Please Enter Your Email.',
            'email.email' => 'Please Enter Valid Email.',
            'mobile.required' => 'Please Enter Your Mobile No.',
            'gender.required' => 'Please Select Your Gender.',
            'address.required' => 'Please Enter Your Address.',
            'dl_no.required' => 'Please Enter Your Driving Licence No.',
            'dl_photo.required' => 'Please Upload Your Driving Licence Photo.',
            'photo.required' => 'Please Upload Your Profile Photo.',
            'vehicle_name.required' => 'Please Enter Your Vehicle Name.',
            'vehicle_no.required' => 'Please Enter Your Vehicle No.',
            'vehicle_type.required' => 'Please Select Your Vehicle Type.',
            'rcbook_no.required' => 'Please Enter Your RC Book No.',
            'rcbook_photo.required' => 'Please Upload Your RC Book Photo.',
            'insurance_photo.required' => 'Please Upload Your Insurance Policy Photo.',
        ];

        // Validate the request data
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'dl_no' => 'required',
            'dl_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'vehicle_name' => 'required',
            'vehicle_no' => 'required',
            'vehicle_type' => 'required',
            'rcbook_no' => 'required',
            'rcbook_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'insurance_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20480'
        ], $message);

        // Create a new inquiry instance
        $pro = new inquiry();

        // Assign the validated request data to the inquiry instance
        $pro->name = $request->input('fullname');
        $pro->email = $request->input('email');
        $pro->mobile = $request->input('mobile');
        $pro->gender = $request->input('gender');
        $pro->address = $request->input('address');
        $pro->dl_no = $request->input('dl_no');

        // Handle file uploads
        if ($request->hasFile('dl_photo')) {
            $dl_photo = $request->file('dl_photo');
            $dl_photo_name = time() . '_dl.' . $dl_photo->getClientOriginalExtension();
            $dl_photo->move(public_path('uploads/driver'), $dl_photo_name);
            $pro->dl_photo = $dl_photo_name;
        }

        if ($request->hasFile('photo')) {
            $profile_photo = $request->file('photo');
            $profile_photo_name = time() . '_profile.' . $profile_photo->getClientOriginalExtension();
            $profile_photo->move(public_path('uploads/driver'), $profile_photo_name);
            $pro->profile_photo = $profile_photo_name;
        }

        $pro->rcbook_no = $request->input('rcbook_no');

        if ($request->hasFile('rcbook_photo')) {
            $rcbook_photo = $request->file('rcbook_photo');
            $rcbook_photo_name = time() . '_rcbook.' . $rcbook_photo->getClientOriginalExtension();
            $rcbook_photo->move(public_path('uploads/driver'), $rcbook_photo_name);
            $pro->rcbook_photo = $rcbook_photo_name;
        }

        if ($request->hasFile('insurance_photo')) {
            $insurance_photo = $request->file('insurance_photo');
            $insurance_photo_name = time() . '_insurance.' . $insurance_photo->getClientOriginalExtension();
            $insurance_photo->move(public_path('uploads/driver'), $insurance_photo_name);
            $pro->insurance_photo = $insurance_photo_name;
        }

        $pro->vehicle_name = $request->input('vehicle_name');
        $pro->vehicle_no = $request->input('vehicle_no');
        $pro->vehicle_type = $request->input('vehicle_type');
        $pro->status = 'inactive';

        $pro->save();

        // return back()->with('success', 'Driver profile created successfully.');

        Session::flash('success', 'Driver profile created successfully.');

        return redirect('/driver');
    }


    public function toggleStatus($id)
    {
        $registration = inquiry::find($id);
        if ($registration) {
            if ($registration->status == 'active') {
                $registration->status = 'inactive';
            } elseif ($registration->status == 'inactive') {
                $registration->status = 'active';
            }
            $registration->save();
        }

        return redirect()->back();
    }
}
