<?php

include_once '../lib/database.php';
include_once '../helpers/format.php';


?>
<?php
    class Product
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_product($data, $files)
        {
            
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $product_details = mysqli_real_escape_string($this->db->link, $data['product_details']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $Quanlity = mysqli_real_escape_string($this->db->link, $data['Quanlity']);
            $warranty = mysqli_real_escape_string($this->db->link, $data['warranty']);
            $VAT = mysqli_real_escape_string($this->db->link, $data['VAT']);
            $status = mysqli_real_escape_string($this->db->link, $data['status']);
            // kiem tra va cho hinh anh vao folder upload
            $permited= array('ipg', 'ipeg', 'png', 'gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_name;
            $upload_image = "uploads/".$unique_image;

            if ($productName ==""||$category ==""|| $brand ==""||$product_desc ==""||$product_details ==""|| $price ==""|| $Quanlity ==""||$warranty ==""||$VAT ==""||$status ==""||$file_name =="") {
                $alert = "Error: Information of fields must not be empty!";
                return $alert;
            } else {
                move_uploaded_file($file_temp,$upload_image);
                $adminID = Session::get('adminID');
                $sql = "INSERT INTO product(productName, Status, Img, Price, VAT, Quanlity, Warranty, Decription, Details, CreatedBy, CateID, brandID) VALUES ('$productName', '$status','$unique_image','$price','$VAT','$Quanlity','$warranty','$product_desc','$product_details','$adminID','$category','$brand')";
                $result = $this->db->insert($sql);

                if($result){
                $alert = "Success: Add product successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Add product failed!";
                    return $alert;
                    }
            }
        }
        public function update_product($data, $files, $productID){
            $adminID = Session::get('adminID');
            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ của Việt Nam

            $currentDateTime = date("Y-m-d H:i:s");

            // =============================
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link,  $productID);

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $product_details = mysqli_real_escape_string($this->db->link, $data['product_details']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $Quanlity = mysqli_real_escape_string($this->db->link, $data['Quanlity']);
            $warranty = mysqli_real_escape_string($this->db->link, $data['warranty']);
            $VAT = mysqli_real_escape_string($this->db->link, $data['VAT']);
            $status = mysqli_real_escape_string($this->db->link, $data['status']);
            // kiem tra va cho hinh anh vao folder upload
            $permited= array('ipg', 'ipeg', 'png', 'gif');
            $file_name = $_FILES['img']['name'];
            $file_size = $_FILES['img']['size'];
            $file_temp = $_FILES['img']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()),0,10).'.'.$file_name;
            $upload_image = "uploads/".$unique_image;

            if ($productName ==""||$category ==""|| $brand ==""||$product_details ==""|| $price ==""|| $Quanlity ==""||$warranty ==""||$VAT ==""||$status =="") {
                $alert = "Error: Information of fields must not be empty!";
                return $alert;
            }    
            else{
                if(!empty($file_name)){
                    //nếu ng dùng chọn ảnh
                    if($file_size>5120){
                        $alert = "<span> File Image should be less than 5MB</span>";
                        return $alert;
                    }else if(in_array($file_ext, $permited)==false){
                        $alert ="<span> Uou can upload only:=".implode(',',$permited)." </span> ";
                        return $alert;
                    }
                    move_uploaded_file($file_temp,$upload_image);
                    $sql = "UPDATE product SET 
                    productName ='$productName',
                    Status = '$status',
                    Img='$unique_image',
                    Price='$price',
                    VAT='$VAT',
                    Quanlity='$Quanlity',
                    Warranty='$warranty',
                    Details='$product_details',
                    CateID='$category',
                    brandID='$brand',
                    UpdateBy ='$adminID',
                    UpdateDate ='$currentDateTime'
                    WHERE ProductID ='$productID'";
                }else{
                    // nguoi dung kh chon anh
                    $sql = "UPDATE product SET 
                    productName ='$productName',
                    Status = '$status',
                    Price='$price',
                    VAT='$VAT',
                    Quanlity='$Quanlity',
                    Warranty='$warranty',
                    Details='$product_details',
                    CateID='$category',
                    brandID='$brand',
                    UpdateBy ='$adminID',
                    UpdateDate ='$currentDateTime'
                    WHERE ProductID ='$productID'";
                }
                $result = $this->db->update($sql);

                if($result){
                    $alert = "Success: Change product successfully!";
                    return $alert;
                    }
                else {
                    $alert = "Failed: Change product failed!";
                    return $alert;
                }
            }    
        }
        
        public function showProductList() {
            $sql =
            "SELECT p.*, c.cateName, b.brandName
            FROM product AS p
            JOIN productcategory AS c ON p.CateID = c.CateID
            JOIN brand AS b ON p.brandID = b.brandID
            ORDER BY p.ProductID DESC;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function findbyProductID($productID){
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            if (empty($productID)) {
                $alert = "Error: productID of product must not be empty!";
                return $alert;
            }else{
                $sql = "SELECT * FROM product WHERE ProductID ='$productID'";
                $result = $this->db->select($sql);
                return $result;
            }
        }
        public function delete_product($productID){
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);

            $sql = "DELETE FROM product WHERE CateID = '$productID'";
            $result = $this->db->delete($sql);
            if($result){
                $alert = "Success: Delete product successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Delete product failed!";
                    return $alert;
                }
        }
    }
?>