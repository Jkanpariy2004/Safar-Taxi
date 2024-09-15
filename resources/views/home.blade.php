<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"
        integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>
<style>
    .route_btn {
        border-radius: 25px;
    }

    .store_div {
        margin: auto !important;

    }

    @media only screen and (max-width: 575px) {
        .store_div {
            margin-left: 25% !important;
        }
    }


    .container-map {
        width: 100%;
        height: 30rem;
        margin: 1rem auto;
    }

    .show-cab-btn {
        background: #3F3B3D;
        color: white;
        font-weight: 600;
        text-align: center;
        width: 100%;
        margin-top: 10px;
        border: none;
        padding: 10px;
    }

    .card .card-img-top {
        width: auto;
        height: 250px;
    }

    .btn-outline-danger {
        color: #dc3545;
        border-color: #dc3545;
    }

    .titleWrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-family: 'Quicksand', sans-serif;
    }

    .packageHead {
        font-weight: 600;
        font-size: 18px;
        line-height: 28px;
        color: #000;
        /* text-overflow: ellipsis; */
        white-space: nowrap;
        /* font-family: 'Quicksand', sans-serif; */
        /* overflow: hidden; */
        flex: 1;
        padding-right: 10px;
    }

    .titleWrapper span.selected {
        border: 1px solid #3F3B3D;
        border-radius: 4px;
        padding: 2px 4px;
        color: #3F3B3D;
        font-size: 13px;
        font-weight: 700;
    }

    .titleWrapper span.selected:hover {
        background-color: #3F3B3D;
        color: white;
        cursor: pointer;
    }

    .itineraryList {
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px solid #d8d8d8;
        margin-bottom: 12px;
        /* padding-bottom: 12px;
    margin-left: 6px; */
        cursor: pointer;
    }

    .itineraryList span {
        width: 80%;
    }

    .itineraryList div {
        width: 20%;
        text-align: center;
        font-size: 25px;
    }

    .tripListWrapper {
        display: flex;
        flex-wrap: wrap;
        margin-bottom: 12px;
        margin-left: -45px;
        color: black;
    }

    .tripListWrapper li {
        width: 100%;
        display: flex;
        margin-bottom: 3px;
        position: relative;
        padding-left: 15px;
    }

    .packageBottomSection {
        margin-top: 24px;
        color: black;
    }

    .includeWrapper {
        background: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        padding: 12px 16px;
        display: flex;
        flex-direction: column;
    }

    .includeWrapper {
        background: #f9f9f9;
        border: 1px solid #e5e5e5;
        border-radius: 8px;
        padding: 12px 16px;
        display: flex;
        flex-direction: column;
    }

    .includeItemCard {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .includeItemCard .leftSec {
        flex: 1;
    }

    .includeItemCard .rightSec {
        flex: 1;
        text-align: center;
        color: #757575;
    }

    .priceStyle {
        color: black;
        font-weight: 600;
        font-size: 20px;
    }

    .card {
        position: relative;
        overflow: hidden;
        font-family: 'Quicksand', sans-serif;
        width: 100%;
        height: 100%;
    }

    .card .img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card:hover .img {
        transform: scale(1.1);
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

    .e-btn:hover {
        color: #ffffff;
        -webkit-box-shadow: 0px 10px 24px 0px rgba(4, 23, 118, 0.3);
        -moz-box-shadow: 0px 10px 24px 0px rgba(4, 23, 118, 0.3);
        box-shadow: 0px 10px 24px 0px rgba(4, 23, 118, 0.3);
    }

    .package-header {
        font-size: 14px;
        font-family: Helvetica;
        font-weight: 500;
        color: rgba(0, 0, 0, 0.58)
    }

    .tripListWrapper .icon {
        width: 6%;
        margin-top: 3px;
    }

    .tripListWrapper .name {
        width: 17%;
        margin-top: 3px;
    }

    .tripListWrapper .dot {
        width: 3%;
    }

    .tripListWrapper .tripname {
        width: 30%;
        margin-top: 2px;
    }

    @media only screen and (max-width: 600px) {
        .tripListWrapper .icon {
            width: 10%;
        }

        .tripListWrapper .name {
            width: 20%;
        }

        .tripListWrapper .dot {
            width: 5%;
        }

        .tripListWrapper .tripname {
            width: 50%;
            margin-top: 2px;
        }
    }

    @media only screen and (max-width: 768px) {
        .thumbnail-image {
            max-width: 100%;
            height: auto;
        }
    }

    @media only screen and (min-width: 768px) {
        .tripListWrapper .icon {
            width: 10%;
        }

        .tripListWrapper .name {
            width: 20%;
        }

        .tripListWrapper .dot {
            width: 5%;
        }

        .tripListWrapper .tripname {
            width: 30%;
            margin-top: 2px;
        }
    }

    @media only screen and (min-width: 992px) {
        .tripListWrapper .icon {
            width: 10%;
        }

        .tripListWrapper .name {
            width: 20%;
        }

        .tripListWrapper .dot {
            width: 5%;
        }

        .tripListWrapper .tripname {
            width: 50%;
            margin-top: 2px;
        }
    }

    @media only screen and (min-width: 1200px) {
        .tripListWrapper .icon {
            width: 8%;
            margin-top: 3px;
        }

        .tripListWrapper .name {
            width: 17%;
            margin-top: 3px;
        }

        .tripListWrapper .dot {
            width: 3%;
        }

        .tripListWrapper .tripname {
            width: 30%;
            margin-top: 2px;
        }
    }

    .pack-head {
        font-family: 'Avenir', sans-serif;
        font-size: 30px;
        font-weight: 600;
        font-size: 20px;
        margin-bottom: 0px;
    }

    .flatpickr-wrapper {
        position: relative;
        display: inline-block;
        width: 100%;
    }

    .wishlist-btn {
        border: none;
        background: none;
        font-size: 25px;
    }

    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }

    .cardfooter {
        padding: 10px 0px 10px 0px;
        background-color: rgba(0, 0, 0, 0.03);
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .image-slider {
        display: flex;
        white-space: nowrap;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .thumbnail-image {
        display: inline-block;
    }
</style>
@extends('main')
@section('main-content')
@if (session('success'))
    <div>
        {{ session('success ') }}
    </div>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="container-fluid bg-white pt-3 px-lg-5 mt-5" id="one_way">
    <form id="oneway-form" action="inquiry_submit" method="post" onsubmit="calcRoute(event)">
        @csrf
        <div class="row mx-n2">
            <div class="col-xl-3 col-lg-6 col-md-6 px-2">
                <div class="mb-3">
                    <input type="text" class="form-control @error('start_point') is-invalid @enderror rounded"
                        name="start_point" id="location-1" placeholder="Enter Your Pickup Location">
                </div>
                @error('start_point')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 px-2">
                <div class="mb-3">
                    <input type="text" class="form-control @error('end_point') is-invalid @enderror rounded"
                        name="end_point" id="location-2" placeholder="Enter Your Drop Location">
                </div>
                @error('end_point')
                    <strong>{{ $message }}</strong>
                @enderror
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 px-2">
                <div class="time mb-3" id="time" data-target-input="nearest">
                    <div class="date-wrapper mb-3">
                        <input type="text" class="form-control rounded bg-white @error('date') is-invalid @enderror"
                            name="date" id="date" placeholder="Please Select Date">
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        var today = new Date();

                        flatpickr("#date", {
                            dateFormat: "d-m-Y",
                            // defaultDate: today,
                            minDate: today,
                            animate: true,
                            static: true,
                            disableMobile: true,
                            onChange: function (selectedDates, dateStr, instance) {
                                sessionStorage.setItem('selectedDate', dateStr);
                            }
                        });
                    </script>
                    @error('date')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>

            <script>
                function formatDate(dateString) {
                    var parts = dateString.split('-');
                    var day = parts[0];
                    var month = parts[1];
                    var year = parts[2];

                    return day + '-' + month + '-' + year;
                }
            </script>


            <div class="col-xl-3 col-lg-6 col-md-6 px-2 d-flex">
                <button type="submit" class="btn btn-outline-primary fw-bold btn-block mb-3 rounded"
                    style="margin-right: 10px;">Check Fare</button>
                <!-- box-shadow: 0 0 0 .25rem rgb(2 2 3 / 32%); -->
                <button type="button" class="btn btn-outline-primary fw-bold btn-block mb-3 mt-0 rounded"
                    style="background-color: #3F3B3D; color: white;" onclick="clearRoute()">Clear</button>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap Modal for Map and Details -->
<div class="modal fade" id="mapDetailsModal" tabindex="-1" aria-labelledby="mapDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapDetailsModalLabel">Route Details</h5>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="modal-body">
                <div class="container-map text-center" id="google-map"></div>
                <div id="output" class="result-table text-center"></div>
                <button class="show-cab-btn" onclick="toggleCabCards()">Show Available Cab</button>
                <div class="row row-cols-1 row-cols-md-3 g-4 d-none mt-5" id="cab-cards">
                    <div class="col">
                        <div class="card h-100"
                            style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                            <img src="https://www.onewaycab.org/assets/images/cab/car/5.png" class="card-img-top"
                                alt="...">
                            <div class="card-body text-dark">
                                @if($types->isNotEmpty())
                                    <h5 class="card-title">{{$types->first()->type}}</h5>
                                @endif

                                <details>
                                    <summary>Show Now</summary>
                                    <p class="card-text">
                                        Available Cabs:<br>
                                        @foreach($cars as $car)
                                                @if($car->type_id == 1)
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="car{{$car->id}}">
                                                            {{$car->cars}}<br>
                                                        </label>
                                                    </div>
                                                @endif
                                        @endforeach
                                    </p>
                                </details>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> 4 seater</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> 1 luggage</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> AC</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> Automatic</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-center">
                                    @if ($GetData->count() >= 1)
                                        <a href="{{ url('/taxi-booking') . '/' . $GetData[0]->id }}" class="btn e-btn"
                                            style="background-color: #3F3B3D; color: white;">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100"
                            style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                            <img src="https://www.onewaycab.org/assets/images/cab/car/6.png" class="card-img-top"
                                alt="...">
                            <div class="card-body text-dark">
                                @if($types->count() > 1)
                                    <h5 class="card-title">{{$types[1]->type}}</h5>
                                @endif

                                <details>
                                    <summary>Show Now</summary>
                                    <p class="card-text">
                                        Available Cabs:<br>
                                        @foreach($cars as $car)
                                                @if($car->type_id == 2)
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="car{{$car->id}}">
                                                            {{$car->cars}}<br>
                                                        </label>
                                                    </div>
                                                @endif
                                        @endforeach
                                    </p>
                                </details>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> 4 seater</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> 1 luggage</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> AC</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> Automatic</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-center">
                                    @if ($GetData->count() >= 2)
                                        <a href="{{ url('/taxi-booking') . '/' . $GetData[1]->id }}" class="btn e-btn"
                                            style="background-color: #3F3B3D; color: white;">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100"
                            style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;">
                            <img src="https://www.onewaycab.org/assets/images/cab/car/7.png" class="card-img-top"
                                alt="...">
                            <div class="card-body text-dark text-dark">
                                @if($types->count() > 2)
                                    <h5 class="card-title">{{$types[2]->type}}</h5>
                                @endif


                                <details>
                                    <summary>Show Now</summary>
                                    <p class="card-text">
                                        Available Cabs:<br>
                                        @foreach($cars as $car)
                                                @if($car->type_id == 3)
                                                    <div class="form-check">
                                                        <label class="form-check-label" for="car{{$car->id}}">
                                                            {{$car->cars}}<br>
                                                        </label>
                                                    </div>
                                                @endif
                                        @endforeach
                                    </p>
                                </details>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> 6 seater</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> 1 luggage</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-unstyled">
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    class="mb-2" alt=""> AC</li>
                                            <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"
                                                    alt=""> Automatic</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="text-center">
                                    @if ($GetData->count() >= 3)
                                        <a href="{{ url('/taxi-booking') . '/' . $GetData[2]->id }}" class="btn e-btn"
                                            style="background-color: #3F3B3D; color: white;">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjt0uY-WSmCiZihYuHLeOQRjA0Pfze0yo&libraries=places"></script>
<script>
    var myLatLng = {
        lat: 20.5937,
        lng: 78.9629
    };
    var mapOptions = {
        center: myLatLng,
        zoom: 5,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    var map;
    var directionsService;
    var directionsDisplay;

    function initMap() {
        map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
        directionsService = new google.maps.DirectionsService();
        directionsDisplay = new google.maps.DirectionsRenderer();
        directionsDisplay.setMap(map);

        var options = {
            types: ['(regions)'],
            componentRestrictions: {
                country: 'in'
            }
        };

        var input1 = document.getElementById("location-1");
        var autocomplete1 = new google.maps.places.Autocomplete(input1, options);
        var input2 = document.getElementById("location-2");
        var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
    }

    function calcRoute(event) {
        event.preventDefault();
        var request = {
            origin: document.getElementById("location-1").value,
            destination: document.getElementById("location-2").value,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC
        };

        directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                var distance = result.routes[0].legs[0].distance.text;
                var duration = result.routes[0].legs[0].duration.text;
                var startLocation = result.routes[0].legs[0].start_address;
                var endLocation = result.routes[0].legs[0].end_address;

                sessionStorage.setItem('distance', distance);
                sessionStorage.setItem('duration', duration);
                sessionStorage.setItem('pickupLocation', startLocation);
                sessionStorage.setItem('dropLocation', endLocation);

                document.getElementById("output").innerHTML =
                    "<div class='result-table'> Driving distance: " + distance +
                    ".<br />Duration: " + duration +
                    ".<br />Pickup Location: " + startLocation +
                    ".<br />Drop Location: " + endLocation + ".</div>";

                directionsDisplay.setDirections(result);
                document.getElementById("google-map").style.display = "block";
                $('#mapDetailsModal').modal('show');
            } else {
                directionsDisplay.setDirections({
                    routes: []
                });
                map.setCenter(myLatLng);
                alert("Can't find Route! Please Select Pickup and Drop Location!");
                clearRoute();
            }
        });
    }


    function clearRoute() {
        document.getElementById("google-map").style.display = "none";
        document.getElementById("location-1").value = "";
        document.getElementById("location-2").value = "";
        document.getElementById("date").value = "";
        directionsDisplay.setDirections({
            routes: []
        });
    }

    function toggleCabCards() {
        var cabCards = document.getElementById("cab-cards");
        cabCards.classList.toggle("d-none");
    }

    function displaySessionData() {
        var pickupLocation = sessionStorage.getItem('pickupLocation');
        var dropLocation = sessionStorage.getItem('dropLocation');
        var distance = sessionStorage.getItem('distance');
        var duration = sessionStorage.getItem('duration');

        console.log("Distance is valid:", distance);

        if (pickupLocation && dropLocation && distance && duration) {
            console.log("Pickup Location: " + pickupLocation);
            console.log("Drop Location: " + dropLocation);
            console.log("Distance: " + distance);
            console.log("Duration: " + duration);
        } else {
            console.log("No route data stored in session.");
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        initMap();
        displaySessionData();
    });
</script>

<div class="px-lg-5">
    <div class="alert alert-success">
        
        @php
            $today = date('d-m-Y');
            $upcomingTrip = DB::table('taxi_book')
                ->where('pickup_date', date('d-m-Y'))
                ->where('status', '!=', 'accept')
                ->first();
            $no=1;
        @endphp

        @if($upcomingTrip)
            Upcoming Trip for Today: {{ $upcomingTrip->travel_root }}
        @else
            No Upcoming Trips for Today
        @endif
    </div>
</div>

<div class="bg-white pt-2 px-lg-5">

    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active text-dark" id="blank-tab" data-toggle="tab" href="#blank" role="tab"
                aria-controls="blank" aria-selected="false">Most Visited Place</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark" id="package-tab" data-toggle="tab" href="#package" role="tab"
                aria-controls="package" aria-selected="true">Tour Package</a>
        </li>
        <div class="pack-head" style="width: 77%; text-align: right;">
            <h1 class="pack-head">Most Visited Place</h1>
        </div>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="blank" role="tabpanel" aria-labelledby="blank-tab">
            <div class="col-md-12 mb-4">
                <input type="text" id="searchInput1" class="form-control" placeholder="Search Place...">
            </div>
            <script>
                document.getElementById('searchInput1').addEventListener('keyup', function () {
                    var query = this.value.toLowerCase();
                    var packages = document.querySelectorAll('.col-lg-3.col-md-6.mb-4.h-100'); // Note the change to class selector

                    packages.forEach(function (packageElement) {
                        var startStop = packageElement.querySelector('#place').textContent.toLowerCase();

                        if (startStop.includes(query)) {
                            packageElement.style.display = '';
                        } else {
                            packageElement.style.display = 'none';
                        }
                    });
                });
            </script>

            <div class="container-fluid">
                @foreach($VisitedPlace as $data)
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <div class="card"
                                            style="-webkit-box-shadow: 0 8px 6px -6px black; -moz-box-shadow: 0 8px 6px -6px black; box-shadow: 0 8px 6px -6px black; border: none;">
                                            <div class="card-horizontal d-flex flex-column flex-md-row">
                                                <div class="img-square-wrapper">
                                                    @php
                                                        $imageNames = json_decode($data->p_photo, true);
                                                        $firstImage = isset($imageNames[0]) ? $imageNames[0] : null;
                                                    @endphp
                                                    @if($firstImage && isset($firstImage['stored_name']) && isset($firstImage['original_name']))
                                                        <img src="{{ asset('uploads/place/' . $firstImage['stored_name']) }}"
                                                            alt="{{ $firstImage['original_name'] }}" class="image main-image img-fluid"
                                                            style="max-width: 45rem; height: 30rem;">
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="card-title">{{$data->p_title}}</h4>
                                                    <div class="image-slider d-md-none flex-nowrap overflow-auto">
                                                        @foreach($imageNames as $image)
                                                            <img src="{{ asset('uploads/place/' . $image['stored_name']) }}"
                                                                alt="{{ $image['original_name'] }}" class="thumbnail-image img-fluid"
                                                                style="width: 100px; height: 80px; cursor: pointer; margin-right: 5px;">
                                                        @endforeach
                                                    </div>
                                                    <p class="card-text">{{$data->p_description}}</p>
                                                </div>
                                            </div>
                                            <div class="cardfooter">
                                                <div class="image-slider d-none d-md-flex flex-wrap">
                                                    <!-- Show only on medium screens and larger -->
                                                    @foreach($imageNames as $image)
                                                        <img src="{{ asset('uploads/place/' . $image['stored_name']) }}"
                                                            alt="{{ $image['original_name'] }}" class="thumbnail-image img-fluid"
                                                            style="width: 100px; height: 80px; cursor: pointer; margin-right: 5px; margin-bottom: 5px;">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                @endforeach
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    document.querySelectorAll(".thumbnail-image").forEach(thumbnail => {
                        thumbnail.addEventListener("click", function () {
                            const mainImage = this.closest('.card').querySelector('.main-image');
                            mainImage.src = this.src;
                            mainImage.alt = this.alt;
                        });
                    });
                });
            </script>


        </div>
        <div class="tab-pane fade" id="package" role="tabpanel" aria-labelledby="package-tab">
            <div class="col-md-12 mb-4">
                <input type="text" id="searchInput" class="form-control" rounded placeholder="Search packages...">
            </div>
            <script>
                document.getElementById('searchInput').addEventListener('keyup', function () {
                    var query = this.value.toLowerCase();
                    var packages = document.querySelectorAll('.col-lg-4.mb-4.h-100');

                    packages.forEach(function (packageElement) {
                        var startStop = packageElement.querySelector('#start_stop').textContent.toLowerCase();

                        if (startStop.includes(query)) {
                            packageElement.style.display = '';
                        } else {
                            packageElement.style.display = 'none';
                        }
                    });
                });
            </script>

            <div class="row">
                @foreach($GetPackageData as $data)
                            <div class="col-lg-4 mb-4 h-100">
                                <div class="card"
                                    style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 16px;">
                                    <img src="{{ asset('uploads/Packages/' . $data->package_photo) }}"
                                        style="border-top-left-radius: 16px; border-top-right-radius: 16px;" class="img"
                                        alt="Package Photo">
                                    <div class="card-body">
                                        <div class="titleWrapper">
                                            <div class="d-flex">
                                                <p class="packageHead" id="start_stop" style="margin-top: 0; margin-bottom: 0;">
                                                    {{ $data->root_start_stop }}
                                                </p>
                                                <p class="packageHead" style="margin-top: 0; margin-bottom: 0;"> To </p>
                                                <p class="packageHead" style="margin-top: 0; margin-bottom: 0;">
                                                    {{ $data->root_end_stop }}
                                                </p>
                                            </div>
                                            <div>
                                                <span class="selected"> {{$data->time}} </span>
                                            </div>
                                        </div>
                                        @if($data->time_explain != null)
                                                                <div class="itineraryList">
                                                                    <span> {{$data->time_explain}} </span>
                                                                    <?php
                                            $mobile = Session::get('mobile');
                                            $userdata = DB::table('profile')->where('mobile', $mobile)->first();
                                                                                                                                            ?>
                                                                    <div style="text-align: right;">
                                                                        <form action="{{ route('wishlist.store') }}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="package_photo" value="{{ $data->package_photo }}">
                                                                            <input type="hidden" name="root_start_stop"
                                                                                value="{{ $data->root_start_stop }}">
                                                                            <input type="hidden" name="root_end_stop" value="{{ $data->root_end_stop }}">
                                                                            <input type="hidden" name="time" value="{{ $data->time }}">
                                                                            <input type="hidden" name="time_explain" value="{{ $data->time_explain }}">
                                                                            <input type="hidden" name="trip_flight" value="{{ $data->trip_flight }}">
                                                                            <input type="hidden" name="meals" value="{{ $data->meals }}">
                                                                            <input type="hidden" name="activity" value="{{ $data->activity }}">
                                                                            <input type="hidden" name="hotel" value="{{ $data->hotel }}">
                                                                            <input type="hidden" name="package_price" value="{{ $data->package_price }}">
                                                                            <input type="hidden" name="package_id" value="{{ $data->package_id }}">
                                                                            <input type="hidden" name="mobile" value="{{ $userdata->mobile ?? '' }}">
                                                                            @if($userdata)
                                                                                <button type="submit" class='bx bx-heart wishlist-btn'
                                                                                    onclick="toggleIcon(this)" data-bs-toggle="tooltip" data-bs-placement="top"
                                                                                    title="Wishlist"></button>
                                                                            @endif
                                                                        </form>
                                                                    </div>

                                                                </div>

                                                                <script>
                                                                    document.addEventListener('DOMContentLoaded', function () {
                                                                        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                                                                        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                                                                            return new bootstrap.Tooltip(tooltipTriggerEl);
                                                                        });
                                                                    });

                                                                    function toggleIcon(element) {
                                                                        if (element.classList.contains('bx-heart')) {
                                                                            element.classList.remove('bx-heart');
                                                                            element.classList.add('bxs-heart');
                                                                        } else {
                                                                            element.classList.remove('bxs-heart');
                                                                            element.classList.add('bx-heart');
                                                                        }
                                                                    }
                                                                </script>

                                        @endif
                                        <ul class="tripListWrapper">
                                            @if($data->trip_flight != null)
                                                <li>
                                                    <div class="icon">
                                                        <svg style="margin-left: 3px;" xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="19" viewBox="0 0 18 12" fill="none" class="car-icon-no-commute">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M15.8864 3.41705H17.3999C17.649 3.41705 17.8408 3.64145 17.8209 3.88505V4.43345C17.8209 4.69745 17.6303 4.90025 17.3812 4.90025H16.4606C16.6525 5.57225 16.7671 6.34505 16.7671 7.24025V8.80505V11.4511C16.7671 11.7151 16.5752 11.9191 16.3261 11.9191H14.6981C14.4489 11.9191 14.2571 11.7151 14.2571 11.4511V10.2307C12.7237 10.3723 11.0184 10.4539 9.21722 10.4539C7.41602 10.4539 5.70948 10.3723 4.17734 10.2307V11.4511C4.17734 11.7151 3.98551 11.9191 3.73638 11.9191H2.10708C1.85795 11.9191 1.66612 11.7151 1.66612 11.4511V7.24145C1.66612 6.34505 1.78072 5.57345 1.97255 4.90145H1.05326C0.804134 4.90145 0.612305 4.69745 0.612305 4.43345V3.88505C0.612305 3.62105 0.804134 3.41705 1.05326 3.41705H2.54804C2.59548 3.34642 2.63805 3.27078 2.68057 3.19524L2.68057 3.19524L2.68058 3.19523C2.72401 3.11807 2.76738 3.04101 2.81585 2.96945C2.89308 2.84705 3.92821 1.40345 4.36917 0.813055C4.77027 0.285055 5.28846 0.0810547 5.86394 0.0810547H12.5705C13.146 0.0810547 13.6816 0.304255 14.0653 0.813055C14.5249 1.40345 15.1191 2.21705 15.4056 2.64425C15.4454 2.69626 15.4803 2.75401 15.5152 2.81174L15.5152 2.81176L15.5152 2.81179C15.5479 2.86595 15.5806 2.92009 15.6173 2.96945C15.688 3.07376 15.7485 3.17872 15.8138 3.292L15.8138 3.29204L15.8139 3.29206C15.8372 3.33254 15.8612 3.37409 15.8864 3.41705ZM6.05457 6.89536L6.51421 6.24496L6.51297 6.24376C6.62881 6.08176 6.57151 5.95936 6.39837 5.97976H2.98779C2.81465 5.97976 2.64275 6.12136 2.62282 6.32536L2.58545 6.83416C2.58545 7.01776 2.71873 7.17976 2.91056 7.17976H5.51894C5.70953 7.17976 5.93997 7.05856 6.05457 6.89536ZM7.89414 4.27209H3.94544C3.71624 4.27209 3.52441 4.06809 3.52441 3.82449C3.52441 3.71214 3.60521 3.58363 3.64835 3.51502L3.65894 3.49809C3.75486 3.33609 4.69283 2.03409 5.01919 1.60689C5.32686 1.20009 5.74789 1.03809 6.18885 1.03809H8.12333V1.11849C8.12333 1.38249 8.31516 1.58649 8.56429 1.58649H9.92454C10.1737 1.58649 10.3655 1.38249 10.3655 1.11849V1.03809H12.3212C12.7621 1.03809 13.1831 1.20009 13.4896 1.60689C13.8159 2.03409 14.2569 2.64489 14.4861 2.97009C14.506 2.99049 14.5247 3.01089 14.5247 3.03009C14.5502 3.06843 14.5772 3.10805 14.6048 3.1486L14.6048 3.14863C14.6808 3.26038 14.7617 3.37923 14.8311 3.49809L14.8388 3.51015C14.8811 3.57659 14.9657 3.70954 14.9657 3.82449C14.9657 4.06809 14.7738 4.27209 14.5446 4.27209H7.89414ZM12.8969 7.15888H15.5214H15.5227C15.7133 7.15888 15.8665 6.99688 15.8465 6.79288L15.8092 6.28408C15.7905 6.08128 15.6373 5.93848 15.4454 5.93848H12.0336C11.8418 5.93848 11.7845 6.06088 11.8991 6.22408L12.36 6.87448C12.4746 7.03768 12.705 7.15888 12.8969 7.15888Z"
                                                                fill="#000000"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="name">
                                                        <p class="package-header mb-0">Trip</p>
                                                    </div>
                                                    <div class="dot">
                                                        <p class="mb-0">:</p>
                                                    </div>
                                                    <div class="tripname">
                                                        <p class="mb-0">{{$data->trip_flight}}</p>
                                                    </div>
                                                </li>
                                            @endif
                                            @if($data->meals != null)
                                                <li>
                                                    <div class="icon">
                                                        <svg style="margin-right: 5px;" width="21" height="20" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M11.358 2.889h4.849v15h-4.849v-15z"></path>
                                                            <g mask="url(#a0bdco1iia)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M16.207 7.057c0-1.974-.894-4.168-2.424-4.168-1.53 0-2.425 2.194-2.425 4.168 0 1.579.697 2.542 1.652 2.858l-.485 6.553c-.06.773.53 1.42 1.273 1.42.742 0 1.318-.663 1.272-1.42l-.514-6.553c.954-.332 1.65-1.295 1.65-2.858z"
                                                                    fill="black"></path>
                                                            </g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5 3.001h4.97v14.872H5V3z">
                                                            </path>
                                                            <g mask="url(#oozokqdm0b)">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M9.37 3.018h-.05a.462.462 0 0 0-.467.467l.116 3.549c.017.258-.2.467-.466.467-.25 0-.467-.193-.467-.435l-.033-3.613c0-.242-.217-.435-.467-.435h-.067c-.25 0-.466.193-.466.435l-.05 3.597c0 .242-.217.435-.467.435a.462.462 0 0 1-.467-.467l.117-3.549c.017-.258-.2-.468-.467-.468h-.05c-.25 0-.45.194-.466.436l-.15 3.677c-.05 1.081.65 2 1.65 2.355l-.567 6.952c-.067.79.583 1.452 1.4 1.452s1.45-.678 1.4-1.452l-.567-6.952c.984-.338 1.683-1.274 1.65-2.355l-.133-3.66a.467.467 0 0 0-.467-.436z"
                                                                    fill="black"></path>
                                                            </g>
                                                        </svg>
                                                    </div>

                                                    <div class="name">
                                                        <strong class="package-header">Meals</strong>
                                                    </div>
                                                    <div class="dot">
                                                        :
                                                    </div>
                                                    <div class="tripname">
                                                        {{$data->meals}}
                                                    </div>
                                                </li>
                                            @endif
                                            @if($data->activity != null)
                                                <li>
                                                    <div class="icon">
                                                        <svg width="20" style="margin-left: 3px;" height="21" viewBox="0 0 20 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.35 5.223c.955 0 1.729-.777 1.729-1.736 0-.461-.182-.903-.507-1.228a1.725 1.725 0 0 0-2.444 0 1.74 1.74 0 0 0-.507 1.228c0 .959.774 1.736 1.73 1.736zM6.127 4.82v.869H4.689V4.82h1.438zm4.044 1.634a2.158 2.158 0 0 0-1.146-.331L8.04 6.12c-.72 0-1.296.578-1.296 1.302l-.02 6.751L4.627 20.5l2.372-.275 2.213-4.986 1.229 1.08-.645 3.58 1.985-.232.81-3.407c.1-.423-.016-.869-.312-1.188l-1.718-1.859a2.177 2.177 0 0 1-.577-1.477c-.001-.93.006-1.67.014-2.47v-.001c.004-.418.008-.852.01-1.338l2.614 1.452h3.196c.244 0 .432-.19.432-.435v-.216a.427.427 0 0 0-.432-.435h-2.593a.431.431 0 0 1-.228-.066L10.17 6.454zM3.939 8.205l.891-1.648h1.297v7.38H4.614a.866.866 0 0 1-.864-.868v-4.2c0-.234.065-.465.19-.664zm11.036 2.042v9.003l.864-.1v-8.903h-.864zm.864-2.826v-.868h-.864v.868h.864z"
                                                                fill="#000000"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="name">
                                                        <strong class="package-header">Activity</strong>
                                                    </div>
                                                    <div class="dot">
                                                        :
                                                    </div>
                                                    <div class="tripname">
                                                        {{$data->activity}}&nbsp;Activity
                                                    </div>
                                                </li>
                                            @endif
                                            @if($data->hotel != null)
                                                <li>
                                                    <div class="icon">
                                                        <svg width="20" style="margin-left: 2px; margin-right: 6px;" height="20"
                                                            viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M9.6585 12.0283V0.727993H3.32865V12.0283H5.90747V9.71692H7.07967V12.0283H9.6585ZM7.78308 1.49808H8.95527V2.78222H7.78308V1.49808ZM7.07962 1.49808H5.90743V2.78222H7.07962V1.49808ZM4.0319 1.49808H5.2041V2.78222H4.0319V1.49808ZM8.95527 3.55305H7.78308V4.83718H8.95527V3.55305ZM5.90743 3.55305H7.07962V4.83718H5.90743V3.55305ZM5.2041 3.55305H4.0319V4.83718H5.2041V3.55305ZM3.09439 12.0279V4.06627H0.75V12.0279H3.09439ZM2.39088 4.8374H1.45312V5.86471H2.39088V4.8374ZM7.78308 5.60749H8.95527V6.89162H7.78308V5.60749ZM7.07962 5.60749H5.90743V6.89162H7.07962V5.60749ZM4.0319 5.60749H5.2041V6.89162H4.0319V5.60749ZM2.39088 6.63498H1.45312V7.66228H2.39088V6.63498ZM7.78308 7.66194H8.95527V8.94607H7.78308V7.66194ZM7.07962 7.66194H5.90743V8.94607H7.07962V7.66194ZM4.0319 7.66194H5.2041V8.94607H4.0319V7.66194ZM2.39088 8.43307H1.45312V9.46038H2.39088V8.43307ZM1.45312 10.2306H2.39088V11.258H1.45312V10.2306Z"
                                                                fill="black"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="name">
                                                        <strong class="package-header">Hotel</strong>
                                                    </div>
                                                    <div class="dot">
                                                        :
                                                    </div>
                                                    <div class="tripname">
                                                        {{$data->hotel}}&nbsp;Star
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="packageBottomSection">
                                            <div class="includeWrapper">
                                                <div class="includeItemCard">
                                                    <div class="rightSec d-flex">
                                                        <div class="w-50" style="text-align: left;">
                                                            @if($data->package_price != null)
                                                                <p style="margin-top: 5px; margin-bottom: 0;"><span
                                                                        class="priceStyle">₹{{$data->package_price}}</span></p>
                                                            @endif
                                                        </div>
                                                        <div class="w-50" style="text-align: right;">
                                                            <a href="{{url('/book-package')}}/{{$data->id}}"
                                                                class="btn btn-outline-primary rounded">Book Now</a>
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

        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            // JavaScript for tooltip initialization and icon toggle
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });

            function toggleIcon(element) {
                if (element.classList.contains('bx-heart')) {
                    element.classList.remove('bx-heart');
                    element.classList.add('bxs-heart');
                } else {
                    element.classList.remove('bxs-heart');
                    element.classList.add('bx-heart');
                }
            }

            $(document).ready(function () {
                // When a tab is shown, update the h1 tag with the tab title
                $('.nav-tabs a').on('shown.bs.tab', function (event) {
                    var activeTab = $(event.target).text(); // Get the text of the active tab
                    $('.pack-head h1').text(activeTab); // Update the h1 tag with the active tab title
                });
            });
        </script>
    </div>
