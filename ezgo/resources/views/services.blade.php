<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Services Page</title>
</head>
<body>
    @include('components.navbar')

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

    @include('components.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>