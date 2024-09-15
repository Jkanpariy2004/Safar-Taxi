<head>
    <style>
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
    </style>
</head>

@extends('main')
@section('main-content')

<!-- Page Header Start -->
<div class="container-fluid page-header">
    <img class="w-100" src="assets/img/about.png" alt="">

    <h1 class="display-3 text-uppercase text-white mb-3">Contact</h1>

</div>
<!-- Page Header Start -->


<!-- Contact Start -->
<!-- <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Contact Us</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                    <form action="contact_mail" method="post">
                    @csrf

                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="name" placeholder="Your Name" required="required">
                                </div>
                                <div class="col-6 form-group">
                                    <input type="number" class="form-control p-4" name="number" placeholder="Your Number" required="required">
                                </div>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control py-3 px-4" name="msg" rows="5" placeholder="Message" required="required"></textarea>
                            </div>
                            <div>
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="bg-primary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Head Office</h5>
                                <p>131, Sovereign Shoppers, Anand Mahal Road, NR.Shindhu Seva Samiti School, Adajan. Surat. 395009.</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Branch Office</h5>
                                <p>131, Sovereign Shoppers, Anand Mahal Road, NR.Shindhu Seva Samiti School, Adajan. Surat. 395009.  </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Customer Service</h5>
                                <p>safarmobility@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Return & Refund</h5>
                                <p class="m-0">safarmobility@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
<!-- Contact End -->
<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="text-primary text-uppercase">// Contact Us //</h6>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="row gy-4">
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Booking //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>info@bitinfotechnology.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// General //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>info@bitinfotechnology.com</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-light d-flex flex-column justify-content-center p-4">
                            <h5 class="text-uppercase">// Technical //</h5>
                            <p class="m-0"><i class="fa fa-envelope-open text-primary me-2"></i>info@bitinfotechnology.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3719.8118700436967!2d72.79128367471897!3d21.19963118188887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04c2d97143f3f%3A0x396f9c3e88f1b068!2sSovereign%20Shoppers!5e0!3m2!1sen!2sin!4v1720516126040!5m2!1sen!2sin" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form method="post" action="contact">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3 bg-white" autofocus id="name" name="name" autocomplete="off" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                                @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control rounded-3" id="email" name="email" autocomplete="off" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                                @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="mobile" name="mobile" pattern="[0-9]{10,10}" title="Enter 10 digits only" autocomplete="off" placeholder="Your Mobile">
                                    <label for="mobile">Your Mobile</label>
                                </div>
                                @error('mobile')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="subject" name="subject" autocomplete="off" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                                @error('subject')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control rounded-3" id="subject" name="message" autocomplete="off" placeholder="Subject">
                                    <label for="subject">Your Message</label>
                                </div>
                                @error('message')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3 rounded-3" name="btnsubmit" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Contact End -->

<!-- Testimonial Start -->
<!-- <div class="container-fluid py-5">
    <div class="container py-5">
        <h2 class=" text-uppercase text-center mb-5">Our Client's Say</h2>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="assets/img/testimonial-1.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Profession</i>
                <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="assets/img/testimonial-2.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Profession</i>
                <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="assets/img/testimonial-3.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Profession</i>
                <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
            </div>
            <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <img class="img-fluid ml-n4" src="assets/img/testimonial-4.jpg" alt="">
                    <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                </div>
                <h4 class="text-uppercase mb-2">Client Name</h4>
                <i class="mb-2">Profession</i>
                <p class="m-0">Kasd dolor no lorem nonumy sit labore tempor at justo rebum rebum stet, justo elitr dolor amet sit sea sed</p>
            </div>
        </div>
    </div>
</div> -->
<!-- Testimonial End -->


<!-- Footer Start -->
@endsection