@extends('admin.inc.admin_view')
@section('main-content')
<h1 class="">Welcome to Safar</h1>
<hr>
<style>
  #cover_img_dash {
    width: 100%;
    max-height: 50vh;
    object-fit: cover;
    object-position: bottom center;
  }
</style>
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <a href="category_list">

      <div class="info-box">
        <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-copyright"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Categories</span>
          <span class="info-box-number">
            {{$cartypes}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>

    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="cab_list">

      <div class="info-box">
        <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-car"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Total Cabs</span>
          <span class="info-box-number">
            {{$cars}}

          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>

    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="users">
      <div class="shadow info-box mb-3">

        <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Registered Clients</span>
          <span class="info-box-number">
            {{$users}}
          </span>
        </div>
        <!-- /.info-box-content -->

      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <!--<div class="col-12 col-sm-6 col-md-3">-->
  <!--  <div class="shadow info-box mb-3">-->
  <!--    <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-tasks"></i></span>-->

  <!--    <div class="info-box-content">-->
  <!--      <span class="info-box-text">Pending Bookings</span>-->
  <!--      <span class="info-box-number">-->
  <!--     
          <!--      </span>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->
  <div class="col-12 col-sm-6 col-md-3">
    <a href="cities">

      <div class="shadow info-box mb-3">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Cities</span>
          <span class="info-box-number">
            {{$city}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <a href="one_way">

      <div class="shadow info-box mb-3">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">One Way</span>
          <span class="info-box-number">
            {{$city_log}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <a href="round_trip">

      <div class="shadow info-box mb-3">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Round TriP</span>
          <span class="info-box-number">
            {{$round_log}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <a href="local_trip">

      <div class="shadow info-box mb-3">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Local TriP</span>
          <span class="info-box-number">
            {{$local_amt_logs}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-6 col-md-3">
    <a href="booked_order">

      <div class="shadow info-box mb-3">
        <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-city"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Booking</span>
          <span class="info-box-number">
            {{$inquiry}}
          </span>
        </div>
        <!-- /.info-box-content -->
      </div>
    </a>
    <!-- /.info-box -->
  </div>
</div>
<hr>
<div class="text-center">
  <img src="assets/uploads/1644974880_wallpaper.jpg" alt="System Cover" class="w-100 img-fluid img-thumnail border" id="cover_img_dash">
</div>
@endsection