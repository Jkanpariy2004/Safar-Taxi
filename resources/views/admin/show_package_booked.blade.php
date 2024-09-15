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
<div class="card card-outline card-warning">
    <div class="card-header">
        <h3 class="card-title">List of Package Booking</h3>
        <div class="card-tools">
            <!-- <a href="add_city" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a> -->
            <!--<a href="assign_amt" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Assign Amount</a>-->
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Number</th>
                            <th>Pickup Point</th>
                            <th>Pickup Time</th>
                            <th>Booking Date</th>
                            <th>Adult</th>
                            <th>Child</th>
                            <th>Package Price</th>
                            <th>Package Name</th>
                            <th>Package Id</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1 ?>
                        @foreach($packages as $package)
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td>{{$package->name}}</td>
                            <td>
                                <details>
                                    <summary>Email</summary>
                                    {{$package->email}}
                                </details>
                            </td>
                            <td>{{$package->number}}</td>
                            <td>{{$package->pickup_point}}</td>
                            <td>{{$package->pickup_time}}</td>
                            <td>{{$package->booking_date}}</td>
                            <td>{{$package->adult}}</td>
                            <td>{{$package->child}}</td>
                            <td>₹&nbsp;{{$package->price}}</td>
                            <td>
                                <details>
                                    <summary>Route</summary>
                                    {{$package->root_name}}
                                </details>
                            </td>
                            <td>{{$package->package_id}}</td>
                            <td>
                                <a href="{{ url('/show-package-booking/package_booked_show_delete') }}/{{ $package->id }}" onclick="return confirm('Are You Sure Package Delete?')" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection