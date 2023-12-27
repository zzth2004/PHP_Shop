<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


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
// admin use
        public function add_product($data, $files)
        {
            
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $config = mysqli_real_escape_string($this->db->link, $data['config']);
            $color = mysqli_real_escape_string($this->db->link, $data['color']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $product_details = mysqli_real_escape_string($this->db->link, $data['product_details']);
            $productValue = mysqli_real_escape_string($this->db->link, $data['product_value']);
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

            if ($productName ==""||$category ==""|| $brand ==""|| $config ==""|| $color ==""||$product_desc ==""||$product_details ==""||$productValue==""|| $price ==""|| $Quanlity ==""||$warranty ==""||$VAT ==""||$status ==""||$file_name =="") {
                $alert = "Error: Information of fields must not be empty!";
                return $alert;
            } else {
                move_uploaded_file($file_temp,$upload_image);
                $adminID = Session::get('adminID');
                $sql = "INSERT INTO product(productName, Status, Img, Config, Color, Price, VAT, Quanlity, Warranty, Decription, Details, ProductValue, CreatedBy, CateID, brandID) VALUES ('$productName', '$status','$unique_image', '$config', '$color','$price','$VAT','$Quanlity','$warranty','$product_desc','$product_details', '$productValue','$adminID','$category','$brand')";
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
            $productValue = mysqli_real_escape_string($this->db->link, $data['product_value']);
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
                    if($file_size>51200){
                        $alert = "<span> File Image should be less than 50MB</span>";
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
                    ProductValue = '$productValue',
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
                    ProductValue = '$productValue',
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

            $sql = "DELETE FROM product WHERE ProductID = '$productID'";
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
        // end back end

    //end admin
    //user see
        public function showNewProduct() {
            $sql =
            "SELECT * FROM product WHERE Status = '0'
            ORDER BY ProductID DESC;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showNewProductLap() {
            
           
            $sql =
            "SELECT product.*, productcategory.cateName FROM product JOIN productcategory ON product.CateID = productcategory.CateID 
            WHERE product.Status = '0' AND productcategory.cateName = 'LapTop'
            ORDER BY product.ProductID DESC LIMIT 5;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showNewProductphone() {
            
           
            $sql =
            "SELECT product.*, productcategory.cateName FROM product JOIN productcategory ON product.CateID = productcategory.CateID 
            WHERE product.Status = '0' AND productcategory.cateName = 'Smartphone'
            ORDER BY product.ProductID DESC LIMIT 2;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }

        public function showNewProductFollow($choose) {
            $choose = $this->fm->validation($choose);
           
            $choose = mysqli_real_escape_string($this->db->link, $choose);
           
            $sql =
            "SELECT product.*, productcategory.cateName FROM product JOIN productcategory ON product.CateID = productcategory.CateID 
            WHERE productcategory.cateName = '$choose'
            ORDER BY product.ProductID DESC LIMIT 4;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showProductDetailbyID($productID) {
            $productID = $this->fm->validation($productID);
           
            $productID = mysqli_real_escape_string($this->db->link, $productID);
           
            $sql =
            "SELECT product.*, productcategory.cateName, brand.brandName
            FROM product INNER JOIN productcategory ON product.CateID = productcategory.CateID
            INNER JOIN brand ON product.brandID = brand.brandID
            WHERE product.ProductID = '$productID' LIMIT 1;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showAllProduct(){
            $sql =
            "SELECT * FROM product  
            ORDER BY ProductID DESC;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
        }
        public function showAllProductFollowBy($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            $sql_check = "SELECT * FROM productcategory WHERE cateName = '$catName' LIMIT 1";
            $result_check = $this->db->select($sql_check);
            if ($result_check != false){
                $value = $result_check->fetch_assoc();
                $cateID = $value['CateID'];
            }
            $sql =
            "SELECT * FROM product
            WHERE CateID = '$cateID'
            ORDER BY ProductID ASC;";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
        }
        public function productListFollowBrand($brandName){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            $sql_check = "SELECT * FROM brand WHERE brandName = '$brandName' LIMIT 1";
            $result_check = $this->db->select($sql_check);
            if ($result_check != false){
                $value = $result_check->fetch_assoc();
                $brandID = $value['brandID'];
            }
            $sql =
            "SELECT * FROM product
            WHERE brandID = '$brandID'
            ORDER BY ProductID ASC";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
        }
        public function productListshowCateName($brandName){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            $sql_check = "SELECT * FROM brand WHERE brandName = '$brandName' LIMIT 1";
            $result_check = $this->db->select($sql_check);
            if ($result_check != false){
                $value = $result_check->fetch_assoc();
                $brandID = $value['brandID'];
                $cateID = $value['CateID'];
            }
            $sql =
            "SELECT * FROM productcategory
            WHERE CateID = '$cateID'
            LIMIT 1";
            // $sql = "SELECT * FROM product order by ProductID desc";
            $result = $this->db->select($sql);
            return $result;
        }
        public function findProductByContent($findContent){
            $findContent = $this->fm->validation($findContent);
            $findContent = mysqli_real_escape_string($this->db->link, $findContent);


            $sql = "SELECT product.*, productcategory.cateName, brand.brandName
            FROM product INNER JOIN productcategory ON product.CateID = productcategory.CateID
            INNER JOIN brand ON product.brandID = brand.brandID
            WHERE product.productName LIKE '%$findContent%' OR productcategory.cateName LIKE '%$findContent%' OR brand.brandName LIKE '%$findContent%' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //end user see
        //user comment
        public function showQuanComment($productID){
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);

            $sql = "SELECT COUNT(*) as commentCount FROM comment WHERE productID = '$productID'";
            $result = $this->db->select($sql);
            if ($result) {
                $row = $result->fetch_assoc();
                return isset($row['commentCount']) ? $row['commentCount'] : 0;
            } else {
                return 0;
            }
            
            
        }
        public function showStart($productID){
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);

            $sql = "SELECT * FROM comment WHERE productID = '$productID'";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showComment($productID){
            $productID = $this->fm->validation($productID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);

            $sql = "SELECT * FROM comment WHERE productID = '$productID' ORDER BY CreatedDate DESC";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function checkRateYet($productID,$userID){
            $productID = $this->fm->validation($productID);
            $userID = $this->fm->validation($userID);
            $userID = mysqli_real_escape_string($this->db->link, $userID);
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            
            $sql= "SELECT * FROM comment WHERE productID='$productID' AND CreatedBy='$userID'";
            $result=$this->db->select($sql);
            return $result;
        }

    }
?>