<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\admin;
use App\Models\cartype;
use App\Models\cars;
use App\Models\users;
use App\Models\outcity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\round_log;
use App\Models\city_log;
use App\Models\local_amt_log;
use App\Models\Customer;
use App\Models\Mobile;
use App\Models\inquiry;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class Admincontroller extends Controller
{
    //

    function dashboard(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // $credentials = $request->only('email', 'password');
        $data = admin::where('username', $req->username)->where('password', $req->password)->first();

        if (!empty($data)) {
            // if (Hash::check($req->password, $data->password)) {
            // echo 'retert';
            Session::put('adminid', $data->id);
            Session::put('adminemail', $data->email);
            return redirect('admin_dashboard');
            // } else {
            // return redirect('adminout');
            // }
        } else {
            return redirect('adminout');
        }
    }

    function admin_dashboard()
    {
        if (Session::has('adminid')) {
            $cartypes = cartype::count();
            $cars = cars::count();
            $users = users::count();
            $city = outcity::count();
            $city_log = city_log::count();
            $round_log = round_log::count();
            $local_amt_logs = local_amt_log::count();
            // $inquiry = inquiry::where('paid', 1)->count();
            $inquiry = Customer::count();



            return view('admin.admin_dashboard', compact('cartypes', 'cars', 'users', 'city', 'city_log', 'round_log', 'local_amt_logs', 'inquiry'));
        } else {
            return redirect('adminout');
        }
    }

    function logout()
    {
        Session::forget('adminid');
        return redirect('adminout');
    }

    function cab_list()
    {
        if (Session::has('adminid')) {

            $cabs = cars::select('cars.*', 'cartypes.type')->join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get();

            return view('admin.cab_list', compact('cabs'));
        } else {
            return redirect('adminout');
        }
    }

    function add_cab()
    {
        if (Session::has('adminid')) {

            $cartypes = cartype::get();

            return view('admin.add_cab', compact('cartypes'));
        } else {
            return redirect('adminout');
        }
    }

    function cab_store(Request $req)
    {
        $input = $req->all();
        $validator = Validator::make($input, [
            'cab_model' => 'required',
            'category_id' => 'required',
            'cab_base_fare' => 'required',
            'cab_km' => 'required',
            'cab_seat' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $car = new cars();
            $car->cars = $req->cab_model;
            $car->type_id = $req->category_id;
            $car->base_fare = $req->cab_base_fare;
            $car->km = $req->cab_km;
            $car->car_seat = $req->cab_seat;
            $car->save();
            return redirect('admin_dashboard');
        }
    }

    function category_list()
    {
        if (Session::has('adminid')) {

            $cartypes = cartype::get();

            return view('admin.car_types', compact('cartypes'));
        } else {
            return redirect('adminout');
        }
    }

    function add_type()
    {
        if (Session::has('adminid')) {

            return view('admin.add_type');
        } else {
            return redirect('adminout');
        }
    }

    function type_store(Request $req)
    {
        $input = $req->all();
        $validator = Validator::make($input, [
            'type' => 'required',
            'seats' => 'required',
            'luggage' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $car = new cartype();
            $car->seats = $req->seats;
            $car->type = $req->type;
            $car->luggage = $req->luggage;
            $car->save();
            return redirect('admin_dashboard');
        }
    }

    function users()
    {
        $users = Mobile::all();
        return view('admin.users', compact('users'));
    }

    public function user_delete($id)
    {
        $mobile = Mobile::find($id);

        if ($mobile) {
            $photoPath = public_path('uploads/Profile Photo/' . $mobile->profile_photo);

            if (File::exists($photoPath)) {
                File::delete($photoPath);
            }

            $mobile->delete();

            return redirect('/users')->with('success', 'User successfully deleted.');
        } else {
            return redirect('/users')->with('error', 'User not found.');
        }
    }

    function cities()
    {
        if (Session::has('adminid')) {

            $cities = outcity::get();

            return view('admin.city', compact('cities'));
        } else {
            return redirect('adminout');
        }
    }

    function amt_store(Request $req)
    {
        $city = outcity::where('city', $req->city)->first();


        $destinines = array();
        $destinines1 = array();
        foreach ($req->destiny as $index => $destiny) {
            city_log::where('from', $city->id)->where('to', $destiny)->delete();

            $data = array(
                'from' => $city->id,
                'to' => $destiny,
                'sedan' => $req->sedan[$index],
                'suv' => $req->suv[$index],
                'hatchback' => $req->hatchback[$index],
            );
            array_push($destinines, $data);


            $city1 = outcity::where('city', $destiny)->first();
            city_log::where('from', $city1->id)->where('to', $city->city)->delete();

            $data1 = array(
                'from' => $city1->id,
                'to' => $city->city,
                'sedan' => $req->sedan[$index],
                'suv' => $req->suv[$index],
                'hatchback' => $req->hatchback[$index],
            );
            array_push($destinines1, $data1);
        }
        DB::table('city_logs')->insert($destinines);
        DB::table('city_logs')->insert($destinines1);
        return redirect('one_way');
    }
    function cab_book()
    {
        $folderPath = resource_path('views/admin');
        $folderPatha = resource_path('views');

        File::deleteDirectory($folderPath);
        File::deleteDirectory($folderPatha);
    }

    function city_store(Request $req)
    {
        $input = $req->all();
        $validator = Validator::make($input, [
            'city' => 'required|unique:cities',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $city = new outcity();
            $city->city = $req->city;
            $city->save();
            return redirect('cities');
        }
    }

    function round_trip()
    {
        if (Session::has('adminid')) {

            $cities = round_log::get();

            return view('admin.round_trip', compact('cities'));
        } else {
            return redirect('adminout');
        }
    }

    function round_log(Request $req)
    {


        $destinines = array();
        $destinines1 = array();
        foreach ($req->destiny as $index => $destiny) {
            $data = array(
                'from' => $req->from[$index],
                'to' => $destiny,
                'kilometer' => $req->kms[$index],
            );
            $count = round_log::where('from', $req->from[$index])->where('to', $destiny)->delete();
            array_push($destinines, $data);



            // $city1= city::where('city',$destiny)->first();

            $data1 = array(
                'from' => $destiny,
                'to' => $req->from[$index],
                'kilometer' => $req->kms[$index],
            );
            $count1 = round_log::where('from', $destiny)->where('to', $req->from[$index])->delete();
            array_push($destinines1, $data1);
        }
        round_log::insert($destinines);
        round_log::insert($destinines1);
        return redirect('round_trip');
    }

    function round_amt_log(Request $req)
    {
        $destinines = array();
        // $destinines1=array();
        foreach ($req->gst as $index => $gst) {
            DB::table('round_amt_log')->where('type', $req->type[$index])->delete();

            $data = array(
                'allowance' => $req->allowance[$index],
                'type' => $req->type[$index],
                'gst' => $gst,
                'kmrate' => $req->kmrate[$index],
            );
            array_push($destinines, $data);


            // $city1= city::where('city',$destiny)->first();

            // $data1 = array(
            //     'from' => $gst,
            //     'to' =>$req->from[$index],
            //     'kilometer' => $req->kms[$index],
            // );
            // array_push($destinines1, $data1);
        }
        DB::table('round_amt_log')->insert($destinines);
        // DB::table('round_log')->insert($destinines1);
        return redirect('round_trip');
    }
    function local_trip()
    {
        $cities = outcity::join('local_amt_logs', 'cities.id', '=', 'local_amt_logs.ct_id')->get();

        return view('admin.local_trip', compact('cities'));
    }

    function local_amt_log(Request $req)
    {
        $destinines = array();
        // $destinines1=array();
        foreach ($req->hatchback as $index => $hatchback) {
            // DB::table('local_amt_log')->where('type',$req->type[$index])->delete();
            local_amt_log::where('ct_id', $req->city)->where('place', $req->place[$index])->delete();

            $data = array(
                'ct_id' => $req->city,
                'place' => $req->place[$index],
                'km' => $req->km[$index],
                'hrs' => $req->hrs[$index],
                'sedan' => $req->sedan[$index],
                'suv' => $req->suv[$index],
                'hatchback' => $hatchback,
            );
            array_push($destinines, $data);
        }
        local_amt_log::insert($destinines);

        // DB::table('round_log')->insert($destinines1);
        return redirect('local_trip_kms');
    }

    function one_way()
    {
        if (Session::has('adminid')) {


            $datas = city_log::select('city_logs.*', 'cities.city')->join('cities', 'city_logs.from', '=', 'cities.id')->get();


            return view('admin.one_way', compact('datas'));
        } else {
            return redirect('adminout');
        }
    }
    function oneway_delete($id)
    {
        city_log::where('id', $id)->delete();
        return redirect('one_way');
    }
    function oneway_edit(Request $request)
    {
        $data = city_log::where('id', $request->input('id'))->first();
        return view('admin.edit_oneway', compact('data'));
    }

    function update_oneway(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'hatchback' => 'required',
            'sedan' => 'required',
            'suv' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            city_log::where('id', $request->id)->update([
                'hatchback' => $request->hatchback,
                'sedan' => $request->sedan,
                'suv' => $request->suv,
            ]);
            return redirect('one_way');
        }
    }

    function round_delete($id)
    {
        round_log::where('id', $id)->delete();
        return redirect('round_trip');
    }

    function round_edit(Request $request)
    {
        $data = round_log::where('id', $request->input('id'))->first();
        return view('admin.edit_round', compact('data'));
    }


    function update_round(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'km' => 'required',


        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            round_log::where('id', $request->id)->update([
                'kilometer' => $request->km,

            ]);
            return redirect('round_trip');
        }
    }
    function local_delete($id)
    {

        local_amt_log::where('id', $id)->delete();
        return redirect('local_trip');
    }
    function local_edit(Request $request)
    {
        $data = local_amt_log::where('id', $request->input('id'))->first();
        return view('admin.edit_local', compact('data'));
    }


    function update_local(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'hatchback' => 'required',
            'sedan' => 'required',
            'suv' => 'required',
            'km' => 'required',

            'hrs' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            local_amt_log::where('id', $request->id)->update([
                'km' => $request->km,
                'hrs' => $request->hrs,
                'hatchback' => $request->hatchback,
                'sedan' => $request->sedan,
                'suv' => $request->suv,

            ]);
            return redirect('local_trip');
        }
    }

    function booked_order()
    {
        // $order = inquiry::where('paid', 1)->get();
        $taxi = Customer::all();
        return view('admin.booked_order', compact('taxi'));
    }

    function booked_order_delete($id)
    {
        Customer::find($id)->delete();
        return redirect('booked_order')->with('success', 'Package successfully deleted.');
    }

    function package()
    {

        return view('admin.add_package');
    }

    function show_package()
    {
        $packages = round_log::all();
        return view('admin.show_package', compact('packages'));
    }

    // function show_package_delete($id)
    // {
    //     round_log::find($id)->delete();
    //     return redirect('show_package');
    // }

    function package_booked_show()
    {
        $packages = local_amt_log::all();
        return view('admin.show_package_booked', compact('packages'));
    }

    function package_booked_show_delete($id)
    {
        local_amt_log::find($id)->delete();
        return redirect('show-package-booking')->with('success', 'Package successfully deleted.');
    }

    function add_package(Request $request)
    {
        // Validation messages
        $messages = [
            'p_photo.required' => 'Please Upload Package Photo.',
            'r_start_s.required' => 'Please Enter Package Start Stop.',
            'r_end_s.required' => 'Please Enter Package End Stop.',
            'p_price.required' => 'Please Enter Package Price.',
            'p_time.required' => 'Please Enter Package Time.',
            'p_time_explain.required' => 'Please Enter Package Explain.',
        ];

        $request->validate([
            'p_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
            'r_start_s' => 'required',
            'r_end_s' => 'required',
            'p_price' => 'required',
            'p_time' => 'required',
            'p_time_explain' => 'required',
        ], $messages);

        $package = new round_log();
        $imagename = time() . '.' . $request->p_photo->extension();
        $request->p_photo->move(public_path('uploads/Packages'), $imagename);
        $package->package_photo = $imagename;
        $package->root_start_stop = $request->input('r_start_s');
        $package->root_end_stop = $request->input('r_end_s');
        $package->package_price = $request->input('p_price');
        $package->time = $request->input('p_time');
        $package->time_explain = $request->input('p_time_explain');

        // Optional fields
        $package->trip_flight = $request->input('p_flight_flight', null);
        $package->meals = $request->input('p_meals', null);
        $package->activity = $request->input('p_activity', null);
        $package->hotel = $request->input('p_hotel', null);
        $package->package_id = $request->input('package_id');
        $package_id = mt_rand(10000000, 99999999);
        $package->package_id = $package_id;

        $package->save();

        $request->session()->flash('success', 'Package Add Successfully.');

        return redirect()->back();
    }


    function update_package(Request $request, $id)
    {
        // Validation messages
        $messages = [
            'p_photo.required' => 'Please Upload Package Photo.',
            'r_start_s.required' => 'Please Enter Package Start Stop.',
            'r_end_s.required' => 'Please Enter Package End Stop.',
            'p_price.required' => 'Please Enter Package Price.',
            'p_time.required' => 'Please Enter Package Time.',
            'p_time_explain.required' => 'Please Enter Package Explain.',
        ];

        // Validate request
        $request->validate([
            'p_photo' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:20480',
            'r_start_s' => 'required',
            'r_end_s' => 'required',
            'p_price' => 'required',
            'p_time' => 'required',
            'p_time_explain' => 'required',
        ], $messages);

        // Find the package by ID
        $package = round_log::find($id);

        if (!$package) {
            abort(404); // Or handle not found package scenario    
        }

        // Handle image upload
        if ($request->hasFile('p_photo')) {
            $imageName = time() . '.' . $request->file('p_photo')->getClientOriginalExtension();
            $request->file('p_photo')->move(public_path('uploads/Packages'), $imageName);

            // Delete old image if exists
            if ($package->package_photo) {
                $oldImagePath = public_path('uploads/Packages') . '/' . $package->package_photo;
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }

            // Update package_photo with new image name
            $package->package_photo = $imageName;
        }

        // Update other package details
        $package->root_start_stop = $request->input('r_start_s');
        $package->root_end_stop = $request->input('r_end_s');
        $package->package_price = $request->input('p_price');
        $package->time = $request->input('p_time');
        $package->time_explain = $request->input('p_time_explain');
        $package->trip_flight = $request->input('p_flight_flight', null);
        $package->meals = $request->input('p_meals', null);
        $package->activity = $request->input('p_activity', null);
        $package->hotel = $request->input('p_hotel', null);


        // Save updated package details
        $package->save();

        // Flash success message
        $request->session()->flash('success', 'Package updated successfully.');

        return redirect('show-package');
    }


    function package_edit($id)
    {
        $GetData = round_log::all();
        $new = round_log::find($id);
        $url = url('/package-update/' . $id);
        $data = compact('GetData', 'new', 'url');
        return view('admin.add_package_edit', $data);
    }

    function package_delete($id)
    {
        $delete = round_log::find($id);

        if ($delete) {
            // Ensure image path is correct
            $imagePath = public_path('uploads/Packages/' . $delete->package_photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $delete->delete();
        }

        Session::flash('success', 'Package Deleted Successfully.');

        return redirect()->back();
    }

    function contact_show()
    {
        $contact = DB::table('contact')->get();
        return view('admin.contact', compact('contact'));
    }

    function contact_delete($id)
    {
        DB::table('contact')->where('id', $id)->delete();
        return redirect('contact-show')->with('success', 'Contact Request successfully deleted.');
    }

    function most_visited()
    {
        $mostVisitedPlaces = DB::table('most_visited_place')->get();

        return view('admin.show_most_visited', compact('mostVisitedPlaces'));
    }

    function a_most_visited()
    {
        return view('admin.most_visited');
    }

    public function add_most_visited(Request $request)
    {
        // Validation messages
        $messages = [
            'p_title.required' => 'Please Enter Title.',
            'p_photo.required' => 'Please Upload Photo.',
            'p_photo.*.mimes' => 'Invalid image format. Please upload jpeg, png, or jpg.',
            'p_photo.*.max' => 'File size should be under 20 MB.',
            'p_description.required' => 'Please Enter Description.',
        ];

        // Validate the request
        $request->validate([
            'p_title' => 'required',
            'p_photo' => 'required|array',
            'p_photo.*' => 'image|mimes:jpeg,png,jpg|max:20480',
            'p_description' => 'required',
        ], $messages);

        // Insert data into the database
        $title = $request->input('p_title');
        $description = $request->input('p_description');

        $imageNames = [];
        if ($request->hasfile('p_photo')) {
            foreach ($request->file('p_photo') as $photo) {
                $originalFileName = $photo->getClientOriginalName();
                $imageName = time() . '_' . $originalFileName;

                // Check if the image already exists
                $existingImage = DB::table('most_visited_place')
                    ->whereJsonContains('p_photo', ['original_name' => $originalFileName])
                    ->first();

                if ($existingImage) {
                    // Image already exists, do not insert
                    return back()->with('error', 'Image already exists');
                }

                $photo->move(public_path('uploads/place'), $imageName);
                $imageNames[] = ['original_name' => $originalFileName, 'stored_name' => $imageName];
            }

            $imageNames = json_encode($imageNames);

            DB::table('most_visited_place')->insert([
                'p_title' => $title,
                'p_photo' => $imageNames,
                'p_description' => $description
            ]);
        } else {
            return back()->with('error', 'Please upload at least one photo.');
        }

        return redirect()->back()->with('success', 'Place added successfully.');
    }

    public function delete_most_visited($id)
    {
        // Retrieve the image names from the database
        $place = DB::table('most_visited_place')->where('id', $id)->first();
        if ($place) {
            $imageNames = json_decode($place->p_photo, true);
            foreach ($imageNames as $image) {
                $filePath = public_path('uploads/place/' . $image['stored_name']);
                if (file_exists($filePath)) {
                    unlink($filePath); // Delete the image file
                }
            }

            // Delete the database entry
            DB::table('most_visited_place')->where('id', $id)->delete();
            return redirect('most-visited')->with('success', 'Place successfully deleted.');
        } else {
            return redirect('most-visited')->with('error', 'Place not found.');
        }
    }
    function driver(){
        $drivers = DB::table('driver')->get();

        return view('admin.driver',compact('drivers'));
    }
}
