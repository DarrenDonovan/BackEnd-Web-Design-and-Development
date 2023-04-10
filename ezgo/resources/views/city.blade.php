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
            @include('components.jakarta')
            @break
        @case(2)
            @break
        @case(3)
            @break
        @case(4)
            @break
    @endswitch
    <script src="{{ asset('js/city.js') }}"></script>
</body>
</html>