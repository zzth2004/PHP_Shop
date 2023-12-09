<?php


$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
// Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


class Userlogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    
    public function user_login($username, $password){
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $password = mysqli_real_escape_string($this->db->link, $password);

        if (empty($username) || empty($password)) {
            $alert = "Information must not be empty!";
            return $alert;
        } else {
            $sql = "SELECT * FROM useraccount WHERE username = '$username' AND Upassword = '$password' LIMIT 1";
            $result = $this->db->select($sql);

            if ($result != false) {
                $value = $result->fetch_assoc();
                CustomSession::set('Customer_login', true);
                CustomSession::set('userID', $value['userID']);
                CustomSession::set('username', $value['username']);
                CustomSession::set('Name', $value['Name']);
                $alert = "Login successfully!";
                return $alert;
            } else {
                $alert = "Invalid information! Please re-enter.";
                return $alert;
            }
        }
    }
    public function user_regis($username, $password, $email, $name){
        $sID = session_id();
        $username = $this->fm->validation($username);
        $password = $this->fm->validation($password);
        $email = $this->fm->validation($email);
        $name = $this->fm->validation($name);
        $username = mysqli_real_escape_string($this->db->link, $username);
        $password = mysqli_real_escape_string($this->db->link, $password);
        $email = mysqli_real_escape_string($this->db->link, $email);
        $name = mysqli_real_escape_string($this->db->link, $name);

        if (empty($username) || empty($password) ||empty( $name) ||empty($email)) {
            $alert = "Information must not be empty!";
            return $alert;
        } else {
            $sql_check ="SELECT * FROM useraccount WHERE username = '$username'";
            $result_check = $this->db->select($sql_check);
            if($result_check){
                $alert = "This username has already regis! Please re-enter your username";
                return $alert;
            }else{

            $sql = "INSERT INTO useraccount(SessionID, username, Upassword, Name, Email) VALUES ('$sID','$username', '$password', '$name','$email')";
            $result = $this->db->insert($sql);

            if ($result) {
                $alert = "Regis successfully!";
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'.$alert .'";
                                if (notification !== "") {
                                    
                                    alert(notification);
                                    window.location.href = "login.html";
                                }else{
                                    window.location.href = "404.php";
                                
                                }
                            });
                        }
                    </script>
                ';

                // $sqlLog = "SELECT * FROM useraccount WHERE username = '$username' AND Upassword = '$password' LIMIT 1";
                // $resultLogCheck = $this->db->select($sqlLog);

                // if ($resultLogCheck != false) {
                //     $value = $resultLogCheck->fetch_assoc();
                //     CustomSession::set('login', true);
                //     CustomSession::set('userID', $value['userID']);
                //     CustomSession::set('username', $value['username']);
                //     CustomSession::set('Name', $value['Name']);
                //     $alert = "Login successfully!";
                //     return $alert;
                // } else {
                //     $alert = "Invalid information! Please re-enter.";
                //     return $alert;
                // }
            } else {
                $alert = "Invalid information! Please re-enter.";
                return $alert;
            }
        }
    }
    }


    public function user_regisFull($data){
            $sID = session_id();
            $username = mysqli_real_escape_string($this->db->link, $data['username']);
            $password = mysqli_real_escape_string($this->db->link, $data['password']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $numHouse = mysqli_real_escape_string($this->db->link, $data['numHouse']);
            $street = mysqli_real_escape_string($this->db->link, $data['street']);
            $commune = mysqli_real_escape_string($this->db->link, $data['commune']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['co untry']);

            $address = $numHouse . ' '. $street . ', ' . $commune . ', ' . $city . ', ' . $country;
            if ($username ==""||$password ==""|| $email ==""|| $phone ==""|| $name ==""||$numHouse ==""||$street ==""|| $commune ==""|| $city ==""||$country =="") {
                $alert = "Error: Information of fields must not be empty!";
                return $alert;
            } else{
                $sql_check ="SELECT * FROM useraccount WHERE username = '$username'";
                $result_check = $this->db->select($sql_check);
                if($result_check){
                    $alert = "This username has already regis! Please re-enter your username";
                    return $alert;
                }else{
                
                $sql = "INSERT INTO useraccount(SessionID, username, Upassword, Name, Email, Phone, Address) VALUES ('$sID','$username', '$password', '$name','$email','$phone','$address')";
                $result = $this->db->insert($sql);

            if ($result) {
                $alert = "Regis successfully!";
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'.$alert .'";
                                if (notification !== "") {
                                    
                                    alert(notification);
                                    window.location.href = "login.html";
                                }else{
                                    window.location.href = "404.php";
                                
                                }
                            });
                        }
                    </script>
                ';

                // $sqlLog = "SELECT * FROM useraccount WHERE username = '$username' AND Upassword = '$password' LIMIT 1";
                // $resultLogCheck = $this->db->select($sqlLog);

                // if ($resultLogCheck != false) {
                //     $value = $resultLogCheck->fetch_assoc();
                //     CustomSession::set('login', true);
                //     CustomSession::set('userID', $value['userID']);
                //     CustomSession::set('username', $value['username']);
                //     CustomSession::set('Name', $value['Name']);
                //     $alert = "Login successfully!";
                //     return $alert;
                // } else {
                //     $alert = "Invalid information! Please re-enter.";
                //     return $alert;
                // }
            } else {
                $alert = "Invalid information! Please re-enter.";
                return $alert;
            }
        }
    }
    }
    public function GuestAdress($data){
            $sID = session_id();
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $numHouse = mysqli_real_escape_string($this->db->link, $data['numHouse']);
            $street = mysqli_real_escape_string($this->db->link, $data['street']);
            $commune = mysqli_real_escape_string($this->db->link, $data['commune']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            

            $address = $numHouse . ' '. $street . ', ' . $commune . ', ' . $city . ', ' . $country;

            $sql = "INSERT INTO useraccount(SessionID, Name, Email, Phone, Address) VALUES ('$sID', '$name','$email','$phone','$address')";
            $result = $this->db->insert($sql);
            if($result){
                $alert = "Add information about dilivering successful";
                return $alert;
            }else{
                $alert = "Add information about dilivering faild";
                return $alert;
            }
    }
}
?>