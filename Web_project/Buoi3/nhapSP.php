<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<title> NhapSP </title>
		 
		<style>
			h1{
				
				padding: 10px;
			}
			form{
				margin-left: 240px;
				padding: 10px;
				
			}
			table{
				border: 2px solid #ccc;
			}
		</style>
	</head>
	<body>
		<?php
			include('menu.php');
		?>
		<div class="container">
			<h1> Thêm Sản phẩm </h1>
			<form class="form-horizontal" action="xulySP.php" method="post" enctype="multipart/form-data"> 
				<div class="form-group">
					<label class="control-label col-sm-2" for="tensp">Tên:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="tensp" name="tensp" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="gia">Giá:</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="gia" name="gia" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="soluong">SL:</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" id="soluong" name="soluong" required>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="chitiet">Chi tiết:</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="chitiet" name="chitiet" required></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="iddanhmuc">ID danh mục:</label>
					<div class="col-sm-10">
						<select class="form-control" id="iddm" name="iddm">
							<?php
							$conn= mysqli_connect("localhost","root","","thuchanh22");
							$sql= "SELECT * from danhmuc";
							$KQ= mysqli_query($conn,$sql);
							while($row = mysqli_fetch_array($KQ)){
								echo '<option value="'.$row["ID"].'">'.$row['TenDanhMuc'].'</option>';
							} ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="fileToUpload">Chọn hình ảnh:</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="fileToUpload" name="fileToUpload">
					</div>
				</div>
				<div class="form-group"> 
					<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Thêm</button>
					</div>
				</div>
			</form>
		</div>
	</body>
	<script type="text/javascript" src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
	<script>
		CKEDITOR.replace('chitiet');
	</script>
</html>