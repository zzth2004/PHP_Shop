<?php
	$s = 0;
?>

<html>
	<head>
		<title> BaiTap1 </title>
	</head>
	<body>
		<h2> Tính tổng </h2>
		<br>
		<br>
		<br>
		<?php
			for($i =1; $i<=100; $i++)
				$s = $s+ $i;
			echo "Tổng các số nguyên từ 1 tới 100:  S = $s";
		?>
		
	</body>
	
	
</html>
