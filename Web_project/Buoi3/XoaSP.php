<html>
	<head>
		
		<title>Xoa SP </title>
	</head>
	<body>
		<h1> Xoá Sản phẩm </h1>
		
		
		<?php
			$idsp = $_GET['idsp'];
			$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
			$sql = "DELETE FROM sanpham WHERE ID = " . $idsp;
			$kq = mysqli_query($conn, $sql);	
			
			if($kq){
				echo "Xoá Thành công";
				header('Location: DanhsachSP.php');
			}
			else 
				echo "Lỗi";
		?>
	</body>
</html>