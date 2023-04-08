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
        switch($num){
            case 1:
                echo "1";
                break;
            case 2:
                echo "2";
                break;
            case 3:
                echo "3";
                break;
            case 4:
                echo "4";
                break;
        }
    ?>
</body>
</html>