<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php


$class = new Product();
if(isset($_GET['productID'])){
	$productID = $_GET['productID'];
	$delproduct = $class->delete_product($productID);
    if($delproduct){
	echo '
	<script>
		if (typeof window !== "undefined") {
			window.addEventListener("DOMContentLoaded", function() {
				var notification = "'.$delproduct .'";
				if (notification !== "") {
					alert(notification);
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
        <h2>Product List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>ProductName</th>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Price</th>

                        <th>Quanlity</th>
                        <th>CreatedDate</th>
                        <th>CreatedBy</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>UpdateDate</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
						$product = $class->showProductList();
						if($product){
							$i=0;
							while($result = $product->fetch_assoc()){
								$i++;
						
					?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php 
								if($result['Status']==0){
									echo "New Seal";
								} else {
									echo "Old 99%";
								}
							
							?></td>
                        <td><img src="uploads/<?php echo $result['Img']; ?>" width="50"> </td>
                        <td><?php echo $result['Price']; ?></td>


                        <td><?php echo $result['Quanlity']; ?></td>

                        <td><?php echo $result['CreatedDate']; ?></td>
                        <td><?php echo $result['CreatedBy']; ?></td>
                        <td><?php echo $result['cateName']; ?></td>
                        <td><?php echo $result['brandName']; ?></td>
                        <td><?php echo $result['UpdateDate']; ?></td>
                        <td><button
                                onclick="window.location.href ='productedit.php?productID=<?php echo $result['ProductID'];?>';">Edit</button>

                            <button onclick="return confirm('Are you wanna delete this product')"><a
                                    href="productlist?productID=<?php echo $result['ProductID'];?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php
							}
							
						}
					?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>