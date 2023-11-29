<?php
  include 'inc/header.php';
?>

<session class="cart">
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
                            <th>Amount</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="assets/product_img/dell16.jpg" alt="dell16" />
                                </td>
                                <td>
                                    <p>Dell inspiron 16</p>
                                </td>
                                <td><span>8/512 GB</span></td>
                                <td>499.00 <sup>$</sup></td>
                                <td><input type="number" min="1" value="1" max="10" /></td>
                                <td>499.00 <sup>$</sup></td>
                                <td>
                                    <button><i class="fa fa-circle-xmark"></i></button>
                                    <button><i class="fa-solid fa-circle-check"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="assets/product_img/dell16_1.jpg" alt="dell16" />
                                </td>
                                <td>
                                    <p>Dell inspiron 16</p>
                                </td>
                                <td><span>8/512 GB</span></td>
                                <td>499.00 <sup>$</sup></td>
                                <td><input type="number" min="1" value="1" max="10" /></td>
                                <td>499.00 <sup>$</sup></td>
                                <td>
                                    <button><i class="fa fa-circle-xmark"></i></button>
                                    <button><i class="fa-solid fa-circle-check"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="cart-content-right col-lg-3 col-md-4 col-sm-6">
                    <table>
                        <tr>
                            <th colspan="2">Amount cart</th>
                        </tr>
                        <tr>
                            <td>Total product</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>Toltal price</td>
                            <td>499.00 <sup>$</sup></td>
                        </tr>

                        <tr>
                            <td>Temporary</td>
                            <td>499.00 <sup>$</sup></td>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        <p>Don't wait anymore!</p>
                        <p>
                            Hurry and shop now to apply attractive
                            <span style="color: red">vouchers</span> to your order.
                        </p>
                    </div>
                    <div class="cart-content-right-button">
                        <button name="shop-btn" id="shop-btn">Shop more</button>
                        <button name="buy-btn" id="buy-btn">Buy now</button>
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
                            // Chuyển đến trang khác khi nút được nhấp
                            window.location.href =
                                "/theme/shop-checkout.php"; // Thay đổi URL thành trang bạn muốn chuyển đến
                        });
                        </script>
                        <!-- end js -->
                    </div>
                    <div class="cart-content-right-log">
                        <p>Not logged in/don't have an account?</p>

                        <p>
                            Please <a href="login.php">log in</a> /
                            <a href="login.php"> register</a> now to shop!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</session>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/canon.jpg" alt="canon"
                    title="canon" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit"
                    title="esprit" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/canon.jpg" alt="canon"
                    title="canon" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit"
                    title="esprit" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara" /></a>
        </div>
    </div>
</div>
<!-- END BRANDS -->


<!-- BEGIN PRE-FOOTER -->
<?php
    include 'inc/footer.php';
?>