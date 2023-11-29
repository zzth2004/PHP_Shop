<?php
  include 'inc/header.php';
 
?>


<div class="main">
    <div class="container">
        <ul class="breadcrumb">
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
                                            <input type="radio" name="account" value="register"> Register Account
                                        </label>
                                        <label>
                                            <input type="radio" name="account" value="guest"> Guest Checkout
                                        </label>
                                    </div>
                                    <p>By creating an account you will be able to shop faster, be up to date on an
                                        order's status, and keep track of the orders you have previously made.</p>
                                    <button class="btn btn-primary" type="submit" data-toggle="collapse"
                                        data-parent="#checkout-page"
                                        data-target="#payment-address-content">Continue</button>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h3>Returning Customer</h3>
                                    <p>I am a returning customer.</p>
                                    <form role="form" action="#">
                                        <div class="form-group">
                                            <label for="email-login">E-Mail</label>
                                            <input type="text" id="email-login" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-login">Password</label>
                                            <input type="password" id="password-login" class="form-control">
                                        </div>
                                        <a href="javascript:;">Forgotten Password?</a>
                                        <div class="padding-top-20">
                                            <button class="btn btn-primary" type="submit">Login</button>
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
                        <div id="payment-address-content" class="panel-collapse collapse">
                            <div class="panel-body row">
                                <div class="col-md-6 col-sm-6">
                                    <h3>Your Personal Details</h3>
                                    <form action="regis.php" method="post">
                                        <div class="form-group">
                                            <label for="fullname">Full Name <span class="require">*</span></label>
                                            <input type="text" id="fullname" name="fullname" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">E-Mail <span class="require">*</span></label>
                                            <input type="text" id="email" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone number <span class="require">*</span></label>
                                            <input type="text" id="telephone" name="phone" class="form-control">
                                        </div>

                                        <h3>Account</h3>
                                        <div class="form-group">
                                            <label for="username">Username <span class="require">*</span></label>
                                            <input type="text" id="username" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password <span class="require">*</span></label>
                                            <input type="password" id="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Password Confirm <span
                                                    class="require">*</span></label>
                                            <input type="text" id="password-confirm" name="password-confirm"
                                                class="form-control">
                                        </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <h3>Your Address</h3>
                                    <div class="form-group">
                                        <label for="company">Number of House <span class="require">*</span></label>
                                        <input type="text" id="company" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address1">Province/City <span class="require">*</span></label>
                                        <input type="text" id="address1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address2">Wards/Communes <span class="require">*</span></label>
                                        <input type="text" id="address2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">Street <span class="require">*</span></label>
                                        <input type="text" id="city" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country <span class="require">*</span></label>
                                        <select class="form-control input-sm" id="country">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="244">Vietnam</option>
                                            <option value="1">USA</option>
                                            <option value="2">England</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="region-state">Area <span class="require">*</span></label>
                                        <select class="form-control input-sm" id="region-state">
                                            <option value=""> --- Please Select --- </option>
                                            <option value="3513">Asian</option>
                                            <option value="3514">US/UK</option>
                                            <option value="3515">Africa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" checked="checked"> My delivery and billing addresses
                                            are the same.
                                        </label>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <button class="btn btn-primary  pull-left" type="submit"
                                                data-toggle="collapse" data-parent="regis.php" data-target="regis.php"
                                                id="button-regis">Register</button>
                                            <div class="checkbox pull-left">
                                                <label>
                                                    <input type="checkbox"> I have read and agree to the <a
                                                        title="Privacy Policy" href="javascript:;">Privacy Policy</a>
                                                    &nbsp;&nbsp;&nbsp;
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div>
                                    <button class="btn btn-primary  pull-right" type="submit" data-toggle="collapse"
                                        data-parent="#checkout-page" data-target="#confirm-content"
                                        id="button-payment-address">Continue</button>
                                    <div class="checkbox pull-right">
                                        <label>
                                            <input type="checkbox"> I have read and agree to the <a
                                                title="Privacy Policy" href="javascript:;">Privacy Policy</a>
                                            &nbsp;&nbsp;&nbsp;
                                        </label>
                                    </div>
                                </div>

                                <hr>

                            </div>
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