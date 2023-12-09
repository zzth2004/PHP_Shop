<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


?>
<?php
    class Cart
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function add_cart($quanlity, $productID)
        {
            $userID = CustomSession::get('userID');
            $quanlity = $this->fm->validation($quanlity);
           
            $quanlity = mysqli_real_escape_string($this->db->link, $quanlity);
            $productID = mysqli_real_escape_string($this->db->link, $productID);
            $sID = session_id();


            $sql = "SELECT * FROM product WHERE ProductID = '$productID'";
            $result = $this->db->select($sql)->fetch_assoc();
            // echo '<pre>';
            // echo print_r($result);
            // echo '</pre>';

            $check_cart = "SELECT * FROM cart WHERE ProductID = '$productID' AND SessionID = '$sID'";
            $result_check = $this->db->select($check_cart);
            if($result_check){
                $msg = "This product has already added!";
                return $msg;
            }else{
                $productName= $result['productName'];
                $productImg = $result['Img'];
                $price = $result['Price'];
                if(isset($userID) && $userID != null){
                    $sql2 = "INSERT INTO cart(ProductID, productName, SessionID, Price, CartQuanlity, Img, CreatedBy) VALUES ('$productID','$productName', '$sID','$price',' $quanlity','$productImg','$userID')";
                }else{
                    $sql2 = "INSERT INTO cart(ProductID, productName, SessionID, Price, CartQuanlity, Img) VALUES ('$productID','$productName', '$sID','$price',' $quanlity','$productImg')";
                }
               
                $result_ins = $this->db->insert($sql2);
    
                if( $result_ins){
                    $alert = "Success: Add product to cart successfully!";
                    return $alert;
                }
                else {
                        $alert = "Failed: Add product to cart failed!";
                        return $alert;
                }
            }
        }
        public function update_quantity($cartID,  $quanlity){
            $userID = CustomSession::get('userID');
            date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ của Việt Nam

            $currentDateTime = date("Y-m-d H:i:s");

            // =============================
            $cartID = $this->fm->validation($cartID);
            $quanlity = $this->fm->validation($quanlity);
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);
            $quanlity = mysqli_real_escape_string($this->db->link,  $quanlity);
            
            if(isset($userID) && $userID != null){
                $sql = $sql = "UPDATE cart SET 
                CartQuanlity ='$quanlity',
                CreatedBy = '$userID',
                UpdateDate = '$currentDateTime'
                WHERE cartID ='$cartID'";
            }else{
                $sql = "UPDATE cart SET 
                CartQuanlity ='$quanlity',
                UpdateDate = '$currentDateTime'
                WHERE cartID ='$cartID'";
            }
           
                
            $result = $this->db->update($sql);

            if($result){
                $alert = "Success: Update quantity of product successfully!";
                return $alert;
                }
            else {
                $alert = "Failed: Update quantity of product failed!";
                return $alert;
            }
              
        }
        
        public function showcart() {
            $sID = session_id();
            $userID = CustomSession::get('userID');
            if(isset($userID) && $userID != null){
                $sql =
                "SELECT cart.*, product.Config, product.Quanlity
                FROM cart AS cart
                JOIN product AS product ON cart.ProductID = product.ProductID
                WHERE cart.CreatedBy = '$userID'
                ORDER BY cart.cartID DESC;";
            }else{
                $sql =
                "SELECT cart.*, product.Config, product.Quanlity
                FROM cart AS cart
                JOIN product AS product ON cart.ProductID = product.ProductID
                WHERE SessionID = '$sID'
                ORDER BY cart.cartID DESC;";
            }

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
        public function delete_cart($cartID){
            $cartID = $this->fm->validation($cartID);
            $cartID = mysqli_real_escape_string($this->db->link, $cartID);

            $sql = "DELETE FROM cart WHERE cartID = '$cartID'";
            $result = $this->db->delete($sql);
            if($result){
                $alert = "Success: Delete this product in cart successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Delete this product in cart failed!";
                    return $alert;
                }
        }
        public function check_cart(){
            $sID = session_id();
            $userID = CustomSession::get('userID');
            if(isset($userID) && $userID != null){
                $sql = "SELECT * FROM cart WHERE CreatedBy ='$userID'";
            }else{
            $sql = "SELECT * FROM cart WHERE SessionID='$sID'";
            }
            $result= $this->db->select($sql);
            return  $result;

        }
        public function del_all_cart_session(){
            $sID = session_id();
            $userID = CustomSession::get('userID');
            if(isset($userID) && $userID != null){
            } else{
                $sql = "DELETE FROM cart WHERE SessionID='$sID'";
            }
            
            
            $result= $this->db->delete($sql);
            return  $result;
        }

        // $login_check =  CustomSession::get('Customer_login');
        //                     if($login_check==false){
        //                         echo '<p style="font-size: 2rem; font-weight: 600; color: red;">Cart is empty. Please add product
        //                         to cart!</p>';
        //                     }else{
        //                         echo '<a href="shop-payment.php" class="btn btn-primary">Checkout</a>';
        //                     }
        //                     
}
?>