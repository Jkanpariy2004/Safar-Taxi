<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Admincontroller;
use App\Models\city_log;
use App\Models\cartype;
use App\Models\round_log;
use App\Models\cars;
use App\Models\Mobile;
use Illuminate\Support\Facades\Session;

use App\Models\outcity;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // if (!Session::has('mobile')) {
    //     return redirect('login')->with('error', 'Please log in to access this page.');
    // }

    $amtid = 1; // Define a default value or fetch it dynamically as needed

    $cities = outcity::orderBy('city', 'ASC')->get();
    $types = cartype::get();
    $cars = cartype::get();
    $data = array();
    foreach ($cities as $city) {
        $cityamt = city_log::select('city_logs.*', 'cities.city')->join('cities', 'city_logs.from', '=', 'cities.id')->where('city_logs.from', $city->id)->get();

        array_push($data, $cityamt);
    }

    $cityamt = city_log::join('cities', 'city_logs.from', '=', 'cities.id')->where('city_logs.id', $amtid)->first();
    $cars = cars::join('cartypes', 'cars.type_id', '=', 'cartypes.id')->get('cars.*');

    $GetData = cartype::all(); // Fetching data here as well
    $packages = round_log::all();

    $GetPackageData = round_log::all();

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    $VisitedPlace = DB::table('most_visited_place')->get();


    return view('home', compact('cities', 'types', 'data', 'cityamt', 'cars', 'GetData', 'GetPackageData', 'packages', 'userdata', 'VisitedPlace'));
});

// Contact page route
Route::get('contact', function () {
    if (!Session::has('mobile')) {
        return redirect('login')->with('error', 'Please log in to access this page.');
    }

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    return view('contact', compact('userdata'));
});

// About page route
Route::get('aboutus', function () {
    if (!Session::has('mobile')) {
        return redirect('login')->with('error', 'Please log in to access this page.');
    }

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    return view('about', compact('userdata'));
});


// Route::get('aboutus', function () {

//     if (!Session::has('mobile')) {
//         return redirect('login')->with('error', 'Please log in to access this page.');
//     }

//     return view('about');
// });
// Route::get('contact', function () {

//     if (!Session::has('mobile')) {
//         return redirect('login')->with('error', 'Please log in to access this page.');
//     }

//     return view('contact');
// });
Route::get('index2', function () {

    if (!Session::has('mobile')) {
        return redirect('login')->with('error', 'Please log in to access this page.');
    }

    $cities = outcity::get();

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    return view('home1', compact('cities', 'userdata'));
});
Route::get('/home', function () {

    if (!Session::has('mobile')) {
        return redirect('login')->with('error', 'Please log in to access this page.');
    }

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    $cities = outcity::orderBy('outcities.city', 'ASC')->get();
    $data = array();
    foreach ($cities as $city) {
        $cityamt = city_log::select('city_logs.*', 'outcities.city')->join('outcities', 'city_logs.from', '=', 'outcities.id')->where('city_logs.from', $city->id)->get();

        array_push($data, $cityamt);
    }


    return view('home', compact('cities', 'data', 'userdata'));
});
Route::get('/index', function () {

    if (!Session::has('mobile')) {
        return redirect('login')->with('error', 'Please log in to access this page.');
    }

    $cities = outcity::get();

    // Get the mobile number from the session
    $mobile = Session::get('mobile');

    // Retrieve the user data associated with the mobile number
    $userdata = Mobile::where('mobile', $mobile)->first();

    return view('index', compact('cities', 'userdata'));
});
Route::post('/inquiry_submit', [Homecontroller::class, 'inquiry_submit']);
Route::get('/inquiry_submitt', [Homecontroller::class, 'inquiry_submitt']);
Route::get('/route/{inqid}', [Homecontroller::class, 'route']);
Route::post('/car_confirm', [Homecontroller::class, 'car_confirm'])->name('car_confirm');
Route::post('/order_book', [Homecontroller::class, 'order_book']);
Route::get('/order_booked/{inq}/{total}/{paid}/{pending}', [Homecontroller::class, 'order_booked']);

// Route::post('/contact_mail', [Homecontroller::class, 'contact_mail']);
Route::post('/contact', [Homecontroller::class, 'contact']);

