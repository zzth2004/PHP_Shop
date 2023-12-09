<?php
	$conn = mysqli_connect("localhost", "root", "", "thuchanh22");

	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_POST['ID'];
		$newTen = $_POST['TenSP'];
		$newGia = $_POST['giaSP'];
		$newSL = $_POST['SLSP'];
		$newIdSP = $_POST['idsp'];

		
		$sql = "UPDATE sanpham SET tenSP = '$newTen', giaSP = '$newGia', SLSP = '$newSL', IDSP = '$newIdSP' WHERE ID = $id";
		mysqli_query($conn, $sql);


		header('Location: DanhsachSP.php');
		exit;
	} else {
		echo "Không tìm thấy sản phẩm. Bạn hãy chọn sản phẩm để update.";
		
		/*$id = $_GET['idsp'];

		
		$sql = "SELECT * FROM sanpham WHERE ID = $id";
		$kq = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($kq);

		
		if (!$row) {
			echo "Không tìm thấy sản phẩm.";
			exit;
		}*/
	}
?>
<html>
	<head>
		<title>Chỉnh sửa sản phẩm</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			include('menu.php');
		?>
		<h1>Chỉnh sửa sản phẩm</h1>
		<form method="POST" action="ChinhsuaSP.php">
			<input type="hidden" name="ID" value="<?php echo $id; ?>">
			<label for="name">Tên sản phẩm:</label>
			<input type="text" name="TenSP" value="<?php echo $row['tenSP']; ?>"><br>
			<label for="price">Giá:</label>
			<input type="text" name="giaSP" value="<?php echo $row['giaSP']; ?>"><br>
			<label for="SLSP">Số lượng:</label>
			<input type="text" name="SLSP" value="<?php echo $row['SLSP']; ?>"><br>
			<label for="idsp">ID sản phẩm:</label>
			<select name="idsp">
				<?php
				$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
				$sql = "SELECT * FROM danhmuc";
				$kq = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_array($kq)) {
					echo '<option value="' . $row["ID"] . '">' . $row["TenDanhMuc"] . '</option>';
				}
				?>
			</select><br>
			<input type="submit" value="Cập nhật">
		</form>
	</body>
</html>




<?php
                            $getproductNew = $product->showNewProduct();
                            if($getproductNew){
                                while($resultNew = $getproductNew->fetch_array()){ 
                        ?>
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <a href="shop-item-details.php"><img src="upload/<?php echo $getproductNew['Img']; ?>"
                                        class="img-responsive" alt="<?php echo $getproductNew['productName'] ?>" /></a>

                                <div>
                                    <a href="admin/uploads/<?php echo $getproductNew['Img']; ?>"
                                        class=" btn btn-default fancybox-button">Zoom</a>
                                    <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item-details.php">upload/<?php echo $getproductNew['productName']; ?>"</a>
                            </h3>
                            <div class="pi-price">upload/<?php echo $getproductNew['Price']; ?>"</div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-sale"></div>
                        </div>
                        <?php 
                            }
                        }
                        ?>