</div>




</div></br></br></br></br>



<!-- About Start -->
<div class="icon-block-left icon-left-v1 border-bottom border-color-8 pb-2 pt-4 mt-1">
    <div class="container">
        <div class="row">
            <!-- Icon Block Left Align -->
            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <!-- <img src="assets/img/customer-care.png" style="height:50px" class=" mb-3 mr-3"> -->
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.88 107.38"
                        style="height: 50px; border-radius: 50%; margin-right: 12px;">
                        <title>customer-care</title>
                        <path
                            d="M81.75,54.65l-.53,1.64-.08.14-.07.09a7.23,7.23,0,0,1-2,.23,12.84,12.84,0,0,0,.61-5.63h0a1.53,1.53,0,0,1,.61-1.35,6.82,6.82,0,0,0,2.38-3.39L83,43.77a4.93,4.93,0,0,0-.19-1.05c0-.12-.08-.21-.11-.29l-.26,0A1.53,1.53,0,0,1,81,40.91c.05-4.92-.47-8-1.37-10.13-1.52-2.57-3.87-3.87-6.67-5.27-.49-.21-1-.44-1.5-.7-9.13,9.54-16.69-2.73-27.52,15.75h-.37c-.14.32-.29.64-.43,1l-.08.16a1.53,1.53,0,0,1-2.09.56q-.37-.21-.42-.18c-.06,0-.13.16-.22.37A4.7,4.7,0,0,0,40,44c-.11,2.16.59,5,2,6.37a1.51,1.51,0,0,1,.47,1.06c.16,6.6,3.09,9.12,6.65,12.19l1.5,1.3c3.57,3.18,7.34,4.82,11,4.82S68.81,68.2,72.13,65h2.42l.26,0c.49,0,1.11,0,1.81,0l-.81.77-1.48,1.4c-4,3.81-8.26,5.65-12.64,5.65s-8.92-1.91-13.07-5.6l-1.46-1.28c-3.51-3-6.49-5.59-7.42-11.21l-4.82.39a3.58,3.58,0,0,1-4.05-2.93L29,37.41a3.55,3.55,0,0,1,3.21-3.91l1.57-.13a1.78,1.78,0,0,1-.16-.65c-.94-15.35,5.68-25,14.63-29.63A29.77,29.77,0,0,1,77.36,4.6c8.18,5.27,13.52,14.91,11.12,28.32a2.45,2.45,0,0,1-.18.54l2.39.27A3.81,3.81,0,0,1,94.08,38L92.23,52.06a3.93,3.93,0,0,1-4.39,3.29h0a28.24,28.24,0,0,1-1,3.13,7,7,0,0,1-1.5,2.33c-2,2.06-8.46,2.06-10.75,2.06h-6a7,7,0,0,1-5.25,2c-3.32,0-6-1.76-6-3.93s2.68-3.93,6-3.93A7.06,7.06,0,0,1,68.4,59h6.15c1.8,0,7.14,0,8.06-.93a3,3,0,0,0,.64-1l.68-2.12-2.18-.25ZM38,27.17c3.4-15.86,21.89-25.75,39.44-15.68a18.7,18.7,0,0,1,4.27,3.36,21.12,21.12,0,0,0-6.82-7A24.84,24.84,0,0,0,62.82,4,24.39,24.39,0,0,0,50.4,6.53C43.82,9.89,38.72,16.65,38,27.17ZM44.78,73,54,97.19,58.64,84l-2.27-2.48c-1.71-2.5-1.12-5.33,2-5.84a22.86,22.86,0,0,1,3.43-.07,18.09,18.09,0,0,1,3.77.15c2.94.64,3.25,3.49,1.78,5.76L65.12,84l4.63,13.2L78.1,73c6,5.42,27.21,6.51,33.84,10.2,9.18,5.14,8.93,15,10.94,24.2H0c2-9.11,1.79-19.14,10.94-24.2C19.09,78.65,38.11,79,44.78,73Z" />
                    </svg>
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Customer Care</a></h5>
                        <p class="text-gray-1 text-lh-inherit">Our team is working 24*7 to give you the best taxi
                            service. Call on our number anytime.</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->

            <!-- Icon Block Left Align -->
            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <img src="assets/img/low-price.svg" style="height:50px" class=" mb-3 mr-3">
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Affordable Rates</a></h5>
                        <p class="text-gray-1 text-lh-inherit">We provide you top-notch taxi service that to in your
                            budget. that's the our major reason why our customer's love our service almost everyday</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->

            <!-- Icon Block Left Align -->
            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <!-- <img src="assets/img/location.jpeg" style="height:50px" class=" mb-3 mr-3"> -->
                    <svg viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"
                        style="height:50px; border-radius: 50%; margin-right: 20px;">
                        <path
                            d="M288 0C221.7 0 168 53.73 168 120c0 48.38 16.86 61.9 107.7 193.5c5.957 8.604 18.69 8.604 24.65 0C391.1 181.9 408 168.4 408 120C408 53.73 354.3 0 288 0zM288 176C261.5 176 240 154.5 240 128S261.5 80 288 80c26.48 0 48 21.53 48 48S314.5 176 288 176zM10.06 227.6C3.984 230 0 235.9 0 242.4v253.5c0 11.32 11.49 19.04 22 14.84L160 448V201.4C152.5 188.8 147.2 178 143.4 167.5L10.06 227.6zM326.6 331.8C317.9 344.4 303.4 352 288 352c-15.42 0-29.86-7.566-38.66-20.28C233.2 308.3 196.9 256.6 192 249.6V447.1L384 512V249.6C379.1 256.6 342.8 308.3 326.6 331.8zM554.1 161.2L416 224v288l149.9-67.59C572 441.1 576 436.1 576 429.6V176C576 164.7 564.6 156.1 554.1 161.2z" />
                    </svg>
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Pick &amp; Drop</a></h5>
                        <p class="text-gray-1 text-lh-inherit">We have almost all type of customers, who want to go to
                            anywhere. therefore, we provide door to door service.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <img src="assets/img/no-hidden-charges.jpg" style="height:50px; border-radius: 50%;"
                        class=" mb-3 mr-3">
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">No Hidden Charges</a></h5>
                        <p class="text-gray-1 text-lh-inherit">Our prices include taxes and insurance. What you see is
                            what you really pay</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <img src="assets/img/no-limit.png" style="height:50px" class=" mb-3 mr-3">
                    <!-- <i class="flaticon-customer-service text-primary font-size-50 text-lh-1 mb-3 mr-3"></i> -->
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">No Limits</a></h5>
                        <p class="text-gray-1 text-lh-inherit">Drive as much as you want with unlimited kms. Just like
                            your own car!</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt_15">
                <div class="media pr-xl-14">
                    <img src="assets/img/2-minit.jpg" style="height:60px; border-radius: 50%; object-fit: fill;"
                        class=" mb-3 mr-3">
                    <div class="media-body">
                        <h5 class="font-size-19 text-dark font-weight-bold mb-1"><a href="#">Booking in 2 Minutes</a>
                        </h5>
                        <p class="text-gray-1 text-lh-inherit">No hassle of uploading your driving license and waiting
                            for its approval. Easy enough!</p>
                    </div>
                </div>
            </div>
            <!-- End Icon Block Left Align -->
        </div>
    </div>
