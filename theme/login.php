<?php
session_start();

?>
<?php
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];

        if (empty($u) || empty($p)) {
            echo "Dữ liệu rỗng, vui lòng nhập lại";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $u) || !preg_match("/^[a-zA-Z0-9]*$/", $p)) {
            echo "Tên đăng nhập và mật khẩu chỉ chứa ký tự a-z, A-Z và 0-9, vui lòng nhập lại";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "doan2");
            $sql = "SELECT * FROM useraccount where username = '$u' AND password = '$p'";
            $kq = mysqli_query($conn, $sql);
            if ($kq->num_rows > 0) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $u;
                echo '<h2>Đăng nhập thành công</h2>';
                echo '<h1>Xin chào '.$u.'</h1>';
                 header('Location: shop-index-header-fix.html');
                exit;
            } else {
                session_unset();
                echo "Tên đăng nhập hoặc mật khẩu không đúng, vui lòng thử lại";
            }
            $conn->close();
        }
    } else {
        echo "Vui lòng nhập lại";
    }
?>