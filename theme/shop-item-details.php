<?php
include 'inc/header.php';
?>
<?php

if (!isset($_GET['productID']) || $_GET['productID'] == NULL) {
    echo " <script> window.location= '404.php'; </script>";
} else {
    $productID = $_GET['productID'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quanlity = $_POST['quanlity'];

    $addToCart = $cart->add_cart($quanlity, $productID);
    echo '
                    <script>
                        if (typeof window !== "undefined") {
                            window.addEventListener("DOMContentLoaded", function() {
                                var notification = "' . $addToCart . '";
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submitCmt']))) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $details = $_POST['commentContent'];
    $rateStar = $_POST['rateStar'];

    echo $fullname;
    echo $email;
    echo $details;
    echo $rateStar;
}
?>

<div class="main">


    <div class="container">
        <ul class="breadcrumb" style="font-size: 1.5rem;">
            <?php
            $get_detail = $product->showProductDetailbyID($productID);
            if ($get_detail) {
                while ($result = $get_detail->fetch_assoc()) {
            ?>
                    <li><a href="shop-index-header-fix.php">Home</a></li>
                    <li><a href="">Store</a></li>
                    <li class="active"><?php echo $result['cateName'];
                                        $choose = $result['cateName']; ?>
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
                                <img src="admin/uploads/<?php echo $result['Img'];  ?>" alt="SP" class="img-responsive" data-BigImgsrc="admin/uploads/<?php echo $result['Img']  ?>">
                            </div>
                            <div class="product-other-images" style="display: flex;">
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
                                <a href="admin/uploads/<?php echo $result['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $result['Img'];  ?>"></a>
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
                                    <label class="control-label" style="font-size: 18px; left: 0;">Categoty:</label>
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

                            <div class="product-page-cart">
                                <form action="" method="post">
                                    <div class="product-quantity">
                                        <input id="product-quantity" type="number" name="quanlity" value="1" min="1" max="<?php echo $result['Quanlity']; ?>" readonly class="form-control input-sm">
                                    </div>
                                    <!-- <input type="submit" value="Add to cart" class="btn btn-primary"> -->
                                    <button class="btn btn-primary" type="submit" name="submit">Add to cart <i class="fa fa-shopping-cart"></i></button>
                                    <br><br>
                                    <div><?php
                                            if (isset($addToCart)) {
                                                echo '<p style="font-size: 18px; color: red;" >' . $addToCart . ' <p>';
                                            }
                                            ?></div>
                                </form>
                            </div>
                            <div>
                                <?php
                                $showStar = $product->showStart($productID);
                                $i = 0;
                                $totalStar = 0;
                                $avgStar = 0;
                                if ($showStar) {
                                    while ($resultStar = $showStar->fetch_assoc()) {
                                        $totalStar += $resultStar['StarRate'];
                                        $i++;
                                    }
                                    $avgStar = $totalStar / $i;
                                }

                                ?>

                                <ul style="list-style: none; display: inline-flex; padding: 0;">
                                    <?php

                                    for ($count = 1; $count <= 5; $count++) {
                                        if ($count <= round($avgStar)) {
                                            $color = 'color:#ffcc00;'; //vang
                                        } else {
                                            $color = 'color:#ccc;'; //xam
                                        }

                                    ?>
                                        <li class="fix_rating" style="cursor: pointer;font-size: 30px;<?php echo $color; ?>">
                                            &#9733;
                                        </li>
                                    <?php
                                    }
                                    ?>

                                    <li style="margin-top: 13px; margin-left: 20px;">This product has rate:
                                        <?php
                                        if ($avgStar == 0) {
                                            echo ' <span style="font-size: 18px; color: brown; padding-top: 5px">no star rating yet</span>';
                                        } else {
                                            echo '<span style="font-size: 18px; color: brown; margin-top: 20px">' . round($avgStar) . '</span>';
                                        } ?>
                                    </li>
                                </ul>
                            </div>
                            <ul class=" social-icons">
                                <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
                                <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
                                <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a>
                                </li>
                                <li><a class="evernote" data-original-title="evernote" href="javascript:;"></a></li>
                                <li><a class="tumblr" data-original-title="tumblr" href="javascript:;"></a></li>
                            </ul>
                        </div>

                        <div class="product-page-content" id="content_page">
                            <ul id="myTab" class="nav nav-tabs">
                                <li><a href="#<?php echo $result['ProductID']; ?>" data-toggle="tab">Product
                                        Details</a>
                                </li>
                                <li><a href="#Information" data-toggle="tab">Information</a></li>
                                <li class="active"><a href="#Reviews" data-toggle="tab" id="cmt"></a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <div class="tab-pane fade" id="<?php echo $result['ProductID']; ?>">
                                    <?php echo $result['Details']; ?>
                                </div>
                                <!-- end js show more -->
                                <div class="tab-pane fade" id="Information">
                                    <div>
                                        <h2>Product Value features</h2>
                                        <div>
                                            <?php echo $result['ProductValue']; ?>
                                        </div>

                                    </div>
                                    <!-- <table class="datasheet">
                                        <tr>
                                            <th colspan="2">Product Value features</th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                        </tr>
                                    </table> -->
                                </div>
                                <div class="tab-pane fade in active" id="Reviews">
                                    <!--<p>There are no reviews for this product.</p>-->
                                    <input type="text" name="productID" hidden id="productID" value="<?php echo $productID ?>">
                                    <div class="review-item clearfix" id="comments-container">
                                        <!-- de hien thi zo day -->
                                    </div>
                                    <div style="display: flex; justify-items: center; justify-content: space-between; " id="pagination">

                                    </div>
                                    <!-- js xử lý cmt -->
                                    <script src="./script-comment.js"></script>
                                    <!-- Check xem thử nếu đăng nhập r mới cho cmt -->
                                    <?php
                                    $login_check =  CustomSession::get('Customer_login');
                                    if ($login_check == false) {
                                        echo '<p style="font-size: 2rem; text-align: center;">You must have Login to give comment to this product. Click to <a href="login.html">Log In</a> here</p>';
                                    } else {


                                    ?>
                                        <!-- BEGIN FORM-->
                                        <form action="" class="reviews-form" role="form">
                                            <?php

                                            $userinfor = $userAct->showInforUser();
                                            if ($userinfor) {
                                                while ($resultinfor = $userinfor->fetch_assoc()) {
                                            ?>
                                                    <h2>Write a Comment</h2>
                                                    <div class="form-group">
                                                        <input type="hidden" name="userID" value="<?php echo CustomSession::get('userID'); ?>">
                                                        <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                                                        <label for="name">Name <span class="require">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="fullname" value="<?php echo CustomSession::get('Name'); ?>" readonly style="background-color: transparent;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $resultinfor['Email']; ?>" readonly style="background-color: transparent;">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="review">Comment <span class="require">*</span></label>
                                                        <textarea class="form-control" rows="4" id="review" name="commentContent"></textarea>
                                                    </div>
                                                    <div style="display: flex;">
                                                        <h2 style="margin-right: 40px; padding-top: 13px;">Rate to this product:
                                                        </h2>
                                                        <?php
                                                        $userID = CustomSession::get('userID');

                                                        $check_rate = $product->checkRateYet($productID, $userID);
                                                        if ($check_rate) {
                                                            echo '<span style="margin-top: 13px; margin-left: 20px; color: brown; font-size: 18px">You already rated to this product</span>';
                                                        } else {


                                                        ?>

                                                            <ul style="list-style: none; display: inline-flex; padding: 0;">
                                                                <?php

                                                                for ($count = 1; $count <= 5; $count++) {
                                                                    if ($count <= 5) {
                                                                        $color = 'color:#ffcc00;'; //vang
                                                                    } else {
                                                                        $color = 'color:#ccc;'; //xam
                                                                    }

                                                                ?>
                                                                    <li class="rating" style="cursor: pointer;font-size: 30px;<?php echo $color; ?>" id="<?php echo $productID; ?>-<?php echo $count; ?>" data-product_id="<?php echo $productID; ?>" data-rating="<?php echo $count; ?>" data-index="<?php echo $count; ?>">
                                                                        &#9733;
                                                                    </li>
                                                                <?php
                                                                }
                                                                ?>
                                                                <li style="margin-top: 13px; margin-left: 20px;"><span id="ratedMessage">You have not rated yet</span></li>
                                                            </ul>
                                                        <?php } ?>
                                                    </div>

                                                    <div class="padding-top-20">
                                                        <button type="submit" name="submitCmt" class="btn btn-primary">Send</button>
                                                    </div>
                                        </form>
                            <?php
                                                }
                                            }
                                        } ?>
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
            if ($getProductfollow) {
                while ($rsFollow = $getProductfollow->fetch_assoc()) {


            ?>
                    <div>
                        <div class="product-item" style="height: 350px;width: 270px;">
                            <div class="pi-img-wrapper">
                                <img src="admin/uploads/<?php echo $rsFollow['Img'] ?>" class="img-responsive" alt="<?php echo $rsFollow['productName'] ?>">
                                <div>
                                    <a href="admin/uploads/<?php echo $rsFollow['Img'] ?>" class="btn btn-default fancybox-button">Zoom</a>
                                    <a href="shop-item-details.php?productID=<?php echo $rsFollow['ProductID'] ?>" class="btn btn-default fancybox-fast-view">View</a>
                                </div>
                            </div>
                            <h3><a href="shop-item-details.php?productID=<?php echo $rsFollow['ProductID'] ?>"><?php echo $rsFollow['productName'] ?></a>
                            </h3>
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

<!-- END BRANDS -->

<?php
include 'inc/footer.php';
?>