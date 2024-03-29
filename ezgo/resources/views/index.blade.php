<!DOCTYPE html>
<html>
<head>
    <title>Ezgo Home Page</title>
</head>
<body>
    @include('components.navbar')

    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Ticketing</h4>
                            <h1 class="display-3 text-white mb-md-4">Embrace Adventure with Effortless ticketing.</h1>
                            <a href="{{ route('ticket') }}" onclick="history.pushState(null, null, '{{ route('ticket') }}');" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Hotel Booking</h4>
                            <h1 class="display-3 text-white mb-md-4">Find Your Perfect stay with seamless booking.</h1>
                            <a href="{{ route('hotel') }}" onclick="history.pushState(null, null, '{{ route('hotel') }}');" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div> 
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Tour Packages</h4>
                            <h1 class="display-3 text-white mb-md-4">Discover. Explore. Experience Unforgettable tour packages.</h1>
                            <a href="{{ route('tour') }}" onclick="history.pushState(null, null, '{{ route('tour') }}');" class="btn btn-primary py-md-3 px-md-5 mt-2">Book Now</a>
                        </div>
                    </div>
                </div> 
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-6" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pt-5 pb-lg-5">
                    <div class="about-text bg-white p-4 p-lg-5 my-lg-5">
                        <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h6>
                        <h1 class="mb-3">We Provide Best Tour Packages In Your Budget</h1>
                        <p>Embark on unforgettable adventures with our exclusive tour packages, where dreams come to life and memories are made.</p>
                        <div class="row mb-4">
                            <div class="col-6">
                                <img class="img-fluid" src="img/pasar baru.png" alt="">
                            </div>
                            <div class="col-6">
                                <img class="img-fluid" src="img/tangkuban perahu.png" alt="">
                            </div>
                        </div>
                        <a href="{{ route('tour') }}" onclick="history.pushState(null, null, '{{ route('tour') }}');" class="btn btn-primary mt-1">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Feature Start -->
    <div class="container-fluid pb-5">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-money-check-alt text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Competitive Pricing</h5>
                            <p class="m-0">Discover budget-friendly tours offering unbeatable destinations and unforgettable experiences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-award text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Best Services</h5>
                            <p class="m-0">Unmatched service awaits at our travel website, where your journey is our top priority.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex mb-4 mb-lg-0">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-primary mr-3" style="height: 100px; width: 100px;">
                            <i class="fa fa-2x fa-globe text-white"></i>
                        </div>
                        <div class="d-flex flex-column">
                            <h5 class="">Worldwide Coverage</h5>
                            <p class="m-0">Discover the world effortlessly with our travel website, covering famous landmarks and hidden gems.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Provided Destination</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/jakarta2.png') }}" alt="" style="width: 100%;">
                        <a class="destination-overlay text-white text-decoration-none" href="{{ route('city1') }}" onclick="history.pushState(null, null, '{{ route('city1') }}');">
                            <h4 class="text-white">Jakarta</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/bandung2.png') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none" href="{{ route('city2') }}" onclick="history.pushState(null, null, '{{ route('city2') }}');">
                            <h4 class="text-white">Bandung</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/surabaya2.png') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none" href="{{ route('city3') }}" onclick="history.pushState(null, null, '{{ route('city3') }}');">
                            <h4 class="text-white">Surabaya</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/denpasar2.png') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none" href="{{ route('city4') }}" onclick="history.pushState(null, null, '{{ route('city4') }}');">
                            <h4 class="text-white">Denpasar</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination End -->


    <!-- Service Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Services</h6>
                <h1>Tours & Travel Services</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('tour') }}" onclick="history.pushState(null, null, '{{ route('tour') }}');" style="text-decoration: none;">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4">
                            <i class="fa fa-2x fa-route mx-auto mb-4"></i>
                            <h5 class="mb-2">Tour Package</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('ticket') }}" onclick="history.pushState(null, null, '{{ route('ticket') }}');" style="text-decoration: none;">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4">
                            <i class="fa fa-2x fa-ticket-alt mx-auto mb-4"></i>
                            <h5 class="mb-2">Ticket Booking</h5>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="{{ route('hotel') }}" onclick="history.pushState(null, null, '{{ route('hotel') }}');" style="text-decoration: none;">
                        <div class="service-item bg-white text-center mb-2 py-5 px-4">
                            <i class="fa fa-2x fa-hotel mx-auto mb-4"></i>
                            <h5 class="mb-2">Hotel Booking</h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Ezgo Team</h6>
                <h1>Our Team</h1>
            </div>
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('img/neon.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Christian Ken</h5>
                            <p class="m-0">Web Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('img/babi2.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Stanley Ade Putra</h5>
                            <p class="m-0">Frontend Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('img/dog.webp') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Karin Eldora</h5>
                            <p class="m-0">Database Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('img/gura.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Darren Donovan</h5>
                            <p class="m-0">Frontend Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                    <div class="team-item bg-white mb-4">
                        <div class="team-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('img/miorine.jpg') }}" alt="">
                            <div class="team-social">
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <h5 class="text-truncate">Zinedine Zethro</h5>
                            <p class="m-0">Backend Developer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    @include('components.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('easing/easing.min.js') }}"></script>
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