</div></br>
<!-- About End -->


<!--how it works-->
<div class="container text-center space-top-lg-2">
    <!-- Title -->
    <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1 pt-5 pb-md-6">
        <h2 class="section-title text-black font-size-30 font-weight-bold">How it Works</h2>
    </div></br></br></br>
    <!-- End Title -->
    <!-- Features -->
    <div class="mb-6">
        <div class="row">
            <!-- Icon Block -->

            <!-- End Icon Block -->

            <!-- Icon Block -->


            <div class="col-lg-3 pb-4 pb-lg-0">
                <img class="img-fluid pb-5" src="assets/img/work.1.jpg">
                <div class="text-lg-left  w-lg-80 mx-auto">
                    <h5 class="font-size-21 text-dark font-weight-bold mb-2"><a href="#">Choose the trip type</a></h5>
                    <p class="text-gray-1">Intercity, Local or Airport Transfer</p>
                </div>
            </div>
            <!-- End Icon Block -->

            <!-- Icon Block -->
            <div class="col-lg-3 pb-4 pb-lg-0">
                <img class="img-fluid pb-5" src="assets/img/work.3.png">
                <div class="text-lg-left w-lg-80 mx-auto">
                    <h5 class="font-size-21 text-dark font-weight-bold mb-2"><a href="#">Select a car</a></h5>
                    <p class="text-gray-1">from Hatchbacks, sedan, Innovas, luxury cars and Tempo Travellers</p>
                </div>
            </div>

            <div class="col-lg-3 pb-4 pb-lg-0">
                <img class="img-fluid pb-5" src="assets/img/work.2.jpg">
                <div class="text-lg-left w-lg-80 ml-auto">
                    <h5 class="font-size-21 text-dark font-weight-bold mb-2"><a href="#">Enter your trip details</a>
                    </h5>
                    <p class="text-gray-1">date, time and your itirary</p>
                </div>
            </div>
            <div class="col-lg-3 pb-4 pb-lg-0">
                <img class="img-fluid pb-5" src="assets/img/work.4.jpg">
                <div class="text-lg-left w-lg-80 mx-auto">
                    <h5 class="font-size-21 text-dark font-weight-bold mb-2"><a href="#">Pay before trip or after
                            trip</a></h5>
                    <p class="text-gray-1">using your card,cash or e-wallets</p>
                </div>
            </div>
            <!-- End Icon Block -->
        </div>
    </div>
    <!-- End Features -->
