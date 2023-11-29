<?php
  include 'inc/header.php';
?>
<div class="main">
    <div class="container">
        <ul class="breadcrumb">
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
                            <h2 class="panel-title"
                                style="height: 40px; padding: 10px 0; font-size: 20px; font-weight: bold;">Part 3:
                                Confirm Order</h2>
                        </div>
                        <div id="confirm-content">
                            <div class="panel-body row">
                                <div class="col-lg-6 col-md-6 clearfix left-list-content">
                                    <div class="method-delivery">
                                        <p style="font-weight: bold">Step 1: Delivery method</p>
                                        <div class="method-delivery-item">
                                            <input type="radio" checked name="delivery-method">
                                            <label for="">Standard</label>
                                        </div>
                                        <div class="method-delivery-item">
                                            <input type="radio" name="delivery-method">
                                            <label for="">Express</label>
                                        </div>
                                        <div class="method-delivery-item">
                                            <input type="radio" name="delivery-method">
                                            <label for="">Post office</label>
                                        </div>
                                    </div>
                                    <div class="method-payment">
                                        <p style="font-weight: bold">Step 2: Payment method</p>
                                        <p style="font-size: 14px;">All transactions are secure and encrypted. Credit
                                            card information will not be saved.</p>
                                        <div class="payment-group-input">
                                            <div class="method-payment-item">
                                                <input type="radio" name="pay-method">
                                                <label for="">Credit card</label>
                                            </div>
                                            <div class="method-payment-item-img">
                                                <img src="/theme/assets/product_img/credit.png" alt="">
                                                <img src="/theme/assets/product_img/credit2.webp" alt="">
                                            </div>
                                        </div>
                                        <div class="payment-group-input">
                                            <div class="method-payment-item">
                                                <input type="radio" name="pay-method">
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
                                                <input type="radio" name="pay-method">
                                                <label for="">E-wallet</label>
                                            </div>
                                            <div class="method-payment-item-img">
                                                <img src="/theme/assets/product_img/ewallet.png" alt="">
                                                <img src="/theme/assets/product_img/MoMo_Logo.png" alt="">
                                            </div>
                                        </div>
                                        <div class="payment-group-input">
                                            <div class="method-payment-item">
                                                <input type="radio" checked name="pay-method">
                                                <label for="">Pay after receive</label>
                                            </div>
                                        </div>
                                    </div>
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
                                        <tr>
                                            <td>RES.193</td>
                                            <td>1</td>
                                            <td><strong><span>$</span>47.00</strong></td>
                                            <td><strong><span>$</span>47.00</strong></td>
                                        </tr>
                                        <tr>
                                            <td>RES.193</td>
                                            <td>1</td>
                                            <td><strong><span>$</span>47.00</strong></td>
                                            <td><strong><span>$</span>47.00</strong></td>
                                        </tr>
                                    </table>
                                    <div class="checkout-total-block">
                                        <ul>
                                            <li>
                                                <em>Sub total</em>
                                                <strong class="price"><span>$</span>47.00</strong>
                                            </li>
                                            <li>
                                                <em>Shipping cost</em>
                                                <strong class="price"><span>$</span>3.00</strong>
                                            </li>
                                            <li>
                                                <em>Eco Tax (-2.00)</em>
                                                <strong class="price"><span>$</span>3.00</strong>
                                            </li>
                                            <li>
                                                <em>VAT (17.5%)</em>
                                                <strong class="price"><span>$</span>3.00</strong>
                                            </li>
                                            <li class="checkout-total-price">
                                                <em>Total</em>
                                                <strong class="price"><span>$</span>56.00</strong>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <button class="btn btn-primary pull-right" type="submit" id="button-confirm">Confirm
                                        Order</button>
                                    <button type="button"
                                        class="btn btn-default pull-right margin-right-20">Cancel</button>
                                </div>
                            </div>
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