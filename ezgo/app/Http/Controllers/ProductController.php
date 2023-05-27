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
}
