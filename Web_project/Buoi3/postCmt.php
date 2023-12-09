<?php
	session_start()
?>
<html>
	<head>
		<title> Dangnhap </title>
		<meta charset="utf-8">
	</head>
	<body>
		<form action="postCmt.php" method="post">
			Username:
			<input type="text" name="username" placeholder="Enter username" required>
			<br>
			Nhập bình luận:
			<input type="text" name="cmt" placeholder="Enter comment">
			<br>
			Nhập sao:
			<input type="text" name= "danhgia"> 
		
			<button type="submit" class="btn btn-primary">Thêm</button>
		</form>
		
		<?php
			if(isset($_POST['username']) && isset($_POST['cmt'])&&isset($_POST['danhgia'])) {
				$u = $_POST['username'];
				$cmt= $_POST['cmt'];
				$start= $_POST['danhgia'];
				
				if(empty($u)||empty($cmt) || empty($start)){
					echo "Vui long nhap day du thong tin";
				}
				else {
					if($start>5){
						echo "so sao khong hop le. Vui long nhap lai";
					}
					else {
						$conn = mysqli_connect("localhost", "root", "", "middletest1");
						$sql = "INSERT INTO banhangmasv(username, content, danhgia) values ($u, $cmt, $start)";
						$kq = mysqli_query($conn, $sql);
						
						if($kq){
							echo "Them thanh cong";
							header('Location: DanhsachCMT.php');
						}
						
					}
				}
			}				
					
		?>
	</body>
</html>