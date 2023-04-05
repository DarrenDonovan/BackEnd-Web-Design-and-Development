<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Customers extends Model
{
    use HasFactory;

    public $username;
    public $password;
    public $nama;
    public $email;
    public $alamat;
    public $notelp;
    public $ultah;
    private $conn;

    function __construct(){
        global $conn;
        $this->conn = $conn;
    }
    
    function login($username, $password){
        $customer = DB::table('Customer')->where('userID', $username)->first();
        if ($customer && Hash::check($password, $customer->password)) {
            $this->username = $customer->username;
            $this->nama = $customer->nama;
            $this->email = $customer->email;
            $this->alamat = $customer->alamat;
            $this->notelp = $customer->notelp;
            $this->ultah = $customer->birthdate;
            return 1;
        } elseif ($customer) {
            return 2;
        } else {
            return 3;
        }
    }

    function signup($username, $password, $nama){
       $cust = DB::table('Customer')->where('userID', $username)->first();
       if($cust){
            return 1;
       }else{
            DB::table('Customer')->insert([
                'userID' => $username,
                'cpassword' => Hash::make($password),
                'cName' => $nama
            ]);
            return 2;
       }
    }
    
    

    function checkusername($username){
        $conn = $this->conn;
        $query = "SELECT username FROM customer WHERE username = '".$username."'";
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
        $query = "SELECT password FROM customer WHERE username = '".$username."'";
        $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
        if($result != false){
            $row = sqlsrv_fetch_array($result);
            if(password_verify($password, $row["password"])){
                return false;
            }else{
                return true;
            }
        }else{
            echo "<script>alert(\"Failure in connecting to database\")</script>";
            die(print_r(sqlsrv_errors(), true));
        }
    }

    function transhist($num){
        $conn = $this->conn;
        $username = $this->username;
        $query = "SELECT * FROM transaction_history WHERE username = '".$username."' LIMIT ".$num;
        $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
        if(sqlsrv_num_rows($result) > 0){
            echo "<table>";
            echo "<tr>";
            echo "<th>No.</th>";
            echo "<th>Order_id</th>";
            echo "<th>Item</th>";
            echo "<th>Penjual</th>";
            echo "<th>Destination</th>";
            echo "<th>Jumlah</th>";
            echo "<th>Tanggal transaksi</th>";
            echo "<th>Total Transaksi</th>";
            echo "</tr>";
            $i=1;
            while($row){
                echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$row["Order_id"]."</td>";
                echo "<td>".$row["Type_name"]."</td>";
                echo "<td>".$row["Product_name"]."</td>";
                echo "<td>".$row["Destination_id"]."</td>";
                echo "<td>".$row["Amount"]."</td>";
                echo "<td>".$row["Transaction_date"]."</td>";
                echo "<td>".$row["Total"]."</td>";
                echo "</tr>";
                $i++;
            }
            echo "</table>";
        }else if(sqlsrv_num_rows($result) == 0){
            echo "<h3> You haven't made any transaction</h3>";  
        }else{
            echo "<script>alert(\"Failure in connecting to database\")</script>";
            die(print_r(sqlsrv_errors(), true));
        }
    }

    function purchase($num, $id){
        $conn = $this->conn;
        $query1 = "UPDATE products SET amount = amount - ".$num." WHERE Product_id = '".$id."'";
        $query2 = "SELECT * FROM products WHERE Product_id = '".$id."'";
        $query3 = "SELECT type_name FROM product_types WHERE Product_key = '".$id."'";
        $query4 = "INSERT INTO transaction_history(username, type_name, product_name, destination_id, amount, trans_date, sell_price, total) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $res1 = sqlsrv_query($conn, $query1);
        $res2 = sqlsrv_query($conn, $query2, array(), array("Scrollable" => 'static'));
        if($res1 != false){
            $rows = sqlsrv_num_rows($res2);
            if($rows > 0){
                $row = sqlsrv_fetch_array($res2, SQLSRV_FETCH_ASSOC);
                $res3 = sqlsrv_query($conn, $query3, array(), array("Scrollable" => 'static'));
                $rows2 = sqlsrv_num_rows($res3);
                if($rows2 > 0){
                    $row2 = sqlsrv_fetch_array($res3, SQLSRV_FETCH_ASSOC);
                    $query5 = "SELECT GETDATE() AS CurrentDate";
                    $res5 = sqlsrv_query($conn, $query5);
                    if($res5 != false){
                        $date = sqlsrv_get_field($res5, 0);
                        $param = array($this->username, $row2["type_name"], $row["Product_name"], $row["Destination_id"], $num, $date, $row["Selling_price"], $num * $row["Selling_price"]);
                        $res4 = sqlsrv_query($conn, $query4, $param);
                        if($res4 != false){
                            echo "<script>alert(\"Purchase Successful\")</script>";
                        }else{
                            echo "<script>alert(\"Failure in connecting to database\")</script>";
                            die(print_r(sqlsrv_errors(), true));
                        }
                    }else{
                        echo "<script>alert(\"Failure in connecting to database\")</script>";
                        die(print_r(sqlsrv_errors(), true));
                    }  
                }else{
                    echo "<script>alert(\"Failure in connecting to database\")</script>";
                    die(print_r(sqlsrv_errors(), true));
                }
            }else{
                echo "<script>alert(\"Failure in connecting to database\")</script>";
                die(print_r(sqlsrv_errors(), true));
            }
        }else{
            echo "<script>alert(\"Failure in connecting to database\")</script>";
            die(print_r(sqlsrv_errors(), true));
        }
    }        
}