Route::get('/adminout', function () {


    return view('admin.admin_login');
});


Route::post('/dashboard', [Admincontroller::class, 'dashboard']);
Route::get('/admin_dashboard', [Admincontroller::class, 'admin_dashboard']);
Route::get('/admin_logout', [Admincontroller::class, 'logout']);
Route::get('/cab_list', [Admincontroller::class, 'cab_list']);
Route::get('/add_cab', [Admincontroller::class, 'add_cab']);
Route::get('/category_list', [Admincontroller::class, 'category_list']);
Route::post('/cab_store', [Admincontroller::class, 'cab_store']);

Route::get('/add_type', [Admincontroller::class, 'add_type']);
Route::post('/type_store', [Admincontroller::class, 'type_store']);

Route::get('/users', [Admincontroller::class, 'users']);
Route::get('/users/user_delete/{id}', [AdminController::class, 'user_delete']);
Route::get('/cities', [Admincontroller::class, 'cities']);
Route::get('/round_trip', [Admincontroller::class, 'round_trip']);
Route::get('/local_trip', [Admincontroller::class, 'local_trip']);

Route::get('/assign_amt', function () {

    $types = cartype::get();
    $cities = outcity::get();
    return view('admin.assign_amt', compact('types', 'cities'));
});

Route::get('/add_city', function () {

    return view('admin.add_city');
});

Route::post('/city_store', [Admincontroller::class, 'city_store']);
Route::post('/amt_store', [Admincontroller::class, 'amt_store']);

Route::get('/login', [Homecontroller::class, 'login']);
Route::get('/driver_login', [Homecontroller::class, 'driver_login']);

Route::get('/driver', [Homecontroller::class, 'driver_home']);
Route::post('/toggleStatusTaxi/{id}', [Homecontroller::class, 'toggleStatusTaxi']);

Route::get('/driverprofile', [Homecontroller::class, 'driverprofile']);

Route::get('/login-type', [Homecontroller::class, 'login_type']);
Route::post('/userlogin', [HomeController::class, 'userlogin']);
Route::post('/driverlogin', [HomeController::class, 'driverlogin']);
Route::get('/Profile', [Homecontroller::class, 'Profile']);
Route::post('/user_profile', [Homecontroller::class, 'user_profile']);
Route::get('/profile-edit/{id}', [Homecontroller::class, 'profile_edit']);
Route::get('/show-profile', [Homecontroller::class, 'show_profile']);
Route::get('/user_logout', [Homecontroller::class, 'user_logout']);
Route::get('/driver_logout', [Homecontroller::class, 'driver_logout']);
Route::get('/register', function () {


    return view('register');
});

Route::post('/user_register', [Homecontroller::class, 'user_register']);

Route::get('/logout', [Homecontroller::class, 'logout']);
Route::post('/user_login', [Homecontroller::class, 'user_login']);


Route::post('/submit_inquiry', [Homecontroller::class, 'submit_inquiry'])->name('submit_inquiry');


Route::get('/booking', [Homecontroller::class, 'booking'])->name('booking');
Route::post('/taxi-booking/{id}', [HomeController::class, 'taxi_booking']);
Route::get('/taxi-booking/{id}', [HomeController::class, 'viewAvailableCabs']);

Route::post('/startTrip/{id}', [HomeController::class, 'startTrip']);
Route::post('/endTrip/{id}', [HomeController::class, 'endTrip']);
Route::post('/bookTrip/{id}', [HomeController::class, 'bookTrip']);

Route::post('/taxt-booking/{id}/book_taxi', [Homecontroller::class, 'book_taxi']);
Route::post('/process-payment', [Homecontroller::class, 'processPayment'])->name('process.payment');
Route::post('/process-payment-user', [Homecontroller::class, 'processPaymentUser'])->name('processuser.paymentuser');
Route::post('/recharge-wallet', [Homecontroller::class, 'RechargePayment'])->name('processuserr.paymentuserr');


Route::post('/wishlist', [Homecontroller::class, 'store'])->name('wishlist.store');

Route::post('/price_confirm', [Homecontroller::class, 'price_confirm'])->name('price_confirm');
Route::post('/amt_change', [Homecontroller::class, 'amt_change'])->name('amt_change');
Route::get('/cab_book', [Admincontroller::class, 'cab_book'])->name('cab_book');

