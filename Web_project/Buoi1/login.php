<?php 
    include_once '../Metronic-Shop-UI-master/theme/classes/userlogin.php';  

?>


<?php
    $login_regis = new Userlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['submit_login'])){
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $login_check = $login_regis->user_login($user, $pass);
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
            }
            
        }else if(isset($_POST['submit_regis'])){
            $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $email = $_POST['email'];
            $name = $_POST['name'];
           $regis = $login_regis->user_regis($user, $pass, $email, $name);
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
        }
    } 
    else{
        echo "Thuannnn";
    }
?>