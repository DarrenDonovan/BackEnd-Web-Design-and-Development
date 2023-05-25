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
    <h1>Services</h1>
    @include('components.navbar')

    <table>
        <tr>
            <td><img src="{{ asset('img/ticket.jpg') }}" alt="" width="300" height="300" class="product" name="tix"></td>
            <td><img src="{{ asset('img/hotel.jpg') }}" alt="" width="300" height="300" class="product" name="htl"></td>
            <td><img src="{{ asset('img/tour.jpg') }}" alt="" width="300" height="300" class="product" name="tur"></td>
        </tr>
    </table>

    <script>
        const products = {
            ticket: '{{ route('ticket') }}',
            hotel: '{{ route('hotel') }}',
            tour: '{{ route('tour') }}',
        };
    </script>
    <script src="{{ asset('js/services.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>