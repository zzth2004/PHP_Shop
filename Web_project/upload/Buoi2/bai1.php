<!DOCTYPE html>
<html>
<head>
    <title>Form Đăng nhập</title>
</head>
<body>
    <?php
        $nameErr = $passwordErr = "";
        $name = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Tên đăng nhập là bắt buộc";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
                    $nameErr = "Tên đăng nhập chỉ chứa ký tự a-z, A-Z và 0-9";
                }
            }

            if (empty($_POST["password"])) {
                $passwordErr = "Mật khẩu là bắt buộc";
            } else {
                $password = test_input($_POST["password"]);
            }
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <h2>Form Đăng nhập</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Tên đăng nhập:</label>
        <input type="text" name="name" id="name">
        <span class="error"><?php echo $nameErr; ?></span>
        <br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" id="password">
        <span class="error"><?php echo $passwordErr; ?></span>
        <br><br>
        <input type="submit" value="Đăng nhập">
    </form>
</body>
</html>