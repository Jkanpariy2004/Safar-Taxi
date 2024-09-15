@extends('main')
		@section('main-content')
        <style>
            
        </style>
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
    <?php
  $parts = explode("|", $check->drop_ct);
  $tithalValue = $parts[2];

    ?>

        <div class="container">
            <div class="row">
                
                <div class="col-lg-3 col-sm-12 mb-3 card" style="padding-right: 20px;padding-left: 20px;">
                <form action="/car_confirm" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{$cityamt->hatchback}}">
                        <input type="hidden" name="typeid" value="1">
                        <input type="hidden" name="inq_id" value="{{$inqid}}">
                        <input type="hidden" name="gst" value="">
                        <input type="hidden" name="allowance" value="">
                        <input type="hidden" name="kmrate" value="">
                        <input type="hidden" name="total" value="">
                    
                    
                        <br>
                    <div class="row">

                        <div class="col-6 mb-2"style="background:#EFF0F1">
                            Cab Type : 
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Hatchback
                        </div>
                   
                        <div class="col-6 mb-2"style="background:#EFF0F1">
                            Fare:
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                        {{$cityamt->hatchback}}
                        </div>

                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Included KM: 
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            {{$parts[1]}}
                        </div>

                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Included Hrs: 
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            {{$tithalValue}}                    
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Extra Minute<br> Rate:           
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Rs.2 / Minute 
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Extra KM Rate:
                        </div>
                        <div class="col-6 mb-2" style="background:#EFF0F1">
                            Rs.12 / KM
                        </div>
                    </div>
                    <br>
                    <p>Available Cabs:@foreach($cars as $car)
                        @if($car->type_id==1)
                        {{$car->cars}},
                        @endif
                        @endforeach</p>
                    <br>
                    <div class="row">

                        <div class="col-6">
                            <img src="https://oneway.cab/img/booking/small/m-user.png" style="width: 30px;padding: 2px;">
                            <span class="span_text">4</span>
                        </div>
                        <div class="col-6">
                            <img src="https://oneway.cab/img/booking/small/m-suitcase.png" style="width: 30px;">
                            <span class="span_text">1</span>
                        </div>
                     
                    </div>
                    <br>
                    
                    <div class="text-center">
                        <button class="btn btn-outline-warning">Book Now</button>
                    </div>
                    <br>

                    </form>
                </div>
                <br>

                <div class="col-lg-1 col-sm-12">
                </div>

                <div class="col-lg-3 col-sm-12 mb-3 card"  style="padding-right: 20px;padding-left: 20px;">
                    <form action="/car_confirm" method="post">
                    @csrf
                    <input type="hidden" name="fare" value="{{$cityamt->sedan}}">
                    <input type="hidden" name="typeid" value="2">
                    <input type="hidden" name="inq_id" value="{{$inqid}}">
                    <input type="hidden" name="gst" value="">
                    <input type="hidden" name="allowance" value="">
                    <input type="hidden" name="kmrate" value="">
                    <input type="hidden" name="total" value="">
                    <br>

                <div class="row">
                        <br>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Cab Type : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        sedan
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Fare :
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                       {{$cityamt->sedan}}
                    </div>

                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Included KM : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        {{$parts[1]}}
                    </div>

                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Included Hrs : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        {{$tithalValue}}                    
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Extra Minute<br> Rate :           
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Rs.2.5 / Minute 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                            Extra KM Rate:
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Rs.15 / KM
                    </div>
                </div>
                <br>
                    <p>Available Cabs:@foreach($cars as $car)
                    @if($car->type_id==2)
                    {{$car->cars}},
                    @endif
                    @endforeach</p>
                <br>
                <div class="row">

                    <div class="col-6">
                        <img src="https://oneway.cab/img/booking/small/m-user.png" style="width: 30px;padding: 2px;">
                        <span class="span_text">4</span>
                    </div>
                    <div class="col-6">
                        <img src="https://oneway.cab/img/booking/small/m-suitcase.png" style="width: 30px;">
                        <span class="span_text">2</span>
                    </div>

                    </div>
                    <br>

                <div class="text-center">
                    <button class="btn btn-outline-warning">Book Now</button>
                </div>
                <br>

                </form>

            </div>
            <br>
            <br>
                <div class="col-lg-1 col-sm-12" >
                </div>

                <div class="col-lg-3 col-sm-12 card"  style="padding-right: 20px;padding-left: 20px;">
                    <form action="/car_confirm" method="post">
                    @csrf
                    <input type="hidden" name="fare" value="{{$cityamt->suv}}">
                    <input type="hidden" name="typeid" value="3">
                    <input type="hidden" name="inq_id" value="{{$inqid}}">
                    <input type="hidden" name="gst" value="">
                    <input type="hidden" name="allowance" value="">
                    <input type="hidden" name="kmrate" value="">
                    <input type="hidden" name="total" value="">
                    <br>
                    <div class="row">
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Cab Type : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Suv
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Fare :
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                    {{$cityamt->suv}}
                    </div>

                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Included KM : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        {{$parts[1]}}
                    </div>

                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Included Hrs : 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        {{$tithalValue}}                    
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Extra Minute<br> Rate :           
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Rs.3 / Minute 
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                            Extra KM Rate:
                    </div>
                    <div class="col-6 mb-2" style="background:#EFF0F1">
                        Rs.15 / KM
                    </div>
                    </div>
                    <br>
                    <p>Available Cabs:@foreach($cars as $car)
                    @if($car->type_id==3)
                    {{$car->cars}},
                    @endif
                    @endforeach</p>
                    <br>
                    <div class="row">

                    <div class="col-6">
                        <img src="https://oneway.cab/img/booking/small/m-user.png" style="width: 30px;padding: 2px;">
                        <span class="span_text">6</span>
                    </div>
                    <div class="col-6">
                        <img src="https://oneway.cab/img/booking/small/m-suitcase.png" style="width: 30px;">
                        <span class="span_text">3</span>
                    </div>

                    </div>
                    <br>

                <div class="text-center">
                    <button class="btn btn-outline-warning">Book Now</button>
                </div>
                <br>

                </form>
             
                </div>
            </div>
        </div>

    <br>
    <br>

    @endsection