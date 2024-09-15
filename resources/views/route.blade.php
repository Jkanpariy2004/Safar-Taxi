@extends('main')
		@section('main-content')
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
            <div class="row mx-1">
                <div class="col-lg-3">
                    <div  class="text-center">
                        <img style="width: 65%;" src="https://www.onewaycab.org/assets/images/cab/car/5.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
                    </div>
                    <h6 class="text-center">HATCHBACK</h6>
                    <label class="text-center">Available Cabs:
                    @foreach($cars as $car)
                    @if($car->type_id==1)
                    {{$car->cars}},
                    @endif
                    @endforeach
                    </label>                </div>
                <div class="col-lg-3 mt-5" style="display: flex;-webkit-box-align: center;-ms-flex-align: center;align-items: center;-webkit-box-pack: center;-ms-flex-pack: center;justify-content: center;height: 100%;">
                    <ul  style="list-style-type: none;font-size: 14px;"> 
                        <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"  class="mb-2" alt=""> 4 seater</li>
                        <br>

                        <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> 1 luggage</li>
                    </ul>
                    <ul  class="ms-4" style="list-style-type: none;font-size: 14px;"> 
                        <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"  class="mb-2" alt=""> AC</li>
                        <br>
                        <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png" alt=""> Automatic</li>
                    </ul>
                </div>
                <div class="col-lg-3 mt-5">
                    <h4><b class="text-center">₹{{$cityamt->hatchback}} INR</b></h4>
                </div>
                <div class="col-lg-3 mt-5">
                    <form action="/car_confirm" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{$cityamt->hatchback}}">
                        <input type="hidden" name="typeid" value="1">
                        <input type="hidden" name="inq_id" value="{{$inqid}}">
                        <button class="btn btn-outline-danger">Book Now</button>
                    </form>
                </div>
            </div><br><br>
            <div class="row mx-1">
                <div class="col-lg-3">
                    <div  class="text-center">
                        <img style="width: 65%;" src="https://www.onewaycab.org/assets/images/cab/car/6.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
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
                        <li><img src="https://www.onewaycab.org/assets/images/cab/icon/seat.png"  class="mb-2" alt=""> 4 seater</li>
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
                    <h4><b class="text-center">₹{{$cityamt->sedan}} INR</b></h4>
                </div>
                <div class="col-lg-3 mt-5">
                    <form action="/car_confirm" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{$cityamt->sedan}}">
                        <input type="hidden" name="typeid" value="2">
                        <input type="hidden" name="inq_id" value="{{$inqid}}">
                        <button class="btn btn-outline-danger">Book Now</button>
                    </form>
                </div>
            </div><br><br>
            <div class="row mx-1">
                <div class="col-lg-3">
                    <div  class="text-center">
                        <img style="width: 65%;"  src="https://www.onewaycab.org/assets/images/cab/car/7.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
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
                    <h4><b class="text-center">₹{{$cityamt->suv}} INR</b></h4>
                </div>
                <div class="col-lg-3 mt-5">
                    <form action="/car_confirm" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{$cityamt->suv}}">
                        <input type="hidden" name="typeid" value="3">
                        <input type="hidden" name="inq_id" value="{{$inqid}}">
                        <button class="btn btn-outline-danger">Book Now</button>
                    </form>
                </div>
            </div>
          
        </div>
    </section>
    <br>
    <br>

    @endsection