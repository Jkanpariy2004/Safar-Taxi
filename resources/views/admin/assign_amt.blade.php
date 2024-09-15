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
		<form action="amt_store" method="post" id="cab-form">
            @csrf
            <div class="form-group">		
                <label for="city" class="control-label">Enter City</label>
                <select class="form-select custom-select1" name="city" aria-label="Default select example">
                        <option value="">Select Pick UP City</option>
                    @foreach($cities as $city)
                        <option value="{{$city->city}}">{{$city->city}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="amt_add">
                <label class="form-check-label" for="amt_add">Add Amount</label>
            </div>
            
            <div id="city_section" style="display:none">
            </div>
                
            <a id="add" style="display:none" class="btn btn-outline-warning">Add another</a>
            
		
          
       
		</form>
	</div>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="cab-form">Save</button>
		<a class="btn btn-flat btn-default" href="?page=cabs">Cancel</a>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    const checkbox = document.getElementById("amt_add");
    const city_section = document.getElementById("city_section");
    const add = document.getElementById("add");
    const remove = document.getElementById("remove");
    const element = document.getElementsByClassName("city_div");

    checkbox.addEventListener("change", function() {
        if (!this.checked) {
            city_section.innerHTML = '';
            add.style.display='none';
            city_section.style.display='none';

        }

        if (this.checked) {
            city_section.style.display='block';
            add.style.display='block';
            let div=' <div class="row city_div mb-5" style="border:1px solid black;background:grey" id="city_div"><div class="form-group col-12 col-lg-12"><label for="destiny" class="control-label">Destination</label> <select class="form-select custom-select2" name="destiny[]" aria-label="Default select example"><option value="">Select Pick UP City</option>@foreach($cities as $city)<option value="{{$city->city}}">{{$city->city}}</option>@endforeach</select></div><div class="form-group col-6 col-lg-6"><label for="sedan" class="control-label">Amount for Sedan</label><input name="sedan[]" id="sedan" type="text" class="form-control rounded-0" value="" required></div><br><div class="form-group col-6 col-lg-6"><label for="suv" class="control-label">Amount for SUV</label><input name="suv[]" id="suv" type="text" class="form-control rounded-0" value="" required></div><br><div class="form-group col-6 col-lg-6"><label for="hatchback" class="control-label">Amount for Hatchback</label><input name="hatchback[]" id="hatchback" type="text" class="form-control rounded-0" value="" required></div><div class="container"><a id="remove" class="btn removeButton btn-outline-danger">Remove</a></div><br></div>'
            $(div).appendTo('#city_section');

        }
    });



    // add.addEventListener("click", function() {
    //         let div=' <div class="row city_div mb-5" style="border:1px solid black;background:grey" id="city_div"><div class="form-group col-6 col-lg-6"><label for="destiny" class="control-label">Destination</label><input name="destiny[]" id="destiny" type="text" class="form-control rounded-0" value="" required></div><div class="form-group col-6 col-lg-6"><label for="amt" class="control-label">Amount</label><input name="amt[]" id="amt" type="text" class="form-control rounded-0" value="" required></div><br><div class="container"><a id="remove" class="btn removeButton btn-outline-danger">Remove</a></div><br></div>'
    //         $(div).appendTo('#city_section');

    // });
    add.addEventListener("click", function() {
            let div=' <div class="row city_div mb-5" style="border:1px solid black;background:grey" id="city_div"><div class="form-group col-12 col-lg-12"><label for="destiny" class="control-label">Destination</label><select class="form-select custom-select2" name="destiny[]" aria-label="Default select example"><option value="">Select Pick UP City</option>@foreach($cities as $city)<option value="{{$city->city}}">{{$city->city}}</option>@endforeach</select></div><div class="form-group col-6 col-lg-6"><label for="sedan" class="control-label">Amount for Sedan</label><input name="sedan[]" id="sedan" type="text" class="form-control rounded-0" value="" required></div><br><div class="form-group col-6 col-lg-6"><label for="suv" class="control-label">Amount for SUV</label><input name="suv[]" id="suv" type="text" class="form-control rounded-0" value="" required></div><br><div class="form-group col-6 col-lg-6"><label for="hatchback" class="control-label">Amount for Hatchback</label><input name="hatchback[]" id="hatchback" type="text" class="form-control rounded-0" value="" required></div><div class="container"><a id="remove" class="btn removeButton btn-outline-danger">Remove</a></div><br></div>'
            $(div).appendTo('#city_section');

    });

    $('#city_section').on('click', '.removeButton', function() {
    // Find the parent div with id="city_div" and remove it
        $(this).closest('.city_div').remove();
    });


    $(document).ready(function () {
    $(".custom-select1").change(function () {
        var selectedValue = $(this).val();
        console.log(selectedValue);
        $(".custom-select2").each(function () {
            $("option", this).each(function () {
                if ($(this).val() === selectedValue) {
                    $(this).prop("disabled", true);
                } else {
                    $(this).prop("disabled", false);
                }
            });
        });
    });
    $(".custom-select2").change(function () {
        var selectedValue = $(this).val();
        console.log(selectedValue);
        $(".custom-select1").each(function () {
            $("option", this).each(function () {
                if ($(this).val() === selectedValue) {
                    $(this).prop("disabled", true);
                } else {
                    $(this).prop("disabled", false);
                }
            });
        });
    });
});

</script>

@endsection
