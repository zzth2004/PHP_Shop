
<html>
	<head>
		<title> Menu </title>
		<meta charset = "utf-8">
	</head>
	
	<body>
		
		<a href = "trangchu.php"> Trang chu </a> <br>
		<a href = "#"> Trang Gio hnag </a> <br>
		<a href = "lienhe.php"> Trang Lien He </a> <br>
		<a href = "Menu.php"> Trang Menu </a><br>
		<?php
			if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
				
				if (preg_match("/^[a-zA-Z0-9]*$/", $_POST['user']) && preg_match("/^[a-zA-Z0-9]*$/", $_POST['pass'])) {
					echo '<h2> Xin chào bạn ' . $_POST['user'] . ' đã đăng nhập </h2>';
				}
				else{
					echo '<h2> Ban chua Dang nhap </h2>';
					echo '<a href="Dangnhap.php">Đăng nhập</a> <br><br><br>';
				}
			}
			else {
				echo '<h2> Ban chua Dang nhap </h2>';
				echo '<a href="Dangnhap.php">Đăng nhập</a> <br><br><br>';
			}
		?>
		
 	</body>
	
	
	
</html>