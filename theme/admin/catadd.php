<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';
?>
<?php
    $class = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $catname = $_POST['catname'];
        $seotitle = $_POST['seotitle'];
        $createdBy = Session::get('adminID');
        $addcate = $class->add_category($catname , $seotitle);
        
    }
?>



<div class="grid_10">
    <div class="box round first grid row">
        <h2>Add New Category</h2>



        <div class="block copyblock">
            <?php 
            if(isset($addcate)){
                echo "<span class='success'>$addcate    </span>";
                
            }
        ?>
            <script>
            if (typeof window !== 'undefined') {
                window.addEventListener('DOMContentLoaded', function() {
                    var addcate = "<?php echo $addcate; ?>";
                    if (addcate !== '') {
                        alert(addcate);
                        window.location.href = "catlist.php";
                    }
                });
            }
            </script>
            <div class="form">
                <form action="catadd.php" method="post">
                    <div class="form-group">
                        <p>Category's name:</p>
                        <input type="text" placeholder="Enter Category Name" class="medium" name="catname" />
                    </div>
                    <div class="form-group">
                        <p>SeoTitle:</p>
                        <input type="text" placeholder="Enter Category SeoTitle" class="medium" name="seotitle" />
                    </div>
                    <div class="form-group-button">
                        <input type="submit" name="submit" Value="Save" onclick="showResult()" />
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>