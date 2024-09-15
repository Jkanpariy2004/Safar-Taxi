<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
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
        <h3 class="card-title">List of Cabs</h3>
        <div class="card-tools">
            <a href="add-package" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
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
                <table id="cabs-table" class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Photo</th>
                            <th>Start Stop</th>
                            <th>End Stop</th>
                            <th>Time</th>
                            <th>Time Explain</th>
                            <th>Date Created</th>
                            <th>Trip</th>
                            <th>Meals</th>
                            <th>Activity</th>
                            <th>Hotel</th>
                            <th>Package Id</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $package)
                        <tr>
                            <td class="text-center">{{$package->id}}</td>
                            <td><img src="{{ asset('uploads/Packages/' . $package->package_photo) }}" alt="Package Photo" width="100" height="100"></td>
                            <td>{{$package->root_start_stop}}</td>
                            <td>{{$package->root_end_stop}}</td>
                            <td>{{$package->package_price}}</td>
                            <td>{{$package->time}}</td>
                            <td>{{$package->time_explain}}</td>
                            <td>{{$package->trip_flight}}</td>
                            <td>{{$package->meals}}</td>
                            <td>{{$package->activity}}</td>
                            <td>{{$package->hotel}}</td>
                            <td>{{$package->package_id}}</td>
                            <td>
                                <a href="{{url('/package-edit')}}/{{$package->id}}" class="btn btn-outline-success">Edit</a>
                            </td>
                            <td>
                                <a href="{{url('/package-delete')}}/{{$package->id}}" onclick="return confirm('Are You Sure Package Delete?')" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#cabs-table').DataTable();
    });
</script>
@endsection