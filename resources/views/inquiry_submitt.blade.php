<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta name="csrf-token" content="{{ csrf_token() }}">

</head>
@extends('main')
		@section('main-content')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <div class="container">
        <div class="card-body px-3 pt-0 pb-2">
        <br>
            @foreach($errors->all() as $error)
            <div style="color:red"><li>{{ $error }}</li> </div>
            @endforeach
     
        </div>
        <form method="post" action="submit_inquiry">
            @csrf
  <div class="mb-3">
        <label for="pick">Pick UP City</label>

        <select class="form-select custom-select1" id="dropdown1" name="pick" aria-label="Default select example">
        <option value="">Select Pick UP City</option>

            @foreach($cities as $city)
                <option value="{{$city->city}}">{{$city->city}}</option>
            @endforeach
        </select>
  </div>
  <div class="mb-3">
    <label for="drop">Drop City</label>
        <select class="form-select custom-select2" id="dropdown2" name="drop" aria-label="Default select example">
            <option>Select Drop City</option>
            @foreach($cities as $city)
                <option value="{{$city->city}}">{{$city->city}}</option>
            @endforeach
        </select>
  </div>
  <div class="mb-3">
    <label for="type">Car Type</label>
        <select class="form-select" name="type" id="dropdown3" aria-label="Default select example">
            <option value="">Select Car TYPE</option>

            @foreach($cartypes as $cartype)
                <option value="{{$cartype->id}}">{{$cartype->type}}</option>
            @endforeach
        </select>
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Date</label>
    <input type="date" name="date" class="form-control" id="date">
  </div>
  <?php
    if(Session::has('userid')){
        $name=Session::get('name');
        $email=Session::get('email');
        $number=Session::get('number');
        ?>
        <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" name="number" value="{{$number}}" readonly class="form-control" id="date">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" value="{{$name}}" readonly class="form-control" id="date">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" value="{{$email}}" readonly class="form-control" id="date">
      </div>
      <?php
    }
    else{
        $name='';
        $email='';
        $number='';
        ?>
        <div class="mb-3">
        <label for="number" class="form-label">Number</label>
        <input type="text" name="number"  class="form-control" id="date">
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name"  class="form-control" id="date">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="date">
      </div>
<?php
    }
  ?>
        <div class="mb-3">
            <label for="amt" class="form-label">Amount</label>
            <input type="text" name="amt" readonly class="form-control" id="amt">
        </div>
  
<input type="hidden" name="inqid" value="{{$inqid}}">
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        @if (\Session::has('undefined_route'))
        <script>
            alert('NOT Available');
        </script>
      @endif
    <script>

$(document).ready(function () {
    $(".custom-select1").change(function () {
        var selectedValue = $(this).val();
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

<script type="text/javascript">
   var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content'); 

function checkDropdowns() {
    var dropdown1 = document.getElementById('dropdown1').value;
    var dropdown2 = document.getElementById('dropdown2').value;
    var dropdown3 = document.getElementById('dropdown3').value;
    var amt = document.getElementById('amt');

    if (dropdown1 && dropdown2 && dropdown3) {
        console.log('All three dropdowns selected.');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });

    
      
        $.ajax({
            type: 'post',
            url: 'price_confirm',
            data:  {
                'from': dropdown1,
                'to':dropdown2,
                'type':dropdown3,
            },
            dataType: 'json',
            success: function (result) {
               console.log('jhkjhk',result);
               amt.value=result;
            },
            error: function (err) {
                console.log('c',err);
            }
        });

    } else {
        amt.value='';
    }
}

document.getElementById('dropdown1').addEventListener('change', checkDropdowns);
document.getElementById('dropdown2').addEventListener('change', checkDropdowns);
document.getElementById('dropdown3').addEventListener('change', checkDropdowns);

</script>
        @endsection