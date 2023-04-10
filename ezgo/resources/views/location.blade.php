<?php
    $num;
    $sect;
    $city;
    if(isset($lokasi) && isset($kota)){
        $num = $lokasi;
        $sect = $kota;
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
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.monas')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.cigandung')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(2)
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.ancol')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.kiara')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(3)
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.istiqlal')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.kuliner')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(4)
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.glodok')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.siliwangi')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(5)
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.cathedral')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.tangga')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
            @break;
        @case(6)
            @switch($sect)
                @case(1)
                    @include('components.lokasi.jkt.tmii')
                    <?php
                        $city = "city1";
                    ?>
                    @break
                @case(2)
                    @include('components.lokasi.bdg.wetland')
                    <?php
                        $city = "city2";
                    ?>
                    @break
                @case(3)
                    @break
                @case(4)
                    @break
            @endswitch
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