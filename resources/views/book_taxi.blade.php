<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



</head>
<style>
    /* .alert.alert-danger {
        background-color: transparent;
        padding: 0;
        color: red;
        border: none;
        margin-top: 0px;
        margin-bottom: 0px;
    } */

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

    .sticky-bottom {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: white;
        border-top: 1px solid #ccc;
        display: none;
    }

    @media (max-width: 991.98px) {

        .sticky-bottom {
            display: block;
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
    .err-1{
        width: 80%;
        display: flex;
    }
    .err-2{
        width: 20%;
        text-align: right;
    }
    .main{
        display: flex;
    }
    @media only screen and (max-width: 768px) {
        .main{
            display: block;
        }
        .err-1{
            width: 100%;
        }
        .err-2{
            width: 100%;
            text-align: center;
        }
    }
</style>

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
<?php
$mobile = Session::get('mobile');
$userdata = DB::table('profile')->where('mobile', $mobile)->first();
?>
<section>
    <div class="container mb-3 mt-5">
        @if($userdata->wallet < 100) <div class="alert alert-danger main" style="align-items: baseline;">
            <div class="err-1">
                Insufficient wallet balance to book a taxi.Your Account Balance is :
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
        Sufficient wallet balance to book a taxi.Your Account Balance is :
        <div class="wallet-balance">
            <span class="balance-value" id="wallet-balance">****</span>
            <i class="fas fa-eye-slash toggle-eye" onclick="toggleWalletBalance()"></i>
        </div>
    </div>
    @endif

    <script>
        let isVisible = false; 

        function toggleWalletBalance() {
            const walletBalance = document.getElementById('wallet-balance');
            const eyeIcon = document.querySelector('.toggle-eye');
            const balance = '{{ $userdata->wallet }}';

            if (isVisible) {
                walletBalance.textContent = '****';
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
                    <form id="razorpayForm" method="POST" action="{{ route('processuser.paymentuser') }}">
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
                    "name": "{{ $userdata->fullname }}",
                    "email": "{{ $userdata->email }}",
                    "contact": "{{ $userdata->mobile }}"
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
    <div class="row">
        <div class="col-lg-8">
            <div class="card p-3">
                <h5 class="fw-bold">Booking Detail</h5>
                <div class="card-body px-3 pt-0 pb-2">

                </div>
                <form action="/taxi-booking/{{ $id }}" method="post">
                    @csrf
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <input type="text" name="name" class="form-control rounded" id="floatingInputName" value="{{ $userdata->fullname }}" placeholder="Enter Your Name">
                            @error('name')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <input type="text" name="number" class="form-control rounded bg-white" readonly id="floatingInputNumber" value="{{ $userdata->mobile }}" placeholder="Enter Your Mobile Number">
                            @error('number')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <input type="email" name="email" class="form-control rounded" id="floatingInputEmail" value="{{ $userdata->email }}" placeholder="Enter Your Email address">
                            @error('email')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
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

                    <div class="mb-3">
                        <div class="d-flex w-100 mb-3">
                            <div class="w-75">
                                <h6 class="mt-0 mb-0 fw-bold text-decoration-underline">Available Cars</h6>
                            </div>
                            @if(count($cars) > 3)
                            <div class="text-end w-25">
                                <p id="toggle-button" class="text-dark fw-bold" style="cursor: pointer; text-decoration: underline;">Show More</p>
                            </div>
                            @endif
                        </div>
                        <div class="card-text row" id="car-list">
                            @php $count = 0; @endphp
                            @foreach($cars as $car)
                            @if($car->type_id == $id)
                            <div class="col-md-4 mb-2 car-item" style="{{ $count >= 3 ? 'display:none;' : '' }}">
                                <div class="form-check">
                                    <input class="form-check-input car-checkbox" type="checkbox" id="car{{$car->id}}" data-car-id="{{$car->id}}" name="car_name[]" value="{{$car->cars}}">
                                    <label class="form-check-label" for="car{{$car->id}}">
                                        <h6 class="fw-bold mb-0">{{$car->cars}}</h6>
                                        Per KM Rate: <span class="per-km-rate" id="per-km-rate-{{$car->id}}">₹{{ $car->km }}</span><br>
                                        Base Fare: <span class="base-fare" id="base-fare-{{$car->id}}">₹{{ $car->base_fare }}</span>
                                    </label>
                                </div>
                            </div>
                            @php $count++; @endphp
                            @endif
                            @endforeach
                            @error('car_name')
                            <div class="alert alert-danger" style="margin-left: 15px;">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const toggleButton = document.getElementById('toggle-button');
                            const carItems = document.querySelectorAll('.car-item');
                            let isShowingMore = false;

                            toggleButton.addEventListener('click', function() {
                                isShowingMore = !isShowingMore;
                                carItems.forEach((item, index) => {
                                    if (index >= 3) {
                                        item.style.display = isShowingMore ? 'block' : 'none';
                                    }
                                });
                                toggleButton.textContent = isShowingMore ? 'Show Less' : 'Show More';
                            });
                        });
                    </script>

                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <input type="text" name="pick_time" class="form-control rounded bg-white" id="flatpickrPickTime" placeholder="Select time">
                            @error('pick_time')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Calculate the minimum selectable time (3 hours from now)
                                var minTime = new Date();
                                minTime.setHours(minTime.getHours() + 3);

                                // Set the default time (3 hours from now)
                                var defaultTime = new Date();
                                defaultTime.setHours(defaultTime.getHours() + 3);

                                flatpickr("#flatpickrPickTime", {
                                    enableTime: true,
                                    noCalendar: true,
                                    dateFormat: "h:i K", // Display both AM/PM format
                                    time_24hr: false, // Use 12-hour format
                                    minTime: minTime, // Minimum time user can select
                                    defaultDate: defaultTime // Default time to select
                                });
                            });
                        </script>


                        <div class="input-group col-md-6 mb-3" id="advance">
                            <span class="input-group-text bg-white">Pay</span>
                            <input type="text" class="form-control rounded bg-white" id="pay" name="amt" value="" readonly aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text bg-white" id="amt_display">₹</span>
                            @error('amt')
                            <div class="alert alert-danger">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <!-- Hidden Inputs -->
                    <?php
                    function generateInquiryNumber()
                    {
                        return mt_rand(10000000, 99999999);
                    }

                    $inquiryNumber = generateInquiryNumber();
                    ?>
                    <input type="hidden" name="route" id="hiddenRoute" value="">
                    @error('route')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="inqid" value="<?php echo $inquiryNumber; ?>">
                    @error('inqid')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="totalkm" id="totalkm" value="">
                    @error('totalkm')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="per_km_rate" id="hiddenPerKmRate" value="">
                    @error('per_km_rate')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="base_fare" id="hiddenBaseFare" value="">
                    @error('base_fare')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="car_type" value="{{ $getData->type }}">
                    @error('car_type')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <input type="hidden" name="pick_date" id="selectedDate" value="">
                    @error('pick_date')
                    <div class="alert alert-danger">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card p-3">
                <h5>Booking Summary</h5>
                <table>
                    <tr>
                        <td><b class="text-dark">Travel Route : </b></td>
                        <td>
                            <details id="routeDetails">
                                <summary>Route</summary>
                                <span id="pickup"></span> To <span id="drop"></span>
                            </details>
                        </td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Inquiry NO. - </b> </td>
                        <td><?php echo $inquiryNumber ?></td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Total Journey Kilometers : </b></td>
                        <td><span id="distance"></span>&nbsp;Km</td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Per KM Rate : </b></td>
                        <td>₹<span id="selectedPerKmRate">0</span></td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Base Fare : </b></td>
                        <td>₹<span id="selectedBaseFare">0</span></td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Total Amt : </b></td>
                        <td>₹<span id="totalAmt">0</span></td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">Toll Tax : </b></td>
                        <td>Excluded</td>
                    </tr>
                    <tr>
                        <td><b class="text-dark">GST : </b></td>
                        <td>Excluded</td>
                    </tr>
                    @if($getData)
                    <tr>
                        <td><b class="text-dark">Car Type:</b></td>
                        <td>{{ $getData->type }}</td>
                    </tr>
                    @else
                    <tr>
                        <td colspan="2">
                            <p>No data found.</p>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td><b class="text-dark">Pick DATE : </b></td>
                        <td id="displayedDate"></td>
                    </tr>
                    <script>
                        function updateDisplayedDate(dateStr) {
                            document.getElementById('displayedDate').innerText = dateStr;
                            document.getElementById('selectedDate').value = dateStr;
                        }

                        // Retrieve and display the stored date on page load
                        document.addEventListener('DOMContentLoaded', function() {
                            var storedDate = sessionStorage.getItem('selectedDate');
                            if (storedDate) {
                                updateDisplayedDate(storedDate);
                            }
                        });
                    </script>
                </table>
                <br>
                <h6><b class="text-dark">TOTAL Fare : </b> ₹<span id="totalFare">0</span></h6>
            </div>
            <br>
            <div class="card mt-3 p-3">
                <h3>Note</h3>
                <h5>You can either make advance payment or full payment</h5>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.car-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    const carId = this.getAttribute('data-car-id');
                    const perKmRate = parseFloat(document.getElementById('per-km-rate-' + carId).textContent.replace('₹', ''));
                    const baseFare = parseFloat(document.getElementById('base-fare-' + carId).textContent.replace('₹', ''));
                    let distance = parseFloat(document.getElementById('distance').textContent.replace(',', ''));

                    const pickupLocation = document.getElementById('pickup').textContent;
                    const dropLocation = document.getElementById('drop').textContent;

                    if (this.checked) {
                        const totalAmt = distance * perKmRate + baseFare;
                        document.getElementById('selectedPerKmRate').textContent = perKmRate.toFixed(2);
                        document.getElementById('selectedBaseFare').textContent = baseFare.toFixed(2);
                        document.getElementById('totalAmt').textContent = totalAmt.toFixed(2);
                        document.getElementById('totalFare').textContent = totalAmt.toFixed(2);

                        document.getElementById('hiddenRoute').value = pickupLocation + ' to ' + dropLocation;
                        document.getElementById('hiddenPerKmRate').value = perKmRate.toFixed(2);
                        document.getElementById('hiddenBaseFare').value = baseFare.toFixed(2);
                        document.getElementById('totalkm').value = distance.toFixed(2);

                        checkboxes.forEach(otherCheckbox => {
                            if (otherCheckbox !== this) {
                                otherCheckbox.checked = false;
                            }
                        });

                        document.getElementById('pay').value = totalAmt.toFixed(2);
                        updateStickyValues(perKmRate, baseFare, totalAmt);
                    } else {
                        clearValues();
                    }
                });
            });

            function updateStickyValues(perKmRate, baseFare, totalAmt) {
                document.getElementById('selectedPerKmRateSticky').textContent = perKmRate.toFixed(2);
                document.getElementById('selectedBaseFareSticky').textContent = baseFare.toFixed(2);
                document.getElementById('totalAmtSticky').textContent = totalAmt.toFixed(2);
            }

            function clearValues() {
                document.getElementById('selectedPerKmRate').textContent = '0';
                document.getElementById('selectedBaseFare').textContent = '0';
                document.getElementById('totalAmt').textContent = '0';
                document.getElementById('totalFare').textContent = '0';

                document.getElementById('hiddenRoute').value = '';
                document.getElementById('hiddenPerKmRate').value = '';
                document.getElementById('hiddenBaseFare').value = '';
                document.getElementById('totalkm').value = '';

                document.getElementById('pay').value = '0';
                updateStickyValues(0, 0, 0);
            }

            var pickupLocation = sessionStorage.getItem('pickupLocation');
            var dropLocation = sessionStorage.getItem('dropLocation');
            var distanceString = sessionStorage.getItem('distance');
            var duration = sessionStorage.getItem('duration');

            if (pickupLocation && dropLocation && distanceString && duration) {
                document.getElementById("pickup").textContent = pickupLocation;
                document.getElementById("drop").textContent = dropLocation;
                var distance = parseFloat(distanceString.replace(',', ''));

                const perKmRate = parseFloat(document.getElementById('selectedPerKmRate').textContent);
                const baseFare = parseFloat(document.getElementById('selectedBaseFare').textContent);

                const totalAmt = distance * perKmRate + baseFare;
                document.getElementById('totalAmt').textContent = totalAmt.toFixed(2);
                document.getElementById('totalFare').textContent = totalAmt.toFixed(2);

                document.getElementById('pay').value = totalAmt.toFixed(2);
                updateStickyValues(perKmRate, baseFare, totalAmt);

                document.getElementById('distance').textContent = distance;
            } else {
                document.getElementById("routeDetails").textContent = "No route data stored in session.";
            }
        });

        // Function to check wallet balance
        function checkWalletBalance() {
            const walletBalance = parseFloat('{{ $userdata->wallet }}');
            const minimumRequiredAmount = parseFloat(document.getElementById('pay').value);

            return true; 
        }

        document.querySelectorAll('input[type="text"], input[type="email"]').forEach(input => {
            input.addEventListener('click', function() {
                checkWalletBalance();
            });
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            if (!checkWalletBalance()) {
                event.preventDefault(); // Prevent form submission if balance is insufficient
            }
        });
    </script>


    </div>
    <!-- Sticky section at the bottom -->
    <div class="sticky-bottom" style="z-index: 1000;">
        <div class="container">
            <div class="row">
                <div>
                    <p class="mb-0">Per KM Rate: ₹<span id="selectedPerKmRateSticky">0</span></p>
                    <p class="mb-0">Base Fare: ₹<span id="selectedBaseFareSticky">0</span></p>
                    <p class="mb-0">Total Amt: ₹<span id="totalAmtSticky">0.00</span></p>
                </div>
            </div>
        </div>
    </div>


</section>
<br>
<br>
@if(session('err'))
<script>
    alert("{{ session('err') }}");
</script>
@endif
@endsection