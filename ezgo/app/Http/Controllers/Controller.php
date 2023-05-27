<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Session;
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
}
