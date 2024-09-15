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

        .alert-danger {
            color: white;
            background-color: red;
            border-color: red;
        }

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
            font-weight: 600;
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
            margin: 0 30px;
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

        @media only screen and (max-width: 768px) {
            .sign__wrapper {
                margin-left: -20px;
                margin-right: -20px;
            }
        }

        /* .alert-danger {
            color: white;
            background-color: red;
            border-color: red;
        } */
    </style>
</head>

<body>
    <main class="content">
        <section class="signup__area po-rel-z1 pt-100 pb-145">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="sign__wrapper white-bg">
                            <div class="sign__header mb-35">
                                <div class="sign__in text-center text-white">
                                    <h1>Create Profile</h1>
                                </div>
                            </div>
                            <div class="sign__form">
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif

                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <form action="/user_profile" method="POST" enctype="multipart/form-data">
                                    @error('success')
                                    <div class="alert alert-success">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    @error('error')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    @csrf
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Full Name</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter your Full Name" style="background-color: transparent; color: white; " name="fullname" autocomplete="off">
                                            <i class="fal fa-user text-white"></i>
                                        </div>
                                        @error('fullname')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Email</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter your Email Id" style="background-color: transparent; color: white; " name="email" autocomplete="off">
                                            <i class="fal fa-envelope text-white"></i>
                                        </div>
                                        @error('email')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Mobile No.</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter your Mobile Number" style="background-color: transparent; color: white; " name="mobile" autocomplete="off">
                                            <i class="fal fa-phone text-white"></i>
                                        </div>
                                        @error('mobile')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="sign__input-wrapper mb-25 text-white">
                                        <div class="form-group d-flex mt-3">
                                            <h5 style="margin-right: 15px; margin-bottom: 0px; line-height: 25px;">Gender :</h5>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-transparent border-1 border-white" type="radio" name="gender" value="Male" id="maleRadio">
                                                <label class="form-check-label" for="maleRadio">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input bg-transparent border-1 border-white" type="radio" name="gender" value="Female" id="femaleRadio">
                                                <label class="form-check-label" for="femaleRadio">Female</label>
                                            </div>
                                        </div>
                                        @error('gender')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="sign__input-wrapper mb-25">
                                        <h5 class="text-white">Address</h5>
                                        <div class="sign__input">
                                            <input type="text" placeholder="Enter your Address" style="background-color: transparent; color: white; " name="address" autocomplete="off">
                                            <i class="fal fa-location text-white"></i>
                                        </div>
                                        @error('address')
                                        <div class="alert alert-danger">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="mt-3 text-white">
                                        <h5 for="image" class="form-label">Profile Photo</h5>
                                        <input type="file" name="photo" class="form-control bg-transparent text-white border-3 border-white" title="Please Upload your Profile image">
                                    </div>
                                    @error('photo')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="mt-3">
                                        <button type="submit" class="e-btn  w-100">Submit</button>
                                    </div>
                                </form>
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