<?php 
    include './inc/header.php';  

?>
<?php 
    $login_check =  CustomSession::get('Customer_login');
    if($login_check){
        echo '<script>window.location.href = "shop-payment.php"</script>';
    }
?>
<script></script>
<?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['submit_login'])){
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $login_check = $userAct->user_login($user, $pass);
            if($login_check){
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'. $login_check .'";
                                if (notification !== "") {
                                    alert(notification);
                                    window.location.href = "index.php";
                                   
                                }else{
                                    window.location.href = "404.php";
                                
                                }
                            });
                        }
                    </script>
                ';
            }else{
                echo 'Faild';
            }
            
        }else if(isset($_POST['submit_regis'])){
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $email = $_POST['email'];
            $name = $_POST['name'];
           $regis = $userAct->user_regis($user, $pass, $email, $name);
            if($regis){
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'. $regis .'";
                                if (notification !== "") {
                                    
                                    alert(notification);
                                    window.location.href = "index.php";
                                   
                                }else{
                                    window.location.href = "404.php";
                                
                                }
                            });
                        }
                    </script>
                ';
            }
        }    else if(isset($_POST['submit_regist_full'])){
            $regisFull = $userAct->user_regisFull($_POST);
            if($regisFull){
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'. $regisFull .'";
                                if (notification !== "") {
                                    
                                    alert(notification);
                                    window.location.href = "shop-payment.php";
                                   
                                }else{
                                    window.location.href = "404.php";
                                
                                }
                            });
                        }
                    </script>
                ';
            }else{
                echo 'Faild';
            }
        }
    } 
   
?>
<?php include './inc/footer.php'; ?>