<?php
use Illuminate\Support\Facades\DB;

    $num;
    $title;
    $title2;
    $rows = [];

    if(isset($post)){
        $num = $post;
    }

    switch($num){
        case 1:
            $title = "Tickets";
            $title2 = "Ticketing";
            try {
                $rows = DB::table('Tickets')->get()->toArray();
            } catch (Exception $e) {
                dd($e->getMessage());
            }

            break;
        case 2:
            $title = "Hotels";
            $title2 = "Hotel Booking";
            try {
                $rows = DB::table('Hotel')->get()->toArray();
            } catch (Exception $e) {
                dd($e->getMessage());
            }
            break;
        case 3:
            $title = "Tour Packages";
            $title2 = "Tour Packages";
            try {
                $rows = DB::table('Tour')->get()->toArray();
            } catch (Exception $e) {
                dd($e->getMessage());
            }
            break;
    }

    session()->put('budget', 0);
?>

@extends('components.layout-products')

@section('bar')
    @switch($num)
        @case(1)
            <!-- Booking Start -->
            <div class="container-fluid booking mt-5 pb-5">
                <div class="container pb-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" id="dest">
                                                <option value="0" >Destination</option>
                                                <option value="1">Jakarta</option>
                                                <option value="2">Bandung</option>
                                                <option value="3">Surabaya</option>
                                                <option value="4">Denpasar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" id="trans">
                                                <option value="0">Transportation</option>
                                                <option value="1">Train</option>
                                                <option value="2">Ship</option>
                                                <option value="3">Flight</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <div class="budget">
                                                <input type="text" class="form-control p-4" placeholder="Your Budget" id="budget" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;" onclick="sort(1)">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Booking End -->
            @break
        @case(2)
        <!-- Search Start -->
        <div class="container-fluid booking mt-5 pb-5">
                <div class="container pb-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" id="dest">
                                                <option value="0">Location</option>
                                                <option value="1">Jakarta</option>
                                                <option value="2">Bandung</option>
                                                <option value="3">Surabaya</option>
                                                <option value="4">Denpasar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" id="duration">
                                                <option value="0">Duration</option>
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Day</option>
                                                <option value="3">3 Day</option>
                                                <option value="4">4 Day</option>
                                                <option value="5">5 Day</option>
                                                <option value="6">6 Day</option>
                                                <option value="7">7 Day</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <div class="budget">
                                                <input type="text" class="form-control p-4" placeholder="Your Budget" id="budget"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;" onclick="sort(2)">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->
            @break
        @case(3)
        <!-- Search Start -->
        <div class="container-fluid booking mt-5 pb-5">
                <div class="container pb-5">
                    <div class="bg-light shadow" style="padding: 30px;">
                        <div class="row align-items-center" style="min-height: 60px;">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3">
                                            <h5 style="padding-top: 12px; text-align: center;">Destination</h5>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 mb-md-0">
                                            <select class="custom-select px-4" style="height: 47px;" id="dest">
                                                <option selected>Destination</option>
                                                <option value="1">Jakarta</option>
                                                <option value="2">Bandung</option>
                                                <option value="3">Surabaya</option>
                                                <option value="4">Denpasar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3 mb-md-0">
                                            <div class="budget">
                                                <input type="text" class="form-control p-4" placeholder="Your Budget" id="budget"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-block" type="submit" style="height: 47px; margin-top: -2px;" onclick="sort(3)">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End -->
            @break
    @endswitch
@endsection

