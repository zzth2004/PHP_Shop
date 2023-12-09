<html>	
	<?php
		$idsp1 = $_GET['idsp'];
		//session_start();
		//$_SESSION['idsp'] = $idsp;
		
	?>
	<head>
		<title>Chỉnh sửa sản phẩm</title>
		<meta charset="utf-8">
	</head>
	<body>
	<?php 
		include('menu.php');
	?>
	<h1>Upload hình ảnh sản phẩm</h1>
	<form action="uploadSP.php?idsp=<?php echo urlencode($idsp1); ?>" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
		
		
	</form>

	<?php

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['fileToUpload'])) {
			$target_dir = "D:/CNWeb/Web_project/upload/";
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			// Kiểm tra nếu tệp tin là hình ảnh thực sự
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check === false) {
				echo "File is not an image.";
				$uploadOk = 0;
			}

			// Kiểm tra nếu tệp tin đã tồn tại
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}

			// Kiểm tra kích thước tệp tin
			if ($_FILES["fileToUpload"]["size"] > 50000000) {
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}

			// Cho phép các định dạng tệp tin hình ảnh nhất định
			if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}

			// Kiểm tra nếu $uploadOk không bị lỗi
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} else {
				// Nếu mọi thứ ổn, thực hiện tải lên tệp tin
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

					// Lưu đường dẫn hình ảnh vào cơ sở dữ liệu
					$imagePath = "D:/CNWeb/Web_project/upload/" . basename($_FILES["fileToUpload"]["name"]);
					echo $imagePath;
					// Kết nối đến cơ sở dữ liệu
					$servername = "localhost";
					$username ="root";
					$password = "";
					$dbname = "thuchanh22";

					$conn = new mysqli($servername, $username, $password, $dbname);
					$idsp = $_GET['idsp'];
					// Kiểm tra kết nối
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
					
					// Thực hiện truy vấn SQL để lưu đường dẫn hình ảnh vào cơ sở dữ liệu
					//$sql = "INSERT INTO sanpham (imgLink) VALUES ('$imagePath') where ID= $idsp";
					$sql1 ="UPDATE sanpham SET imgLink = ? WHERE ID = ?";
					//$sql = "INSERT INTO sanpham (imgLink) SELECT ? FROM dual WHERE EXISTS (SELECT 1 FROM sanpham WHERE ID = ?)";
					$stmt = $conn->prepare($sql1);
					$stmt->bind_param("si", $imagePath, $idsp);
					if ($stmt->execute()) {
						echo "The image path has been saved to the database.";
						$stmt->error;
						echo $stmt->affected_rows;
					} else {
						echo "Error: " . $stmt->error;
					}
					
					$stmt->close();

					// Đóng kết nối cơ sở dữ liệu
					$conn->close();
				} else {
					echo "Sorry, there was an error uploading your file.";
				}
        }
    }
}
?>
	</body>
</html>