Route::get('/amt_route', [Homecontroller::class, 'amt_route']);
Route::post('/round_log', [Admincontroller::class, 'round_log']);
Route::get('/round_trip_kms', function () {

    $types = cartype::get();
    $cities = outcity::get();
    return view('admin.round_trip_kms', compact('types', 'cities'));
});

Route::get('/clear-cache', [HomeController::class, 'clearCache']);

Route::get('/assign_round_amt', function () {

    $types = cartype::get();
    return view('admin.assign_round_amt', compact('types'));
});
Route::post('/round_amt_log', [Admincontroller::class, 'round_amt_log']);
Route::post('/inquiry_round_submit', [Homecontroller::class, 'inquiry_round_submit']);
Route::get('/booking1', [Homecontroller::class, 'booking1'])->name('booking1');
Route::post('/local_destiny', [Homecontroller::class, 'local_destiny'])->name('local_destiny');
Route::get('/local_booking', [Homecontroller::class, 'local_booking'])->name('local_booking');

Route::get('/local_trip_kms', function () {

    $types = cartype::get();
    $cities = outcity::get();
    return view('admin.local_trip_kms', compact('types', 'cities'));
});
Route::post('/local_amt_log', [Admincontroller::class, 'local_amt_log']);
Route::post('/inquiry_local_submit', [Homecontroller::class, 'inquiry_local_submit']);
Route::get('/user_booking', [Homecontroller::class, 'user_booking'])->name('user_booking');

Route::get('/one_way', [Admincontroller::class, 'one_way']);
Route::get('/oneway_delete/{id}', [Admincontroller::class, 'oneway_delete']);
Route::get('/oneway_edit', [Admincontroller::class, 'oneway_edit']);
Route::post('/update_oneway', [Admincontroller::class, 'update_oneway']);

Route::get('/round_delete/{id}', [Admincontroller::class, 'round_delete']);
Route::get('/round_edit', [Admincontroller::class, 'round_edit']);
Route::post('/update_round', [Admincontroller::class, 'update_round']);


Route::get('/local_delete/{id}', [Admincontroller::class, 'local_delete']);
Route::get('/local_edit', [Admincontroller::class, 'local_edit']);
Route::post('/update_local', [Admincontroller::class, 'update_local']);
Route::get('/booked_order', [Admincontroller::class, 'booked_order']);
Route::get('/booked_order/booked_order_delete/{id}', [Admincontroller::class, 'booked_order_delete']);


Route::get('/add-package', [Admincontroller::class, 'package']);
Route::get('/show-package', [Admincontroller::class, 'show_package']);
Route::get('/package-delete/{id}', [Admincontroller::class, 'package_delete']);
Route::get('/package-edit/{id}', [Admincontroller::class, 'package_edit']);
Route::post('/package-update/{id}', [Admincontroller::class, 'update_package']);
Route::post('/add-package/add_package', [Admincontroller::class, 'add_package']);

Route::get('/book-package/{id}', [Homecontroller::class, 'book_package']);
Route::post('/book-package/{id}', [Homecontroller::class, 'book_package']);


Route::get('/show-package-booking', [Admincontroller::class, 'package_booked_show']);
Route::get('/show-package-booking/package_booked_show_delete/{id}', [Admincontroller::class, 'package_booked_show_delete']);

Route::get('/contact-show', [Admincontroller::class, 'contact_show']);
Route::get('/contact-show/delete/{id}', [Admincontroller::class, 'contact_delete']);

Route::get('/most-visited', [Admincontroller::class, 'most_visited']);
Route::get('/most-visited/delete/{id}', [Admincontroller::class, 'delete_most_visited']);
Route::get('/a-most-visited', [Admincontroller::class, 'a_most_visited']);
Route::post('/add-most-visited', [Admincontroller::class, 'add_most_visited']);


// Driver panel
Route::get('/driver-profile', [Homecontroller::class, 'driver']);
Route::post('/driver_profile', [Homecontroller::class, 'driver_profile']);
Route::get('/driver-show', [Admincontroller::class, 'driver']);
Route::post('/toggleStatus/{id}', [Homecontroller::class, 'toggleStatus']);
