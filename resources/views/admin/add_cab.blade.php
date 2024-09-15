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
	<div class="card-body">
		<form action="cab_store" method="post" id="cab-form">
            @csrf
            <div class="form-group">
				<label for="category_id" class="control-label">Category</label>
                <select name="category_id" id="category_id" class="custom-select select2">
                    @foreach($cartypes as $type)
                        <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
			</div>
		
			<div class="form-group">
				<label for="cab_model" class="control-label">Vehicle Model</label>
                <input name="cab_model" id="cab_model" type="text" class="form-control rounded-0" value="" required>
			</div>
			
			<div class="form-group">
				<label for="cab_base_fare" class="control-label">Vehicle Base fare</label>
                <input name="cab_base_fare" id="cab_base_fare" type="text" class="form-control rounded-0" value="" required>
			</div>
			
				<div class="form-group">
				<label for="cab_km" class="control-label">Vehicle Km Charges</label>
                <input name="cab_km" id="cab_km" type="text" class="form-control rounded-0" value="" required>
			</div>
			<div class="form-group">
				<label for="cab_seat" class="control-label">Vehicle Seat</label>
                <input name="cab_seat" id="cab_seat" type="text" class="form-control rounded-0" value="" required>
			</div>
		
          
       
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="cab-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=cabs">Cancel</a>
	</div>
</div>

@endsection
