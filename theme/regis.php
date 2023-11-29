<?php
session_start();

?>
<?php
    if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['email'])&& isset($_POST['name'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];

        if (empty($u) || empty($p)|| empty($email)|| empty($name)) {
            echo "Dữ liệu rỗng, vui lòng nhập lại";
        } else {
            $conn = mysqli_connect("localhost", "root", "", "doan2");
            $sql = "INSERT INTO useraccount(username, password, Name, email) VALUES ('$u','$p','$name', '$email')";
            $kq = mysqli_query($conn, $sql);
            if ($kq) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $u;
                echo '<h2>Successfully. Welcomto PHP Shop</h2>';
                
                 header('Location: ');
                exit;
            } else {
                session_unset();
                echo "Fail to regis!";
            }
            $conn->close();
        }
    } else {
        echo "Vui lòng nhập lại";
    }
?>