</div> <!-- end how it works-->


<!-- Services Start -->
<!--<div class="container-fluid py-5">-->
<!--    <div class="container pt-5 pb-3">-->
<!--        <h2 class=" text-uppercase text-center mb-5">Our Services</h2>-->
<!--        <div class="row">-->
<!--            <div class="col-lg-4 col-md-7 mb-2">-->
<!--                <div class="service-item d-flex flex-column justify-content-center px-8 mb-8">-->
<!--                    <img src="assets/img/service1.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">city transport</h4>-->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p></br>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 mb-2">-->
<!--                <div class="service-item  d-flex flex-column justify-content-center px-8 mb-4">-->
<!--                    <img src="assets/img/service2.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">bussiness trip</h4>-->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p></br>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 mb-2">-->
<!--                <div class="service-item d-flex flex-column justify-content-center px-8 mb-4">-->
<!--                    <img src="assets/img/service6.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">Online booking</h4>-->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 mb-2">-->
<!--                <div class="service-item d-flex flex-column justify-content-center px-8 mb-4">-->
<!--                    <img src="assets/img/service4.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">regular journey</h4> -->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 mb-2">-->
<!--                <div class="service-item d-flex flex-column justify-content-center px-8 mb-4">-->
<!--                    <img src="assets/img/service5.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">picnic trip</h4>-->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 mb-2">-->
<!--                <div class="service-item d-flex flex-column justify-content-center px-8 mb-4">-->
<!--                    <img src="assets/img/service3.png" alt="service image">-->
<!--                    <div class="service-item1   ">-->
<!--                    <h4 class="text-uppercase mb-5">regular office</h4>-->
<!--                    <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>-->
<!-- <p class=" mb-0 d-block text-center"><a href="detail.html" class="btn btn-primary py-2 mr-1">Read More</a> </p> -->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Services End -->

