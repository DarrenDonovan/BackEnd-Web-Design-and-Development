<?php
    $row = DB::table('Orders')
        ->join('OrderDetails', 'Orders.orderID', '=', 'OrderDetails.orderID')
        ->join('Products', 'OrderDetails.productID', '=', 'Products.productID')
        ->leftJoin('Tickets', 'Products.productID', '=', 'Tickets.productID')
        ->leftJoin('Hotel', 'Products.productID', '=', 'Hotel.productID')
        ->leftJoin('Tour', 'Products.productID', '=', 'Tour.productID')
        ->where('Orders.orderID', $order)
        ->take(1)
        ->get();

    switch($code){
        case 1:
            $row[0]->ID = $row[0]->ticketID;
            $row[0]->Name = $row[0]->tcName;
            break;
        case 2:
            $row[0]->ID = $row[0]->hotelID;
            $row[0]->Name = $row[0]->hName;
            break;
        case 3:
            $row[0]->ID = $row[0]->tourID;
            $row[0]->Name = $row[0]->tpName;
            break;
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Struk</title>
  </head>
  <body style="background-color: whitesmoke">
    <div
      style="
        border: 1px solid grey;
        height: 24.7cm;
        width: 17cm;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
        background-color: white;
      "
    >
      <h1>EZGO</h1>
      <h2>Rt 6 rw 9, jalan planet 69, Pondok Cina, Depok, Indonesia</h2>
      <p>+62 813-8061-1660</p>
      <p>
        ======================================================================================
      </p>
      <p style="text-align: left; padding-left: 15px">Order ID</p>

      <table style="width: 100%">
        <tr>
          <th>Product ID</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
        </tr>
        <tr>
          <td><p>{{ $row[0]->ID }}</p></td>
          <td><p>{{ $row[0]->Name }}</p></td>
          <td><p>{{ $row[0]->total }}</p></td>
          <td><p>Rp.{{ $row[0]->totalPrice }}</p></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>Total Price</td>
          <td>Rp.{{ $row[0]->totalPrice }}</td>
        </tr>
      </table>
    </div>
  </body>
</html>