<?php
	session_start();
?> 	
<html>
	<head>
		<title> Xulydangnhap </title>
		<meta charset="utf-8">
	</head>
	<body>
		<?php
			include("menu.php");
			if (isset($_POST['user']) && isset($_POST['pass'])) {
				$u = $_POST['user'];
				$p = $_POST['pass'];

				if (empty($u) || empty($p)) {
					echo "Dữ liệu rỗng, vui lòng nhập lại";
				} else if (!preg_match("/^[a-zA-Z0-9]*$/", $u) || !preg_match("/^[a-zA-Z0-9]*$/", $p)) {
					echo "Tên đăng nhập và mật khẩu chỉ chứa ký tự a-z, A-Z và 0-9, vui lòng nhập lại";
				} else {
					$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
					$sql = "SELECT * FROM useraccount where username = '$u' AND pass = '$p'";
					$kq = mysqli_query($conn, $sql);
					if ($kq->num_rows > 0) {
						$_SESSION['loggedin'] = true;
						$_SESSION['username'] = $u;
						echo '<h2>Đăng nhập thành công</h2>';
						echo '<h1>Xin chào '.$u.'</h1>';
						 
						exit;
					} else {
						session_unset();
						echo "Tên đăng nhập hoặc mật khẩu không đúng, vui lòng thử lại";
					}
					$conn->close();
				}
			} else {
				echo "Vui lòng nhập lại";
			}
		?>
	</body>

</html>