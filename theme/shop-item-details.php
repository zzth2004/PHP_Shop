<?php
  include 'inc/header.php';
?>
<?php 
        
        if(!isset($_GET['productID']) || $_GET['productID'] == NULL) {
            echo " <script> window.location= '404.php'; </script>";
        } else{
            $productID = $_GET['productID'];
            
        }
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
                
                $quanlity = $_POST['quanlity'];
                
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
        

    ?>


<div class="main">


    <div class="container">
        <ul class="breadcrumb">
            <?php 
             $get_detail = $product->showProductDetailbyID($productID);
             if($get_detail){
                 while($result = $get_detail->fetch_assoc()){
            ?>
            <li><a href="shop-index-header-fix.php">Home</a></li>
            <li><a href="">Store</a></li>
            <li class="active"><?php echo $result['cateName']; 
             $choose = $result['cateName'];?>
            </li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">

            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="product-page">
                    <div class="row flex">
                        <div class="col-md-6 col-sm-6">
                            <div class="product-main-image">
                                <img src="admin/uploads/<?php echo $result['Img'];  ?>" alt="SP" class="img-responsive"
                                    data-BigImgsrc="admin/uploads/<?php echo $result['Img']  ?>">
                            </div>
                            <div class="product-other-images" style="display: flex;">
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button"
                                    rel="photos-lib"><img alt="dell16" width="100"
                                        src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button"
                                    rel="photos-lib"><img alt="dell16" width="100"
                                        src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button"
                                    rel="photos-lib"><img alt="dell16" width="100"
                                        src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h1 style="font-size: 25px; "><Strong><?php echo $result['productName'] ?></Strong></h1>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    <strong><span>$</span><?php echo $result['Price'] ?></strong>
                                    <em>$<span><?php echo $result['Price'] ?></span></em>
                                </div>
                                <div class="availability">
                                    <strong>Quantity in Stock: </strong>
                                    <Strong style="color: red; font-size: 16px;">
                                        <?php echo $result['Quanlity'] ?>
                                    </Strong>
                                </div>
                            </div>
                            <div class="description">
                                <p style="font-size: 18px;"><Strong>Short description:</Strong>
                                    <?php echo $result['Decription']; ?>! </p>
                            </div>


                            <div id="setsizeFont" style="display: flex;">
                                <label class="control-label" style="font-size: 18px;">Config:</label>
                                <p style="font-size: 18px; margin-left: 30px;"><?php echo $result['Config']; ?></p>

                            </div>
                            <div id="setsizeFont" style="display: flex;">
                                <label class="control-label" style="font-size: 18px;">Color:</label>
                                <p style="font-size: 18px; margin-left: 30px;"><?php echo $result['Color']; ?></p>
                            </div>
                            <div class="showCat_Brand" style="display: flex;margin-bottom: 20px;">
                                <div class="showCate" style="display: flex;">
                                    <label class="control-label" style="font-size: 18px;">Categoty:</label>
                                    <p style="font-size: 18px; margin-left: 15px; margin-right: 20px; color: brown;">
                                        <?php echo $result['cateName']; ?>
                                    </p>
                                </div>
                                <div class="showBrand" style="display: flex;">
                                    <label class="control-label" style="font-size: 18px;">Brand:</label>
                                    <p style="font-size: 18px; margin-left: 15px;color: brown;">
                                        <?php echo $result['brandName']; ?>
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="product-page-cart">
                                <form action="" method="post">
                                    <div class="product-quantity">
                                        <input id="product-quantity" type="number" name="quanlity" value="1" min="1"
                                            max="<?php echo $result['Quanlity']; ?>" readonly
                                            class="form-control input-sm">
                                    </div>
                                    <!-- <input type="submit" value="Add to cart" class="btn btn-primary"> -->
                                    <button class="btn btn-primary" type="submit" name="submit">Add to cart => <i
                                            class="fa fa-shopping-cart"></i></button>
                                    <br><br>
                                    <div><?php 
                                        if(isset($addToCart)){
                                            echo '<p style="font-size: 18px; color: red;" >'.$addToCart.' <p>';
                                        }
                                    ?></div>
                                </form>
                            </div>
                            <div class="review">
                                <input type="range" value="4" step="0.25" id="backing4">
                                <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false"
                                    data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                                </div>
                                <a href="javascript:;" style="font-size: 16px; font-weight: 500;">Comment</a>
                            </div>
                            <ul class="social-icons">
                                <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                                <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                                <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
                                <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                                <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                            </ul>
                        </div>

                        <div class="product-page-content">
                            <ul id="myTab" class="nav nav-tabs">
                                <li><a href="#<?php echo $result['ProductID']; ?>" data-toggle="tab">Product Details</a>
                                </li>
                                <li><a href="#Information" data-toggle="tab">Information</a></li>
                                <li class="active"><a href="#Reviews" data-toggle="tab">Reviews (2)</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade" id="<?php echo $result['ProductID']; ?>">
                                    <?php echo $result['Details']; ?>
                                </div>
                                <!-- end js show more -->
                                <div class="tab-pane fade" id="Information">
                                    <table class="datasheet">
                                        <tr>
                                            <th colspan="2">Additional features</th>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Monitor</td>
                                            <td>21 cm</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">RAM</td>
                                            <td>700 gr.</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">ROM</td>
                                            <td>10 person</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">The battery</td>
                                            <td>14 cm</td>
                                        </tr>
                                        <tr>
                                            <td class="datasheet-features-type">Value 5</td>
                                            <td>plastic</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="tab-pane fade in active" id="Reviews">
                                    <!--<p>There are no reviews for this product.</p>-->
                                    <div class="review-item clearfix">
                                        <div class="review-item-submitted">
                                            <strong>Bob</strong>
                                            <em>30/12/2013 - 07:37</em>
                                            <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true"
                                                data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="review-item-content">
                                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis
                                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                                mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus
                                                sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris
                                                bibendum orci, a sodales lectus purus ut lorem.</p>
                                        </div>
                                    </div>
                                    <div class="review-item clearfix">
                                        <div class="review-item-submitted">
                                            <strong>Mary</strong>
                                            <em>13/12/2013 - 17:49</em>
                                            <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true"
                                                data-rateit-readonly="true"></div>
                                        </div>
                                        <div class="review-item-content">
                                            <p>Sed velit quam, auctor id semper a, hendrerit eget justo. Cum sociis
                                                natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                                                mus. Duis vel arcu pulvinar dolor tempus feugiat id in orci. Phasellus
                                                sed erat leo. Donec luctus, justo eget ultricies tristique, enim mauris
                                                bibendum orci, a sodales lectus purus ut lorem.</p>
                                        </div>
                                    </div>

                                    <!-- BEGIN FORM-->
                                    <form action="#" class="reviews-form" role="form">
                                        <h2>Write a review</h2>
                                        <div class="form-group">
                                            <label for="name">Name <span class="require">*</span></label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="review">Review <span class="require">*</span></label>
                                            <textarea class="form-control" rows="8" id="review"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Rating</label>
                                            <input type="range" value="4" step="0.25" id="backing5"
                                                class="rateit-range">
                                            <div class="rateit" data-rateit-backingfld="#backing5"
                                                data-rateit-resetable="false" data-rateit-ispreset="true"
                                                data-rateit-min="0" data-rateit-max="5"></div>
                                            <script>
                                            $(document).ready(function() {
                                                $('.rateit').rateit();
                                            });
                                            </script>
                                        </div>
                                        <div class="padding-top-20">
                                            <button type="submit" class="btn btn-primary">Send</button>
                                        </div>
                                    </form>
                                    <!-- END FORM-->
                                </div>
                            </div>
                        </div>

                        <div class="sticker sticker-sale"></div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
        <?php 
                }
            }
        
        
