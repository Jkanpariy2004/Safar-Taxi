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
            <?php
            $i=0;
        //    foreach ($cityamt as $camt) {
        //     foreach ($camt['cars'] as $c) {
                    // echo json_encode($cityamt);
            //     }
            // }
        //    die;
            ?>
        @foreach($cityamt as $camt)

            <div class="row mx-1">
                <div class="col-lg-3">
                    <div  class="text-center">
                        <img  src="https://www.onewaycab.org/assets/images/cab/car/5.png" width="160" class="img-fluid blur-up lazyloaded" alt="">
                    </div>
                    <h6 class="text-center">{{$camt['cartype']}}</h6>
                    <label class="text-center">Available Cabs:
                    @foreach($camt['cars'] as $car)
                            {{$car}},
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
                    <h4><b class="text-center">₹{{$camt['final']}} INR</b></h4>
                </div>
                <div class="col-lg-3 mt-5">
                    <form action="/car_confirm" method="post">
                        @csrf
                        <input type="hidden" name="fare" value="{{$camt['final']}}">
                        <input type="hidden" name="typeid" value="{{$camt['type']}}">
                        <input type="hidden" name="inq_id" value="{{$inqid}}">
                        <input type="hidden" name="gst" value="{{$camt['gst']}}">
                        <input type="hidden" name="allowance" value="{{$camt['allwance']}}">
                        <input type="hidden" name="kmrate" value="{{$camt['kmrate']}}">
                        <input type="hidden" name="total" value="{{$camt['total']}}">
                        <button class="btn btn-outline-danger">Book Now</button>
                    </form>
                </div>
            </div><br><br>

            @endforeach

      
           
          
        </div>
    </section>
    <br>
    <br>

    @endsection