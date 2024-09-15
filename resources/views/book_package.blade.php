<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .alert.alert-danger {
            /* background-color: transparent;
            padding: 0;
            color: red;
            border: none;
            margin-top: 0px;
            margin-bottom: 0px; */
            background-color: red;
            color: white;
        }

        .alert.alert-danger,
        .alert.alert-success {
            opacity: 0;
            animation: slideIn 0.5s forwards;
            font-weight: 700;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* .form-select:focus {
            border-color: #fbbf85;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(247, 125, 10, 0.25);
        } */
    </style>

</head>
@extends('main')
@section('main-content')

<section class="breadcrumb-section flight-sec pt-0 bg-size blur-up lazyloaded " style="background-image: url('https://source.unsplash.com/2400x700/?taxi">
    <img src="https://www.onewaycab.org/assets/images/cab//slide.png" class="bg-img img-fluid blur-up lazyload" alt="" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-right breadcrumb-content pt-0">
                    <!-- <div>
                            <h2>cab search</h2>
                            <nav aria-label="breadcrumb" class="theme-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="https://www.onewaycab.org/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cab search</li>
                                </ol>
                            </nav>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container mb-3 mt-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-3">
                    <h5>Package Booking Detail</h5>
                    <div class="card-body px-3 pt-0 pb-2">
                        <br>
                    </div>
                    <form action="{{ url('/book-package', $id) }}" method="POST">
                        @csrf
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="row">
                            <!-- Name Input -->
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputName">Enter Your Name</label>
                                <input type="text" name="name" class="form-control rounded" id="floatingInputName" placeholder="Enter Name">
                                @error('name')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                            <!-- Email Input -->
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputEmail">Enter Your Email address</label>
                                <input type="email" name="email" class="form-control rounded" id="floatingInputEmail" placeholder="Email address">
                                @error('email')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <?php
                        $mobile = Session::get('mobile');
                        $userdata = DB::table('profile')->where('mobile', $mobile)->first();
                        ?>
                        <div class="row">
                            <!-- Number Input -->
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputNumber">Enter Your Mobile Number</label>
                                <input type="text" name="number" class="form-control rounded bg-white" value="{{ $userdata->mobile }}" readonly id="floatingInputNumber" placeholder="Enter Number">
                                @error('number')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <!-- Pickup Point Input -->
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputPickup">Enter Pickup Point</label>
                                <input type="text" name="pickup" class="form-control rounded" id="floatingInputPickup" placeholder="Enter Pickup Point" autocomplete="off">
                                @error('pickup')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <script>
                                function initAutocomplete() {
                                    // Initialize the autocomplete function
                                    const input = document.getElementById('floatingInputPickup');
                                    const options = {
                                        types: ['geocode'], // Restrict results to addresses
                                        componentRestrictions: {
                                            country: 'IN'
                                        } // Restrict results to India
                                    };
                                    const autocomplete = new google.maps.places.Autocomplete(input, options);

                                    // Optionally, you can set bounds or radius for further restriction
                                    // Example: Setting bounds to a specific area (e.g., a city or region)
                                    const defaultBounds = new google.maps.LatLngBounds(
                                        new google.maps.LatLng(12.8778, 77.5946), // Southwest corner of Bangalore
                                        new google.maps.LatLng(13.1715, 77.6677) // Northeast corner of Bangalore
                                    );

                                    autocomplete.setBounds(defaultBounds);
                                }
                            </script>

                            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjt0uY-WSmCiZihYuHLeOQRjA0Pfze0yo&libraries=places&language=en&callback=initAutocomplete" async defer></script>

                        </div>

                        <div class="row">
                            <!-- Pick Up Time Input -->
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputPickTime">Enter Pick Up Time</label>
                                <input type="time" name="pick_time" class="form-control rounded" id="floatingInputPickTime" placeholder="Enter time">
                                @error('pick_time')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="text-dark" for="floatingInputPickTime">Select Package Booking Date</label>
                                <input type="date" name="pick_date" class="form-control rounded" id="floatingInputPickTime" placeholder="Enter time">
                                @error('pick_date')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="text-dark" style="top: -12px;">Select Adult</label>
                                <select class="form-select" name="adult">
                                    <option value="" hidden>Select Adult</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                @error('adult')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label class="text-dark" style="top: -12px;">Select Child</label>
                                <select class="form-select" name="child">
                                    <option value="" hidden>Select Child</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                @error('child')
                                <div class="alert alert-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>
                        </div>

                        <!-- Amount Display -->
                        <div class="mb-3">
                            <label class="text-dark" for="floatingInputName">Total Package Price</label>
                            <input type="text" name="price" class="form-control rounded bg-white" readonly id="floatingInputName" value="₹{{$getData->package_price}}" placeholder="Enter Name">
                            @error('price')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <input type="hidden" name="package_id" value="{{ $getData->package_id }}">
                        <input type="hidden" name="root_name" value="{{ $getData->root_start_stop . '-' . $getData->root_end_stop }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3">
                    <h5>Booking Summary</h5>
                    <table class="text-dark">
                        <tr>
                            <th>Package Route:</th>
                            <td>{{$getData->root_start_stop}} To {{$getData->root_end_stop}}</td>
                        </tr>
                        <tr>
                            <th>Package Time:</th>
                            <td>{{ $getData->time }}</td>
                        </tr>
                        <tr>
                            <th>Package Time:</th>
                            <td>{{ $getData->time_explain }}</td>
                        </tr>
                        <tr>
                            <th>Trip:</th>
                            <td>{{ $getData->trip_flight }}</td>
                        </tr>
                        <tr>
                            <th>Meals:</th>
                            <td>{{ $getData->meals }}</td>
                        </tr>
                        <tr>
                            <th>Activity:</th>
                            <td>{{ $getData->activity }}&nbsp;Activity</td>
                        </tr>
                        <tr>
                            <th>Hotel:</th>
                            <td>{{ $getData->hotel }}&nbsp;Star</td>
                        </tr>
                        <tr>
                            <th>Package Number:</th>
                            <td>{{ $getData->package_id }}</td>
                        </tr>
                    </table>
                    <h5 class="mt-3"><b class="text-dark">TOTAL Price : </b> ₹{{$getData->package_price}}</h5>
                </div>
                <br>
            </div>
        </div>
    </div>

</section>

@endsection