<?php
    $num;
    $city;
    if(isset($post)){
        $num = $post;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ezgo Location Page</title>
</head>
<body>
    <h1>Location</h1>
    @include('components.navbar')

    @switch($num)
        @case(1)
            @include('components.lokasi.monas')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(2)
            @include('components.lokasi.ancol')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(3)
            @include('components.lokasi.istiqlal')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(4)
            @include('components.lokasi.glodok')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(5)
            @include('components.lokasi.cathedral')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(6)
            @include('components.lokasi.tmii')
            <?php
                $city = "city1";
            ?>
            @break;
        @case(7)
            @break;
        @case(8)
            @break;
        @case(9)
            @break;
        @case(10)
            @break;
        @case(11)
            @break;
        @case(12)
            @break;
        @case(13)
            @break;
        @case(14)
            @break;
        @case(15)
            @break;
        @case(16)
            @break;
        @case(17)
            @break;
        @case(18)
            @break;
        @case(19)
            @break;
        @case(19)
            @break;
        @case(20)
            @break;
        @case(21)
            @break;
        @case(22)
            @break;
        @case(23)
            @break;
        @case(24)
            @break;
    @endswitch

    <script>
        window.addEventListener('popstate', function () {
            window.location.href = '{{ route($city) }}';
            window.location.reload();
        });
    </script>";

    
</body>
</html>