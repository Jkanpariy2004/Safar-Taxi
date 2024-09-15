<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
@extends('main')
@section('main-content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<section class="breadcrumb-section flight-sec pt-0 bg-size blur-up lazyloaded " style="background-image: url('https://source.unsplash.com/2800x1000/?taxi">
    <img src="https://www.onewaycab.org/assets/images/cab//slide.png" class="bg-img img-fluid blur-up lazyload" alt="" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-right breadcrumb-content pt-0">
                    <!-- <div>
                            <h2>cab search</h2>
                            <nav aria-label="breadcrumb" class="theme-breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="https://www.onewaycab.org/">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">cab search</li>
                                </ol>
                            </nav>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <select class="form-select custom-select1 mb-2" id="dropdown1" name="drop" aria-label="Default select example">

                    <option>Pick up from</option>
                    @foreach($cities as $city)
                    <option value="{{$city->city}}">{{$city->city}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-sm-12">
                <select class="form-select custom-select2" id="dropdown2" name="drop" aria-label="Default select example">
                    <option selected>To destinatation</option>
                    @foreach($cities as $city)
                    <option value="{{$city->city}}">{{$city->city}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <br>
        </div>
    </div>
</section>
<section id="details_section">
    <br>
    <div class="container">
        <div class="row mx-1">
            <div class="col-lg-3">
                <div class="text-center">
                    <img src="https://www.onewaycab.org/assets/images/cab/car/5.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
                </div>
                <h6 class="text-center">HATCHBACK</h6>
                <label class="text-center">Available Cabs:
                    @foreach($cars as $car)
                    @if($car->type_id==1)
                    {{$car->cars}},
                    @endif
                    @endforeach
                </label>
            </div>
            <div class="col-lg-3 mt-5" style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;height: 100%;">
                <ul style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> 4 seater</li>
                    <br>

                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> 1 luggage</li>
                </ul>
                <ul class="ms-4" style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> AC</li>
                    <br>
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> Automatic</li>
                </ul>
            </div>
            <div class="col-lg-3 mt-5">
                <h4><b id="hatch_txt" class="text-center">{{$cityamt->hatchback}}</b></h4>
            </div>
            <div class="col-lg-3 mt-5">
                <form action="/car_confirm" method="post">
                    @csrf
                    <input type="hidden" name="fare" id="hatch_amt" value="{{$cityamt->hatchback}}">
                    <input type="hidden" name="typeid" value="1">
                    <input type="hidden" name="inq_id" class="inqid" value="{{$inqid}}">
                    <button class="btn btn-outline-danger">Book Now</button>
                </form>
            </div>
        </div><br><br>
        <div class="row mx-1">
            <div class="col-lg-3">
                <div class="text-center">
                    <img src="https://www.onewaycab.org/assets/images/cab/car/6.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
                </div>
                <h6 class="text-center">SEDAN</h6>
                <label class="text-center">Available Cabs:
                    @foreach($cars as $car)
                    @if($car->type_id==2)
                    {{$car->cars}},
                    @endif
                    @endforeach
                </label>
            </div>
            <div class="col-lg-3 mt-5" style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;height: 100%;">
                <ul style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> 4 seater</li>
                    <br>

                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> 1 luggage</li>
                </ul>
                <ul class="ms-4" style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> AC</li>
                    <br>

                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> Automatic</li>
                </ul>
            </div>
            <div class="col-lg-3 mt-5">
                <h4><b id="sedan_txt" class="text-center">{{$cityamt->sedan}}</b></h4>
            </div>
            <div class="col-lg-3 mt-5">
                <form action="/car_confirm" method="post">
                    @csrf
                    <input type="hidden" name="fare" id="sedan_amt" value="{{$cityamt->sedan}}">
                    <input type="hidden" name="typeid" value="2">
                    <input type="hidden" name="inq_id" class="inqid" value="{{$inqid}}">
                    <button class="btn btn-outline-danger">Book Now</button>
                </form>
            </div>
        </div><br><br>
        <div class="row mx-1">
            <div class="col-lg-3">
                <div class="text-center">
                    <img src="https://www.onewaycab.org/assets/images/cab/car/7.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
                </div>
                <h6 class="text-center">Suv</h6>
                <label class="text-center">Available Cabs:
                    @foreach($cars as $car)
                    @if($car->type_id==3)
                    {{$car->cars}},
                    @endif
                    @endforeach
                </label>
            </div>
            <div class="col-lg-3 mt-5" style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;height: 100%;">
                <ul style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> 4 seater</li>
                    <br>
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> 1 luggage</li>
                </ul>
                <ul class="ms-4" style="list-style-type: none;font-size: 14px;">
                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" class="mb-2" alt=""> AC</li>
                    <br>

                    <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> Automatic</li>
                </ul>
            </div>
            <div class="col-lg-3 mt-5">
                <h4><b id="suv_txt" class="text-center">{{$cityamt->suv}}</b></h4>
            </div>
            <div class="col-lg-3 mt-5">
                <form action="/car_confirm" method="post">
                    @csrf
                    <input type="hidden" name="fare" id="suv_amt" value="{{$cityamt->suv}}">
                    <input type="hidden" name="typeid" value="3">
                    <input type="hidden" name="inq_id" class="inqid" value="{{$inqid}}">
                    <button class="btn btn-outline-danger">Book Now</button>
                </form>
            </div>
        </div>

    </div>
</section>
<br>
<br>

<script>
    $(document).ready(function() {
        $(".custom-select1").change(function() {
            var selectedValue = $(this).val();
            $(".custom-select2").each(function() {
                $("option", this).each(function() {
                    if ($(this).val() === selectedValue) {
                        $(this).prop("disabled", true);
                    } else {
                        $(this).prop("disabled", false);
                    }
                });
            });
        });
        $(".custom-select2").change(function() {
            var selectedValue = $(this).val();
            $(".custom-select1").each(function() {
                $("option", this).each(function() {
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
        var amt = document.getElementById('amt');
        var hatch_amt = document.getElementById('hatch_amt');
        var hatch_txt = document.getElementById('hatch_txt');
        var sedan_txt = document.getElementById('sedan_txt');
        var sedan_amt = document.getElementById('sedan_amt');
        var suv_amt = document.getElementById('suv_amt');
        var suv_txt = document.getElementById('suv_txt');
        var inqid = document.querySelectorAll('.inqid');

        if (dropdown1 && dropdown2) {
            console.log('All three dropdowns selected.');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });



            $.ajax({
                type: 'post',
                url: 'amt_change',
                data: {
                    'from': dropdown1,
                    'to': dropdown2,
                },
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    var details_section = document.getElementById('details_section');
                    if (result == 'NOT Available') {

                        details_section.style.display = 'none'
                        alert('Not Available')
                    } else {
                        details_section.style.display = 'block'

                        suv_amt.value = result['amt']['suv']
                        sedan_amt.value = result['amt']['sedan']
                        hatch_amt.value = result['amt']['hatchback']

                        hatch_txt.innerHTML = result['amt']['hatchback']
                        sedan_txt.innerHTML = result['amt']['sedan']
                        suv_txt.innerHTML = result['amt']['suv']

                        inqid.forEach(function(input) {
                            input.value = result['inqid']
                        });
                    }

                },
                error: function(err) {
                    console.log('c', err);
                }
            });

        } else {
            amt.value = '';
        }
    }

    document.getElementById('dropdown1').addEventListener('change', checkDropdowns);
    document.getElementById('dropdown2').addEventListener('change', checkDropdowns);
</script>

@endsection