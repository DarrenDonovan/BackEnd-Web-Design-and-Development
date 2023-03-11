<?php
    include('connect.php');
    class customer{
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

        function load(){
            $conn = $this->conn;
            $query = "SELECT * FROM customer WHERE username = '".$this->username."'";
            $result = sqlsrv_query($conn, $query, array(), array("Scrollable" => 'static'));
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            if(sqlsrv_num_rows($result) > 0){
               $this->nama = $row["nama"];
               $this->email = $row["email"];
               $this->alamat = $row["alamat"];
               $this->notelp = $row["notelp"];
               $this->ultah = $row["birthdate"];
            }
        }

        function login($username, $password){
            $conn = $this->conn;
            $query = "SELECT username, password FROM customer WHERE username = '".$username."'";
            $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
            if(sqlsrv_num_rows($result) > 0){
               $identity = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
               if($username == $identity["username"]){
                if(password_verify($password, $identity["password"])){
                    $this->username = $username;
                    echo "<script>window.location.href = \"../index.html\";</script>";
                }else{
                    echo $identity["password"];
                    echo "<script>alert(\"Password is wrong\")</script>";
                }
               }else{
                if($password != $identity["password"]){
                    echo "<script>alert(\"Username and password is wrong\")</script>";
                }else{
                    echo "<script>alert(\"Username is wrong\")</script>";
                }
               }
            }else{
                echo "<script>alert(\"Failure in connecting to database\")</script>";
                die(print_r(sqlsrv_errors(), true));
            }
        }

        function signin($username, $password, $nama){
            $conn = $this->conn;
            $hash_pw = password_hash($password, PASSWORD_DEFAULT);
            $query = "SELECT username FROM customer WHERE username = ?";
            $params = array($username);
            $result = sqlsrv_query($conn, $query, $params);
            if($result == false){
                echo "<script>alert(\"Failure in connecting to database\")</script>";
                die(print_r(sqlsrv_errors(), true));
            }else if(sqlsrv_num_rows($result) > 0){
                echo "<script>alert(\"Username already exists\")</script>";
            }else{
                $query = "INSERT INTO customer (username, password, nama) VALUES (?, ?, ?)";
                $params = array($username, $hash_pw, $nama);
                $result = sqlsrv_query($conn, $query, $params);
                if($result == false){
                    echo "<script>alert(\"Failure in connecting to database\")</script>";
                    die(print_r(sqlsrv_errors(), true));
                }
            }
        }
        

        function checkusername($username){
            $conn = $this->conn;
            $query = "SELECT username FROM customer WHERE username = '".$username."'";
            $result = sqlsrv_query($conn, $query, array(), array( "Scrollable" => 'static' ));
            if($result != false){
                if(sqlsrv_num_rows($result) == 0){
                    return true;
                }else{
                    return false;
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
?>