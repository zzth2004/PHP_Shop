<?php
	session_start(); // Khởi động phiên làm việc

	if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['qty'])) {
			foreach ($_POST['qty'] as $id => $quantity) {
				// Kiểm tra xem món hàng có tồn tại trong giỏ hàng không
				if (isset($_SESSION['cart'][$id])) {
					// Cập nhật số lượng món hàng
					$_SESSION['cart'][$id] = $quantity;
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Giỏ hàng</title>
	<style>
	body{
	font:12px verdana;
	}
	.pro{
	border:1px solid #999999;
	margin:5px;
	padding:5px;
	width:400px;
	}
	a{
	color:#666666;
	text-decoration:none;
	font-weight:900;
	}
	#cart{
	border:1px solid #999999;
	margin:5px;
	padding:5px;
	width:400px;
	text-align:center;
	}
	</style>
</head>
<body>
	<?php 
		 include('menu.php');
	?>
	<form action='viewCart.php' method='post'>
		
		<?php
		$item = array(); // Khởi tạo mảng $item

		foreach ($_SESSION['cart'] as $key => $value) {
			$item[] = $key;
		}

		$str = implode(",", $item);

		$connect = mysqli_connect("localhost", "root", "", "thuchanh22"); // Sử dụng MySQLi thay vì MySQL

		//$sql = "SELECT * FROM sanpham WHERE ID IN ($str)";
		$sql = "SELECT sanpham.*, danhmuc.TenDanhMuc AS tendanhmuc
		        FROM sanpham
		        INNER JOIN danhmuc ON sanpham.IDSP = danhmuc.ID
		        WHERE sanpham.ID IN ($str)";
		$query = mysqli_query($connect, $sql);

		$total = 0; // Khởi tạo biến $total

		while ($row = mysqli_fetch_array($query)) {
			?>

			<div class='pro'>
				<h3><?php echo $row['tenSP']; ?></h3>
				<p>Danh mục: <?php echo $row['tendanhmuc']; ?> - Giá: <?php echo number_format($row['giaSP'], 3); ?> VND</p>
				<p align='right'>Số lượng: <input type='number' min='1' max='<?php echo $row['SLSP']; ?>' name='qty[<?php echo $row['ID']; ?>]' size='5' value='<?php echo $_SESSION['cart'][$row['ID']]; ?>' oninput="updateQuantity(this, <?php echo $row['giaSP']; ?>)"></p>
				<br>
				<a href='decart.php?productid=<?php echo $row['ID']; ?>'>Xóa SP khỏi Cart</a></p>
				<p align='right'>Giá tiền cho món hàng: <span id="price-<?php echo $row['ID']; ?>"><?php echo number_format($_SESSION['cart'][$row['ID']] * $row['giaSP'], 3); ?></span> VND</p>
			</div>

			<?php
			$total += $_SESSION['cart'][$row['ID']] * $row['giaSP'];
		}

		mysqli_close($connect); // Đóng kết nối MySQLi
		?>

		<div class='total'>
			<b>Tổng tiền cho các món hàng: <font color='red'><?php echo number_format($total, 3); ?> VND</font></b>
		</div>
		<br>
		<hr/>
		<div class='actions'>
			<input type='submit' name='submit' value='Cập Nhật Giỏ Hàng' />
			<br> <hr/>
			<b><a href='DanhsachSP.php'>Mua Tiếp</a> - <a href='decart.php?productid=0'>Xóa Bỏ Giỏ Hàng</a></b>
		</div>

	</form>
	
	<script>
	  function updateQuantity(input, price) {
		var quantity = input.value;
		var totalPrice = quantity * price;
		document.getElementById("price-" + input.name).innerText = totalPrice.toFixed(3);
	  }
	</script>
</body>
</html>