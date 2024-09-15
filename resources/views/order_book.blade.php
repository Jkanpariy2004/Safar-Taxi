@extends('main')
@section('main-content')
<section class="breadcrumb-section flight-sec pt-0 bg-size blur-up lazyloaded " style="background-image: url('https://source.unsplash.com/2400x700/?taxi">
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
    <div class="container mb-3">
        <br>
        <br>
        <?php
        $total = $data->base_fare + 200;
        $gst = $total * 5 / 100;
        $dest = $data->pickup_ct . ' to ' .  $data->drop_ct;
        $final_amt = round($data->total_amt);
        $advance = round($final_amt * 1 / 100);
        if ($data->trip_type == 'round') {

            $perday_allowance = $data->allowance / $data->days;
        }
        ?>
        <div class="row">
            <div class="col-lg-8">
                <div class="card p-3">
                    <h5>Booking Detail</h5>
                    <div class="card-body px-3 pt-0 pb-2">
                        <br>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>

                    <form action="order_book" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            @if(session('userid'))
                            <input type="text" name="name" class="form-control" id="floatingInput" value="{{Session::get('name')}}" readonly placeholder="Enter Name">

                            @elseif($data->name!='')
                            <input type="text" name="name" class="form-control" id="floatingInput" value="{{$data->name}}" readonly placeholder="Enter Name">
                            @else
                            <input type="text" name="name" class="form-control" id="floatingInput">
                            @endif
                            <label for="floatingInput">Enter Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            @if(session('userid'))
                            <input type="text" name="number" class="form-control" id="floatingInput" value="{{Session::get('number')}}" readonly placeholder="Enter Name">

                            @elseif($data->mobile!='')
                            <input type="text" name="number" class="form-control" value="{{$data->mobile}}" readonly id="floatingInput" placeholder="Enter Name">
                            @else
                            <input type="number" name="number" class="form-control" id="floatingInput">
                            @endif
                            <label for="floatingInput">Enter number</label>
                        </div>
                        <div class="form-floating mb-3">
                            @if(session('userid'))
                            <input type="text" name="email" class="form-control" id="floatingInput" value="{{Session::get('email')}}" readonly placeholder="Enter Name">

                            @elseif($data->email!='')
                            <input type="email" name="email" class="form-control" id="floatingInput" value="{{$data->email}}" readonly>
                            @else
                            <input type="email" name="email" class="form-control" id="floatingInput">
                            @endif
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            @if($data->date!='')

                            <input type="date" name="date" class="form-control" value="{{$data->date}}" readonly id="floatingInput" placeholder="Enter Date">
                            @else
                            <input type="date" name="date" class="form-control" id="floatingInput">
                            @endif
                            <label for="floatingInput">Pick Up Date</label>
                        </div>
                        <div class="form-floating mb-3">
                            @if($data->pickup_time!='')
                            <input type="time" class="form-control" name="pick_time" value="{{$data->pickup_time}}" id="floatingInput" placeholder="Enter Date">
                            @else
                            <input type="time" name="pick_time" class="form-control" id="floatingInput" placeholder="Enter time">
                            @endif
                            <label for="floatingInput">Pick Up Time</label>
                        </div>


                        <div class="input-group mb-3" id="advance">
                            <span class="input-group-text">Pay Advance</span>
                            <input type="text" class="form-control" id="pay" name="amt" value="{{$advance}}" readonly aria-label="Amount (to the nearest dollar)">
                            <span class="input-group-text" id="amt_display">₹{{$advance}}</span>
                        </div>

                        OR
                        <br>
                        <br>
                        <label class="form-check-label" for="exampleCheck1">Go with Cash</label>
                        <input type="checkbox" id="exampleCheck1">

                        <br>
                        <br>
                        <input type="hidden" name="final_amt" id="final_amt" value="{{$final_amt}}">
                        <input type="hidden" name="adva_amt" id="adva_amt" value="{{$advance}}">
                        <input type="hidden" name="dest" value="{{$dest}}">
                        <input type="hidden" name="inqid" value="{{$data->inq_id}}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
            <div class="col-lg-4">
                <div class="card p-3">
                    <h5>Booking Summary</h5>
                    <table>
                        <tr>
                            <td><b class="text-dark">Trave Route : </b></td>
                            <td>{{$dest}}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Inquiry NO. - </b> </td>
                            <td>{{$data->inq_id}}</td>
                        </tr>
                        @if($data->trip_type=='round')



                        <tr>
                            <td><b class="text-dark">Km per DAY : </b> </td>
                            <td>300/KM</td>
                        </tr>

                        <tr>
                            <td><b class="text-dark">Total Journey Kilometers : </b></td>
                            <td>{{$data->total_km }}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">KM Rate : </b></td>
                            <td>{{$data->kmrate }}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Total Amt : </b></td>
                            <td>{{$data->base_fare }}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Allowance Per day : </b></td>
                            <td>{{$perday_allowance }}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Days : </b> </td>
                            <td>{{$data->days}}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Total Allowance: </b></td>
                            <td>{{$data->allowance }}</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">Gst ({{$data->gst_in}}%) : </b></td>
                            <td>{{$data->gst }}</td>
                        </tr>
                        @else


                        <tr>
                            <td><b class="text-dark">Base Fare : </b></td>
                            <td>₹{{$data->base_fare }}</td>
                        </tr>

                        <tr>
                            <td><b class="text-dark">Toll Tax : </b></td>
                            <td>Excluded</td>
                        </tr>
                        <tr>
                            <td><b class="text-dark">GST : </b></td>
                            <td> Excluded </td>
                        </tr>
                        @endif

                        <tr>
                            <td><b class="text-dark">Car Type : </b></td>
                            <td>{{$ctype->type }}</td>
                        </tr>
                        @if($data->trip_type=='one way')
                        <?php
                        $originalDate = $data->date;
                        $newDate = date("d-m-Y", strtotime($originalDate));
                        ?>
                        <tr>
                            <td><b class="text-dark">Pick DATE : </b></td>
                            <td>{{$newDate }}</td>
                        </tr>
                        @endif

                    </table>

                    <br>
                    <h6><b class="text-dark"> TOTAL Fare : </b> ₹{{$data->total_amt}}</h6>

                </div>
                <br>
                <div class="card mt-5 p-3">
                    <h3>Note</h3>

                    <h5>You can either make advance payment or full payment</h5>
                </div>

            </div>
        </div>

    </div>


</section>
<br>
<br>
@if(session('err'))
<script>
    alert("{{ session('err') }}");
</script>
@endif
<script>
    const checkbox = document.getElementById('exampleCheck1');
    const final_amt = document.getElementById('final_amt').value;
    const adva_amt = document.getElementById('adva_amt').value;

    // Add a click event listener to the checkbox
    checkbox.addEventListener('click', function() {

        if (checkbox.checked) {
            document.getElementById('pay').value = final_amt;
            document.getElementById("amt_display").innerHTML = "₹" + final_amt;

        } else {
            document.getElementById('pay').value = adva_amt;
            document.getElementById("amt_display").innerHTML = "₹" + adva_amt;

        }
    });
</script>

@endsection