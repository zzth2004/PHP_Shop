<?php

include_once '../lib/database.php';
include_once '../helpers/format.php';


?>
<?php
    class Category
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_category($catName, $seotitle)
        {
            $catName = $this->fm->validation($catName);
            $seotitle = $this->fm->validation($seotitle);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $seotitle = mysqli_real_escape_string($this->db->link, $seotitle);

            if (empty($catName)||empty($seotitle)) {
                $alert = "Error: Information of category must not be empty!";
                return $alert;
            } else {
                $adminID = Session::get('adminID');
                $sql = "INSERT INTO productcategory(cateName,SeoTitle,CreatedBy) VALUES ('$catName','$seotitle', '$adminID')";
                $result = $this->db->insert($sql);

                if($result){
                $alert = "Success: Add category successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Add category failed!";
                    return $alert;
                    }
            }
        }
        public function edit_catagory($cateID,$catName, $seotitle){
            $cateID = $this->fm->validation($cateID);
            $catName = $this->fm->validation($catName);
            $seotitle = $this->fm->validation($seotitle);

            $cateID = mysqli_real_escape_string($this->db->link, $cateID);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $seotitle = mysqli_real_escape_string($this->db->link, $seotitle);
            
            if (empty($cateID)||empty($catName)||empty($seotitle)) {
                $alert = "Error: Information of category must not be empty!";
                return $alert;
            }else{
                $adminID = Session::get('adminID');

                date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ của Việt Nam

                $currentDateTime = date("Y-m-d H:i:s");

                $sql = "UPDATE productcategory SET cateName ='$catName', SeoTitle = '$seotitle', CreatedBy ='$adminID', UpdateDate ='$currentDateTime' WHERE CateID ='$cateID'";
                $result = $this->db->update($sql);

                if($result){
                $alert = "Success: Edit category successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Edit category failed!";
                    return $alert;
                    }
            }
        }
        public function showCatList() {
            $sql = "SELECT * FROM productcategory order by CateID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function findbyCateID($cateID){
            $cateID = $this->fm->validation($cateID);
            $cateID = mysqli_real_escape_string($this->db->link, $cateID);
            if (empty($cateID)) {
                $alert = "Error: CateID of category must not be empty!";
                return $alert;
            }else{
                $sql = "SELECT * FROM productcategory WHERE CateID ='$cateID'";
                $result = $this->db->select($sql);
                return $result;
            }
        }
        public function delete_category($cateID){
            $cateID = $this->fm->validation($cateID);
            $cateID = mysqli_real_escape_string($this->db->link, $cateID);

            $sql = "DELETE FROM productcategory WHERE CateID = '$cateID'";
            $result = $this->db->delete($sql);
            if($result){
                $alert = "Success: Delete category successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Delete category failed!";
                    return $alert;
                }
        }
    }
?>