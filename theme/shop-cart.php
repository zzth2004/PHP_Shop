<?php
  include 'inc/header.php';
?>
<div style="display: block; margin-bottom: 35px;">
    <?php

       
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-v'])){
            $cartID = $_POST['cartID'];
            $quanlity= $_POST['quanlity'];

            $update_quantity = $cart->update_quantity($cartID,  $quanlity);
            if( $quanlity<=0){
                $delcart = $cart->delete_cart($cartID);
            }
            echo '
                        <script>
                            if (typeof window !== "undefined") {
                                window.addEventListener("DOMContentLoaded", function() {
                                    var notification = "'. $update_quantity .'";
                                    if (notification !== "") {
                                        
                                        alert(notification);
                                        window.location.href = "shop-cart.php";
                                    
                                    }else{
                                        window.location.href = "404.php";
                                    
                                    }
                                });
                            }
                        </script>
                    ';
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-x'])){
            $cartID = $_POST['cartID'];
            $delcart = $cart->delete_cart($cartID);
            echo '
                        <script>
                            if (typeof window !== "undefined") {
                                window.addEventListener("DOMContentLoaded", function() {
                                    var notification = "'. $delcart .'";
                                    if (notification !== "") {
                                        
                                        alert(notification);
                                        window.location.href = "shop-cart.php";
                                    
                                    }else{
                                        window.location.href = "404.php";
                                    
                                    }
                                });
                            }
                        </script>
                    ';
        }
    
?>


    <?php 
    if(!isset($_GET['productID'])){
        echo "<meta http-equiv='refresh' content ='0,URL=?productID=live'>";
    }
?>
    <div>
        <div class="cart">
            <div class="container">
                <div class="cart-top-wrap">
                    <div class="cart-top">
                        <div class="cart-top-cart cart-top-item">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="cart-top-adress cart-top-item">
                            <i class="fa fa-location-dot"></i>
                        </div>
                        <div class="cart-top-payment cart-top-item">
                            <i class="fa-solid fa-money-check"></i>
                        </div>
                    </div>
                </div>

                <div class="container row">

                    <div class="cart-content">
                        <div class="cart-content-left col-lg-9 col-md-8 col-sm-6">
                            <table>
                                <thead>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Config</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </thead>

                                <tbody>
                                    <?php 
                                    

                                    $get_cart = $cart->showcart();
                                    if($get_cart){
                                    $totalproduct = 0;
                                    $totalPrice = 0;
                                    while($result = $get_cart->fetch_assoc()){


                                ?>
                                    <tr>
                                        <td>
                                            <img src="admin/uploads/<?php echo $result['Img'] ;?>"
                                                alt="<?php echo $result['productName'] ;?>" />
                                        </td>
                                        <td>
                                            <p><?php echo $result['productName'] ;?></p>
                                        </td>
                                        <td>
                                            <p><?php echo $result['Config'] ;?></p>
                                        </td>

                                        <td><?php echo $result['Price'] ;?> <sup>$</sup></td>
                                        <form action="" method="post">
                                            <input type="hidden" name="cartID"
                                                value="<?php echo $result['cartID'] ; ?>">
                                            <td><input type="number" min="0"
                                                    value="<?php echo $result['CartQuanlity'] ;?>"
                                                    max="<?php echo $result['Quanlity'] ;?>"
                                                    style="background-color: #fff;" name="quanlity" />
                                            </td>
                                            <td><?php 
                                    $total =  $result['CartQuanlity'] * $result['Price'];
                                    echo $total;
                                ?> <sup>$</sup></td>
                                            <td>
                                                <button type="submit" name="submit-x"><i
                                                        class="fa fa-circle-xmark"></i></button>
                                                <button type="submit" name="submit-v"><i
                                                        class="fa-solid fa-circle-check"></i></button>
                                            </td>
                                        </form>
                                    </tr>
                                    <?php 
                                    $totalproduct += $result['CartQuanlity'];
                                    $totalPrice += $total;
                                    }
                                }
                            
                            ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-content-right col-lg-3 col-md-4 col-sm-6">
                            <table>
                                <tr>
                                    <th colspan="2">Amount cart</th>
                                </tr>
                                <?php 
                    $check_cart = $cart->check_cart();
                    if($check_cart){
                        
                    ?>
                                <tr>
                                    <td>Total product</td>
                                    <td><?php echo $totalproduct; 
                                Session::set('totalproduct', $totalproduct);
                            ?></td>
                                </tr>
                                <tr>
                                    <td>Toltal price</td>
                                    <td><?php echo $totalPrice; 
                            Session::set('totalPrice', $totalPrice);
                            ?> <sup>$</sup></td>
                                </tr>

                                <tr>
                                    <td>Temporary</td>
                                    <td><?php echo $totalPrice; ?><sup>$</sup></td>
                                </tr>
                            </table>
                            <div class="cart-content-right-text">
                                <p>Don't wait anymore!</p>
                                <p>
                                    Hurry and shop now to apply attractive
                                    <span style="color: red">vouchers</span> to your order.
                                </p>
                            </div>
                            <?php 
                    }else{
                        echo '<p style="font-size: 2rem; font-weight: 600; color: red;">Cart is empty. Please add product
                                           to cart!</p>';
                    }
                    ?>
                            <div class="cart-content-right-button">
                                <button name="shop-btn" id="shop-btn">Shop more</button>
                                <button name="buy-btn" id="buy-btn">Buy now</button>
                                <?php  $login_check =  CustomSession::get('Customer_login');
                                if($login_check==false){
                                    $target_page = "/theme/shop-checkout.php";
                            }
                            else{
                                $target_page = "/theme/shop-payment.php";
                            }
                            ?>
                                <!-- js click buy -->
                                <script>
                                const buyBtn = document.getElementById("buy-btn");
                                const shopBtn = document.getElementById("shop-btn");
                                shopBtn.addEventListener("click", function() {
                                    // Chuyển đến trang khác khi nút được nhấp
                                    window.location.href =
                                        "/theme/shop-product-list.php"; // Thay đổi URL thành trang bạn muốn chuyển đến
                                });
                                buyBtn.addEventListener("click", function() {
                                    window.location.href =
                                        "<?php echo  $target_page; ?> "; // Thay đổi URL thành trang bạn muốn chuyển đến
                                });
                                </script>
                                <!-- end js -->
                            </div>
                            <div class="cart-content-right-log">
                                <p>Not logged in/don't have an account?</p>

                                <p>
                                    Please <a href="login.html">log in</a> /
                                    <a href="login.html"> register</a> now to shop!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>




<!-- BEGIN PRE-FOOTER -->
<?php
    include 'inc/footer.php';
?>