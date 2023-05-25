<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Destinations Page</title>
</head>
<body>
    @include('components.navbar')
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Provided Destination</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/jakarta.jpg') }}" alt="" style="width: 100%;">
                        <a class="destination-overlay text-white text-decoration-none obj" name="jkt">
                            <h4 class="text-white">Jakarta</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/bandung.jpg') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none obj" name="bdg">
                            <h4 class="text-white">Bandung</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/surabaya.jpg') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none obj" name="srby">
                            <h4 class="text-white">Surabaya</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2" style="height: 300px;">
                        <img class="img-fluid" src="{{ asset('img/denpasar.jpg') }}" alt="" style="width: 100%;">>
                        <a class="destination-overlay text-white text-decoration-none obj" name="dpsr">
                            <h4 class="text-white">Denpasar</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Destination Start -->

    @include('components.footer')

    <script src="{{ asset('js/destinations.js') }}"></script>
    <script>
        const cityRoutes = {
            city1: '{{ route('city1') }}',
            city2: '{{ route('city2') }}',
            city3: '{{ route('city3') }}',
            city4: '{{ route('city4') }}',
        };
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>