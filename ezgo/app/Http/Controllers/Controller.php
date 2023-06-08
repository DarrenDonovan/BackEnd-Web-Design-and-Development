<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Customers;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function login(Request $req){
        $username = $req->input('username');
        $password = $req->input('password');

        $customer = new Customers();
        $result = $customer->login($username, $password);


        switch($result){
            case 1:
                return response()->json(['success' => 1]);
                break;
            case 2:
                return response()->json(['success' => 2]);
                break;
            case 3:
                return response()->json(['success' => 3]);
                break;
            case 4:
                return response()->json(['success' => 4]);
                break;
        }
    }

    public function signup(Request $req){
        $username = $req->input('username');
        $password = $req->input('password');
        $name = $req->input('name');

        $customer = new Customers();
        $result = $customer->signup($username,$password,$name);
        switch($result){
            case 1:
                return response()->json(['success' => 1]);
                break;
            case 2:
                return response()->json(['success' => 2]);
                break;
        }
    }

    public function SessionGet(Request $req){
        $item = session()->get($req->input('name'));
        return response()->json(['success' => true, 'item' => $item]);
    }  

    public function img(Request $req){
        $pic = asset('img/'.$req->input('name'));
        return response()->json(['success' => true, 'pic' => $pic]);
    }  

    public function update(Request $req){
        $id = session()->get('userID');
        $name = $req->input('name');
        $address = $req->input('address');
        $phone = $req->input('phone');
        $email = $req->input('email');
        $birthday = $req->input('birthday');
        $img;
        if ($req->hasFile('profilePicture')) {
            $profilePicture = $req->file('profilePicture');
            $img = $profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('img'), $img);
        }else{
            $pic = DB::table('Customer')->where('custID', $id)->first()->cImage;
            $img = $pic;
        }

        if(DB::table('Customer')
                ->where('custID', $id)
                ->update([
                    'cName' => $name,
                    'cAddress' => $address,
                    'cPhone' => $phone,
                    'cEmail' => $email,
                    'cBirthDate' => $birthday,
                    'cImage' => $img
                ])){
                    return redirect()->back();            
        }
    }

    public function detail(Request $req){
        $id = $req->input('id');
        $kode = $req->input('kode');
        $orderid = $req->input('od');

        $itemRet = new \stdClass();;

        switch($kode){
            case 1:
                $item = DB::table('Tickets')->where('ticketID', $id)->first();
                $od = DB::table('OrderDetails')->where('orderdetailsID', $orderid)->first();
                $itemRet->id = $item->productID;
                $itemRet->name = $item->tcName;
                $itemRet->total = $od->total;
                $itemRet->price = $item->tcSellingPrice;
                $itemRet->totPrice = $od->totalPrice;
                break;
            case 2:
                $item = DB::table('Hotel')->where('hotelID', $id)->first();
                $od = DB::table('OrderDetails')->where('orderdetailsID', $orderid)->first();
                $itemRet->id = $item->productID;
                $itemRet->name = $item->hName;
                $itemRet->total = $od->total;
                $itemRet->price = $item->hPrice;
                $itemRet->totPrice = $od->totalPrice;
                break;
            case 3:
                $item = DB::table('Tour')->where('tourID', $id)->first();
                $od = DB::table('OrderDetails')->where('orderdetailsID', $orderid)->first();
                $itemRet->id = $item->productID;
                $itemRet->name = $item->tpName;
                $itemRet->total = $od->total;
                $itemRet->price = $item->tpPrice;
                $itemRet->totPrice = $od->totalPrice;
                break;
        }

        return response()->json(['success' => true, 'item' => $itemRet]);
    }

    public function Mod(Request $req){
        $code = $req->input('code');
        $id = $req->input('id');

        switch ($code) {
            case 1:

                $comments = DB::table('Comments')->where('blogID', $id)->get();
                $blogs = DB::table('Blogs')->where('blogID', $id)->get();

                if ($blogs->isNotEmpty()) {
                    if($comments->isNotEmpty()){
                        DB::table('Comments')->where('blogID', $id)->delete();
                    }
                    DB::table('Blogs')->where('blogID', $id)->delete();
                    return response()->json(['mail' => $id, 'success' => true]);
                }
                break;
            case 2:
                $commentsDeleted = DB::table('Comments')->where('commentID', $id)->delete();
                
                if ($commentsDeleted) {
                    return response()->json(['success' => true]);
                }
                break;
        }
        
        return response()->json(['success' => false]);
        
    }
}
