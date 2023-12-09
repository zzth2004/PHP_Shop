<?php
	session_start();
?>


<?php
	$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
	$sql = "SELECT * FROM danhmuc";
	$kq = mysqli_query($conn, $sql);
?>
<html>
	<head>
		<title> Danh Sách </title>
		<meta charset = "utf-8">
		
	</head>
	<body>
		<?php 
		 include('menu.php');
		?>
		<h1>Danh mục sản phẩm</h1>
		<table border="1" class="table table-hover">
			<tr>
				<td>STT</td>
				<td>Tên Danh mục</td>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
					<td>Sửa</td>
				<?php endif; ?>
			</tr>
			<?php
			while ($row = mysqli_fetch_array($kq)) {
				echo '<tr>';
				echo '	<td>' . $row['ID'] . '</td>';
				echo '	<td><a href="DanhsachSP.php?idSP=' . $row['ID'] . '">' . $row['TenDanhMuc'] . '</a></td>';
				if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
					echo '	<td><a href="Chinhsua.php?idSP=' . $row['ID'] . '">Chỉnh sửa</a></td>';
				}
				echo '</tr>';
			}
			?>
		</table>
	</body>

</html>