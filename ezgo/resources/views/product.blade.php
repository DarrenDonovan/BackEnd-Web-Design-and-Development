<?php
use Illuminate\Support\Facades\DB;

    $num;
    $title;
    $title2;
    $type;
    $rows = [];

    if(isset($post)){
        $num = $post;
    }

    switch($num){
        case 1:
            $title = "Tickets";
            $title2 = "Ticketing";
            $type = "tix";
            try {
                $rows = DB::table('Tickets')->get()->toArray();
                print_r($rows);
            } catch (Exception $e) {
                dd($e->getMessage());
            }
            break;
        case 2:
            $title = "Hotels";
            break;
        case 3:
            $title = "Tour Packages";
            break;
    }
?>

@extends('components.layout-products')

@section('tix-bar')
    <!-- Booking Start -->
    <div class="container-fluid booking mt-5 pb-5">
        <div class="container pb-5">
            <div class="bg-light shadow" style="padding: 30px;">
                <div class="row align-items-center" style="min-height: 60px;">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>From</option>
                                        <option value="1">Jakarta</option>
                                        <option value="2">Bandung</option>
                                        <option value="3">Surabaya</option>
                                        <option value="4">Denpasar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Destination</option>
                                        <option value="1">Jakarta</option>
                                        <option value="2">Bandung</option>
                                        <option value="3">Surabaya</option>
                                        <option value="4">Denpasar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Transportation</option>
                                        <option value="1">Train</option>
                                        <option value="2">Bus</option>
                                        <option value="3">Flight</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3 mb-md-0">
                                    <select class="custom-select px-4" style="height: 47px;">
                                        <option selected>Sort By</option>
                                        <option value="1">Popularity</option>
                                        <option value="2">Price</option>
                                        <option value="3">Rating</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->
@endsection

@section('tix-row')
    @foreach ($rows as $row)
        <?php
            $TimeDep = \Carbon\Carbon::parse($row->tcDeparture)->format('H:i');
            $Date = \Carbon\Carbon::parse($row->tcDate)->format('Y-m-d');
            list($hours, $minutes) = explode('.', $row->tcTravelTime);
            $TimeArr = \Carbon\Carbon::parse($TimeDep)
                ->addHours($hours)
                ->addMinutes($minutes)
                ->format('H:i');
        ?>

        <div class="col-lg-12 col-md-6 mb-4">
            <div class="service-item bg-white text-center mb-2 py-5 px-4">
                <div class="row">
                    <div style="width: 20%;">
                        <img src="{{ asset('img/'.$row->tcImage) }}" alt="tujuan" style="width: 100%; height: auto;">
                    </div>
                    <div style="width: 70%">
                        <h3>{{ $row->tcName }}</h3>
                        <h4>{{ $Date }}</h4>
                        <div class="row">
                            <div style="width: 47%;">
                                <h3 class="mb-2">{{ $row->tcFrom }}</h3>
                                <h5 class="m-0">{{ $TimeDep }}</h5>
                            </div>
                            <div style="width: 6%;">
                                <h3></h3>
                                <h5>-</h5>
                            </div>
                            <div style="width: 47%;">
                                <h3 class="mb-2">{{ $row->tcDestination }}</h3>
                                <h5 class="m-0">{{ $TimeArr }}</h5>
                            </div>
                        </div>
                    </div>
                    <div style="width: 10%; display: flex; align-items: center; justify-content: center;" class="text-center">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Purchase</button>
                    </div>                              
                </div>
            </div>
        </div>
    @endforeach
@endsection


@section('tix-modal')
    <!-- Modal  Start-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Booking Hotel</h4>
                </div>
                <div class="modal-body">
                    <table>
                        <thead>
                            <tr>
                                <td><img src="" alt="Hotel Image"></td>
                                <td>Product ID <br>Product Name <br>From To Destination</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Quantity</td>
                                <td><button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" onclick="decrement(event)">-</button> 
                                    <input type="number" min="1" value="1" readonly required class="text-center" id="numedit" style="width: 50px;"> 
                                    <button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" onclick="increment(event)">+</button></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>xx:xx - xx:xx</td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td>Rp. xxx.xxx</td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                        <Button type="button" class="btn btn-primary">Cash</Button>
                        <Button type="button" class="btn btn-primary" style="margin-inline: 20px;">Credit</Button>
                        <Button type="button" class="btn btn-primary">Debit</Button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Buy</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->

@endsection