<!-- Banner Start -->
<section class="section-b-space animated-section about-section">
    <div class="animation-section">
        <div class="cross po-1"></div>
        <div class="cross po-2"></div>
        <div class="cross po-3"></div>
        <div class="round po-4"></div>
        <div class="round po-5"></div>
        <div class="round r-2 po-6"></div>
        <div class="round r-2 po-7"></div>
        <div class="round r-y po-8"></div>
        <div class="round r-y po-9"></div>
        <div class="square po-10"></div>
        <div class="square po-11"></div>
        <div class="square s-2 po-12"></div>
    </div>
    <div class="container" id="booking">
        <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1 pt-5 pb-md-6">
            <!-- <h2 class="text-primary text-center">Best</h2> -->
            <h2 class="section-title text-black font-size-30 font-weight-bold mb-5">Best On Call Booking</h2>
            <div class="row">
                <div class="card-group">
                    <div class="col-xl-4 col-lg-4 col-md-6 px-2">
                        <img src="assets/img/emargancy.1.jpg" class="card-img-top" alt="...">

                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 px-2">
                        <img src="assets/img/emargancy.2.jpg" class="card-img-top" alt="...">

                    </div>

                    <div class="col-lg-4">
                        <div class="about-text">
                            <div>
                                <h5><span>new</span> offer...</h5>
                                <h3>Call Safar to Book a cab</h3>
                                <h2><a href="tel:+91972-7777-393">9638502459</a></h2>
                                <p>Enjoy the most exceptional intercity travel experience with 24 X 7 customer support
                                    service at disposal.</p>
                                <a href="inquiry_submitt" class="btn btn-primary">Book a Ride</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- <div class="container-fluid py-5">
