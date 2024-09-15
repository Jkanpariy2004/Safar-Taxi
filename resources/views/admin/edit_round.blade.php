<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

@extends('admin.inc.admin_view')
		@section('main-content')

<div class="card card-outline card-warning">
	<div class="card-header">
		<h3 class="card-title">List of City</h3>
		<div class="card-tools">
			<a href="assign_amt" class="btn btn-flat btn-primary"><span class="fas fa-plus"></span>  Assign Amount</a>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="card-body px-3 pt-0 pb-2">
        <br>
            @foreach($errors->all() as $error)
            <div style="color:red"><li>{{ $error }}</li> </div>
            @endforeach
	    </div>

            <form method="post" action="update_round">
                @csrf
            <div class="mb-3">
                <label for="km" class="form-label">Kilometer</label>
                <input type="text" class="form-control" value="{{$data->kilometer}}" name="km" id="km">
            </div>
        
            
            <input type="hidden" class="form-control" value="{{$data->id}}" name="id" id="id">
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


@endsection
