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
    <h1>Destinations</h1>
    @include('components.navbar')
    <img src="{{ asset('img/jakarta.jpg') }}" alt="Jakarta" width="300" height="300" class="obj" name="jkt">
    <img src="{{ asset('img/bandung.jpg') }}" alt="Bandung" width="300" height="300" class="obj" name="bdg">
    <img src="{{ asset('img/surabaya.jpg') }}" alt="Surabaya" width="300" height="300" class="obj" name="srby">
    <img src="{{ asset('img/denpasar.jpg') }}" alt="Denpasar" width="300" height="300" class="obj" name="dpsr">
    <script src="{{ asset('js/destinations.js') }}"></script>
    <script>
        const cityRoutes = {
            city1: '{{ route('city1') }}',
            city2: '{{ route('city2') }}',
            city3: '{{ route('city3') }}',
            city4: '{{ route('city4') }}',
        };
    </script>
    <script>
        window.addEventListener("popstate", function () {
            window.location.href = '{{ route('home') }}';
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>