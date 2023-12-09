
<html>
	<head>
		<title> xulythemSP </title>
		<meta charset = "utf-8">
		
	</head>
	<body>
		<?php 
		 include('menu.php');
		?>
		<h1> Xử lý thêm sản phẩm </h1>
		
		
		<?php
			if ($_SERVER['REQUEST_METHOD'] === 'POST'){
				
				$tenSp = $_POST['tensp'];
				$giaSp = $_POST['gia'];
				$SLSp = $_POST['soluong'];
				$chitiet = $_POST['chitiet'];
				$idsp = $_POST['iddm'];

				$target_dir = "D:/CNWeb/Web_project/upload/";
				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

				// Kiểm tra nếu tệp tin là hình ảnh thực sự
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if ($check === false) {
					echo "File is not an image.<br>";
					$uploadOk = 0;
				}
				if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
				$uploadOk = 0;
				}

				// Kiểm tra nếu $uploadOk không bị lỗi
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.<br>";
				}else {
				// Nếu mọi thứ ổn, thực hiện tải lên tệp tin
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.<br>";

						// Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
						$imagePath = "D:/CNWeb/Web_project/upload/" . basename($_FILES["fileToUpload"]["name"]);
						echo $imagePath;
					}
				}
			}
			$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
			$sql = "INSERT INTO sanpham(`tenSP`, `giaSP`, `SLSP`, `imgLink`,`chitiet`, `IDSP`) VALUES ('$tenSp', '$giaSp', '$SLSp', '$$imagePath','$chitiet', '$idsp')";
			echo $sql;
			
			$kq = mysqli_query($conn, $sql);
			
			echo $kq;
			echo '<br><br>';
			
			if($kq){
				echo "Thêm SP thành công";
				header('Location: DanhsachSP.php');
			}
			else 
				echo "Thêm thất bại";
		?>
		
	</body>

</html>