<?php
  include 'inc/header.php';
  include 'inc/slider.php';
?>


<div class="main">
    <?php 
     

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['submit-cart'])){
                
            }
            $login_check =  CustomSession::get('Customer_login');
            if($login_check==false){
                echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "You must login first! Please login to add to cart";
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
            }else{            
            $quanlity = $_POST['quanlity'];
            $productID = $_POST['productID'];
            $addToCart = $cart->add_cart($quanlity, $productID);
            echo '
                <script>
                    if (typeof window !== "undefined") {
                        window.addEventListener("DOMContentLoaded", function() {
                            var notification = "'. $addToCart .'";
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
        }
?>
    <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SALE PRODUCT -->
            <div class="col-md-12 sale-product col-lg-12 ">
                <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                    <h2 id="setstyle"> Hot Sale <sup><span style="color: red;">*</span></sup></h2>
                    <ul id="button_group" style="list-style: none; display: flex;">
                        <?php 
                        $brand = new Brand();
                        
                        $getBrand = $brand->showBrandListLimit();
                        if($getBrand){
                            while($rsBrand = $getBrand->fetch_assoc()){
                    ?>

                        <li style="margin-left: 15px; "><a
                                href="shop-product-list.php?brand=<?php echo $rsBrand['brandName'];?>"
                                style="width: 100px; height: 50px;"><button
                                    style="width: 100px; height: 35px; border: 1px solid transparent; border-radius: 15px;"><?php echo $rsBrand['brandName'];?></button>
                            </a></li>
                        <?php
                        }
                    }
                       ?>
                    </ul>

                </div>
                <div class="owl-carousel owl-theme owl-carousel5" style="display: flex;">
                    <?php
            $getproductNew = $product->showNewProduct();
            if ($getproductNew) {
                while ($resultNew = $getproductNew->fetch_assoc()) {
            ?>
                    <div class="product-item" style="height: 295px;width: 220px;">
                        <div class="pi-img-wrapper">
                            <a href="shop-item-details.php"><img src="admin/uploads/<?php echo $resultNew['Img']; ?>"
                                    class="img-responsive" alt="<?php echo $resultNew['productName']; ?>" /></a>
                            <div>
                                <a href="admin/uploads/<?php echo $resultNew['Img']; ?>"
                                    class="btn btn-default fancybox-button">Zoom</a>
                                <a href="#<?php echo $resultNew['ProductID'];
                               
                            ?>" class="btn btn-default fancybox-fast-view">View</a>
                            </div>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <h3><a href="shop-item-details.php"><?php echo $resultNew['productName']; ?></a></h3>
                            <p class="pi-price" style="right: 0; font-size: 15px; padding-top: 10px;">
                                <strong><?php echo $resultNew['Price']; ?><span>
                                        $</span></strong>
                            </p>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <button class="btn btn-default add2cart"
                                    style="background-color: #DD0000; color: white;">Buy Now</button>
                            </div>
                            <form action="" method="post">
                                <input type="hidden" name="productID" value="<?php echo $resultNew['ProductID'];?>">
                                <input type="hidden" name="quanlity" value="1">
                                <button class="btn btn-default add2cart" type="submit" name="submit-cart"><i
                                        class="fa fa-shopping-cart"></i> Add-cart</button>
                            </form>
                        </div>
                        <div class="sticker sticker-sale"></div>
                        <!-- id = product-pop-up -->
                        <div id="<?php echo $resultNew['ProductID'];?>" style="display: none; width: 700px;">
                            <div class="product-page product-pop-up">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-3">
                                        <div class="product-main-image">
                                            <img src="admin/uploads/<?php echo $resultNew['Img']; ?>"
                                                class="img-responsive" alt="<?php echo $resultNew['productName']; ?>"
                                                class="img-responsive">
                                        </div>
                                        <div class="product-other-images" style="display: flex;">
                                            <a href="admin/uploads/<?php echo $resultNew['Img'];  ?>"
                                                class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100"
                                                    src="admin/uploads/<?php echo $resultNew['Img'];  ?>"></a>
                                            <a href="admin/uploads/<?php echo $resultNew['Img'];  ?>"
                                                class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100"
                                                    src="admin/uploads/<?php echo $resultNew['Img'];  ?>"></a>
                                            <a href="admin/uploads/<?php echo $resultNew['Img'];  ?>"
                                                class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100"
                                                    src="admin/uploads/<?php echo $resultNew['Img'];  ?>"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-9">
                                        <h2><?php echo $resultNew['productName']; ?></h2>
                                        <div class="price-availability-block clearfix">
                                            <div class="price">
                                                <strong><span>$</span><?php echo $resultNew['Price']; ?></strong>
                                                <em>$<span><?php echo $resultNew['Price']; ?></span></span></em>
                                            </div>
                                            <div class="Status">
                                                Status: <strong><?php 
                                                if($resultNew['Status']==0){
                                                    echo 'New seal';
                                                }else{
                                                    echo 'Old 99%';
                                                }
                                                 ?></strong>
                                            </div>
                                        </div>
                                        <div class="description">
                                            <p style="font-size: 16px;"><span><i class="fa-solid fa-info"></i></span>
                                                <?php echo $resultNew['Decription']; ?>
                                            </p>
                                        </div>
                                        <div class="product-page-options">
                                            <div class="pull-left">
                                                <label class="control-label">Config:
                                                    <span
                                                        style="font-size: 15px; color: brown;align-items: center;"><?php echo $resultNew['Config']; ?></span></label>

                                            </div>
                                            <div class="pull-left">
                                                <label class="control-label">Color:
                                                    <span
                                                        style="font-size: 15px; color: brown; align-items: center;"><?php echo $resultNew['Color']; ?></span></label>

                                            </div>
                                        </div>
                                        <div class="product-page-cart">
                                            <form action="" method="post">
                                                <input type="hidden" name="productID"
                                                    value="<?php echo $resultNew['ProductID']?>">
                                                <div class="product-quantity">
                                                    <input id="product-quantity" type="number" value="1" readonly
                                                        name="quanlity" class="form-control input-sm" min="1"
                                                        max="<?php echo $resultNew['Quanlity'] ?>">
                                                </div>
                                                <button class="btn btn-primary" type="submit" name="submit-cart">Add to
                                                    cart</button>
                                                <a href="shop-item-details.php?productID=<?php echo $resultNew['ProductID']?>"
                                                    class="btn btn-default">More details</a>
                                            </form>
                                        </div>
                                    </div>

                                    <div class="sticker sticker-sale"></div>
                                </div>
                            </div>
                        </div>
                        <!-- test -->
                    </div>

                    <?php
                }
            }
            ?>
                </div>
            </div>
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="col-md-12 sale-product col-lg-12">
            <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <h2 id="setstyle"> NEW LAPTOP <sup><span style="color: red;">*</span></sup></h2>

                <ul id="button_group" style="list-style: none; display: flex;">
                    <?php 
                        $brand = new Brand();
                        $cateName = 'Laptop';
                        $getBrand = $brand->showBrandfollowCatName($cateName);
                        if($getBrand){
                            while($rsBrand = $getBrand->fetch_assoc()){
                    ?>

                    <li style="margin-left: 15px; "><a
                            href="shop-product-list.php?brand=<?php echo $rsBrand['brandName'];?>"
                            style="width: 100px; height: 50px;"><button
                                style="width: 100px; height: 35px; border: 1px solid transparent; border-radius: 15px;"><?php echo $rsBrand['brandName'];?></button>
                        </a></li>
                    <?php
                        }
                    }
                       ?>
                </ul>

            </div>
            <div class="owl-carousel owl-theme owl-carousel5" style="display: flex;">
                <?php
                 $getproductNewLap = $product->showNewProductLap();
                 if ($getproductNewLap) {
                 while ($resultNewlap = $getproductNewLap->fetch_assoc()) {
                 ?>
                <div class="product-item" style="height: 295px;width: 220px;">
                    <div class="pi-img-wrapper">
                        <img src="admin/uploads/<?php echo $resultNewlap['Img']; ?>" class="img-responsive"
                            alt="<?php echo $resultNewlap['productName']; ?>">
                        <div>
                            <a href="admin/uploads/<?php echo $resultNewlap['Img']; ?>"
                                class="btn btn-default fancybox-button">Zoom</a>
                            <a href="shop-item-details.php?productID=<?php echo $resultNewlap['ProductID']?>"
                                class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <h3><a href="shop-item-details.php"><?php echo $resultNewlap['productName']; ?></a></h3>
                        <p class="pi-price" style="right: 0; font-size: 15px; padding-top: 10px;">
                            <strong><?php echo $resultNewlap['Price']; ?><span>
                                    $</span></strong>
                        </p>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <button class="btn btn-default add2cart" style="background-color: #DD0000; color: white;">
                                Buy Now</button>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="productID" value="<?php echo $resultNewlap['ProductID'];?>">
                            <input type="hidden" name="quanlity" value="1">
                            <button class="btn btn-default add2cart" type="submit" name="submit-cart"><i
                                    class="fa fa-shopping-cart"></i> Add-cart</button>
                        </form>
                    </div>
                    <div class="sticker sticker-new"></div>
                    <!-- test -->
                </div>

                <?php
                }
            }
            ?>
            </div>
        </div>

    </div>
    <!-- END CONTENT -->
    <div class="row margin-bottom-35" style="margin: 25px 0 35px 50px;">
        <!-- BEGIN TWO PRODUCTS -->
        <div class="col-md-6 two-items-bottom-items col-lg-4" style="margin-right: 20px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                <h2 id="setstyle"> SMARTPHONE <sup><span style="color: red;">*</span></sup></h2>
                <ul id="button_group" style="list-style: none; display: flex;">
                    <?php 
                        $brand = new Brand();
                        $cateName = 'Smartphone';
                        $getBrand = $brand->showBrandFollowCatLimit($cateName);
                        if($getBrand){
                            while($rsBrand = $getBrand->fetch_assoc()){
                    ?>

                    <li style="margin-left: 15px; "><a
                            href="shop-product-list.php?brand=<?php echo $rsBrand['brandName'];?>"
                            style="width: 100px; height: 50px;"><button
                                style="width: 100px; height: 35px; border: 1px solid transparent; border-radius: 15px;"><?php echo $rsBrand['brandName'];?></button>
                        </a></li>
                    <?php
                        }
                    }
                       ?>
                </ul>

            </div>
            <div class="owl-carousel owl-theme owl-carousel2" style="display: flex !important;">

                <?php
                 $getproductNewphone = $product->showNewProductphone();
                 if ($getproductNewphone) {
                 while ($resultNewphone = $getproductNewphone->fetch_assoc()) {
                 ?>
                <div class="product-item" style="height: 295px;width: 220px;">
                    <div class="pi-img-wrapper">
                        <img src="admin/uploads/<?php echo $resultNewphone['Img']; ?>" class="img-responsive"
                            alt="<?php echo $resultNewphone['productName']; ?>">
                        <div>
                            <a href="admin/uploads/<?php echo $resultNewphone['Img']; ?>"
                                class="btn btn-default fancybox-button">Zoom</a>
                            <a href="shop-item-details.php?productID=<?php echo $resultNewphone['ProductID']?>"
                                class="btn btn-default fancybox-fast-view">View</a>
                        </div>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <h3><a href="shop-item-details.php"><?php echo $resultNewphone['productName']; ?></a></h3>
                        <p class="pi-price" style="right: 0; font-size: 15px; padding-top: 10px;">
                            <strong><?php echo $resultNewphone['Price']; ?><span>
                                    $</span></strong>
                        </p>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <div>
                            <button class="btn btn-default add2cart"
                                style="background-color: #DD0000; color: white;">Buy Now</button>
                        </div>
                        <form action="" method="post">
                            <input type="hidden" name="productID" value="<?php echo $resultNewphone['ProductID'];?>">
                            <input type="hidden" name="quanlity" value="1">
                            <button class="btn btn-default add2cart" type="submit" name="submit-cart"><i
                                    class="fa fa-shopping-cart"></i> Add-cart</button>
                        </form>
                    </div>
                    <div class="sticker sticker-new"></div>
                </div>
                <?php
                    }
                    } ?>

            </div>
        </div>
        <!-- END TWO PRODUCTS -->
        <!-- BEGIN PROMO -->
        <div class="col-md-6 col-lg-8 margin-bottom-35" style="width: 800px; height: 400px; margin-right: 50px;">
            <div class="content-slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/pages/img/shop-slider/dell.jpg" class="img-responsive" alt="dell" />
                        </div>
                        <div class="item">
                            <img src="assets/pages/img/shop-slider/macming.jpg" class="img-responsive" alt="mac" />
                        </div>
                        <div class="item">
                            <img src="assets/pages/img/shop-slider/slideiphoemini.png" class="img-responsive"
                                alt="iphone" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROMO -->
    </div>
    <!-- END TWO PRODUCTS & PROMO -->
</div>



<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="canon"
                    title="canon" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="esprit"
                    title="esprit" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="gap"
                    title="gap" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="next"
                    title="next" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="puma"
                    title="puma" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="zara"
                    title="zara" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="canon"
                    title="canon" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="esprit"
                    title="esprit" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="gap"
                    title="gap" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="next"
                    title="next" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="puma"
                    title="puma" /></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/shop-slider/brand/Dell.jpg" alt="zara"
                    title="zara" /></a>
        </div>
    </div>
</div>
<!-- END BRANDS -->


<?php
  include('inc/footer.php');
?>