<html>
	<head>
		<title> Menu </title>
		<meta charset = "utf-8">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	
	</head>
	<body>
	<table class="table table-hover">
		<tr>
		
		<td> <a href="danhmuc.php">Danh mục sản phẩm</a></td>
		<td><a href="DanhsachSP.php">Danh Sách sản phẩm</a> </td>
		<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username']=="admin") : ?>
					<td> <a href="nhapSp.php">Thêm sản phẩm khác</a></td>
		<?php endif; ?>
		
		<?php
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
		// Người dùng đã đăng nhập, ẩn liên kết "Đăng nhập"
			echo '<td> <a href="viewCart.php"><i class="fa fa-cart-plus" style="font-size: 55px;"></i></a></td>';
			echo '<td></td>';
			echo '<td style="font-size: 40px;color:red; font-weight:500;">'.$_SESSION['username'].'</td>';
			echo '<td> <a href="dangxuat.php">Đăng xuất</a></td>';
		} else {
			// Người dùng chưa đăng nhập, hiển thị liên kết "Đăng nhập"
			echo '<td><a href="dangnhap.php">Đăng nhập</a></td>';
		}
		?>

		
		
		</tr>
	</table>	
	</body>
</html>