<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Safar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="icon" type="image/x-icon" href="/assets/img/icon_logo.jpg">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="/assets/css/style.css" rel="stylesheet">

</head>
<style>
    @media only screen and (min-width: 992px) {
        #nav_btn {
            display: none !important;
        }
    }

    .btn-primary:focus,
    .btn-primary.focus {
        color: #fff;
        box-shadow: none;
    }

    .dropdown-menu {
        transition: opacity 0.2s;
        opacity: 0;
    }

    .dropdown-menu.show {
        opacity: 1;
    }

    .avatar {
        width: 33px;
    }

    @media only screen and (max-width: 768px) {
        .d-sm-none {
            display: none !important;
        }

        .phone {
            white-space: nowrap;
        }
    }

    .header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background: white;
        color: black;
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
        z-index: 1;
    }

    .icon {
        color: #3F3B3D;
    }

    .active .icon {
        color: #FFFFFF;
    }

    .social-icon {
        margin-right: 10px;
        border-radius: 50%;
    }

    .btn.btn-social {
        margin-right: 5px;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        border: 1px solid #ffffff;
        border-radius: 35px;
        transition: 0.3s;
    }

    .btn-outline-light:hover {
        color: #3F3B3D;
        /* background-color: ; */
        border-color: #3F3B3D;
    }
</style>

<body>
     <!-- Topbar Start -->
    <div class="container-fluid  py-2 px-lg-5 d-lg-block header">
        <div class="row">
            <div class="col-3 col-lg-6  d-inline-flex align-items-center">
                <a href="/"><img src="/assets/img/safar.png" width="80" alt=""></a>
            </div>


            <div class="d-flex col-9 col-lg-6 text-right pt-1 text-xs-right text-sm-right header_top" style="justify-content: end; color:white;">
                <div class="d-inline-flex align-items-center">
                    <div class="col-md-12 phone"><a href="tel:+919979761975" class="nav-item nav-link text-dark active"> <i style="transform: rotate(90deg); font-size: 23px;" class="fa fa-phone"></i></a></div>
                </div>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle text-white nav-link-lg nav-link-user">
                            <img alt="image" src="/assets/img/avatar.jpg" class="rounded-circle mr-1 avatar">
                            <!-- <div class="d-sm-none d-lg-inline-block"></div> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <?php
                            $mobile = Session::get('mobile');
                            $userdata = DB::table('profile')->where('mobile', $mobile)->first();
                            ?>

                            <div class="d-sm-none d-lg-inline-block fw-bold text-dark" style="margin: 0px 0px 0px 25px;">
                                @if($userdata)
                                Hi, {{$userdata->fullname}}
                                @else
                                User not logged in
                                @endif
                            </div>

                            <a href="/" class="dropdown-item has-icon mt-2 {{Request::is('/') ? 'active' : '' }}"> <i class="fas fa-home icon"></i> Home </a>
                            <div class="dropdown-divider"></div>
                            <a href="/aboutus" class="dropdown-item has-icon {{Request::is('aboutus') ? 'active' : '' }}"> <i class="far fa-user icon"></i> About </a>
                            <div class="dropdown-divider"></div>
                            <a href="/contact" class="dropdown-item has-icon {{Request::is('contact') ? 'active' : '' }}"> <i class="fa fa-phone icon" style="transform: rotate(94deg);"></i> Contact </a>
                            <div class="dropdown-divider"></div>
                            @if($userdata)
                            <a href="/show-profile" class="dropdown-item has-icon {{Request::is('show-profile') ? 'active' : '' }}"> <i class="far fa-user icon"></i> Show Profile </a>
                            <div class="dropdown-divider"></div>
                            <a href="/user_logout" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Logout </a>
                            @else
                            <a href="/login-type" class="dropdown-item has-icon text-danger {{Request::is('login-type') ? 'active' : '' }}"> <i class="fas fa-sign-in-alt"></i> Login </a>
                            @endif
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
    <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-bottom: 1px solid #ffc107;">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/aboutus">About</a>
                    </li>
                    @if(Session::has('userid'))

                    <li class="nav-item active">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/user_logout">Logout</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav> -->


    <!-- Topbar End -->
    <br>
    <br>
    <!-- Navbar Start -->

    @section('main-content')
    @show

    <div class="container-fluid py-5 px-sm-3 px-md-5" style="margin-top: 90px;background: #3F3B3D; color: black;box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2 text-white"><i class="fa fa-map-marker-alt me-3"></i>Mota Varachha,Surat.</p>
                    <p class="mb-2 text-white"><i class="fa fa-phone-alt me-3"></i>+91 99797 61975</p>
                    <p class="mb-2 text-white"><i class="fa fa-envelope me-3"></i>safar@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href="https://wa.me/+919979761975" target="_blank"><i class="fab fa-whatsapp fs-5"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Opening Hours</h4>
                    <h6 class="text-light">Monday - Friday:</h6>
                    <p class="mb-4 text-white">09.00 AM - 09.00 PM</p>
                    <h6 class="text-light">Saturday - Sunday:</h6>
                    <p class="mb-0 text-white">09.00 AM - 12.00 PM</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Services</h4>
                    <a class="btn btn-link text-white" href="/">Home</a><br>
                    <a class="btn btn-link text-white" href="/aboutus">About</a><br>
                    <a class="btn btn-link text-white" href="/contact">Contact</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Join Us</h4>
                    <p class="text-white">Enter your whatsapp number here to connect with us, so stay informed about the latest offers of Safar Mobility.</p>
                    <div class="position-relative mx-auto mt-1" style="max-width: 400px;">
                        <form action="" method="post" class="mt-2">
                            <input class="form-control border-0 w-100 pe-5" type="text" autocomplete="off" style="height: 47px; position: absolute;" required pattern="[0-9]{10,10}" title="Enter 10 digits only" name="whatsapp" placeholder="Your Mobile Number">
                            <button type="submit" class="btn btn-primary position-absolute top-0 end-0" style="width: 30%; height: 36px; margin-top: 5px; position: relative; margin-left: 172px; margin-right: 5px;" name="btnwhatsapp">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-primary border-top border-2 text-white py-4 px-sm-3 px-md-5">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom text-white" href="/">Safar</a>, All Right Reserved.

                    Designed By <a class="border-bottom text-white" href="https://bitinfotechnology.com/">Bitinfo Technology</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="tinymce/tinymce.min.js"></script>
    <script src="tinymce/scrpt.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <script src="/assets/js/main.js"></script>
    <script>
        function navOpen() {
            let navbarSupportedContent = document.getElementById('navbarSupportedContent');

            if (navbarSupportedContent.style.display === 'block' || navbarSupportedContent.style.display === '') {
                navbarSupportedContent.style.display = 'none';
            } else if (navbarSupportedContent.style.display === 'none') {
                navbarSupportedContent.style.display = 'block';
            }
        }
    </script>
</body>

</html>