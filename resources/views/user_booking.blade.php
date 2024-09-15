@extends('main')
		@section('main-content')
        <style>
            
        </style>
        <div class="container">
            <div class="card">
            <table class="table table-striped-columns">
                <tr>
                    <th>Sr.</th>
                    <th>Pick place</th>
                    <th>Drop place</th>
                    <th>Inquiry ID</th>
                    <th>Trip Type</th>
                    <th>Amt paid(upi)</th>
                    <th>Total Amt</th>
                    <th>Action</th>
                </tr>
            <?php
                $i=1
            ?>
            @foreach($data as $d)
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$d->pickup_ct}}</td>
                    <td>{{$d->drop_ct}}</td>
                    <td>{{$d->inq_id}}</td>
                    <td>{{$d->trip_type}}</td>
                    <td>{{$d->amt_paid}}</td>
                    <td>{{$d->total_amt}}</td>
                    @if($d->paid==0)
                        @if($d->trip_type=='one way')
                        <td><a href="https://safarmobility.in/booking?id={{$d->inq_id}}&type={{$d->car_type}}" class="btn btn-outline-primary">Pay</a></td>
                        @elseif($d->trip_type=='round')
                        <td><a href="https://safarmobility.in/booking1?id={{$d->inq_id}}&type={{$d->car_type}}" class="btn btn-outline-primary">Pay</a></td>
                        @else
                        <td><a href="https://safarmobility.in/local_booking?id={{$d->inq_id}}&type={{$d->car_type}}" class="btn btn-outline-primary">Pay</a></td>
                        @endif
                    @else
                        <td><p>Successfully paid</p></td>
                    @endif

                </tr>
                <?php
                    $i++;
                ?>
                @endforeach
            </table>

            </div>
        </div>

@endsection