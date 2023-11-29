<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brands.php';
?>
<?php
    $class = new Brand();
 
    if (!isset($_GET['brandID']) || $_GET['brandID'] == NULL) {
        echo "<script>window.location = 'brandlist.php';</script>";
    }
    else{
        $brandID = $_GET['brandID'];
		$brandFindByID = $class->findbyBrandID($brandID);
        if($brandFindByID){
            $result = $brandFindByID->fetch_assoc();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $cateID = $_POST['cateID'];
            $brandname = $_POST['brandname'];
           
            $brandedit = $class->edit_Brand($brandID, $brandname);
            
            echo '
            <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "'. $brandedit .'";
                        if (notification !== "") {
                            alert(notification);
                            window.location.href = "brandlist.php";
                        }
                    });
                }
            </script>
            ';
            // echo " <script> window.location= 'catlist.php'; </script>"; 
            
    }
}
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $cateID = $_POST['cateID'];
    //     $catname = $_POST['catname'];
    //     $seotitle = $_POST['seotitle'];
    //     $createdBy = Session::get('adminID');
    //     $catedit = $class->edit_catagory($cateID, $catname , $seotitle);
        
    //     echo " <script> window.location= 'catlist.php'; </script>";
    // }else{    
	// 	$id = $_GET['cateID'];
	// 	$cateFindByID = $class->findbyCateID($id);
    //     if($cateFindByID){
    //         $result = $cateFindByID->fetch_assoc();
    //     }
	// }
	
?>



<div class="grid_10">
    <div class="box round first grid row">
        <h2>Edit Brand</h2>



        <div class="block copyblock">
            <div class="form">
                <form action="" method="post">
                    <label>Re-Enter to Edit</label>

                    <div class="form-group">
                        <p>Brand name:</p>
                        <input type="text" name="brandname" value="<?php echo $result['brandName']; ?>"><br>
                    </div>
                    <div class="form-group-button">
                        <input type="submit" name="submit" Value="Update" onclick="showResult()" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>