<html>
	<head>
		<title> Xulydangnhap-cookie </title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1> Xu Ly Dang Nhap </h1>
		<?php
			include("menu.php");
		if (isset($_POST['user']) && isset($_POST['pass'])){
			$u = $_POST['user'];
			$p = $_POST['pass'];
			
			if(empty($u) || empty($p))
					echo "Du lieu rong vui long nhap lai";
			else if (!preg_match("/^[a-zA-Z0-9]*$/", $u)or !preg_match("/^[a-zA-Z0-9]*$/", $p)) {
						echo  "Tên đăng nhập và mật khẩu chỉ chứa ký tự a-z, A-Z và 0-9, vui long nhap lai";		
				}
			else {
				echo " UserName is <b> $u </b> and password is <b> $p </b>";
				if($p =="123"){
					//tao cookie
					$_COOKIE['pass'] = $p;
					setcookie('pass', $p, time() + 600, '/');
					echo '<h2> Dang nhap thanh cong </h2>';
				}
				else 
					//xoa coolie
					setcookie('pass', '', time() - 600, '/');
			}
		} else 
			echo "vui long nhap lai ";
			
		?>
	</body>

</html>