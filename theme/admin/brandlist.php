<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include '../classes/brands.php';
?>
<?php


$class = new Brand();
if(isset($_GET['brandID'])){
	$brandID = $_GET['brandID'];
	$delbrand = $class->delete_brand($brandID);
    if($delbrand){
	echo '
	<script>
		if (typeof window !== "undefined") {
			window.addEventListener("DOMContentLoaded", function() {
				var notification = "'. $delbrand .'";
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
        <h2>Brands List</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Brands Name</th>
                        <th>CreatedDate</th>
                        <th>CreatedBy</th>
                        <th>UpdateDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$show_brand = $class->showBrandList();
					if($show_brand){
						$i=0;
						while($result = $show_brand->fetch_assoc()){
							$i++;
						?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['brandName'] ?></td>
                        <td><?php echo $result['CreatedDate'] ?></td>
                        <td><?php echo $result['CreatedBy'] ?></td>
                        <td><?php echo $result['UpdateDate'] ?></td>
                        <td><button
                                onclick="window.location.href ='brandedit.php?brandID=<?php echo $result['brandID']?>';">Edit</button>

                            <button id="deletedbtn" onclick="return confirm('Are you wanna delete this Brands')"><a
                                    href="brandlist.php?brandID=<?php echo $result['brandID'];?>">Delete</a></button>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                    <script>

                    </script>
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