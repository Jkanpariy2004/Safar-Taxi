<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" integrity="sha512-pVCM5+SN2+qwj36KonHToF2p1oIvoU3bsqxphdOIWMYmgr4ZqD3t5DjKvvetKhXGc/ZG5REYTT6ltKfExEei/Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <style>
        .modal-content {
            background-color: #fefefe;
            margin: 4% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 70%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
            /*transform: translateY(-100%);*/
        }

        .close {
            float: right;
            text-align: right;
            font-size: 30px;
        }

        .modal-content h2 {
            text-align: center;
            margin-top: -35px;
        }

        .button_div {
            justify-content: center;
            text-align: center;
        }

        .button_div button {
            margin-right: 10px;
            background: #6777ef;
            border: 1px solid #6777ef;
            padding: 5px 15px;
            color: #FFFFFF;
            border-radius: 2px;
        }

        #addAddressForm input {
            padding: 5px;
        }

        .nice-select {
            padding: 0px !important;
            height: 38px !important;
            line-height: 38px !important;
        }

        .add_address_button {
            background: #6777ef;
            border: 1px solid #6777ef;
            padding: 5px 15px;
            color: #FFFFFF;
            border-radius: 2px;
        }

        @media (max-width: 768px) {
            .main_flex_div {
                display: flex;
                flex-direction: column;
            }

            .inner_flex_div {
                min-width: 100% !important;
            }

            .modal-content {
                padding: 10px 0px !important;
                min-width: 95% !important;
                height: 700px;
                overflow: scroll;
            }

            .close {
                margin-right: 10px;
            }
        }

        .list-group-item.active {
            background: #ffc107;
        }

        /* end common class */
        .top-status ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            justify-content: center;
            flex-wrap: wrap;
            padding: 0;
            margin: 0;
        }

        .top-status ul li {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            border: 8px solid #ddd;
            box-shadow: 1px 1px 10px 1px #ddd inset;
            margin: 10px 5px;
        }

        .top-status ul li.active {
            border-color: #6777ef;
            box-shadow: 1px 1px 20px 1px #ffc107 inset;
        }

        /* end top status */

        ul.timeline {
            list-style-type: none;
            position: relative;
        }

        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }

        ul.timeline>li {
            margin: 20px 0;
            padding-left: 30px;
        }

        ul.timeline>li:before {
            content: '\2713';
            background: #fff;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 0;
            left: 5px;
            width: 50px;
            height: 50px;
            z-index: 400;
            text-align: center;
            line-height: 50px;
            color: #d4d9df;
            font-size: 24px;
            border: 2px solid var(--ogenix-primary);
        }

        ul.timeline>li.active:before {
            content: '\2713';
            background: #28a745;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 0;
            left: 5px;
            width: 50px;
            height: 50px;
            z-index: 400;
            text-align: center;
            line-height: 50px;
            color: #fff;
            font-size: 30px;
            border: 2px solid var(--ogenix-primary);
        }

        .info-box {
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            border-radius: 0.25rem;
            background-color: #fff;
            display: -ms-flexbox;
            display: flex;
            margin-bottom: 1rem;
            min-height: 80px;
            padding: .5rem;
            position: relative;
            width: 100%;
        }

        .shadow {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }

        .info-box .info-box-icon {
            border-radius: 0.25rem;
            -ms-flex-align: center;
            align-items: center;
            display: -ms-flexbox;
            display: flex;
            font-size: 1.875rem;
            -ms-flex-pack: center;
            justify-content: center;
            text-align: center;
            width: 70px;
        }

        .bg-gradient-navy {
            background: #3F3B3D repeat-x !important;
            color: #fff;
        }

        .info-box .info-box-content {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            -ms-flex-pack: center;
            justify-content: center;
            line-height: 1.8;
            -ms-flex: 1;
            flex: 1;
            padding: 0 10px;
        }

        .info-box .progress-description,
        .info-box .info-box-text {
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .info-box .info-box-number {
            display: block;
            margin-top: .25rem;
            font-weight: 700;
        }

        .packageBottomSection {
            margin-top: 24px;
            color: black;
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
            font-family: 'Quicksand', sans-serif;
            overflow: hidden;
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
            width: 90%;
        }

        .itineraryList i {
            width: 10%;
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
    </style>
</head>
@extends('main')
@section('main-content')

<section class="my-5">
    <div class="container-xxl text-dark">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('uploads/Profile Photo/' . $userdata->profile_photo) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110" height="110" style="object-fit: cover;">
                                <div class="mt-3">
                                    <h4>{{$userdata->fullname}}</h4>
                                    <!-- <p class="text-secondary mb-1">+91 {{ $userdata->mobile }}</p> -->
                                    <!-- <p class="text-muted font-size-sm">Delhi, NCR</p> -->
                                </div>
                            </div>
                            <div class="list-group list-group-flush text-center mt-4">
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showProfileDetails()" style="margin-bottom: 1px;">Dashboard</a>
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showOrderDetails()" style="margin-bottom: 1px;">Recent Trip</a>
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="wallet()" style="margin-bottom: 1px;">Wallet</a>
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showWishlist()" style="margin-bottom: 1px;">Wishlist</a>
                                <a href="#" class="list-group-item list-group-item-action border-0" onclick="showAddressBook()">Account Details</a>
                                <a href="/user_logout" class="list-group-item list-group-item-action border-0">Logout</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="orderDetails" class="order_card">
                        <div class="card">
                            <div class="card-body">
                                <div class="top-status">
                                    <div>
                                        <div class="text-center mb-3">
                                            <h1>Recent Trip</h1>
                                        </div>
                                        <div class="row">
                                            @foreach($userdata_book as $data)
                                            <div class="col-md-6 mb-4 h-100">
                                                <div class="card" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 16px;">
                                                    <img src="https://w0.peakpx.com/wallpaper/951/619/HD-wallpaper-road-background-new-nice-trip-thumbnail.jpg" style="border-top-left-radius: 16px; border-top-right-radius: 16px;" width="100%" height="200" class="img" alt="Package Photo">
                                                    <div class="card-body">
                                                        <div class="titleWrapper">
                                                            <p class="packageHead" style="margin-top: 0; margin-bottom: 0; font-weight: 600; font-size: 20px; white-space: normal;"> {{$data->travel_root}} </p>
                                                        </div>
                                                        <div>
                                                            <div class="packageBottomSection">
                                                                <div class="includeWrapper">
                                                                    <div class="includeItemCard">
                                                                        <div class="rightSec d-flex">
                                                                            <div class="w-50" style="text-align: left;">
                                                                                <p style="margin-top: 5px; margin-bottom: 0;"><span class="priceStyle">₹{{$data->total_fare}}</span></p>
                                                                            </div>
                                                                            <div class="w-50" style="text-align: right;">
                                                                                <button type="button" class="btn btn-outline-primary rounded" data-toggle="modal" data-target="#tripDetailsModal{{ $data->id }}" onclick="showTripDetails({{ json_encode($data) }})">
                                                                                    View Details
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="tripDetailsModal{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $data->id }}" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel{{ $data->id }}">Trip Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <table class="table text-dark" id="tripDetailsTable">
                                                                                <tr>
                                                                                    <th><i class='bx bxs-user icon' style="font-size: 15px;"></i>&nbsp;Name:</th>
                                                                                    <td>{{ $data->name }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bxs-phone icon' style="font-size: 15px;"></i>&nbsp;Mobile:</th>
                                                                                    <td>{{ $data->mobile }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bx-envelope icon' style="font-size: 15px;"></i>&nbsp;Email:</th>
                                                                                    <td>{{ $data->email }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bx-map icon' style="font-size: 15px;"></i>&nbsp;Pickup:</th>
                                                                                    <td>
                                                                                        <details>
                                                                                            <summary>Pickup</summary>
                                                                                            {{ $data->pickup_point }}
                                                                                        </details>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bx-time-five icon' style="font-size: 15px;"></i>&nbsp;Pickup Time:</th>
                                                                                    <td>{{ $data->pickup_time }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bx-news icon' style="font-size: 15px;"></i>&nbsp;Inquiry No.:</th>
                                                                                    <td>{{ $data->inquiry_no }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bx-map-alt icon' style="font-size: 15px;"></i>&nbsp;Total KM:</th>
                                                                                    <td>{{ $data->total_km }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px;"></i>&nbsp;Car Type:</th>
                                                                                    <td>{{ $data->car_type }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th><i class='bx bxs-car icon' style="font-size: 15px;"></i>&nbsp;Pickup Cab:</th>
                                                                                    <td>{{ $data->available_cabs }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Per KM Rate:</th>
                                                                                    <td>₹{{ $data->per_km_rate }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Base Fare:</th>
                                                                                    <td>₹{{ $data->base_fare }}</td>
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

                    <div id="wishlist" class="card" style="display: none;">
                        <div class="card-body">
                            <div class="profile-info">
                                <div class="text-center mb-3">
                                    <h1>Wishlist Package</h1>
                                </div>
                                <div class="row">
                                    @foreach($userdata_package as $data)
                                    <div class="col-lg-6 col-md-6 mb-4 h-100">
                                        <div class="card" style="box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px; border-radius: 16px;">
                                            <img src="{{ asset('uploads/Packages/' . $data->package_photo) }}" style="border-top-left-radius: 16px; border-top-right-radius: 16px;" class="img" alt="Package Photo">
                                            <div class="card-body">
                                                <div class="titleWrapper">
                                                    <p class="packageHead" style="margin-top: 0; margin-bottom: 0;"> {{ $data->root_start_stop }} To {{ $data->root_end_stop }} </p>
                                                    @if($data->time != null)
                                                    <span class="selected"> {{$data->time}} </span>
                                                    @endif
                                                </div>
                                                @if($data->time_explain != null)
                                                <div class="itineraryList" style="padding-bottom: 10px;">
                                                    <span> {{$data->time_explain}} </span>
                                                </div>
                                                @endif
                                                <ul class="tripListWrapper">
                                                    @if($data->trip_flight != null)
                                                    <li>
                                                        <div class="icon">
                                                            <i class='bx bx-trip' style="margin-right: 5px; margin-left: 5px;"></i>
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
                                                            <svg style="margin-right: 5px;" width="21" height="20" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.358 2.889h4.849v15h-4.849v-15z"></path>
                                                                <g mask="url(#a0bdco1iia)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.207 7.057c0-1.974-.894-4.168-2.424-4.168-1.53 0-2.425 2.194-2.425 4.168 0 1.579.697 2.542 1.652 2.858l-.485 6.553c-.06.773.53 1.42 1.273 1.42.742 0 1.318-.663 1.272-1.42l-.514-6.553c.954-.332 1.65-1.295 1.65-2.858z" fill="black"></path>
                                                                </g>
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5 3.001h4.97v14.872H5V3z"></path>
                                                                <g mask="url(#oozokqdm0b)">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.37 3.018h-.05a.462.462 0 0 0-.467.467l.116 3.549c.017.258-.2.467-.466.467-.25 0-.467-.193-.467-.435l-.033-3.613c0-.242-.217-.435-.467-.435h-.067c-.25 0-.466.193-.466.435l-.05 3.597c0 .242-.217.435-.467.435a.462.462 0 0 1-.467-.467l.117-3.549c.017-.258-.2-.468-.467-.468h-.05c-.25 0-.45.194-.466.436l-.15 3.677c-.05 1.081.65 2 1.65 2.355l-.567 6.952c-.067.79.583 1.452 1.4 1.452s1.45-.678 1.4-1.452l-.567-6.952c.984-.338 1.683-1.274 1.65-2.355l-.133-3.66a.467.467 0 0 0-.467-.436z" fill="black"></path>
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
                                                            <svg width="16" style="margin-top: 5px; margin-left: 5px; margin-right: 5px;" height="16" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                                                                <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 0 1-.94 0L6 3.964 4.47 8.171A.5.5 0 0 1 4 8.5H.5a.5.5 0 0 1 0-1h3.15l1.88-5.17A.5.5 0 0 1 6 2" />
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
                                                            <svg width="20" style="margin-left: 2px; margin-right: 6px;" height="20" viewBox="0 0 10 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6585 12.0283V0.727993H3.32865V12.0283H5.90747V9.71692H7.07967V12.0283H9.6585ZM7.78308 1.49808H8.95527V2.78222H7.78308V1.49808ZM7.07962 1.49808H5.90743V2.78222H7.07962V1.49808ZM4.0319 1.49808H5.2041V2.78222H4.0319V1.49808ZM8.95527 3.55305H7.78308V4.83718H8.95527V3.55305ZM5.90743 3.55305H7.07962V4.83718H5.90743V3.55305ZM5.2041 3.55305H4.0319V4.83718H5.2041V3.55305ZM3.09439 12.0279V4.06627H0.75V12.0279H3.09439ZM2.39088 4.8374H1.45312V5.86471H2.39088V4.8374ZM7.78308 5.60749H8.95527V6.89162H7.78308V5.60749ZM7.07962 5.60749H5.90743V6.89162H7.07962V5.60749ZM4.0319 5.60749H5.2041V6.89162H4.0319V5.60749ZM2.39088 6.63498H1.45312V7.66228H2.39088V6.63498ZM7.78308 7.66194H8.95527V8.94607H7.78308V7.66194ZM7.07962 7.66194H5.90743V8.94607H7.07962V7.66194ZM4.0319 7.66194H5.2041V8.94607H4.0319V7.66194ZM2.39088 8.43307H1.45312V9.46038H2.39088V8.43307ZM1.45312 10.2306H2.39088V11.258H1.45312V10.2306Z" fill="black"></path>
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
                                                                    <p style="margin-top: 5px; margin-bottom: 0;"><span class="priceStyle">₹{{$data->package_price}}</span></p>
                                                                    @endif
                                                                </div>
                                                                <div class="w-50" style="text-align: right;">
                                                                    <a href="{{url('/book-package')}}/{{$data->id}}" class="btn btn-outline-primary rounded">Book Now</a>
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

                    <div id="profileDetails" class="card" style="display: none;">
                        <div class="card-body">
                            @if(session('walletupdated'))
                            <div class="alert alert-success">
                                {{ session('walletupdated') }}
                            </div>
                            @endif
                            @if(session('paymentsuccess'))
                            <div class="alert alert-success">
                                {{ session('paymentsuccess') }}
                            </div>
                            @endif
                            @if(session('paymenterror'))
                            <div class="alert alert-alert">
                                {{ session('paymenterror') }}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="profile-info">
                                <div class="shadow info-box mb-3">
                                    <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Booked Trip</span>
                                        <span class="info-box-number counter" data-count="{{ $recordCount }}">
                                            0
                                        </span>
                                    </div>
                                </div>
                                <div class="shadow info-box mb-3">
                                    <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Completed Trip</span>
                                        <span class="info-box-number counter" data-count="{{ $recordCountComplete }}">
                                            0
                                        </span>
                                    </div>
                                </div>
                                <div class="shadow info-box mb-3">
                                    <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-heart"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Wishlist</span>
                                        <span class="info-box-number counter" data-count="{{ $wishlist }}">
                                            0
                                        </span>
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                                <script>
                                    $(document).ready(function() {
                                        $(".counter").each(function() {
                                            var $this = $(this);
                                            var count = $this.data("count");
                                            $this.text("0");
                                            $({
                                                countNum: $this.text()
                                            }).animate({
                                                countNum: count
                                            }, {
                                                duration: 300,
                                                easing: "linear",
                                                step: function() {
                                                    $this.text(Math.floor(this.countNum));
                                                },
                                                complete: function() {
                                                    $this.text(this.countNum);
                                                }
                                            });
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <div id="wallet" class="card" style="display: none;">
                        <div class="card-body">
                            <div class="profile-info">
                                <div class="d-flex">
                                    <div class="shadow info-box mb-3 col-lg-5">
                                        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-wallet"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Wallet</span>
                                            <span class="fw-bold">
                                                <?php echo $userdata['wallet']; ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <form id="razorpayForm" method="POST" action="{{ route('processuser.paymentuser') }}">
                                            @csrf
                                            <label for="amount">Enter Amount:</label>
                                            <input type="number" class="form-control" id="amount" name="amount" autocomplete="off" placeholder="Enter Amount to Add in Wallet" />
                                            <button type="button" onclick="openRazorpay()" class="btn btn-primary mt-2">Add Money in Wallet</button>

                                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                            <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                                            <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                                        </form>
                                    </div>
                                </div>

                                <!-- Include Razorpay Checkout JS -->
                                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

                                <div class="text-center">
                                    <h3 class="fw-bold">Wallet History</h3>
                                </div>
                                <div style="overflow-x: auto;">
                                    <table class="table table-striped table-bordered" style="white-space: nowrap;">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Amount</th>
                                                <th>Description</th>
                                                <th>transection Id</th>
                                                <th>Date & Time</th>
                                                <th>Credit & Debit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            ?>
                                            @foreach($transection as $tra)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{ $tra->amount }}</td>
                                                <td>{{ $tra->description }}</td>
                                                <td>{{ $tra->trnx_id }}</td>
                                                <td>{{ $tra->date }}</td>
                                                <td @if($tra->cr_dr == 'C') class="text-success" @elseif($tra->cr_dr == 'D') class="text-danger" @endif>
                                                    @if($tra->cr_dr == 'C') Credit @elseif($tra->cr_dr == 'D') Debit @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <script>
                                    function orderid() {
                                        return Math.floor(Math.random() * 90000000) + 10000000;
                                    }

                                    function openRazorpay() {
                                        var amount = document.getElementById('amount').value;

                                        // Validate the amount input
                                        if (!amount || amount <= 0) {
                                            alert('Please enter a valid amount');
                                            return;
                                        }

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

                            </div>
                        </div>
                    </div>

                    <div id="addressBook" class="card" style="display: none;">
                        <div class="card-body">
                            <div class="profile-info">
                                <div class="d-flex">
                                    <h5 class="fw-bold text-decoration-underline w-50">Profile Information</h5>
                                    <!-- <a href="{{url('/profile-edit')}}/{{$userdata->id}}" class="w-50 text-end"><i class='bx bxs-edit fs-2'></i></a> -->
                                </div>
                                <p><strong>Name:</strong> {{$userdata->fullname}}</p>
                                <p><strong>Email Address:</strong>{{$userdata->email}}</p>
                                <p><strong>Contact:</strong> +91 {{$userdata->mobile}}</p>
                                <p><strong>Gender:</strong> {{$userdata->gender}}</p>
                                <p><strong>Address:</strong> {{$userdata->address}}</p>
                            </div>

                            <div id="addressList">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

<script>
    function showAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'block';
        isFormVisible = true;
    }

    function closeAddAddressModal() {
        const modal = document.getElementById('addAddressModal');
        modal.style.display = 'none';
        isFormVisible = false;
    }

    function showProfileDetails() {
        hideAllSections();
        document.getElementById('profileDetails').style.display = 'block';
        setActiveLink(0);
    }

    function showOrderDetails() {
        hideAllSections();
        document.getElementById('orderDetails').style.display = 'block';
        setActiveLink(1);
    }

    function showWishlist() {
        hideAllSections();
        document.getElementById('wishlist').style.display = 'block';
        setActiveLink(3);
    }

    function showAddressBook() {
        hideAllSections();
        document.getElementById('addressBook').style.display = 'block';
        setActiveLink(4);
    }

    function wallet() {
        hideAllSections();
        document.getElementById('wallet').style.display = 'block';
        setActiveLink(2);
    }

    function hideAllSections() {
        document.getElementById('orderDetails').style.display = 'none';
        document.getElementById('profileDetails').style.display = 'none';
        document.getElementById('addressBook').style.display = 'none';
        document.getElementById('wishlist').style.display = 'none';
        document.getElementById('wallet').style.display = 'none';
    }

    function setActiveLink(index) {
        const links = document.querySelectorAll('.list-group-item');
        links.forEach(link => link.classList.remove('active'));
        links[index].classList.add('active');
    }

    showOrderDetails();
</script>

@endsection