?>
        <!-- BEGIN SIMILAR PRODUCTS -->
        <div class="row margin-bottom-40">
            <div class="col-md-12 col-sm-12">
                <h2>Related product</h2>
                <div class="owl-carousel owl-carousel4">
                    <?php 
                   
                    $getProductfollow = $product->showNewProductFollow($choose);
                    if($getProductfollow){
                        while($rsFollow = $getProductfollow->fetch_assoc()){

                    
                    ?>
                    <div>
                        <div class="product-item" style="height: 350px;width: 270px;">
                            <div class="pi-img-wrapper">
                                <img src="admin/uploads/<?php echo $rsFollow['Img'] ?>" class="img-responsive"
                                    alt="<?php echo $rsFollow['productName'] ?>">
                                <div>
                                    <a href="admin/uploads/<?php echo $rsFollow['Img'] ?>"
                                        class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="shop-item-details.php" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item-details.php"><?php echo $rsFollow['productName'] ?></a></h3>
                            <div class="pi-price"><?php echo $rsFollow['Price'] ?> <span style="color: red;">$</span>
                            </div>
                            <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                            <div class="sticker sticker-new"></div>
                        </div>
                    </div>
                    <?php 
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <!-- END SIMILAR PRODUCTS -->
    </div>
</div>

<!-- BEGIN BRANDS -->
<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit"
                    title="esprit"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/canon.jpg" alt="canon" title="canon"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/esprit.jpg" alt="esprit"
                    title="esprit"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/gap.jpg" alt="gap" title="gap"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/next.jpg" alt="next" title="next"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/puma.jpg" alt="puma" title="puma"></a>
            <a href="shop-product-list.php"><img src="assets/pages/img/brands/zara.jpg" alt="zara" title="zara"></a>
        </div>
    </div>
</div>
<!-- END BRANDS -->

<?php
    include 'inc/footer.php';
?>