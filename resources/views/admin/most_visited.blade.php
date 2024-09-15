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
        <form action="/add-most-visited" method="post" enctype="multipart/form-data">
            @csrf
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-3">
                <label for="p_title" class="form-label">Place Title:</label>
                <input name="p_title" id="p_title" type="text" class="form-control" placeholder="Enter Place Title">
                @error('p_title')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="p_photo" class="form-label">Place Photo:</label>
                <input name="p_photo[]" id="p_photo" type="file" class="form-control" value="" multiple>
                @error('p_photo')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="p_description" class="form-label">Place Description:</label>
                <textarea name="p_description" id="p_description" type="text" class="form-control" placeholder="Enter Place Description"></textarea>
                @error('p_description')
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