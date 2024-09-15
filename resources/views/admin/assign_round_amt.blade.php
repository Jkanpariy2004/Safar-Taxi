@extends('admin.inc.admin_view')
		@section('main-content')
        <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="card card-outline card-info rounded-0">
	<div class="card-header">
		<h3 class="card-title">Safar</h3>
	</div>
	<div class="card-body">
		<form action="round_amt_log" method="post" id="cab-form">
            @csrf
            @foreach($types as $type)
            <div class="form-group">		
                <label for="type" class="control-label">{{$type->type}}</label>
               <div class="row city_div mb-5" style="border:1px solid black;background:grey" id="city_div">
               <div class="form-group col-12 col-lg-4">
                <input type="hidden" name="type[]" value="{{$type->id}}">
                <label for="gst" class="control-label">GST</label> 
                <input name="gst[]" id="gst" type="number" class="form-control rounded-0" value="" required>

                </div>
               <div class="form-group col-12 col-lg-4">
                <label for="kmrate" class="control-label">Per km.rate</label> 
                <input name="kmrate[]" id="kmrate" type="number" class="form-control rounded-0" value="" required>

                </div>
               <div class="form-group col-12 col-lg-4">
                <label for="allowance" class="control-label">Allowance</label> 
                <input name="allowance[]" id="allowance" type="number" class="form-control rounded-0" value="" required>

                </div>
               <br>
            </div>
            </div>
            @endforeach

          
            
          
                
            
		
          
       
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="cab-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=cabs">Cancel</a>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



@endsection
