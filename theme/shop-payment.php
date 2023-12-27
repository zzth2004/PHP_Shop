<?php
include 'inc/header.php';
?>

<?php

$login_check =  CustomSession::get('Customer_login');
$userID = CustomSession::get('userID');
if ($login_check == false) {
    echo '
        <script>
            if (typeof window !== "undefined") {
                window.addEventListener("DOMContentLoaded", function() {
                    var notification = "You have not login yet! Plese move login and login/regis.";
                    if (notification !== "") {
                        
                        alert(notification);
                        window.location.href = "login.html";
                    
                    }else{
                        window.location.href = "404.php";
                    
                    }
                });
            }
        </script>
    ';
} else {
    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirmOder'])){


    // }
    if (isset($_GET['orderID']) && $_GET['orderID'] == 'order') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['confirm-submit'])) {
            if ((!isset($_POST['delivery-method']) || $_POST['delivery-method'] == null) || (!isset($_POST['pay-method']) || $_POST['pay-method'] == null)) {
                echo '
                <script>
                if (typeof window !== "undefined") {
                    window.addEventListener("DOMContentLoaded", function() {
                        var notification = "Please select a delivery and payment method";
                        if (notification !== "") {
                                            
                            alert(notification);
                            window.location.href = "shop-payment.php?method=buyallcart";
                        }
                        
                    });
                }
                </script>
                ';
            } else {

                $shipcost = $_POST['delivery-method'];
                $pay_method = $_POST['pay-method'];
                $insertOder = $cart->insertOder($userID, $shipcost, $pay_method);
                if ($insertOder) {

                    echo '
                            <script>
                                if (typeof window !== "undefined") {
                                    window.addEventListener("DOMContentLoaded", function() {
                                        var notification = "' . $insertOder . '";
                                        if (notification !== "") {
                                            
                                            alert(notification);

                                        }
                                    });
                                }
                            </script>
                        ';
                    $del_all_cart_Session = $cart->del_all_cart_after_order();
                    if ($del_all_cart_Session) {
                        echo '<script>window.location.href = "shop-show-order.php";</script>';
                    }
                }
            }

            // $insertOder = $cart->insertOder($userID, $shipcost, $pay_method);
        }
    }
}
// else{
//     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//         if( isset($_POST['submit-method'])){
//             $deliveryMethod = isset($_POST['delivery-method']) ? $_POST['delivery-method'] : '';
//             $paymentMethod = isset($_POST['pay-method']) ? $_POST['pay-method'] : '';
//         }
//     } 
// }

?>

