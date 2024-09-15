@extends('admin.inc.admin_view')
		@section('main-content')
<style>
	#cimg{
		width: 15vw;
		height: 20vh;
		object-fit:scale-down;
		object-position:center center;
	}
</style>
<?php
$image_path= 'assets/dist/img/no-image-available.png';
?>
<div class="card card-outline card-info rounded-0">
	<div class="card-header">
		<h3 class="card-title">Safar</h3>
	</div>
	   @foreach($errors->all() as $error)
            <div style="color:red"><li>{{ $error }}</li> </div>
            @endforeach
	<div class="card-body">
		<form action="city_store" method="post" id="cab-form">
            @csrf
            <div class="form-group">
				<label for="city" class="control-label">Enter City</label>
                <input name="city" id="city" type="text" class="form-control rounded-0" value="" required>

			</div>

          
       
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="cab-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=cabs">Cancel</a>
	</div>
</div>



@endsection
