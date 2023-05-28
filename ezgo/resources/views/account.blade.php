<?php
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\DB;

    $ID = session()->get('userID');
    $user = DB::table('Customer')->where('custID', $ID)->first();
    $rows = DB::table('Orders')
    ->join('OrderDetails', 'Orders.orderID', '=', 'OrderDetails.orderID')
    ->join('Products', 'OrderDetails.productID', '=', 'Products.productID')
    ->leftJoin('Tickets', 'Products.productID', '=', 'Tickets.productID')
    ->leftJoin('Hotel', 'Products.productID', '=', 'Hotel.productID')
    ->leftJoin('Tour', 'Products.productID', '=', 'Tour.productID')
    ->where('Orders.custID', $ID)
    ->get();

?>

@extends('components.layout-account')

@section('history')
    @foreach($rows as $row)
        <?php
            $prodID;
            $prodName;
            $itemID;
            $kode;

            switch($row->keyID){
                case "tkt":
                    $item = DB::table('Tickets')->where('ticketID', $row->ticketID)->first();
                    $prodID = $item->productID;
                    $prodName = $item->tcName;
                    $itemID = $row->ticketID;
                    $kode = 1;
                    break;
                case "htl":
                    $item = DB::table('Hotel')->where('hotelID', $row->hotelID)->first();
                    $prodID = $item->productID;
                    $prodName = $item->hName;
                    $itemID = $row->hotelID;
                    $kode = 2;
                    break;
                case "trp":
                    $item = DB::table('Tour')->where('tourID', $row->tourID)->first();
                    $prodID = $item->productID;
                    $prodName = $item->tpName;
                    $itemID = $row->tourID;
                    $kode = 3;
                    break;
            }
        ?>

        <div class="row pl-3 mb-4 mt-2 pt-3" style="border: 1px solid black; border-radius: 10px;">
            <h5 class="purchaseno">{{ $prodID }}</h5>
            <button class="btn-purchasedetail" data-toggle="modal" data-target="#historyModal" onclick="detail('{{ $itemID }}', {{ $row->orderdetailsID }}, {{ $kode }})">Details</button>
            <br>
            <p class="destination">{{ $prodName }}</p>
        </div>
    @endforeach
@endsection