<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        .alert.alert-danger {
            background-color: transparent;
            padding: 0;
            color: red;
            border: none;
            margin-top: 0px;
            margin-bottom: 0px;
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
    </style>
</head>

@extends('admin.inc.admin_view')

@section('main-content')
<div class="card card-outline card-info rounded-0">
    <div class="card-header">
        <h3 class="card-title">Safar</h3>
    </div>
    <div class="card-body">
        <form action="/add-package/add_package" method="post" enctype="multipart/form-data" id="packageForm">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-3">
                <label for="p_photo" class="form-label">Package Photo:</label>
                <input name="p_photo" id="p_photo" type="file" class="form-control" value="">
                @error('p_photo')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <input name="p_no" id="p_no" type="hidden" value="">
            @error('p_no')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror

            <div class="mb-3">
                <label for="r_start_s" class="form-label">Package Start:</label>
                <input name="r_start_s" id="r_start_s" type="text" class="form-control" placeholder="Enter Package Starting Stop">
                @error('r_start_s')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="r_end_s" class="form-label">Package End:</label>
                <input name="r_end_s" id="r_end_s" type="text" class="form-control" placeholder="Enter Package Ending Stop">
                @error('r_end_s')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_price" class="form-label">Package Price:</label>
                <input name="p_price" id="p_price" type="text" class="form-control" placeholder="Enter Package Price">
                @error('p_price')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_time" class="form-label">Package Time:</label>
                <input name="p_time" id="p_time" type="text" class="form-control" placeholder="4D / 5N">
                @error('p_time')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_time_explain" class="form-label">Package Time Explain:</label>
                <input name="p_time_explain" id="p_time_explain" type="text" class="form-control" placeholder="2N Kandy/2N Bentota/1N Colombo">
                @error('p_time_explain')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_flight_flight" class="form-label">Package Trip Flight Mode:</label><br>
                <div class="form-check form-check-inline">
                    <input name="p_flight_flight" id="p_flight_flight" type="radio" class="form-check-input" value="Round Trip">
                    <label class="form-check-label" for="p_flight_flight">Round Trip</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="p_flight_flight" id="p_flight_flight1" type="radio" class="form-check-input" value="One Way Trip">
                    <label class="form-check-label" for="p_flight_flight1">One Way Trip</label>
                </div>
                @error('p_flight_flight')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_meals" class="form-label">Meals:</label><br>
                <div class="form-check form-check-inline">
                    <input name="p_meals" id="p_meals_selected" type="radio" class="form-check-input" value="Selected">
                    <label class="form-check-label" for="p_meals_selected">Selected</label>
                </div>
                <div class="form-check form-check-inline">
                    <input name="p_meals" id="p_meals_fixed" type="radio" class="form-check-input" value="Fixed">
                    <label class="form-check-label" for="p_meals_fixed">Fixed</label>
                </div>
                @error('p_meals')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_activity" class="form-label">Activity:</label>
                <input name="p_activity" id="p_activity" type="text" class="form-control" placeholder="Please Enter Activity Details">
                @error('p_activity')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_hotel" class="form-label">Hotel Detail:</label>
                <input name="p_hotel" id="p_hotel" type="text" class="form-control" placeholder="Please Enter Hotel Details">
                @error('p_hotel')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection