<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brands.php';
?>
<?php
    $class = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $brandName = $_POST['brandName'];
        $addbrand = $class->add_Brands($brandName);
        
    }
?>



<div class="grid_10">
    <div class="box round first grid row">
        <h2>Add New Brands</h2>



        <div class="block copyblock">
            <?php 
            if(isset($addbrand)){
                echo "<span class='success'> $addbrand    </span>";
                
            }
        ?>
            <script>
            if (typeof window !== 'undefined') {
                window.addEventListener('DOMContentLoaded', function() {
                    var addbrand = "<?php echo $addbrand; ?>";
                    if (addbrand !== '') {
                        alert(addbrand);
                        window.location.href = "brandlist.php";
                    }
                });
            }
            </script>
            <div class="form">
                <form action="brandadd.php" method="post">
                    <div class="form-group">
                        <p>Brand's name:</p>
                        <input type="text" placeholder="Enter Category Name" class="medium" name="brandName" />
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