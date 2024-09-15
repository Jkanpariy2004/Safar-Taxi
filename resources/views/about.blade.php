<head>
  <meta charset="utf-8">
  <title>Safar</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">

  <!-- Favicon -->
  <link href="assets/img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

  <!-- Template Stylesheet -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .flip-card {
      background-color: transparent;
      width: 300px;
      height: 300px;
      perspective: 1000px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

    .flip-card-front {
      background-color: #bbb;
      color: black;
    }

    .flip-card-back {
      background-color: #50524f;
      color: white;
      transform: rotateY(180deg);
    }

    html,
    body {
      overflow-x: hidden;
    }
  </style>
</head>

@extends('main')
@section('main-content')

<div class="container-fluid page-header">
  <!-- <img class="w-50" src="assets/img/about.png" alt=""> -->
  <h1>About US</h1>

  <!-- <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="https://source.unsplash.com/2400x700/?cab" class="d-block w-100">
    </div>
    <div class="carousel-item">
    <img src="https://source.unsplash.com/2400x700/?taxi" class="d-block w-100">
    </div>
    <div class="carousel-item">
    <img src="https://source.unsplash.com/2400x700/?hatchback" class="d-block w-100">
    </div>

    <div class="carousel-item">
    <img src="https://source.unsplash.com/2400x700/?sedan" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div> -->
</div>


<br>
<br>
<h2 class="text-center">About Us</h2>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-12">
      <!-- <img src="../assets/images/taxi.jpg" class="d-block w-100"> -->
      <img src="https://source.unsplash.com/1600x600?taxi" class="d-block w-100">

    </div>
    <div class="col-lg-6 col-md-12">
      <div>

        <p class="text-center text-dark">
          Welcome to Safar, your premier choice for reliable and convenient transportation services. With a commitment to providing top-notch customer experiences, we're here to ensure you reach your destination safely, comfortably, and on time.
          We take pride in offering top-notch cab services that cater to your travel needs with utmost professionalism and convenience. Our commitment to quality and customer satisfaction sets us apart as a premier choice for all your transportation requirements


        </p>
      </div>
    </div>


  </div>
</div>
<br>
<br>


<hr>
<br>
<br>
<!--<div class="container">-->
<!--  <h2 class="text-center">Our Clients</h2>-->

<!--    <br>-->
<!--    <br>-->
<!--    <div class="row">-->
<!--        <div class="col-lg-12 col-xl-4 col-md-12 mb-3">-->
<!--            <div class="flip-card">-->
<!--                <div class="flip-card-inner">-->
<!--                    <div class="flip-card-front">-->
<!--                    <br>-->
<!--                    <img style="border-radius: 50%;" class="img-fluid ml-n4" src="assets/img/testimonial-3.jpg" alt="">-->
<!--                    <br>-->
<!--                    <h1>John Doe</h1> -->
<!--                    <h6>Architect & Engineer</h6> -->
<!--                    </div>-->
<!--                    <div class="flip-card-back">-->
<!--                    <h6 class="mt-5 mx-1">-->
<!--                    With my new account in place, I proceeded to book my first ride. The booking process was impressively user-friendly. I simply entered my current location and destination, and the website provided auto-suggestions as I typed, ensuring accuracy. Selecting my preferred vehicle type was a breeze, and I appreciated the transparency in pricing with the estimated fare displayed.</h6>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-12 col-xl-4 col-md-12 mb-3">-->
<!--            <div class="flip-card">-->
<!--                <div class="flip-card-inner">-->
<!--                    <div class="flip-card-front">-->
<!--                    <br>-->
<!--                    <img style="border-radius: 50%;" class="img-fluid ml-n4" src="assets/img/testimonial-4.jpg" alt="">-->
<!--                    <br>-->
<!--                    <h1>Mark Stone</h1> -->
<!--                    <h6>Architect & Engineer</h6> -->
<!--                    </div>-->
<!--                    <div class="flip-card-back">-->
<!--                    <h6 class="mt-5 mx-1">-->
<!--                    When the cab arrived, I was greeted by a friendly and professional driver who made me feel comfortable and safe. The cab itself was clean and well-maintained, and I appreciated the modern amenities it offered. I felt like I was in good hands as we embarked on my journey to the destination.                                </h6>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-lg-12 col-xl-4 col-md-12 mb-3">-->
<!--            <div class="flip-card">-->
<!--                <div class="flip-card-inner">-->
<!--                    <div class="flip-card-front">-->
<!--                    <br>-->
<!--                    <img style="border-radius: 50%;" class="img-fluid ml-n4" src="assets/img/testimonial-1.jpg" alt="">-->
<!--                    <br>-->
<!--                    <h1>Mike Waugh</h1> -->
<!--                    <h6>Architect & Engineer</h6> -->
<!--                    </div>-->
<!--                    <div class="flip-card-back">-->
<!--                    <h6 class="mt-5 mx-1">-->
<!--                    After reaching my destination, the payment process was a breeze. I was presented with multiple payment options, including credit cards, digital wallets, or cash. The fare breakdown was clear and transparent, eliminating any surprises. I opted for a digital payment method and received an electronic receipt via email for my records.-->
<!--                </h6>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->



<!--    </div>-->
<!--</div>-->
<!--<br>-->
<!--<br>-->
<!--<hr>-->
<!--<br>-->
<!--<br>-->
<div class="container">
  <h2>Mission and Values:</h2>

  <br>
  <p class="text-dark"> Our primary mission at Safar cab is to redefine the way people experience travel. We're committed to providing our customers with seamless and enjoyable journeys that go beyond mere transportation. Our focus isn't solely on getting you from point A to point B – it's about making the entire journey a comfortable, convenient, and delightful experience. We understand that every ride matters, and our mission is to exceed your expectations at every step.</p>
  <br>
  <p class="text-dark">Your safety is our top priority. We adhere to the highest safety standards, employing experienced drivers and maintaining our vehicles to the utmost quality to ensure your journey is secure.We understand the importance of being punctual and dependable. Our commitment to reliability means you can trust us to be there when you need us, ensuring you reach your destination on time. We believe that a comfortable ride enhances the overall travel experience. Our vehicles are equipped with modern amenities and kept in pristine condition to ensure your comfort throughout the journey.</p>
</div>
<br>
<br>
<hr>
<br>
<br>
<div class="container">
  <h2>Establishment:</h2>

  <br>
  <p class="text-dark">Established with a vision to revolutionize the way people travel,Safar Cab was founded in [Year]. What started as a small initiative has now grown into a leading cab service provider, connecting countless passengers to their destinations safely and comfortably.</p>

</div>
<br>
<br>
<hr>
<br>
<br>
<div class="container">
  <h2>Why Choose Us?</h2>

  <dl>
    <dt>⚫ Professional Drivers:</dt>
    <dd>Our team of experienced and licensed drivers ensures your safety and comfort throughout your journey. They are well-trained in customer service and road safety protocols</dd>
    <dt>⚫ Variety of Vehicles:</dt>
    <dd>Whether you're traveling solo or in a group, we offer a diverse fleet of vehicles to accommodate your needs, from standard sedans to spacious SUVs.</dd>
    <dt>⚫ 24/7 Availability:</dt>
    <dd>We understand that your travel needs can arise at any time. That's why we operate round the clock, ensuring that you have access to our services whenever you need them.</dd>
    <dt>⚫ Affordable Pricing:</dt>
    <dd> We believe in transparent and competitive pricing, providing you with value for your money without compromising on quality.</dd>
    <dt>⚫ Clean and Well-Maintained Vehicles:</dt>
    <dd>Your comfort is our priority. Our vehicles are regularly serviced and cleaned to ensure a pleasant and hygienic travel experience.</dd>
    <dt>⚫ Advanced Booking System:</dt>
    <dd>With our user-friendly online booking platform and mobile app, you can easily reserve a cab, track your ride, and manage your bookings effortlessly.</dd>
  </dl>
  <br>
  <h3>Community Involvement</h3>
  <p class="text-dark">As a responsible member of the community, Safar is dedicated to giving back. We actively participate in local initiatives, environmental conservation projects, and charitable activities to contribute positively to society.</p>
  <b>Join us in making every journey memorable and enjoyable!</b>
</div>
<br>
<br>


@endsection