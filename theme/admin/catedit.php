<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';
?>
<?php
    $class = new Category();
    if(!isset($_GET['cateID']) || $_GET['cateID'] == NULL) {
        echo " <script> window.location= 'catlist.php'; </script>";
    } else{
        $cateID = $_GET['cateID'];
		$cateFindByID = $class->findbyCateID($cateID);
        if($cateFindByID){
            $result = $cateFindByID->fetch_assoc();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $cateID = $_POST['cateID'];
            $catname = $_POST['catname'];
            $seotitle = $_POST['seotitle'];
            $createdBy = Session::get('adminID');
            $catedit = $class->edit_catagory($cateID, $catname , $seotitle);
            
            echo '
            <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "'. $catedit .'";
                        if (notification !== "") {
                            alert(notification);
                            window.location.href = "catlist.php";
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
        <h2>Edit Category</h2>



        <div class="block copyblock">
            <div class="form">
                <form action="" method="post">
                    <label>Re-Enter to Edit</label>

                    <div class="form-group">
                        <p>Category's name:</p>
                        <input type="text" name="catname" value="<?php echo $result['cateName']; ?>"><br>
                    </div>
                    <div class="form-group">
                        <p>SeoTitle:</p>
                        <input type="text" name="seotitle" value="<?php echo $result['SeoTitle']; ?>"><br>
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