<?php
    $num;
    $sect;
    $city;
    if(isset($lokasi) && isset($kota)){
        $num = $lokasi;
        $sect = $kota;
    }

    switch($sect){
        case 1:
            $city = "city1";
            break;
        case 2:
            $city = "city2";
            break;
        case 3:
            $city = "city3";
            break;
        case 4:
            $city = "city4";
            break;
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
                    @yield('mns')
                    @break
                @case(2)
                    @yield('cgd')
                    @break
                @case(3)
                    @yield('10n')
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(2)
            @switch($sect)
                @case(1)
                    @yield('acl')
                    @break
                @case(2)
                    @yield('kra')
                    @break
                @case(3)
                    @yield('arb')
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(3)
            @switch($sect)
                @case(1)
                    @yield('ist')
                    @break
                @case(2)
                    @yield('kln')
                    @break
                @case(3)
                    @yield('klt')
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(4)
            @switch($sect)
                @case(1)
                    @yield('gld')
                    @break
                @case(2)
                    @yield('slw')
                    @break
                @case(3)
                    @yield('pkw')
                    @break
                @case(4)
                    @break
            @endswitch
            @break
        @case(5)
            @switch($sect)
                @case(1)
                    @yield('ctd')
                    @break
                @case(2)
                    @yield('tng')
                    @break
                @case(3)
                    @yield('smp')
                    @break
                @case(4)
                    @break
            @endswitch
            @break;
        @case(6)
            @switch($sect)
                @case(1)
                    @yield('tmi')
                    @break
                @case(2)
                    @yield('wtl')
                    @break
                @case(3)
                    @yield('tgu')
                    @break
                @case(4)
                    @break
            @endswitch
            @break;
    @endswitch
</body>
</html>