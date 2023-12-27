<?php
include '../classes/adminlogin.php';
?>
<?php
$class = new AdminLogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $adminuser = $_POST['adminuser'];
    $adminpass = md5($_POST['adminpass']);
    $login_check = $class->admin_login($adminuser, $adminpass);
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
    <div class="container">
        <section id="content">
            <form action="login.php" method="post">
                <h1>Admin Login</h1>
                <span>
                    <?php
                    if (isset($login_check)) {
                        echo $login_check;
                        echo '
                        <script>
                            if (typeof window !== "undefined") {
                                window.addEventListener("DOMContentLoaded", function() {
                                    var notification = "' . $login_check . '";
                                    if (notification !== "") {
                                        alert(notification);
                                        window.location.href = "productlist.php";
                                    }
                                });
                            }
                        </script>
                        ';
                    }
                    ?>

                </span>
                <div>
                    <input type="text" placeholder="Username" required="" name="adminuser" />
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="adminpass" />
                </div>
                <div>
                    <input type="submit" value="Log in" />
                </div>
            </form><!-- form -->
            <div class="button">
                <a href="#">Welcom PHP shop admin page</a>
            </div><!-- button -->
        </section><!-- content -->
    </div><!-- container -->
</body>

</html>