@section('row')
    @switch($num)
        @case(1)
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
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="fetchData('{{$row->ticketID}}', 1); recommend('{{$row->destID}}', 1, '{{$row->ticketID}}');">Purchase</button>
                            </div>                              
                        </div>
                    </div>
                </div>
            @endforeach
            @break
        @case(2)
            @foreach ($rows as $row)
                <?php 
                    $Date = \Carbon\Carbon::parse($row->hDate)->format('Y-m-d');
                ?>

                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="{{ asset('img/'.$row->hImage) }}" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $row->hName }}</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $row->hAmount }} days</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{ $row->hRoomType }}</small>
                            </div>
                            <a class="h5 text-decoration-none" href="" data-toggle="modal" data-target="#myModal" onclick="fetchData('{{$row->hotelID}}', 2); recommend('{{$row->destID}}', 2, '{{$row->hotelID}}');">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><small>{{ $Date }}</small></h6>
                                    <h5 class="m-0">Rp. {{ $row->hPrice }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @break
        @case(3)
            @foreach ($rows as $row)
                <?php 
                    $Date = \Carbon\Carbon::parse($row->tpDate)->format('Y-m-d');
                    $TimeDep = \Carbon\Carbon::parse($row->tpMeeting)->format('H:i');
                ?>

                <div class="col-lg-4 col-md-6 mb-4" data-toggle="modal" data-target="#myModal">
                    <div class="package-item bg-white mb-2">
                    <img class="img-fluid" src="{{ asset('img/'.$row->tpImage) }}" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $row->tpName }}</small>
                                <small class="m-0"><i class="fa fa-calendar-alt text-primary mr-2"></i>{{ $row->tpSlot }} Persons</small>
                                <small class="m-0"><i class="fa fa-user text-primary mr-2"></i>{{ $Date }}</small>
                            </div>
                            <a class="h5 text-decoration-none" href="" data-toggle="modal" data-target="#myModal" onclick="fetchData('{{$row->tourID}}', 3); recommend('{{$row->destID}}', 3, '{{$row->tourID}}');">Discover amazing places of the world with us</a>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><small>{{ $TimeDep }}</small></h6>
                                    <h5 class="m-0">Rp. {{ $row->tpPrice }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @break
    @endswitch
@endsection

@section('modal')
    @switch($num)
        @case(1)
        <!-- Modal  Start-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">{{ $title2 }}</h4>
                        </div>
                        <div class="modal-body">
                            <table>
                                <thead>
                                    <tr>
                                        <td><img src="" id="tcImage" alt="Hotel Image" class="mw-100"></td>
                                        <td>
                                            <table>
                                                <tr><td id="productID"></td></tr>
                                                <tr><td id="tcName"></td></tr>
                                                <tr><td id="tcFromDestination"></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Quantity</td>
                                        <td><button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="decrementBtn" onclick="">-</button> 
                                            <input type="number" min="0" value="0" readonly required class="text-center" id="numedit" style="width: 50px;"> 
                                            <button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="incrementBtn" onclick="">+</button></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><span id="TimeDepArr">0</span></td>
                                    </tr>
                                    <tr>
                                        <td>Total:</td>
                                        <td>Rp. <span id="price">0</span></td>
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
                        <p class="font-weight-bold" style="margin-left: 15px;">Recommendations</p>
                            <div class="recommenddiv"  style="text-align: center;" id="recContain"> 
                            </div>
                        <div style="text-align: center; margin: 10px; margin-bottom: 15px;">
                            <br>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="buton">Buy</button>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->
            @break
        @case(2)
            <!-- Modal  Start-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{ $title2 }}</h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <td><img src="" id="hImage" class="mw-100" alt="Hotel Image"></td>
                                            <table>
                                                <tr><td id="productID"></td></tr>
                                                <tr><td id="hName"></td></tr>
                                                <tr><td id="hFromDestination"></td></tr>
                                            </table>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Duration (DAYS)</td>
                                            <td><button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="decrementBtn" onclick="">-</button> 
                                                <input type="number" min="0" value="0" readonly required class="text-center" id="numedit" style="width: 50px;"> 
                                                <button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="incrementBtn" onclick="">+</button></td>
                                        </tr>
                                        <tr>
                                            <td>Total:</td>
                                            <td>Rp. <span id="price">0</span></td>
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
                            <p class="font-weight-bold" style="margin-left: 15px;">Recommendations</p>
                            <div class="recommenddiv"  style="text-align: center;" id="recContain"> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="buton">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End -->
            @break
        @case(3)
            <!-- Modal  Start-->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">{{ $title2 }}</h4>
                            </div>
                            <div class="modal-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <td><img src="" id="tpImage" alt="Hotel Image" class="mw-100"></td>
                                            <td>
                                                <table>
                                                    <tr><td id="productID"></td></tr>
                                                    <tr><td id="tpName"></td></tr>
                                                    <tr><td id="tpFromDestination"></td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Persons</td>
                                            <td><button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="decrementBtn" onclick="">-</button> 
                                                <input type="number" min="0" value="0" readonly required class="text-center" id="numedit" style="width: 50px;"> 
                                                <button type="button" class="btn-primary" style="border-radius: 50%; height: 30px; width: 30px; border: 0;" id="incrementBtn" onclick="">+</button></td>
                                        </tr>
                                        <tr>
                                            <td>Total:</td>
                                            <td>Rp. <span id="price">0</span></td>
                                        </tr>
                                        <tr>
                                            <td>Payment Method</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="text-center">
                                    <Button type="button" class="btn btn-primary">Cash</Button>
                                    <Button type="button" class="btn btn-primary" style="margin-inline: 20px;">Credit</Button>
                                    <Button type="button" class="btn btn-primary">Debit</Button>
                                </div>
                            </div>
                            <p class="font-weight-bold" style="margin-left: 15px;">Recommendations</p>
                            <div class="recommenddiv"  style="text-align: center;" id="recContain"> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-primary" id="buton">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End -->
            @break
    @endswitch
@endsection

