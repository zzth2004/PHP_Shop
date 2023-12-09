
<html>
	<head>
		<title>XuLyDangKy</title>
	</head>
	<body>
		<h2> Thông tin đã nhập </h2>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$name = $_POST['fullname'];
				$dress = $_POST['dress'];
				$gender = $_POST['gender'];
				$hobby = [];
				
				if (isset($_POST["ball"])) {
					$hobby[] = "Bóng đá";
				}
				if (isset($_POST["ball2"])) {
					$hobby[] = "Bóng chuyền";
				}
				echo "<p><strong>Username:</strong> " . $user . "</p>";
				echo "<p><strong>Password:</strong> " . $pass . "</p>";
				echo "<p><strong>Họ và tên:</strong> " . $name . "</p>";
				echo "<p><strong>Địa chỉ:</strong> " . $dress . "</p>";
				echo "<p><strong>Giới tính:</strong> " . $gender . "</p>";
				if (!empty($hobby)) {
					echo "<p><strong>Sở thích:</strong> " . implode(", ", $hobby) . "</p>";
			  }
			}	
		?>
	</body>

</html>