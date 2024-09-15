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
        <h3 class="card-title">List of drivers</h3>
        <!-- <div class="card-tools">
            <a href="add-package" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</a>
        </div> -->
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid" style="overflow-x: auto;">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <table id="cabs-table" class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>DL no.</th>
                            <th>DL Photo</th>
                            <th>Profile Photo</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No.</th>
                            <th>Vehicle Type</th>
                            <th>RCBook No</th>
                            <th>RCBook Photo</th>
                            <th>Insurance Policy</th>
                            <th>Status</th>
                            <!-- <th>Edit</th>
                            <th>Delete</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($drivers as $driver)
                        <tr>
                            <td class="text-center">{{$driver->id}}</td>
                            <td>{{$driver->name}}</td>
                            <td>{{$driver->email}}</td>
                            <td>{{$driver->mobile}}</td>
                            <td>{{$driver->gender}}</td>
                            <td>{{$driver->address}}</td>
                            <td>{{$driver->dl_no}}</td>
                            <td><button class="btn btn-info" alt="DL Photo" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/driver/' . $driver->dl_photo) }}">Show Image</button></td>
                            <td><button class="btn btn-info" alt="Profile Photo" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/driver/' . $driver->profile_photo) }}">Show Image</button></td>
                            <td>{{$driver->vehicle_name}}</td>
                            <td>{{$driver->vehicle_no}}</td>
                            <td>{{$driver->vehicle_type}}</td>
                            <td>{{$driver->rcbook_no}}</td>
                            <td><button class="btn btn-info" alt="RC Book Photo" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/driver/' . $driver->rcbook_photo) }}">Show Image</button></td>
                            <td><button class="btn btn-info" alt="Insurance Photo" data-toggle="modal" data-target="#imageModal" data-image="{{ asset('uploads/driver/' . $driver->insurance_photo) }}">Show Image</button></td>
                            <td>
                                @if ($driver->status == 'active')
                                <form action="{{ url('/toggleStatus')}}/{{$driver->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="inactive">
                                    <button type="submit" class="btn btn-link p-0">Active</button>
                                </form>
                                @else
                                <form action="{{ url('/toggleStatus')}}/{{$driver->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="status" value="active">
                                    <button type="submit" class="btn btn-link p-0">Inactive</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel">Image</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">
                                <img id="modalImage" src="" alt="Image" class="img-fluid" style="width: 500px; height: 500px;">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Include Bootstrap JS and jQuery -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

                <script>
                    $('#imageModal').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget); // Button that triggered the modal
                        var image = button.data('image'); // Extract info from data-* attributes
                        var modal = $(this);
                        modal.find('#modalImage').attr('src', image);
                    });
                </script>
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