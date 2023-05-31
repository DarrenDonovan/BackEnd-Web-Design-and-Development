<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class Customers extends Model
{
    use HasFactory;
    private $conn;

    function __construct(){
        global $conn;
        $this->conn = $conn;
    }
    
    function login($username, $password){
        $customer = DB::table('Customer')->where('custID', $username)->first();
        if ($customer && Hash::check($password, $customer->cPassword)) {
            session()->put('userID', $username);
            $cookieName = 'user';
            $cookieValue = $customer->custID;
            $expiration = time() + (120 * 60); 
            $cookiePath = '/';
            $cookieDomain = '';
            setcookie($cookieName, $cookieValue, $expiration, $cookiePath, $cookieDomain);
            if($customer->custID == "admin"){
                return 4;
            }
            return 1;
        } elseif ($customer) {
            return 2;
        } else {
            return 3;
        }
    }

    function signup($username, $password, $nama){
       $cust = DB::table('Customer')->where('custID', $username)->first();
       if($cust){
            return 1;
       }else{
            DB::table('Customer')->insert([
                'custID' => $username,
                'cPassword' => Hash::make($password),
                'cName' => $nama
            ]);
            session()->put('userID', $username);
            $cookie = cookie('user', $username, 120 * 60);
            return 2;
       }
    }

    function checkusername($username){
        $conn = $this->conn;
        $query = "SELECT custID FROM Customer WHERE custID = '".$username."'";
        $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
        if($result != false){
            if(sqlsrv_num_rows($result) > 0){
                return true;
            }else{
                return false;
            }
        }else{
            echo "<script>alert(\"Failure in connecting to database\")</script>";
            die(print_r(sqlsrv_errors(), true));
        }
    }

    function checkpassword($password, $username){
        $conn = $this->conn;
        $query = "SELECT cPassword FROM Customer WHERE custID = '".$username."'";
        $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
        if($result != false){
            $row = sqlsrv_fetch_array($result);
            if(password_verify($password, $row["cPassword"])){
                return false;
            }else{
                return true;
            }
        }else{
            echo "<script>alert(\"Failure in connecting to database\")</script>";
            die(print_r(sqlsrv_errors(), true));
        }
    }        
}