<div class="main">
    <div class="container">
        <ul class="breadcrumb" style="font-size: 1.3rem;">
            <li><a href="index.php">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active">Payment</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->

            <div class="col-md-12 col-sm-12">
                <div class="payment-top-wrap">
                    <div class="payment-top">
                        <div class="payment-top-cart payment-top-item">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="payment-top-adress payment-top-item">
                            <i class="fa fa-location-dot"></i>
                        </div>
                        <div class="payment-top-payment payment-top-item">
                            <i class="fa-solid fa-money-check"></i>
                        </div>
                    </div>
                </div>
                <!-- main secsion -->
                <div class="panel-group checkout-page accordion scrollable" id="payment-page">
                    <div id="confirm" class="panel">
                        <div class="panel-heading">
                            <h2 class="panel-title" style="height: 40px; padding: 10px 0; font-size: 20px; font-weight: bold;">Part 3:
                                Confirm Order</h2>
                        </div>
                        <div id="confirm-content">
                            <form action="?orderID=order" method="post">
                                <div class="panel-body row">
                                    <div class="col-lg-6 col-md-6 clearfix left-list-content">
                                        <div class="method-delivery">
                                            <p style="font-weight: bold">Step 1: Delivery method</p>
                                            <div class="method-delivery-item">
                                                <input type="radio" name="delivery-method" value="Stander">
                                                <label for="">Standard (10$)</label>
                                            </div>
                                            <div class="method-delivery-item">
                                                <input type="radio" name="delivery-method" value="Express">
                                                <label for="">Express(15$)</label>
                                            </div>
                                            <div class="method-delivery-item">
                                                <input type="radio" name="delivery-method" value="Post-office">
                                                <label for="">Post office (8$)</label>
                                            </div>
                                        </div>
                                        <div class="method-payment">
                                            <p style="font-weight: bold">Step 2: Payment method</p>
                                            <p style="font-size: 14px;">All transactions are secure and encrypted.
                                                Credit
                                                card information will not be saved.</p>
                                            <div class="payment-group-input">
                                                <div class="method-payment-item">
                                                    <input type="radio" name="pay-method" value="credit">
                                                    <label for="">Credit card</label>
                                                </div>
                                                <div class="method-payment-item-img">
                                                    <img src="/theme/assets/product_img/credit.png" alt="">
                                                    <img src="/theme/assets/product_img/credit2.webp" alt="">
                                                </div>
                                            </div>
                                            <div class="payment-group-input">
                                                <div class="method-payment-item">
                                                    <input type="radio" name="pay-method" value="bank">
                                                    <label for="">Affiliate bank</label>
                                                    <p style="font-size: 14px;">(Supports more than 13 banks throughout
                                                        Vietnam)</p>
                                                </div>
                                                <div class="method-payment-item-img">
                                                    <img src="/theme/assets/product_img/listSmallbank.png" alt="">
                                                </div>
                                            </div>
                                            <div class="payment-group-input">
                                                <div class="method-payment-item">
                                                    <input type="radio" name="pay-method" value="Ewallet">
                                                    <label for="">E-wallet</label>
                                                </div>
                                                <div class="method-payment-item-img">
                                                    <img src="/theme/assets/product_img/ewallet.png" alt="">
                                                    <img src="/theme/assets/product_img/MoMo_Logo.png" alt="">
                                                </div>
                                            </div>
                                            <div class="payment-group-input">
                                                <div class="method-payment-item">
                                                    <input type="radio" name="pay-method" value="pay-after-recived">
                                                    <label for="">Pay after receive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 right-content">
                                        <div class="pay-right-button">
                                            <input type="text" name="enterVou" placeholder="Enter your voucher here">
                                            <button><i class="fa-solid fa-check"></i></button>
                                        </div>
                                        <h1 style="font-weight: bold;">Selected list</h1>
                                        <table>
                                            <tr>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Total</th>
                                            </tr>
                                            <?php
                                            if (isset($_GET['method']) && $_GET['method'] != null) {
                                                if ($_GET['method'] == 'buynow') {
                                                    $cartlistconfirm = $cart->showcartBuyNow();
                                                } else {
                                                    $cartlistconfirm = $cart->showcart();
                                                }


                                                if ($cartlistconfirm) {
                                                    $subTotal = 0;
                                                    while ($result = $cartlistconfirm->fetch_assoc()) {


                                            ?>
                                                        <tr>
                                                            <td><?php echo $result['productName'] ?></td>
                                                            <td><?php echo $result['CartQuanlity'] ?></td>
                                                            <td><strong><span>$</span><?php echo $result['Price'] ?></strong></td>
                                                            <td><strong><span>$</span><?php $total = $result['CartQuanlity'] * $result['Price'];
                                                                                        echo $total;
                                                                                        ?></strong></td>
                                                        </tr>
                                                    <?php
                                                        $subTotal += $total;
                                                    }
                                                }
                                            } else {
                                                $cartlistconfirm = $cart->showcart();
                                                if ($cartlistconfirm) {
                                                    $subTotal = 0;
                                                    while ($result = $cartlistconfirm->fetch_assoc()) {


                                                    ?>
                                                        <tr>
                                                            <td><?php echo $result['productName'] ?></td>
                                                            <td><?php echo $result['CartQuanlity'] ?></td>
                                                            <td><strong><span>$</span><?php echo $result['Price'] ?></strong></td>
                                                            <td><strong><span>$</span><?php $total = $result['CartQuanlity'] * $result['Price'];
                                                                                        echo $total;
                                                                                        ?></strong></td>
                                                        </tr>
                                            <?php
                                                        $subTotal += $total;
                                                    }
                                                }
                                            }
                                            ?>

                                        </table>
                                        <div class="checkout-total-block" style="width: 300px;">
                                            <ul>
                                                <li>
                                                    <em>Sub total</em>

                                                    <strong class="price"><span>$</span><?php
                                                                                        if ($subTotal != null) {
                                                                                            echo $subTotal;
                                                                                        } else {
                                                                                            echo '0';
                                                                                        }
                                                                                        ?></strong>
                                                </li>


                                                <li>
                                                    <em>VAT (5%)</em>

                                                    <strong class="price"><span>$</span><?php
                                                                                        $vatCost = $subTotal * 5 / 100;
                                                                                        if ($vatCost != null) {
                                                                                            echo $vatCost;
                                                                                        } else {
                                                                                            echo '0';
                                                                                        } ?></strong>

                                                </li>
                                                <li class="checkout-total-price">
                                                    <em>Total <span>(Without ship cost)</span></em>
                                                    <strong class="price"><span>$</span><?php $totalall = $subTotal + $vatCost;
                                                                                        if ($totalall != null) {
                                                                                            echo  $totalall;
                                                                                        } else {
                                                                                            echo '0';
                                                                                        }
                                                                                        ?></strong>
                                                </li>
                                                <li id="delivery-method-li" style="justify-content: space-between; display: flex;">
                                                    <!-- <input type="hidden" name="ship-cost" id="ship-cost" value=""> -->
                                                    <p>Shipping method: </p>
                                                    <span style="color: brown; font-size: 14px;"> </span>

                                                    </strong>
                                                </li>
                                                <li id="payment-method-li" style="justify-content: space-between; display: flex;">
                                                    <!-- <input type="hidden" name="payment-method" id="payment-method" -->
                                                    <!-- value=""> -->
                                                    <p>Payment method: </p>
                                                    <span style="color: brown; font-size: 14px;"> </span>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <!-- <a style="color: #fff; text-decoration: none;" href="?orderID=order"><button
                                                class="btn btn-primary pull-right" type="submit" name="confirm-submit"
                                                id="button-confirm">Confirm Order</button></a> -->
                                        <button class="btn btn-primary pull-right" type="submit" name="confirm-submit" id="button-confirm">Confirm Order</button>
                                        <button type="button" id="back-to-previous" class="btn btn-default pull-right margin-right-20">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END CONFIRM -->
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