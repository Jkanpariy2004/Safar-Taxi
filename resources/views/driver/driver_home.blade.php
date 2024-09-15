<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


    <style>
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

        .card-box-shadow {
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
        }

        .route {
            text-align: center;
            margin-bottom: 3px;
        }

        .to {
            margin-bottom: 3px;
        }

        .start {
            color: green;
            margin-bottom: 3px;
            text-align: center;
        }

        .end {
            color: red;
            text-align: center;
        }

        @media only screen and (max-width: 600px) {
            .route {
                text-align: left;
            }

            .to {
                text-align: center;
                width: 100%;
            }

        }

        .wallet-balance {
            display: flex;
            align-items: center;
        }

        .balance-value {
            margin-right: 10px;
            font-weight: bold;
        }

        .toggle-eye {
            cursor: pointer;
        }

        .err-1 {
            width: 80%;
            display: flex;
        }

        .err-2 {
            width: 20%;
            text-align: right;
        }

        .main {
            display: flex;
        }

        @media only screen and (max-width: 768px) {
            .err-1 {
                width: 100%;
            }

            .err-2 {
                width: 100%;
                text-align: center;
            }
        }
        .alert.alert-danger {
            background-color: transparent;
            padding: 0;
            color: red;
            border: none;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .alert.alert-success {
            background-color: transparent;
            padding: 0;
            color: green;
            border: none;
            margin-top: 3px;
            margin-bottom: 10px;
        }
    </style>
</head>

@extends('header')

@section('main-content')
<div class="container-fluid mt-4">
    @if($driverdata->wallet < 100) <div class="alert alert-danger main" style="align-items: baseline;">
        <div class="err-1">
        <i class='bx bxs-wallet' style="font-size: 25px;"></i> :
            <div class="wallet-balance">
                <span class="balance-value" id="wallet-balance">****</span>
                <i class="fas fa-eye-slash toggle-eye" onclick="toggleWalletBalance()"></i>
            </div>
        </div>
        <div class="err-2">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#razorpayModal">
                Add Money in Wallet
            </button>
        </div>
</div>
@else
<div class="alert alert-success main">
<i class='bx bxs-wallet' style="font-size: 25px;"></i> :
    <div class="wallet-balance">
        <span class="balance-value" id="wallet-balance">****</span>
        <i class="fas fa-eye-slash toggle-eye" onclick="toggleWalletBalance()"></i>
    </div>
</div>
@endif
<div class="container-fluid" id="updateLocation" style="display: none;">
    <button class="btn btn-success">Update Location</button>
</div>
<div id="locationOutput" style="display: none;"></div>

<script>
    function updateLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;
                
                // Use the Fetch API to get the location information
                fetch(`https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=en`)
                    .then(response => response.json())
                    .then(data => {
                        const cityName = data.city || 'City not found';
                        
                        // Update the innerHTML of the locationOutput div (hidden)
                        document.getElementById('locationOutput').innerHTML = 
                            `Latitude: ${latitude}<br>Longitude: ${longitude}<br>City: ${cityName}`;
                        
                        // Filter cards based on city name
                        filterCardsByCity(cityName);
                    })
                    .catch(error => {
                        console.error('Error fetching location data:', error);
                        document.getElementById('locationOutput').innerHTML = 
                            'Unable to retrieve location details.';
                    });
            }, function(error) {
                console.error('Error occurred. Error code: ' + error.code);
                document.getElementById('locationOutput').innerHTML = 
                    'Unable to retrieve your location.';
            });
        } else {
            document.getElementById('locationOutput').innerHTML = 
                'Geolocation is not supported by this browser.';
        }
    }

    function filterCardsByCity(cityName) {
        const cards = document.querySelectorAll('.taxi-card');
        cards.forEach(card => {
            const cardCity = card.getAttribute('data-city').toLowerCase();
            if (cardCity.includes(cityName.toLowerCase())) {
                card.style.display = ''; // Show card
                card.classList.add('highlight'); // Optional: Add a highlight class
            } else {
                card.style.display = 'none'; // Hide card
            }
        });
    }

    // Run updateLocation every minute
    setInterval(updateLocation, 60000);

    // Initial update
    updateLocation();
