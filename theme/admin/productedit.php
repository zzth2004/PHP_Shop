<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include_once '../classes/category.php';
?>
<?php include_once '../classes/brands.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php
    $product = new Product();
    if(!isset($_GET['productID']) || $_GET['productID'] == NULL) {
        echo " <script> window.location= 'catlist.php'; </script>";
    } else{
        $productID = $_GET['productID'];
		
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $product->update_product($_POST, $_FILES, $productID);

                if(isset($insertProduct)){
                    echo "<span class='success'> $updateProduct    </span>";
                    
                }
            
        echo '
                <script>
                    if (typeof window !== "undefined") {
                        window.addEventListener("DOMContentLoaded", function() {
                            var notification = "'.  $updateProduct .'";
                            if (notification !== "") {
                                alert(notification);
                                window.location.href = "productlist.php";
                            }
                        });
                    }
                </script>
                ';
        }
}
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <?php 
        $productFindByID = $product->findbyproductID($productID);
        if($productFindByID){
            while($result_pro = $productFindByID->fetch_assoc()){
        ?>



        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td colspan="2" style="text-align: center;"><label>Re-Enter to Edit</label></td>
                    </tr>
                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" value="<?php echo $result_pro['productName']; ?>"
                                class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="select" name="category">
                                <option>-------Select Category--------</option>
                                <?php 
                                    $cat = new Category();
                                    $catlist = $cat->showCatList();
                                    if($catlist){
                                        while($result = $catlist->fetch_assoc()){

                                     
                                ?>

                                <option <?php 
                                    if($result['CateID']==$result_pro['CateID']){  echo 'selected'; }
                                ?> value="<?php echo $result['CateID'];?>"><?php echo $result['cateName'];?>
                                </option>
                                <?php 
                                   }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brands</label>
                        </td>
                        <td>
                            <select id="select" name="brand">
                                <option>-------Select Brands--------</option>
                                <?php 
                                    $cat = new Brand();
                                    $catlist = $cat->showBrandList();
                                    if($catlist){
                                        while($result = $catlist->fetch_assoc()){

                                     
                                ?>

                                <option <?php 
                                    if($result['brandID']==$result_pro['brandID']){  echo 'selected'; }
                                ?> value="<?php echo $result['brandID'];?>"><?php echo $result['brandName'];?>
                                </option>
                                <?php 
                                   }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                        </td>
                        <td>
                            <textarea name="product_details" id="ckeditor1" class="tinymce" rows="10" cols="80"
                                value="<?php echo $result_pro['Details'] ; ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input name="price" type="text" value="<?php echo $result_pro['Price']; ?>"
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quanlity</label>
                        </td>
                        <td>
                            <input name="Quanlity" type="text" value="<?php echo $result_pro['Quanlity']; ?>"
                                class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>warranty</label>
                        </td>
                        <td>
                            <input name="warranty" type="text" value="<?php echo $result_pro['Warranty'];?>"
                                class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>VAT</label>
                        </td>
                        <td>
                            <input name="VAT" type="text" value="<?php echo $result_pro['VAT']; ?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $result_pro['Img']; ?>" width="80"> <br>
                            <input type="file" name="img" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product status</label>
                        </td>
                        <td>
                            <select id="select" name="status">
                                <option>Select Type</option>
                                <?php 
                                if($result_pro['Status']==0){

                               
                            ?>
                                <option selected value="0">New Seal</option>
                                <option value="1">Old 99%</option>
                                <?php } else{?>

                                <option value="0">New Seal</option>
                                <option selected value="1">Old 99%</option>
                                <?php }?>
                            </select>
                        </td>
                    </tr>
                    <?php 
                                }
                            }                    
                    ?>
                    <tr>

                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script>
// Replace the <textarea id="editor1"> with a CKEditor 4
// instance, using default configuration.
CKEDITOR.replace('textedit');
</script>
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>