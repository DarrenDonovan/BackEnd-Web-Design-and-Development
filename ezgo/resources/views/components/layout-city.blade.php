<?php
    $num;
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
    <title>Ezgo City Page</title>
</head>
<body>
    <h1>City</h1>
    @include('components.navbar')

    <?php
        echo $num;
    ?>
    
    @switch($num)
        @case(1)
            @yield('jkt')
            @break
        @case(2)
            @yield('bdg')
            @break
        @case(3)
            @yield('srby')
            @break
        @case(4)
            @break
    @endswitch
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/city.js') }}"></script>   
    <script>
        $(document).ready(function() {
            window.addEventListener("popstate", function(event) {
                let cookie;
                if (event.state && event.state.forward) {
                    cookie = Cookies.get('nextUrl');
                } else {
                    Cookies.set('nextUrl', Cookies.get('currentUrl'), { expires: 0.25, path: '/' });
                    cookie = '{{ route('destinations') }}';
                }

                $.ajax({
                        url: cookie,
                        type: "GET",
                        async: true,
                        complete: function (xhr, status) {
                            window.location.href = cookie;
                        },
                    });
            });
        }
        
        const city1 = {
            monas: '{{ route('monas') }}',
            ancol: '{{ route('ancol') }}',
            istiqlal: '{{ route('istiqlal') }}',
            glodok: '{{ route('glodok') }}',
            cathedral: '{{ route('cathedral') }}',
            tmii: '{{ route('tmii') }}',
        };

        const city2 = {
            cigadung: '{{ route('cigadung') }}',
            kiara: '{{ route('kiara') }}',
            kuliner: '{{ route('kuliner') }}',
            siliwangi: '{{ route('siliwangi') }}',
            tangga: '{{ route('tangga') }}',
            wetland: '{{ route('wetland') }}',
        };

        const city3 = {
            sepnovember: '{{ route('10november') }}',
            arab: '{{ route('arab') }}',
            kelenteng: '{{ route('kelenteng') }}',
            pakuwon: '{{ route('pakuwon') }}',
            sampoerna: '{{ route('sampoerna') }}',
            tugu: '{{ route('tugu') }}',
        };
    </script>
</body>
</html>