<div class="container py-5">
    <div class="row mx-0">
        <div class="col-sm-12 col-xl-12">
            <div class="px-5  d-flex align-items-center justify-content-between" style="height: 350px;background:#3F3B3D">
                <img class="img-fluid flex-shrink-0 ml-n5 w-50 mr-1" src="assets/img/item.2.png" alt="">
                <div class="text-center">
                    <h3 class="text-uppercase text-dark mb-3">Looking for a car?</h3>
                    <a class="btn btn-warning py-2 px-4" href="inquiry_submitt">Start Now</a>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
Banner End -->


<!-- Testimonial Start -->

<!-- Testimonial End -->


<!-- Contact Start -->
<!-- <div class="container-fluid py-5">
<div class="container pt-5 pb-3">
    <h2 class=" text-uppercase text-center mb-5">Contact Us</h2>
    <div class="row">
        <div class="col-lg-7 mb-2">
            <div class="contact-form bg-light mb-4" style="padding: 30px;">
                <form action="contact_mail" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-6 form-group">
                            <input type="text" class="form-control p-4" name="name" placeholder="Your Name" required="required">
                        </div>
                        <div class="col-6 form-group">
                            <input type="number" class="form-control p-4" name="number" placeholder="Your Number" required="required">
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea class="form-control py-3 px-4" name="msg" rows="5" placeholder="Message" required="required"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5 mb-2">
            <div class="d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;background:#3F3B3D">
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-map-marker-alt text-warning flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-dark">Head Office</h5>
                        <p>131, Sovereign Shoppers, Anand Mahal Road, NR.Shindhu Seva Samiti School, Adajan. Surat. 395009</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-map-marker-alt text-warning flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-dark">Branch Office</h5>
                        <p>131, Sovereign Shoppers, Anand Mahal Road, NR.Shindhu Seva Samiti School, Adajan. Surat. 395009</p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <i class="fa fa-2x fa-envelope-open text-warning flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-dark">Customer Service</h5>
                        <p>safarmobility@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-2x fa-envelope-open text-warning flex-shrink-0 mr-3"></i>
                    <div class="mt-n1">
                        <h5 class="text-dark">Return & Refund</h5>
                        <p class="m-0">safarmobility@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->
