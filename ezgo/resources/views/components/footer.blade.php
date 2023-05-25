<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 
     
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">EZ</span>GO</h1>
                </a>
                <p>Sed ipsum clita tempor ipsum ipsum amet sit ipsum lorem amet labore rebum lorem ipsum dolor. No sed vero lorem dolor dolor</p>
                <h6 class="text-white text-uppercase mt-4 mb-3" style="letter-spacing: 5px;">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary btn-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary btn-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{ route('ticket') }}" onclick="history.pushState(null, null, '{{ route('ticket') }}');"><i class="fa fa-angle-right mr-2"></i>Tickets</a>
                    <a class="text-white-50 mb-2" href="{{ route('hotel') }}" onclick="history.pushState(null, null, '{{ route('hotel') }}');"><i class="fa fa-angle-right mr-2"></i>Hotels</a>
                    <a class="text-white-50 mb-2" href="{{ route('tour') }}" onclick="history.pushState(null, null, '{{ route('tour') }}');"><i class="fa fa-angle-right mr-2"></i>Tour Packages</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Usefull Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href="{{ route('about') }}" onclick="history.pushState(null, null, '{{ route('about') }}');"><i class="fa fa-angle-right mr-2"></i>About</a>
                    <a class="text-white-50 mb-2" href="{{ route('destinations') }}" onclick="history.pushState(null, null, '{{ route('destinations') }}');"><i class="fa fa-angle-right mr-2"></i>Destination</a>
                    <a class="text-white-50 mb-2" href="{{ route('blog') }}" onclick="history.pushState(null, null, '{{ route('blog') }}');"><i class="fa fa-angle-right mr-2"></i>Blog</a>
                    <a class="text-white-50 mb-2" href="{{ route('services') }}" onclick="history.pushState(null, null, '{{ route('services') }}');"><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50" href="{{ route('account') }}" onclick="history.pushState(null, null, '{{ route('account') }}');"><i class="fa fa-angle-right mr-2"></i>Account</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-white text-uppercase mb-4" style="letter-spacing: 5px;">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Rt 6 rw 9, jalan planet 69, Pondok Cina, Depok, Indonesia</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>ezgo@skystar.umn.ac.id</p>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white border-top py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="row">
            <div class="col-lg-6 text-center text-md-left mb-3 mb-md-0">
                <p class="m-0 text-white-50">Copyright &copy; EZGO. All Rights Reserved.</a>
                </p>
            </div>
            <div class="col-lg-6 text-center text-md-right">
                <p class="m-0 text-white-50">Sponsored by <a href="https://skystarventures.com/">Skystar Ventures</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>