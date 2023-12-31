<?php
  include 'inc/header.php';
 
?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
     if(isset($_POST['submit_regist_full'])){
        $regisFull = $userAct->user_regisFull($_POST);
        $userID = CustomSession::get('userID');
        $sID = session_id();
        $update_cart = $cart->update_cart($sID, $userID);
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
    }if(isset($_POST['submit_login'])){
        $user = $_POST['username'];
            $pass = md5($_POST['password']);
            $login_check = $userAct->user_login($user, $pass);
            $userID = CustomSession::get('userID');
            $sID = session_id();
            $update_cart = $cart->update_cart($sID, $userID);
            if($login_check){
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "'. $login_check .'";
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

<div class="main">
    <div class="container">
        <ul class="breadcrumb" style="font-size: 1.3rem;">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Checkout</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->

            <div class="col-md-12 col-sm-12">
                <div class="delivery-top-wrap">
                    <div class="cart-top">
                        <div class="delivery-top-cart delivery-top-item">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="delivery-top-adress delivery-top-item">
                            <i class="fa fa-location-dot"></i>
                        </div>
                        <div class="delivery-top-payment delivery-top-item">
                            <i class="fa-solid fa-money-check"></i>
                        </div>
                    </div>
                </div>
                <!-- BEGIN CHECKOUT PAGE -->
                <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

                    <!-- BEGIN CHECKOUT -->
                    <div id="checkout" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#checkout-content"
                                    class="accordion-toggle">
                                    Part 1: Options
                                </a>
                            </h2>
                        </div>
                        <div id="checkout-content" class="panel-collapse collapse in">
                            <div class="panel-body row">
                                <div class="col-md-6 col-sm-6">
                                    <h3>New Customer</h3>
                                    <p>Checkout Options:</p>
                                    <div class="radio-list">
                                        <label>
                                            <input type="radio" name="account" value="register"
                                                onchange="toggleAccountPanel('register')"> Register Account
                                        </label>
                                        <label>
                                            <input type="radio" name="account" value="login"
                                                onchange="toggleAccountPanel('login')"> Login Account
                                        </label>
                                    </div>
                                    <p>By creating an account you will be able to shop faster, be up to date on an
                                        order's status, and keep track of the orders you have previously made.</p>
                                </div>
                                <!-- sksbc -->


                                <!--  -->
                                <div class="col-md-6 col-sm-6" id="target-div" style="display: none;">
                                    <h3>Returning Customer</h3>
                                    <p>I am a registed customer.</p>
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label for="usernameLabel">Username</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-login">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <a href="javascript:;">Forgotten Password?</a>
                                        <div class="padding-top-20">
                                            <button class="btn btn-primary" type="submit"
                                                name="submit_login">Login</button>
                                        </div>
                                        <hr>
                                        <div class="login-socio">
                                            <p class="text-muted">or login using:</p>
                                            <ul class="social-icons">
                                                <li><a href="javascript:;" data-original-title="facebook"
                                                        class="facebook" title="facebook"></a></li>
                                                <li><a href="javascript:;" data-original-title="Twitter" class="twitter"
                                                        title="Twitter"></a></li>
                                                <li><a href="javascript:;" data-original-title="Google Plus"
                                                        class="googleplus" title="Google Plus"></a></li>
                                                <li><a href="javascript:;" data-original-title="Linkedin"
                                                        class="linkedin" title="LinkedIn"></a></li>
                                            </ul>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CHECKOUT -->

                    <!-- BEGIN PAYMENT ADDRESS -->
                    <div id="payment-address" class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-address-content"
                                    class="accordion-toggle">
                                    Part 2: Account &amp; Billing and Delivery Details
                                </a>
                            </h2>
                        </div>
                        <div id="payment-address-content" class="panel-collapse collapse" style="display: none;">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="panel-body row">
                                    <div class="col-md-6 col-sm-6">
                                        <h3>Your Personal Details</h3>

                                        <div class="form-group">
                                            <label for="fullname">Full Name <span class="require">*</span></label>
                                            <input type="text" id="fullname" name="name" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-Mail <span class="require">*</span></label>
                                            <input type="text" id="email" name="email" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone number <span class="require">*</span></label>
                                            <input type="text" id="telephone" name="phone" class="form-control"
                                                required>
                                        </div>
                                        <div>
                                            <h3>Account</h3>
                                            <div class="form-group">
                                                <label for="username">Username <span class="require">*</span></label>
                                                <input type="text" id="username" name="username" class="form-control"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password <span class="require">*</span></label>
                                                <input type="password" id="password" name="password"
                                                    class="form-control" oninput="checkPasswordMatch()" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Password Confirm <span
                                                        class="require">*</span></label>
                                                <input type="password" id="password-confirm" name="password-confirm"
                                                    class="form-control" oninput="checkPasswordMatch()" required>
                                                <hr>
                                                <p id="password-match-message" style="color: red;"></p>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <h3>Your Address</h3>
                                        <div class="form-group">
                                            <label for="company">Number of House <span class="require">*</span></label>
                                            <input type="text" name="numHouse" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="city">Street <span class="require">*</span></label>
                                            <input type="text" name="street" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="address2">Wards/Communes <span class="require">*</span></label>
                                            <input type="text" name="commune" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="address1">Province/City <span class="require">*</span></label>
                                            <input type="text" name="city" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div>

                                                <button class="btn btn-primary  pull-right" type="submit"
                                                    name="submit_regist_full">Register</button>
                                                <div class="checkbox pull-right">
                                                    <label>
                                                        <input type="checkbox"> I have read and agree to the <a
                                                            title="Privacy Policy" href="javascript:;">Privacy
                                                            Policy</a>
                                                        &nbsp;&nbsp;&nbsp;
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>


                            <hr>

                        </div>

                    </div>
                    <!-- END PAYMENT ADDRESS -->

                </div>
                <!-- END CHECKOUT PAGE -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>

<?php
    include 'inc/footer.php';
?>