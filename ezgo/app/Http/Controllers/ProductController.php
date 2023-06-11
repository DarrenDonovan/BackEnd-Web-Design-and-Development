<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function Modal(Request $req){
        $id = $req->input('buttonId');
        $code = $req->input('code');
        $item;

        switch($code){
            case 1:
                $item = DB::table('Tickets')->where('ticketID', $id)->first();
                $item->TimeDep = \Carbon\Carbon::parse($item->tcDeparture)->format('H:i');
                $item->Date = \Carbon\Carbon::parse($item->tcDate)->format('Y-m-d');
                list($hours, $minutes) = explode('.', $item->tcTravelTime);
                $item->TimeArr = \Carbon\Carbon::parse($item->TimeDep)
                    ->addHours($hours)
                    ->addMinutes($minutes)
                    ->format('H:i');
                break;
            case 2:
                $item = DB::table('Hotel')->where('hotelID', $id)->first();
                $item->Date = \Carbon\Carbon::parse($item->hDate)->format('Y-m-d');
                break;
            case 3:
                $item = DB::table('Tour')->where('tourID', $id)->first();
                $item->Date = \Carbon\Carbon::parse($item->tpDate)->format('Y-m-d');
                break;
        }

        session()->put('item', $item);
        return response()->json(['success' => true]);
    }

    public function Sort(Request $req){
        $kode = $req->input('code');
        $key = $req->input('key');
        $arr = $req->input('arr');
        $rows = [];
        $keyCount;

        if (!empty($key)) {
            $keyCount = count($key);
        } else {
            $keyCount = 0;
        }

        error_log($keyCount);

        switch($kode){
            case 1:
                switch($keyCount){
                    case 0:
                        try {
                            $rows = DB::table('Tickets')->get()->toArray();
                            session()->put('budget', 0);
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 1:
                        try {
                            if($key[0] != "tcSellingPrice"){
                                $rows = DB::table('Tickets')->where($key[0], $arr[0])->get()->toArray();
                            }else{
                                $rows = DB::table('Tickets')->whereRaw("$key[0] <= ?", [$arr[0]])->get()->toArray();
                                session()->put('budget', $arr[0]);
                            }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 2:
                        try {
                            if($key[1] != "tcSellingPrice"){
                                $rows = DB::table('Tickets')
                                    ->where($key[0], $arr[0])
                                    ->where($key[1], $arr[1])->get()->toArray();
                            }else{
                                $rows = DB::table('Tickets')
                                    ->where($key[0], $arr[0])
                                    ->whereRaw("$key[1] <= ?", [$arr[1]])->get()->toArray();
                                session()->put('budget', $arr[1]);
                            }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 3:
                        try{
                            $rows = DB::table('Tickets')
                                ->where($key[0], $arr[0])
                                ->where($key[1], $arr[1])
                                ->where($key[2], $arr[2])->get()->toArray();
                            session()->put('budget', $arr[2]);
                        }catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                }

                foreach($rows as $row){
                    $row->TimeDep = \Carbon\Carbon::parse($row->tcDeparture)->format('H:i');
                    $row->Date = \Carbon\Carbon::parse($row->tcDate)->format('Y-m-d');
                    list($hours, $minutes) = explode('.', $row->tcTravelTime);
                    $row->TimeArr = \Carbon\Carbon::parse($row->TimeDep)
                        ->addHours($hours)
                        ->addMinutes($minutes)
                        ->format('H:i');
                    $row->tcImage = asset('img/'.$row->tcImage);
                }

                break;
            case 2:
                switch($keyCount){
                    case 0:
                        try {
                            $rows = DB::table('Hotel')->get()->toArray();
                            session()->put('budget', 0);
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 1:
                        try {
                            if($key[0] != "hPrice"){
                                $rows = DB::table('Hotel')->where($key[0], $arr[0])->get()->toArray();
                            }else{
                                $rows = DB::table('Hotel')->whereRaw("$key[0] <= ?", [$arr[0]])->get()->toArray();
                                session()->put('budget', $arr[0]);
                            }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 2:
                        try {
                            if($key[1] != "hPrice"){
                                $rows = DB::table('Hotel')
                                    ->where($key[0], $arr[0])
                                    ->where($key[1], $arr[1])->get()->toArray();
                            }else{
                                $rows = DB::table('Hotel')
                                    ->where($key[0], $arr[0])
                                    ->whereRaw("$key[1] <= ?", [$arr[1]])->get()->toArray();
                                    session()->put('budget', $arr[1]);
                            }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 3:
                        try{
                            $rows = DB::table('Hotel')
                                ->where($key[0], $arr[0])
                                ->where($key[1], $arr[1])
                                ->where($key[2], $arr[2])->get()->toArray();
                            session()->put('budget', $arr[2]);
                        }catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                }

                foreach($rows as $row){
                    $row->Date = \Carbon\Carbon::parse($row->hDate)->format('Y-m-d');
                    $row->hImage = asset('img/'.$row->hImage);
                }

                break;
            case 3:
                switch($keyCount){
                    case 0:
                        try {
                            $rows = DB::table('Tour')->get()->toArray();
                            session()->put('budget', 0);
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 1:
                        try {
                            if($key[0] != "tpPrice"){
                                $rows = DB::table('Tour')->where($key[0], $arr[0])->get()->toArray();
                            }else{
                                $rows = DB::table('Tour')->whereRaw("$key[0] <= ?", [$arr[0]])->get()->toArray();
                                session()->put('budget', $arr[0]);
                            }
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                    case 2:
                        try {
                            $rows = DB::table('Tour')
                                ->where($key[0], $arr[0])
                                ->whereRaw("$key[1] <= ?", [$arr[1]])->get()->toArray();
                            session()->put('budget', $arr[1]);
                        } catch (Exception $e) {
                            dd($e->getMessage());
                        }
                        break;
                }

                foreach($rows as $row){
                    $row->Date = \Carbon\Carbon::parse($row->tpDate)->format('Y-m-d');
                    $row->tpImage = asset('img/'.$row->tpImage);
                    $row->TimeDep = \Carbon\Carbon::parse($row->tpMeeting)->format('H:i');
                }

                break;
        }

        return response()->json(['success' => true, 'rows' => $rows]);
    }

    public function Purchase(Request $req){
        $id = $req->input('id');
        $kode = $req->input('kode');
        $total = $req->input('total');
        $price = $req->input('price');

        $code;

        switch($kode){
            case 1:
                $item = DB::table('Tickets')->where('ticketID', $id)->first();

                if($total <= $item->tcAmount){
                    if(DB::table('Orders')->insert([
                        'custID' => session()->get('userID'),
                        'destID' => $item->destID
                    ])){
                        $Order = DB::table('Orders')->orderBy('orderID', 'desc')->first();
    
                        if(DB::table('OrderDetails')->insert([
                            'orderID' => $Order->orderID,
                            'productID' => $item->productID,
                            'total' => $total,
                            'totalPrice' => $price
                        ])){
                            $hasil = $item->tcAmount - $total;
    
                            if(DB::table('Tickets')
                            ->where('ticketID', $item->ticketID)
                            ->update(['tcAmount' => $hasil])){
                                return response()->json(['success' => true]);
                            }
                        }
                    }

                    $code = 2;
                }else{
                    $code = 1;
                }
                break;
            case 2:
                $item = DB::table('Hotel')->where('hotelID', $id)->first();

                if($total <= $item->hAmount){
                    if(DB::table('Orders')->insert([
                        'custID' => session()->get('userID'),
                        'destID' => $item->destID
                    ])){
                        $Order = DB::table('Orders')->orderBy('orderID', 'desc')->first();
    
                        if(DB::table('OrderDetails')->insert([
                            'orderID' => $Order->orderID,
                            'productID' => $item->productID,
                            'total' => $total,
                            'totalPrice' => $price
                        ])){
                            $hasil = $item->hAmount - $total;
    
                            if(DB::table('Hotel')
                            ->where('hotelID', $item->hotelID)
                            ->update(['hAmount' => $hasil])){
                                return response()->json(['success' => true]);
                            }
                        }
                    }

                    $code = 2;
                }else{
                    $code = 1;
                }
                break;
            case 3:
                $item = DB::table('Tour')->where('tourID', $id)->first();

                if($total <= $item->tpSlot){
                    if(DB::table('Orders')->insert([
                        'custID' => session()->get('userID'),
                        'destID' => $item->destID
                    ])){
                        $Order = DB::table('Orders')->orderBy('orderID', 'desc')->first();
    
                        if(DB::table('OrderDetails')->insert([
                            'orderID' => $Order->orderID,
                            'productID' => $item->productID,
                            'total' => $total,
                            'totalPrice' => $price
                        ])){
                            $hasil = $item->tpSlot - $total;
    
                            if(DB::table('Tour')
                            ->where('tourID', $item->tourID)
                            ->update(['tpSlot' => $hasil])){
                                return response()->json(['success' => true]);
                            }
                        }
                    }

                    $code = 2;
                }else{
                    $code = 1;
                }
                break;
        }

        return response()->json(['success' => false, 'code' => $code]);
    }

    public function Recom(Request $req){
        $biaya = Session()->get('budget');
        $type = $req->input('type');
        $dest = $req->input('dest');
        $id = $req->input('id');
        $operator = "<=";

        if($biaya == 0){
            $operator = ">=";
        }

        switch($type){
            case 1:
                try {
                    $where = "tcSellingPrice ".$operator." ?";

                    $rows = DB::table('Tickets')
                        ->where('destID', $dest)
                        ->whereRaw("ticketID != ?", $id)
                        ->whereRaw($where, [$biaya])->take(3)->get()->toArray();

                    foreach($rows as $row){
                        $row->Image = asset('img/'.$row->tcImage);
                        $row->Name = $row->tcName;
                        $row->Price = $row->tcSellingPrice;
                        $row->Tag = $row->ticketID;
                    }

                    return response()->json(['success' => true, 'rows' => $rows]);
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
                break;
            case 2:
                try {
                    $where = "hPrice ".$operator." ?";

                    $rows = DB::table('Hotel')
                        ->where('destID', $dest)
                        ->whereRaw("hotelID != ?", $id)
                        ->whereRaw($where, $biaya)->take(3)->get()->toArray();

                    foreach($rows as $row){
                        $row->Image = asset('img/'.$row->hImage);
                        $row->Name = $row->hName;
                        $row->Price = $row->hPrice;
                        $row->Tag = $row->hotelID;
                    }

                    return response()->json(['success' => true, 'rows' => $rows]);
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
                break;
            case 3:
                try {
                    $where = "tpPrice ".$operator." ?";

                    $rows = DB::table('Tour')
                        ->where('destID', $dest)
                        ->whereRaw("tourID != ?", $id)
                        ->whereRaw($where, $biaya)->take(3)->get()->toArray();

                    foreach($rows as $row){
                        $row->Image = asset('img/'.$row->tpImage);
                        $row->Name = $row->tpName;
                        $row->Price = $row->tpPrice;
                        $row->Tag = $row->tourID;
                    }

                    return response()->json(['success' => true, 'rows' => $rows]);
                } catch (Exception $e) {
                    dd($e->getMessage());
                }
                break;
        }

        return response()->json(['success' => false]);
    }
}
