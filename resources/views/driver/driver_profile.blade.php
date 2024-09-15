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

        .sign__input input,
        select,
        option {
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
            /* width: 800px; */
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
        .vehicle-details-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .line {
            flex-grow: 1;
            height: 2px;
            background-color: white;
            margin: 0 10px;
            /* Adjust the margin for spacing between text and lines */
        }

        .vehicle-details-text {
            font-weight: bold;
            color: white;
            font-size: 1.75rem;
            /* equivalent to fs-3 */
        }
    </style>
</head>

<body>
    <main class="content">
        <section class="signup__area po-rel-z1 pt-100 pb-145">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="sign__wrapper white-bg">
                            <div class="sign__header mb-35">
                                <div class="sign__in text-center text-white">
                                    <h1>Create Driver Profile</h1>
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
                                <form action="/driver_profile" method="POST" enctype="multipart/form-data">
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
                                    <div class="row">
                                        <div class="sign__input-wrapper mb-25 col-md-6">
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
                                        <div class="sign__input-wrapper mb-25 col-md-6">
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
                                    </div>
                                    <div class="row">
                                        <div class="sign__input-wrapper mb-25 col-md-6">
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
                                        <div class="sign__input-wrapper mb-25 col-md-6 text-white">
                                            <div class="form-group d-flex" style="margin-top: 2.5rem;">
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
                                    </div>
                                    <div class="row">
                                        <div class="sign__input-wrapper mb-25 col-md-6">
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
                                        <div class="sign__input-wrapper mb-25 col-md-6">
                                            <h5 class="text-white">Driving Licence Number</h5>
                                            <div class="sign__input">
                                                <input type="text" placeholder="Enter your Driving Licence Number" style="background-color: transparent; color: white; " name="dl_no" autocomplete="off">
                                                <i class="fa-solid fa-id-card text-white"></i>
                                            </div>
                                            @error('dl_no')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <div class="text-white">
                                                <h5 for="image" class="form-label">Driving Licence Photo</h5>
                                                <input type="file" name="dl_photo" class="form-control bg-transparent text-white border-3 border-white">
                                            </div>
                                            @error('dl_photo')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <div class="text-white">
                                                <h5 for="image" class="form-label">Profile Photo</h5>
                                                <input type="file" name="photo" class="form-control bg-transparent text-white border-3 border-white">
                                            </div>
                                            @error('photo')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="vehicle-details-container">
                                        <div class="line"></div>
                                        <p class="vehicle-details-text mb-0">Vehicle Details</p>
                                        <div class="line"></div>
                                    </div>
                                    <div class="row">
                                        <div class="sign__input-wrapper mb-25 col-md-6">
                                            <h5 class="text-white">Vehicle Name</h5>
                                            <div class="sign__input">
                                                <input type="text" placeholder="Enter your Vehicle Name" style="background-color: transparent; color: white; " name="vehicle_name" autocomplete="off">
                                                <i class="fa-solid fa-car text-white"></i>
                                            </div>
                                            @error('vehicle_name')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="sign__input-wrapper mb-25 col-md-6">
                                            <h5 class="text-white">Vehicle Number</h5>
                                            <div class="sign__input">
                                                <input type="text" placeholder="Enter your Vehicle Number" style="background-color: transparent; color: white; " name="vehicle_no" autocomplete="off">
                                                <i class="fa-solid fa-car text-white"></i>
                                            </div>
                                            @error('vehicle_no')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="sign__input-wrapper mb-25 col-md-6">
                                            <h5 class="text-white">Vehicle Type</h5>
                                            <div class="sign__input">
                                                <select name="vehicle_type" class="form-control" style="background-color: transparent; color: white; padding: 15px; margin-top: 12px; border: 3px solid white;">
                                                    <option value="" hidden>Select your Vehicle Type</option>
                                                    <option style="color: black; background-color: transparent;" value="sedan">Sedan</option>
                                                    <option style="color: black; background-color: transparent;" value="suv">SUV</option>
                                                    <option style="color: black; background-color: transparent;" value="hatchback">Hatchback</option>
                                                </select>
                                            </div>
                                            @error('vehicle_type')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="sign__input-wrapper mb-25 col-md-6">
                                            <h5 class="text-white">RC Book Number</h5>
                                            <div class="sign__input">
                                                <input type="text" placeholder="Enter your Rc Book Number" style="background-color: transparent; color: white; " name="rcbook_no" autocomplete="off">
                                                <i class="fa-solid fa-id-card text-white"></i>
                                            </div>
                                            @error('rcbook_no')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-25">
                                            <div class="text-white">
                                                <h5 for="image" class="form-label">Rc Book Photo</h5>
                                                <input type="file" name="rcbook_photo" class="form-control bg-transparent text-white border-3 border-white">
                                            </div>
                                            @error('rcbook_photo')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-25">
                                            <div class="text-white">
                                                <h5 for="image" class="form-label">insurance Policy Photo</h5>
                                                <input type="file" name="insurance_photo" class="form-control bg-transparent text-white border-3 border-white">
                                            </div>
                                            @error('insurance_photo')
                                            <div class="alert alert-danger">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
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