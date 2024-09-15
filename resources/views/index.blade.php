@extends('main')
@section('main-content')
<br>
<section>
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="card-body px-3 pt-0 pb-2">
                    <br>
                    @if($errors->user->any())

                    @foreach($errors->user->all() as $error)
                    <div style="color:red">
                        <li>{{ $error }}</li>
                    </div>
                    @endforeach

                    <br>
                    @endif
                </div>
                <form action="inquiry_submit" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">number</span>
                        <input type="number" name="number" class="form-control" placeholder="Mob No.">
                    </div>



                    <div class="input-group mb-3">
                        <select name="start_point" class="form-select" aria-label="Default select example" id="StartPointId">
                            <option value="">Select Pickup City</option>
                            @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select name="end_point" class="form-select" aria-label="Default select example" id="EndPointId">
                            <option value="">Drop Place</option>
                            @foreach($cities as $city)
                            <option value="{{$city->city}}">{{$city->city}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Date</span>
                        <input type="date" class="form-control" name="date" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <button type="submit" class="btn btn-solid btn-outline-warning w-100">Check Fare </button>
                </form>



            </div>
        </div>
    </div>
</section>
@endsection