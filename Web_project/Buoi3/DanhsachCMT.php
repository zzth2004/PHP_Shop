<?php
	
	
	$conn = mysqli_connect("localhost", "root", "", "middletest1");
	$sql = "SELECT * FROM banhangmsv where danhgia = 5 ";
	$kq = mysqli_query($conn, $sql);
	
?>
<html>
	<head>
		<title> Danhsach </title>
		<meta charset="utf-8">
	</head>
	<body>
		<table>
			<thead>
			<tr>
				<th>Stt</th>
				<th>Username</th>
				<th>Noi dung </th>
				<th> Sao </th>
				<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username']=="Admin") : ?>
									
					<th>Xoá</th>
					<th> chỉnh sửa </th>			
									
				<?php endif; ?>
			</tr>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_array($kq)) {
						echo '<tr>';
						echo '	<td>' . $row['ID'] . '</td>';
						echo '	<td>' . $row['username'] . '</td>';
						echo '	<td>' . $row['content'] . '</td>';
						echo '	<td>' . $row['danhgia'] . '</td>';
									
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['username']=="Admin") {
										
							echo '	<td><a href="xoa.php?idsp=' . $row['ID'] . '">Xoá</a></td>';
							echo '	<td><a href="ChinhsuaSP.php?idsp=' . $row['ID'] . '">Chỉnh sửa</a></td>';
										
							}
						echo '</tr>';
						}
				?>
			</tbody>
		
		</table>
	</body>
	
</html>