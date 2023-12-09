<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include_once '../classes/category.php';
?>
<?php include_once '../classes/brands.php'; ?>
<?php include_once '../classes/product.php'; ?>
<?php
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
       $insertProduct = $product->add_product($_POST, $_FILES);

            if(isset($insertProduct)){
                echo "<span class='success'> $insertProduct    </span>";
                
            }
        
       echo '
            <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "'. $insertProduct .'";
                        if (notification !== "") {
                            alert(notification);
                            window.location.href = "productlist.php";
                        }
                    });
                }
            </script>
            ';
    }
?>


<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="row block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
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

                                            $catName = $result['CateName'];
                                ?>

                                <option value="<?php echo $result['CateID'];?>"><?php echo $result['cateName'];?>
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

                                <option value="<?php echo $result['brandID'];?>"><?php echo $result['brandName'];?>
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
                            <label>Product config</label>
                        </td>
                        <td>
                            <input type="text" name="config" placeholder="Enter the configuation of product"
                                class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Product color</label>
                        </td>
                        <td>
                            <input type="text" name="color" placeholder="Enter the color of product" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea name="product_desc" id="textedit"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Details</label>
                        </td>
                        <td>
                            <textarea name="product_details" id="ckeditor1" class="tinymce" rows="10"
                                cols="80"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input name="price" type="text" placeholder="Enter Price..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Quanlity</label>
                        </td>
                        <td>
                            <input name="Quanlity" type="text" placeholder="Enter Quanlity..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>warranty</label>
                        </td>
                        <td>
                            <input name="warranty" type="text" placeholder="Enter the number of years of warranty ..."
                                class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>VAT</label>
                        </td>
                        <td>
                            <input name="VAT" type="text" placeholder="Enter the VAT of product ..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
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
                                <option value="0">New Seal</option>
                                <option value="1">Old 99%</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
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