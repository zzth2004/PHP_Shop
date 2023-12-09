<?php
	session_start();
?>

<?php
	$idSP = isset($_GET['idSP']) ? $_GET['idSP'] : null;
	$conn = mysqli_connect("localhost", "root", "", "thuchanh22");

	if ($idSP !== null) {
		$sql = "SELECT * FROM sanpham WHERE IDSP = " . $idSP;
	} else {
		$sql = "SELECT * FROM sanpham";
	}
	
	//$kq = mysqli_query($conn, $sql);
?>
<html>
	<head>
		<title> Danh Sách SP </title>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	</head>
	<body>
		<?php 
		 include('menu.php');
		?>
		
		
		<body>
			<?php
				// PHẦN XỬ LÝ PHP
				$conn = mysqli_connect("localhost", "root", "", "thuchanh22");
				$sql ="select count(ID) as total from sanpham";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				$total_records = $row['total'];
				
				// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 10;
				// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
				// tổng số trang
				$total_page = ceil($total_records / $limit);
				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page){
					$current_page = $total_page;
				}
				else if ($current_page < 1){
					$current_page = 1;
				}
				// Tìm Start
				$start = ($current_page - 1) * $limit;
				// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
				// Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
				$result = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
				
				
			?>
			<div>
					<table border="1" class="table table-hover">
						<thead>
							<tr>
								<th>STT</th>
								<th>Tên SP</th>
								<th>Giá</th>
								<th>Số lượng</th>
								<th>IDSP</th>
								<th>Mua Hàng</th>
								<?php 
								
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username']=="admin") : ?>
									<th>Thêm ảnh</th>
									<th>Xoá</th>
									<th>Chỉnh sửa</th>
									
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($row = mysqli_fetch_array($result)) {
								echo '<tr>';
								echo '	<td>' . $row['ID'] . '</td>';
								echo '	<td>' . $row['tenSP'] . '</td>';
								echo '	<td>' . $row['giaSP'] . '</td>';
								echo '	<td>' . $row['SLSP'] . '</td>';
								echo '	<td>' . $row['IDSP'] . '</td>';
								echo '	<td><a href="addCart.php?idsp=' . $row['ID'] . '">Mua Hàng</a> </td>';
								
								if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username']=="admin") {
									echo '	<td><a href="uploadSP.php?idsp=' . $row['ID'] . '">Upload</a></td>';
									echo '	<td><a href="XoaSP.php?idsp=' . $row['ID'] . '">Xoá</a></td>';
									echo '	<td><a href="ChinhsuaSP.php?idsp=' . $row['ID'] . '">Chỉnh sửa</a></td>';
									
								}
								echo '</tr>';
							}
							// Đóng kết nối
							mysqli_close($conn);
							?>
						</tbody>
					</table>
			</div>
			<div class="pagination d-flex justify-content-center">
				
				<?php
				// PHẦN HIỂN THỊ PHÂN TRANG
				if ($current_page > 1 && $total_page > 1) {
					echo '<a class="btn btn-primary" href="showSP.php?page=' . ($current_page - 1) . '">Prev</a> |-| ';
				}

				for ($i = 1; $i <= $total_page; $i++) {

					if ($i == $current_page) {
						echo '<span class="btn btn-primary" style="background-color: green; border-color: green;">' . $i . '</span> |-| ';
					} else {
						echo '<a class="btn btn-primary" href="showSP.php?page=' . $i . '">' . $i . '</a> |-| ';
					}
				}

				if ($current_page < $total_page && $total_page > 1) {
					echo '<a class="btn btn-primary" href="showSP.php?page=' . ($current_page + 1) . '">Next</a> ';
				}
				?>
			</div>
		</body>
	
</html>      