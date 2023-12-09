<?php
	session_start();
?>

<html>
	<head>
		<title> Đăng nhập </title>
		<meta charset = "utf-8">
	</head>
	
	<body>
		<?php
			include('menu.php');
		?>
		<form action = "xulydangnhap.php" method ="post">
			UserName:
			<input type="text" name = "user"> <br>
			Password: 
			<input type = "password" name = "pass"> <br>
			
			<input type = "submit" value = "Đăng nhập" >
		</form>
 	</body>
	
	
	
</html>