<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Safar</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="/assets/img/icon_logo.jpg">

    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="/assets_login/css/preloader.css">
    <link rel="stylesheet" href="/assets_login/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets_login/css/meanmenu.css">
    <link rel="stylesheet" href="/assets_login/css/animate.min.css">
    <link rel="stylesheet" href="/assets_login/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets_login/css/swiper-bundle.css">
    <link rel="stylesheet" href="/assets_login/css/backToTop.css">
    <link rel="stylesheet" href="/assets_login/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets_login/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="/assets_login/css/elegantFont.css">
    <link rel="stylesheet" href="/assets_login/css/default.css">
    <link rel="stylesheet" href="/assets_login/css/style.css">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <style>
        /* .alert.alert-danger {
      background-color: transparent;
      padding: 0;
      color: red;
      border: none;
      margin-top: 0px;
      margin-bottom: 0px;
      font-size: 17px;
    } */

        .sign__input i {
            position: absolute;
            top: 48%;
            -webkit-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            left: 25px;
            font-size: 20px;
            color: #8e8c94;
        }

        /* .sign__input input:focus {
         outline: none;
         background: #ffffff;
         border-color: #2b4eff;
         -webkit-box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
         -moz-box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
         box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
      } */

        .sign__input input {
            outline: none;
            background: #ffffff;
            border-color: white;
            -webkit-box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
            -moz-box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
            box-shadow: 0px 1px 4px 0px rgba(8, 0, 42, 0.2);
            font-size: 15px;
        }

        .alert.alert-danger,
        .alert.alert-success {
            opacity: 0;
            animation: slideIn 0.5s forwards;
            font-weight: 700;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sign__wrapper {
            padding: 40px 30px;
            padding-bottom: 45px;
            margin: 140px 30px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            -webkit-box-shadow: 0px 40px 80px 0px rgba(2, 2, 26, 0.14);
            -moz-box-shadow: 0px 40px 80px 0px rgba(2, 2, 26, 0.14);
            box-shadow: 0px 40px 80px 0px rgba(2, 2, 26, 0.14);
            z-index: 11;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.20);
            backdrop-filter: blur(20px);
        }


        body {
            width: 100%;
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('https://safarmobility.in/assets/uploads/1644974880_wallpaper.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            position: relative;
            /* overflow: hidden; */
        }

        body::before {
            content: '';
            position: fixed;
            /* Changed to fixed to cover the entire viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            pointer-events: none;
            /* This allows interactions with elements beneath the overlay */
        }


        .content {
            position: relative;
            z-index: 2;
            color: white;
            width: 90%;
        }

        @media screen and (max-width: 762px) {
            body {
                background-size: cover;
                background-position: center;
            }
        }

        @media screen and (min-width: 1200px) {
            body {
                overflow: hidden;
            }
        }

        .alert-danger {
            color: white;
            background-color: red;
            border-color: red;
        }

        @media only screen and (max-width: 768px) {
            .sign__wrapper {
                margin-left: -20px;
                margin-right: -20px;
            }

            body {
                overflow: hidden;
            }
        }
    </style>
</head>

<body>
    <main class="content">
        <section class="signup__area po-rel-z1">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="sign__wrapper white-bg">
                            <div class="sign__header mb-35">
                                <div class="sign__in text-center text-white">
                                    <h1>Driver Login</h1>
                                </div>
                            </div>
                            <div class="sign__form">
                                @if(!session('otp_sent'))
                                <form action="/driverlogin" method="POST">
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    @csrf
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Mobile Number</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter your Mobile Number" style="background-color: transparent; color: white; font-weight: 600;" name="mobile" autocomplete="off">
                                            <i class="fal fa-phone text-white" style="transform: rotate(94deg); margin-top: -8px;"></i>
                                        </div>
                                        @error('mobile')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="e-btn w-100">Send OTP</button>
                                </form>
                                @else
                                <div class="text-white fw-bold text-center">
                                    <div>{{ session('message') }}</div>
                                    <div>Your OTP is: {{ session('otp') }}</div>
                                </div>
                                <form action="/driverlogin" method="POST">
                                    @csrf
                                    @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Enter OTP</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter OTP" style="background-color: transparent; color: white; font-weight: 600;" name="otp" autocomplete="off">
                                        </div>
                                        @error('otp')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="e-btn w-100">Verify OTP</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- JS here -->
    <script src="/assets_login/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="/assets_login/js/vendor/waypoints.min.js"></script>
    <script src="/assets_login/js/bootstrap.bundle.min.js"></script>
    <script src="/assets_login/js/jquery.meanmenu.js"></script>
    <script src="/assets_login/js/swiper-bundle.min.js"></script>
    <script src="/assets_login/js/owl.carousel.min.js"></script>
    <script src="/assets_login/js/jquery.fancybox.min.js"></script>
    <script src="/assets_login/js/isotope.pkgd.min.js"></script>
    <script src="/assets_login/js/parallax.min.js"></script>
    <script src="/assets_login/js/backToTop.js"></script>
    <script src="/assets_login/js/purecounter.js"></script>
    <script src="/assets_login/js/ajax-form.js"></script>
    <script src="/assets_login/js/wow.min.js"></script>
    <script src="/assets_login/js/imagesloaded.pkgd.min.js"></script>
    <script src="/assets_login/js/main.js"></script>


</body>

</html>