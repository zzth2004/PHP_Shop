


<?php
	$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$id = $_POST['id'];
		$newName = $_POST['name'];
		$query = "UPDATE danhmuc SET TenDanhMuc = '$newName' WHERE ID = $id";
		mysqli_query($conn, $query);
		header('Location: danhmuc.php');
		exit;
	} else {
		$id = $_GET['idSP'];
		$query = "SELECT * FROM danhmuc WHERE ID = $id";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		if (!$row) {
			echo "Không tìm thấy danh mục.";
			exit;
		}
	}
?>
<html>
	<head>
		<title>Chỉnh sửa danh mục</title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php 
			include('menu.php');
			
		?>
		<h1>Chỉnh sửa danh mục</h1>
		<form method="POST" action="Chinhsua.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<label for="name">Tên danh mục:</label>
			<input type="text" name="name" value="<?php echo $row['TenDanhMuc']; ?>"><br>
			<input type="submit" value="Cập nhật">
		</form>
	</body>
</html>