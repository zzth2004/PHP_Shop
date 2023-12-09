<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once ($filepath.'/../helpers/format.php');


?>
<?php
    class Brand {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function add_Brands($brandName){
                $$brandName = $this->fm->validation($brandName);
                
                $$brandName = mysqli_real_escape_string($this->db->link, $brandName);
                
    
                if (empty($brandName)) {
                    $alert = "Error: Information of Brands must not be empty!";
                    return $alert;
                } else {
                    $adminID = Session::get('adminID');
                    $sql = "INSERT INTO brand(brandName, CreatedBy) VALUES ('$brandName',$adminID)";
                    $result = $this->db->insert($sql);
    
                    if($result){
                    $alert = "Success: Add new brand successfully!";
                    return $alert;
                    }
                    else {
                        $alert = "Failed: Add new brand failed!";
                        return $alert;
                        }
                }
        }
        public function edit_Brand($brandID, $brandName){
            $brandID = $this->fm->validation($brandID);
            $brandName = $this->fm->validation($brandName);

            $brandID = mysqli_real_escape_string($this->db->link, $brandID);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);
            
            if (empty($brandID)||empty($brandName)) {
                $alert = "Error: Information of Brands must not be empty!";
                return $alert;
            }else{
                $adminID = Session::get('adminID');

                date_default_timezone_set('Asia/Ho_Chi_Minh'); // Đặt múi giờ của Việt Nam

                $currentDateTime = date("Y-m-d H:i:s");

                $sql = "UPDATE brand SET brandName='$brandName', CreatedBy ='$adminID', UpdateDate ='$currentDateTime' WHERE brandID ='$brandID'";
                $result = $this->db->update($sql);

                if($result){
                $alert = "Success: Edit Brands successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Edit Brands failed!";
                    return $alert;
                    }
            }
        }
        public function showBrandList() {
            $sql = "SELECT * FROM brand order by brandID desc";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function showBrandListLimit() {
            $sql = "SELECT * FROM brand order by brandID desc LIMIT 5";
            $result = $this->db->select($sql);
            return $result;
            
        }
        public function findbyBrandID($brandID){
            $brandID = $this->fm->validation($brandID);
            $brandID = mysqli_real_escape_string($this->db->link, $brandID);
            if (empty($brandID)) {
                $alert = "Error: BrandID of category must not be empty!";
                return $alert;
            }else{
                $sql = "SELECT * FROM brand WHERE brandID ='$brandID'";
                $result = $this->db->select($sql);
                return $result;
            }
        }
        public function delete_brand($brandID){
            $brandID = $this->fm->validation($brandID);
            $brandID = mysqli_real_escape_string($this->db->link,$brandID);

            $sql = "DELETE FROM brand WHERE brandID = '$brandID'";
            $result = $this->db->delete($sql);
            if($result){
                $alert = "Success: Delete Brands successfully!";
                return $alert;
                }
                else {
                    $alert = "Failed: Delete brands failed!";
                    return $alert;
                }
        }  
        public function showBrandfollowCatName($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);

            $sql = "SELECT brand.*, productcategory.cateName FROM brand JOIN productcategory ON brand.CateID = productcategory.CateID 
            WHERE productcategory.cateName = '$catName'
            ORDER BY brand.brandID DESC LIMIT 6 ;";

            $result = $this->db->select($sql);
            return $result;
        }  
        public function showBrandFollowCatLimit($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);

            $sql = "SELECT brand.*, productcategory.cateName FROM brand JOIN productcategory ON brand.CateID = productcategory.CateID 
            WHERE productcategory.cateName = '$catName'
            ORDER BY brand.brandID DESC LIMIT 2;";

            $result = $this->db->select($sql);
            return $result;
        }  
    }

?>