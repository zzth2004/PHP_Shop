<?php


$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/session.php');
Session::checkLogin();
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


class AdminLogin
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function admin_login($adminuser, $adminpass)
    {
        $adminuser = $this->fm->validation($adminuser);
        $adminpass = $this->fm->validation($adminpass);
        $adminuser = mysqli_real_escape_string($this->db->link, $adminuser);
        $adminpass = mysqli_real_escape_string($this->db->link, $adminpass);

        if (empty($adminuser) || empty($adminpass)) {
            $alert = "Information must not be empty!";
            return $alert;
        } else {
            $sql = "SELECT * FROM tbl_admin WHERE adminUser = '$adminuser' AND adminPass = '$adminpass' LIMIT 1";
            $result = $this->db->select($sql);

            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('login', true);
                Session::set('adminID', $value['adminID']);
                Session::set('adminUser', $value['adminUser']);
                Session::set('adminName', $value['adminName']);
                header('Location: index.php');
            } else {
                $alert = "Invalid information! Please re-enter.";
                return $alert;
            }
        }
    }
    
}
?>