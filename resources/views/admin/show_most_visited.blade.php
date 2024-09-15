<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>


    <!-- Add this in the <head> section of your HTML -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add this before the closing </body> tag -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
        <h3 class="card-title">List of Best Places</h3>
        <div class="card-tools">
            <a href="a-most-visited" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>Add Place</a>
        </div>
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
                            <th>ID</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mostVisitedPlaces as $place)
                        <tr>
                            <td>{{ $place->id }}</td>
                            <td>{{ $place->p_title }}</td>
                            <td>
                                @php
                                $imageNames = json_decode($place->p_photo, true);
                                @endphp
                                @if(!empty($imageNames))
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#imageModal{{ $place->id }}">
                                    View Images
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="imageModal{{ $place->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $place->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ $place->id }}">{{ $place->p_title }} Images</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @foreach($imageNames as $image)
                                                @if(isset($image['stored_name']) && isset($image['original_name']))
                                                <img src="{{ asset('uploads/place/'.$image['stored_name']) }}" alt="{{ $image['original_name'] }}" class="mb-1" width="49%" height="50%">
                                                @endif
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                            <td>{{ $place->p_description }}</td>
                            <td><a href="#" class="btn btn-outline-success">Edit</a></td>
                            <td><a href="{{ url('/most-visited/delete') }}/{{ $place->id }}" onclick="return confirm('Are Youe Sure Delete This Place?')" class="btn btn-outline-danger">Delete</a></td>
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