</script>

<script>
    let isVisible = false;

    function toggleWalletBalance() {
        const walletBalance = document.getElementById('wallet-balance');
        const eyeIcon = document.querySelector('.toggle-eye');
        const balance = '{{ $driverdata->wallet }}';

        if (isVisible) {
            walletBalance.textContent = '*****';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            walletBalance.textContent = balance;
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }

        isVisible = !isVisible;
    }
</script>

<!-- Modal Structure -->
<div class="modal fade" id="razorpayModal" tabindex="-1" role="dialog" aria-labelledby="razorpayModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="razorpayModalLabel">Add Money to Wallet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="razorpayForm" method="POST" action="{{ route('process.payment') }}">
                    @csrf
                    <label for="amount">Enter Amount:</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount to Add in Wallet" min="100" />
                    <span id="error-message" class="text-danger"></span>

                    <script>
                        document.getElementById('amount').addEventListener('input', function() {
                            var amountInput = this;
                            var errorMessage = document.getElementById('error-message');
                            if (amountInput.value < 100) {
                                errorMessage.textContent = 'Amount must be at least 100 rs.';
                            } else {
                                errorMessage.textContent = '';
                            }
                        });
                    </script>
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" onclick="openRazorpay()" class="btn btn-primary">Proceed to Pay</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    function orderid() {
        return Math.floor(Math.random() * 90000000) + 10000000;
    }

    function openRazorpay() {
        var amount = document.getElementById('amount').value;
        var amountInPaise = amount * 100;

        var options = {
            "key": "rzp_test_NXkmOvfVPrzbBy",
            "amount": amountInPaise,
            "currency": "INR",
            "name": "Safar Mobility",
            "description": "Payment for Taxi Booking",
            "image": "https://safarmobility.in/assets/img/icon_logo.jpg",
            "handler": function(response) {
                if (response.razorpay_payment_id) {
                    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                    var $orderid = orderid();
                    document.getElementById('razorpay_order_id').value = 'safar_' + $orderid;
                    document.getElementById('razorpay_signature').value = 'safar_' + $orderid;
                    document.getElementById('razorpayForm').submit();
                } else {
                    console.error('Razorpay Response is missing required fields');
                    alert('An error occurred during payment. Please try again.');
                }
            },
            "prefill": {
                "name": "{{ $driverdata->fullname }}",
                "email": "{{ $driverdata->email }}",
                "contact": "{{ $driverdata->mobile }}"
            },
            "notes": {
                "address": "Razorpay Corporate Office"
            },
            "theme": {
                "color": "#FFD700",
                "background": "#3F3B3D",
                "text": "#444444"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    }
</script>
<div class="text-dark">
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif

    <!-- Tabs Navigation -->
    <ul class="nav nav-tabs" id="tripTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="running-tab" data-toggle="tab" href="#running" role="tab" aria-controls="running" aria-selected="true">Running Trips</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="upcoming-tab" data-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="false">Upcoming Trips</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed Trips</a>
        </li>
    </ul>   

    <!-- Tab Content -->
    <div class="tab-content" id="tripTabsContent">
        <!-- Running Trips Tab -->
        <div class="tab-pane fade" id="running" role="tabpanel" aria-labelledby="running-tab">
            @foreach($taxi->where('status', 'accepted') as $index => $data)
            <div class="col-12 mb-3 mt-3">
                <div class="card card-box-shadow">
                    <div class="text-end">
                        <span class="badge badge-secondary" style="font-size: 20px; padding: 6px;">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="p-3">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <h5 class="text-dark fs-6 w-100 text-center">
                                    <div class="fw-bold route">
                                        @php
                                        $travelRoot = $data->travel_root;
                                        $parts = explode('to', $travelRoot);
                                        $parts = array_map('trim', $parts);
                                        @endphp

                                        @if (count($parts) === 2)
                                        <p class="start">{{ $parts[0] }}</p>
                                        <p class="to">To</p>
                                        <p class="end">{{ $parts[1] }}</p>
                                        @else
                                        <p>{{ $travelRoot }}</p>
                                        @endif
                                    </div>
                                </h5>
                            </div>
                            <div class="col-12 col-md-3">
                                <p class="text-dark mb-1"><strong>Pickup Date & Time:</strong> {{ $data->pickup_date }} & {{ $data->pickup_time }} </p>
                                <p class="text-dark mb-1"><strong>Pickup Point:</strong> {{ $data->pickup_point }} </p>
                            </div>
                            <div class="col-12 col-md-3">
                                <p class="text-dark mb-1"><strong>Per KM Rate:</strong> ₹&nbsp;{{ $data->per_km_rate }} </p>
                                <p class="text-dark mb-1"><strong>Base Fare:</strong> ₹&nbsp;{{ $data->base_fare }} </p>
                                <p class="text-dark mb-0"><strong>Total KM:</strong> {{ $data->total_km }} KM </p>
                            </div>
                            <div class="col-12 col-md-3">
                                <p class="text-dark mb-1"><strong>Total Fare:</strong> ₹&nbsp;{{ $data->total_fare }} </p>
                                <div class="d-flex">
                                <button class="btn btn-outline-primary rounded" style="margin-right: 10px;" data-toggle="modal" data-target="#detailsModal{{ $data->id }}">Details</button>
                            <div>
                                @if ($data->status == 'Unaccept')
                                <form class="mb-0" action="{{ url('/toggleStatusTaxi')}}/{{$data->id}}" method="POST" id="acceptForm{{ $data->id }}">
                                    @csrf
                                    <input type="hidden" name="status" value="Unaccept">
                                    <button type="button" class="btn btn-outline-info rounded" data-toggle="modal" data-target="#acceptModal{{ $data->id }}">Accept</button>
                                </form>

                                <div class="modal fade" id="acceptModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="acceptModalLabel{{ $data->id }}">Confirm Accept Trip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to accept this trip?</p>
                                                <form action="{{ url('/bookTrip/' . $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="d_mobile" value="{{ $driverdata->mobile }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('acceptForm{{ $data->id }}').submit();">Accept Trip</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @elseif ($data->trip_status == 'Started')
                                <button class="btn btn-outline-danger rounded" data-toggle="modal" data-target="#endTripModal{{ $data->id }}">End Trip</button>
                                <div class="modal fade" id="endTripModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="endTripModalLabel{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="endTripModalLabel{{ $data->id }}">End Trip Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/endTrip/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="trip_end_photo" value="{{ $data->trip_end_photo }}">
                                                    <input type="hidden" name="end_km" value="{{ $data->end_km }}">
                                                    <div class="form-group">
                                                        <label for="trip_end_photo{{ $data->id }}">Trip End Meter Photo</label>
                                                        <input type="file" class="form-control" name="trip_end_photo" id="trip_end_photo{{ $data->id }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="end_km{{ $data->id }}">Trip End Km</label>
                                                        <input type="text" class="form-control" name="end_km" id="end_km{{ $data->id }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($data->trip_status == 'Completed')
                                <button class="btn btn-outline-success rounded">Trip Completed Successfully</button>
                                @elseif ($driverdata->wallet < 100) <button class="btn btn-outline-danger rounded">Insufficient wallet Balance</button>
                                    @else
                                    <button class="btn btn-outline-danger rounded" data-toggle="modal" data-target="#acceptModal{{ $data->id }}">Start Trip</button>
                                    @endif

                            </div>
                            <div class="modal fade" id="acceptModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel{{ $data->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="acceptModalLabel{{ $data->id }}">Start Trip Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/startTrip/' . $data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $data->id }}">
                                                <input type="hidden" name="name" value="{{ $data->name }}">
                                                <input type="hidden" name="mobile" value="{{ $data->mobile }}">
                                                <input type="hidden" name="driver_mobile" value="{{ $driverdata->mobile }}">
                                                <input type="hidden" name="email" value="{{ $data->email }}">
                                                <input type="hidden" name="pickup_point" value="{{ $data->pickup_point }}">
                                                <input type="hidden" name="pickup_date" value="{{ $data->pickup_date }}">
                                                <input type="hidden" name="travel_root" value="{{ $data->travel_root }}">
                                                <input type="hidden" name="inquiry_no" value="{{ $data->inquiry_no }}">
                                                <input type="hidden" name="total_km" value="{{ $data->total_km }}">
                                                <input type="hidden" name="per_km_rate" value="{{ $data->per_km_rate }}">
                                                <input type="hidden" name="base_fare" value="{{ $data->base_fare }}">
                                                <input type="hidden" name="car_type" value="{{ $data->car_type }}">
                                                <input type="hidden" name="available_cabs" value="{{ $data->available_cabs }}">
                                                <input type="hidden" name="pickup_time" value="{{ $data->pickup_time }}">
                                                <input type="hidden" name="total_fare" value="{{ $data->total_fare }}">
                                                <div class="form-group">
                                                    <label for="trip_start_photo">Trip Start Meter Photo</label>
                                                    <input type="file" class="form-control" name="trip_start_photo" id="trip_start_photo" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="start_km">Trip Start Km</label>
                                                    <input type="text" class="form-control" name="start_km" id="start_km" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Start Trip</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function showModal(event) {
                                    event.preventDefault();
                                    $('#acceptModal').modal('show');
                                }
                            </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Upcoming Trips Tab -->
        <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
        @foreach($taxi->where('status', 'Unaccept') as $data)
        @php
        $travelRoot = $data->travel_root;
        $parts = explode('to', $travelRoot);
        $parts = array_map('trim', $parts);
        $startCity = count($parts) >= 1 ? $parts[0] : $travelRoot;
        @endphp
        <div class="col-12 mb-3 mt-3 taxi-card" data-city="{{ $startCity }}">
            <div class="card card-box-shadow">
                <div class="text-end">
                    <span class="badge badge-secondary" style="font-size: 20px; padding: 6px;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-1z col-md-3">
                            <h5 class="text-dark fs-6 w-100 text-center">
                                <div class="fw-bold route">
                                    @php
                                    $travelRoot = $data->travel_root;
                                    $parts = explode('to', $travelRoot);
                                    $parts = array_map('trim', $parts);
                                    @endphp

                                    @if (count($parts) === 2)
                                    <p class="start">{{ $parts[0] }}</p>
                                    <p class="to">To</p>
                                    <p class="end">{{ $parts[1] }}</p>
                                    @else
                                    <p>{{ $travelRoot }}</p>
                                    @endif
                                </div>
                            </h5>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="text-dark mb-1"><strong>Pickup Date & Time:</strong> {{ $data->pickup_date }} & {{ $data->pickup_time }} </p>
                            <p class="text-dark mb-1"><strong>Pickup Point:</strong> {{ $data->pickup_point }} </p>
                        </div>
                        <div class="col-12 col-md-3">
                            <p class="text-dark mb-1"><strong>Per KM Rate:</strong> ₹&nbsp;{{ $data->per_km_rate }} </p>
                            <p class="text-dark mb-1"><strong>Base Fare:</strong> ₹&nbsp;{{ $data->base_fare }} </p>
                            <p class="text-dark mb-0"><strong>Total KM:</strong> {{ $data->total_km }} KM </p>
                        </div>
                        <div class="col-12 col-md-3">
                        <p class="text-dark mb-1"><strong>Total Fare:</strong> ₹&nbsp;{{ $data->total_fare }} </p>
                            <div class="d-flex">
                                <form class="mb-0" action="{{ url('/toggleStatusTaxi')}}/{{$data->id}}" method="POST" id="acceptForm{{ $data->id }}">
                                    @csrf
                                    <input type="hidden" name="status" value="Unaccept">
                                    <button type="button" class="btn btn-outline-info rounded" data-toggle="modal" data-target="#acceptModal{{ $data->id }}">Accept</button>
                                </form>

                                <div class="modal fade" id="acceptModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="acceptModalLabel{{ $data->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="acceptModalLabel{{ $data->id }}">Confirm Accept Trip</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to accept this trip?</p>
                                                <form action="{{ url('/bookTrip/' . $data->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="d_mobile" value="{{ $driverdata->mobile }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary" onclick="document.getElementById('acceptForm{{ $data->id }}').submit();">Accept Trip</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>


        <!-- Completed Trips Tab -->
        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">

        <div class="mb-3">
            <div>
                <div class="p-3">
                    <div class="row">
                        @foreach($tripdata as $data)
                            <div class="col-md-3 mb-4 h-100">
                                <div class="card" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 16px;">
                                <div class="text-end">
                                    <span class="badge badge-secondary" style="font-size: 20px; padding: 6px;">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                    <div class="p-3">
                                        <div class="titleWrapper">
                                            <!-- <p class="packageHead" style="margin-top: 0; margin-bottom: 0; font-weight: 600; font-size: 20px; white-space: normal;"> {{$data->travel_root}} </p> -->
                                            <div class="fw-bold route">
                                                @php
                                                $travelRoot = $data->travel_root;
                                                $parts = explode('to', $travelRoot);
                                                $parts = array_map('trim', $parts);
                                                @endphp

                                                @if (count($parts) === 2)
                                                <p class="start">{{ $parts[0] }}</p>
                                                <p class="to">To</p>
                                                <p class="end">{{ $parts[1] }}</p>
                                                @else
                                                <p>{{ $travelRoot }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <div class="packageBottomSection">
                                                <div class="includeWrapper">
                                                    <div class="includeItemCard">
                                                        <div class="rightSec d-flex">
                                                            <div class="w-50" style="text-align: left;">
                                                                <p style="margin-top: 5px; margin-bottom: 0; font-weight: 600;"><span class="priceStyle">₹{{$data->total_fare}}</span></p>
                                                            </div>
                                                            <div class="w-50" style="text-align: right;">
                                                                <button type="button" class="btn btn-outline-primary rounded" data-toggle="modal" data-target="#tripDetailsModal{{ $data->trip_id }}">
                                                                    View Details
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="tripDetailsModal{{ $data->trip_id }}" tabindex="-1" aria-labelledby="tripDetailsModal{{ $data->trip_id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="tripDetailsModal{{ $data->trip_id }}">Trip Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table text-dark">
                                                                <tr>
                                                                    <th><i class='bx bxs-user icon' style="font-size: 15px; color: black;"></i>&nbsp;Name:</th>
                                                                    <td>{{ $data->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-phone icon' style="font-size: 15px; color: black;"></i>&nbsp;Mobile:</th>
                                                                    <td>{{ $data->mobile }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-envelope icon' style="font-size: 15px; color: black;"></i>&nbsp;Email:</th>
                                                                    <td>{{ $data->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-map icon' style="font-size: 15px; color: black;"></i>&nbsp;Pickup Point:</th>
                                                                    <td>{{ $data->pickup_point }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-time-five icon' style="font-size: 15px; color: black;"></i>&nbsp;Pickup Time:</th>
                                                                    <td>{{ $data->pickup_time }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-time-five icon' style="font-size: 15px; color: black;"></i>&nbsp;Pickup Date:</th>
                                                                    <td>{{ $data->pickup_date }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-news icon' style="font-size: 15px; color: black;"></i>&nbsp;Inquiry No.:</th>
                                                                    <td>{{ $data->inquiry_no }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-map-alt icon' style="font-size: 15px; color: black;"></i>&nbsp;Total KM:</th>
                                                                    <td>{{ $data->total_km }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Car Type:</th>
                                                                    <td>{{ $data->car_type }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Pickup Cab:</th>
                                                                    <td>{{ $data->available_cabs }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-rupee' style="font-size: 15px; color: black;"></i>&nbsp;Per KM Rate:</th>
                                                                    <td>₹{{ $data->per_km_rate }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bx-rupee' style="font-size: 15px; color: black;"></i>&nbsp;Base Fare:</th>
                                                                    <td>₹{{ $data->base_fare }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Trip Start KM:</th>
                                                                    <td>{{ $data->start_km }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Trip End KM:</th>
                                                                    <td>{{ $data->end_km }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Total Km Driven:</th>
                                                                    <td>{{ $data->end_km - $data->start_km }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px; color: black;"></i>&nbsp;Total Fare by Total Km Driven:</th>
                                                                    <td>₹{{ ($data->end_km - $data->start_km) * $data->per_km_rate + $data->base_fare }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
@endsection