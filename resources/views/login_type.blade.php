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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        .line {
            border-top: 1px solid white;
        }

        .head {
            font-size: 30px;
            margin-bottom: 0px;
            padding: 15px;
        }

        .head-title {
            margin-top: 6px;
            font-weight: 600;
            font-size: 25px;
        }

        .head svg {
            display: inline-block;
            position: relative;
        }

        .head:hover svg {
            animation: marquee 2s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(-50%);
            }

            100% {
                transform: translateX(50%);
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
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="alert alert-success">
                                {{ session('error') }}
                            </div>
                            @endif
                            <div class="sign__header mb-35">
                                <div class="sign__in text-center text-white">
                                    <h1>Login Type</h1>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="text-white head d-flex align-items-center">
                                <i class="fa-solid fa-car mr-10"></i>
                                <a href="/driver_login" class="w-75 head-title">Driver Login</a>
                                <div class="arrow-container w-25">
                                    <svg width="36px" height="36px" viewBox="0 0 24 24" fill="none">
                                        <title>Arrow right</title>
                                        <path d="m22.2 12-6.5 9h-3.5l5.5-7.5H2v-3h15.7L12.2 3h3.5l6.5 9Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="text-white head d-flex align-items-center">
                                <i class="fa-solid fa-taxi mr-10"></i>
                                <a href="/login" class="w-75 head-title">Rider Login</a>
                                <div class="arrow-container w-25">
                                    <svg width="36px" height="36px" viewBox="0 0 24 24" fill="none">
                                        <title>Arrow right</title>
                                        <path d="m22.2 12-6.5 9h-3.5l5.5-7.5H2v-3h15.7L12.2 3h3.5l6.5 9Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="line"></div>
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