@if (\Session::has('undefined_route'))
    <script>
        alert('NOT Available');
    </script>
@endif
@if(session('paid'))
    <script>
        alert('Payment Successfully');
    </script>
@endif
<!-- Contact End -->


<!-- Vendor Start -->
<!----- <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="owl-carousel vendor-carousel">
            <div class="bg-light p-5">
                <img src="assets/img/Category1.png" alt="">
        </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-2.png" alt="">
        </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-3.png" alt="">
</div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-4.png" alt="">
            </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-5.png" alt="">
            </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-6.png" alt="">
            </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-7.png" alt="">
            </div>
            <div class="bg-light p-4">
                <img src="assets/img/vendor-8.png" alt="">
            </div>
        </div>
    </div>
</div>---->
<!-- Vendor End -->
<script>
    $(document).ready(function () {
        $(".custom-select1").change(function () {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            $(".custom-select2").each(function () {
                $("option", this).each(function () {
                    if ($(this).val() === selectedValue) {
                        $(this).prop("disabled", true);
                    } else {
                        $(this).prop("disabled", false);
                    }
                });
            });
        });
        $(".custom-select2").change(function () {
            var selectedValue = $(this).val();
            console.log(selectedValue);
            $(".custom-select1").each(function () {
                $("option", this).each(function () {
                    if ($(this).val() === selectedValue) {
                        $(this).prop("disabled", true);
                    } else {
                        $(this).prop("disabled", false);
                    }
                });
            });
        });
    });

    function log(status) {
        let one_way = document.getElementById("one_way");
        let round = document.getElementById("round");
        let local = document.getElementById("local");

        console.log(status);
        if (status == 'oneway') {
            one_way.style.display = 'block';
            round.style.display = 'none';
            local.style.display = 'none';
            $('#local_btn').removeClass('btn-warning');
            $('#round_btn').removeClass('btn-warning');
            $('#local_btn').addClass('btn-outline-warning');
            $('#round_btn').addClass('btn-outline-warning');

            $('#one_btn').removeClass('btn-outline-warning');
            $('#one_btn').addClass('btn-warning');


        }
        if (status == 'round') {
            one_way.style.display = 'none';
            round.style.display = 'block';
            local.style.display = 'none';

            $('#one_btn').removeClass('btn-warning');
            $('#local_btn').removeClass('btn-warning');
            $('#local_btn').addClass('btn-outline-warning');
            $('#one_btn').addClass('btn-outline-warning');

            $('#round_btn').removeClass('btn-outline-warning');
            $('#round_btn').addClass('btn-warning');

        }
        if (status == 'local') {
            one_way.style.display = 'none';
            round.style.display = 'none';
            local.style.display = 'block';
            $('#one_btn').removeClass('btn-warning');
            $('#round_btn').removeClass('btn-warning');
            $('#one_btn').addClass('btn-outline-warning');
            $('#round_btn').addClass('btn-outline-warning');

            $('#local_btn').removeClass('btn-outline-warning');
            $('#local_btn').addClass('btn-warning');

        }
    };
</script>
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    function checkDropdowns() {
        var dropdown1 = document.getElementById('select_local').value;
        var dropdown2 = document.getElementById('select_local1');
        if (dropdown1) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                type: 'post',
                url: 'local_destiny',
                data: {
                    'from': dropdown1,
                },
                dataType: 'json',
                success: function (result) {
                    console.log(result);
                    dropdown2.innerHTML = '';
                    result.forEach(function (rowData) {
                        var option = document.createElement("option");
                        option.value = rowData.result; // Set the 'value' attribute
                        option.text = rowData.result; // Set the text displayed in the option
                        dropdown2.appendChild(option);
                    });


                },
                error: function (err) {
                    console.log('c', err);
                }
            });
        }

    }


    document.getElementById('select_local').addEventListener('change', checkDropdowns);
</script>
<script>
    let buttons = document.querySelectorAll('.local');

    function selectButton(buttons) {
        console.log(buttons);
        if (selectedButton !== null) {
            selectedButton.classList.remove('selected');
        }

        selectedButton = button;
        selectedButton.classList.add('selected');
    }
</script>
<!-- Footer Start -->
@endsection