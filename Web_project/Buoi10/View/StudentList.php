<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách học sinh</title>
</head>

<body>
    <h1>Danh sách học sinh</h1>

    <?php

        for($i=1; $i <=sizeof($studentList); $i++){
            echo "<p>'.$i.'<a href='?stid=".$studentList[$i]->id."'>'.$studentList[$i]->name.'</a></p>";
        }
    ?>

    <br>
    <p><a href="../index.php">Homepage</a></p>
</body>

</html>