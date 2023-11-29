<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	include '../classes/category.php';
?>
<?php


$class = new Category();
if(isset($_GET['cateID'])){
	$cateID = $_GET['cateID'];
	$delCategory = $class->delete_category($cateID);
    if($delCategory){
	echo '
	<script>
		if (typeof window !== "undefined") {
			window.addEventListener("DOMContentLoaded", function() {
				var notification = "'. $delCategory .'";
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
        <h2>Category List</h2>

        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th>Serial No.</th>
                        <th>Category Name</th>
                        <th>SeoTitle</th>
                        <th>CreatedDate</th>
                        <th>CreatedBy</th>
                        <th>UpdateDate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
					$show_category = $class->showCatList();
					if($show_category){
						$i=0;
						while($result = $show_category->fetch_assoc()){
							$i++;
						?>
                    <tr class="odd gradeX">
                        <td><?php echo $i ?></td>
                        <td><?php echo $result['cateName'] ?></td>
                        <td><?php echo $result['SeoTitle'] ?></td>
                        <td><?php echo $result['CreatedDate'] ?></td>
                        <td><?php echo $result['CreatedBy'] ?></td>
                        <td><?php echo $result['UpdateDate'] ?></td>
                        <td><button
                                onclick="window.location.href = 'catedit.php?cateID=<?php echo $result['CateID']?>';">Edit</button>

                            <button id="deletedbtn" onclick="return confirm('Are you wanna delete this category')"><a
                                    href="catlist.php?cateID=<?php echo $result['CateID'];?>">Delete</a></button>
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