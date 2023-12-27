<?php
include 'lib/session.php';
Session::init();
?>
<?php
include_once 'lib/database.php';
include_once 'helpers/format.php';
include_once 'classes/brands.php';
spl_autoload_register(function ($className) {
    include_once "classes/" . $className . ".php";
});

$db = new Database();
$fm = new Format();
$cart = new Cart();
$user = new User();
$cat = new Category();
$product = new Product();
$userAct = new Userlogin();

?>

<?php
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>PHP Shop Emc</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta content="Metronic Shop UI description" name="description" />
    <meta content="Metronic Shop UI keywords" name="keywords" />
    <meta content="keenthemes" name="author" />

    <meta property="og:site_name" content="-CUSTOMER VALUE-" />
    <meta property="og:title" content="-CUSTOMER VALUE-" />
    <meta property="og:description" content="-CUSTOMER VALUE-" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="-CUSTOMER VALUE-" />
    <!-- link to image for socio -->
    <meta property="og:url" content="-CUSTOMER VALUE-" />

    <link rel="shortcut icon" href="favicon.ico" />

    <!-- Fonts START -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css" />
    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <!-- <link rel="stylesheet" href="../assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap/css/bootstrap.min.css"> -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
    <!-- <link rel="stylesheet" href="../assets/pages/css/animate.css">
    <link href="../assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link href="../assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet" /> -->
    <link href="assets/pages/css/animate.css" rel="stylesheet" />
    <link href="assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
    <link href="assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet" />
    <!-- Page level plugin styles END -->

    <!-- Theme styles START -->


    <link href="assets/pages/css/components.css" rel="stylesheet" />
    <link href="assets/pages/css/slider.css" rel="stylesheet" />
    <link href="assets/pages/css/style-shop.css" rel="stylesheet" type="text/css" />
    <link href="assets/corporate/css/style.css" rel="stylesheet" />
    <link href="assets/corporate/css/style-responsive.css" rel="stylesheet" />
    <link href="assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color" />
    <link href="assets/corporate/css/custom.css" rel="stylesheet" />
    <!-- Theme styles END -->
    <!-- import file khác  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</head>
<!-- Head END -->

<!-- Body BEGIN -->

<body class="ecommerce">
    <!-- BEGIN STYLE CUSTOMIZER -->
    <!-- BEGIN TOP BAR -->
    <div class="pre-header" style="height: 40px; font-weight: 400">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+84356894134</span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);">€</a>
                            <a href="javascript:void(0);">$</a>
                            <a href="javascript:void(0);" class="current">VND</a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        <li class="langs-block">
                            <a href="javascript:void(0);" class="current">English </a>
                            <div class="langs-block-others-wrapper">
                                <div class="langs-block-others">
                                    <a href="javascript:void(0);">French</a>
                                    <a href="javascript:void(0);">Vietnamese</a>
                                    <a href="javascript:void(0);">American</a>
                                </div>
                            </div>
                        </li>
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">

                        <li>
                            <a href="shop-cart.php">My Cart||<i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li>
                            <a href="shop-contacts.php">Contacts</a>
                        </li>
                        <?php
                        $login_check =  CustomSession::get('Customer_login');
                        if ($login_check == false) {
                            echo '<li><a href="shop-checkout.php">Checkout</a></li>';
                        } else {
                            echo '<li><a href="shop-payment.php">Checkout</a></li>';
                        }
                        ?>

                        <?php
                        if (isset($_GET['customer_id'])) {
                            $login_check =  CustomSession::get('Customer_login');
                            if ($login_check == true) {
                                session_unset();
                                session_destroy();
                            } else {
                                $del_all_cart_Session = $cart->del_all_cart_session();
                            }
                        }
                        ?>
                        <?php
                        $login_check =  CustomSession::get('Customer_login');
                        if ($login_check == false) {
                            echo '<li><a href="login.html">Log In</a></li>';
                        } else {
                            echo '<li><a href="shop-account.php">
                             <i class="fas fa-user-circle"></i>
                            ' . CustomSession::get('Name') . ' </a></li>';
                            echo ' <li><a href="?customer_id=' . CustomSession::get('userID') . '">Logout</a></li>
                            ';
                        }
                        ?>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="index.php"><img src="assets/corporate/img/logos/logo-shop-red.png" alt="Metronic Shop UI" /></a>

            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

            <!-- BEGIN CART -->
            <div class="top-cart-block">
                <div class="top-cart-info">
                    <a href="javascript:void(0);" class="top-cart-info-count">
                        <?php
                        // $login_check =  CustomSession::get('Customer_login');
                        // if($login_check==false){
                        //     echo 'Empty';
                        // }else{
                        $check_cart = $cart->check_cart();
                        if ($check_cart) {
                            $totalproduct = Session::get("totalproduct");
                            echo $totalproduct;
                        } else {
                            echo 'Empty';
                        }
                        // }
                        ?>

                        items</a>
                </div>
                <i class="fa fa-shopping-cart"></i>

                <div class="top-cart-content-wrapper">
                    <div class="top-cart-content">

                        <ul class="scroller" style="height: 250px">
                            <?php
                            // $login_check =  CustomSession::get('Customer_login');
                            // if($login_check==false){
                            //     echo '<p style="font-size: 2rem; text-align: center;">Empty Cart</p>';
                            // }else{ 
                            $viewlittleCart = $cart->showcart();
                            if ($viewlittleCart) {
                                while ($result = $viewlittleCart->fetch_assoc()) {


                            ?>

                                    <li>
                                        <input type="hidden" name="cartID" value="<?php echo $result['cartID'] ?>">
                                        <a href="shop-item-details.php?productID=<?php echo $result['ProductID']; ?>"><img src="admin/uploads/<?php echo $result['Img'] ?>" alt="<?php echo $result['productName'] ?>" width="37" height="34" /></a>
                                        <span class="cart-content-count"><?php echo $result['CartQuanlity'] ?></span>
                                        <strong><a href="shop-item-details.php?productID=<?php echo $result['ProductID'] ?>"><?php echo $result['productName'] ?></a></strong>
                                        <em><?php echo $result['Price'] ?></em>
                                        <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                                    </li>

                            <?php
                                }
                            }
                            // }
                            ?>
                        </ul>
                        <div class="text-right">

                            <?php

                            // if($login_check==false){
                            //     echo '<a href="shop-checkout.php" class="btn btn-primary">Checkout</a>';
                            // }else{

                            ?>
                            <?php
                            $check_cart_exist = $cart->check_cart_exist();
                            if ($check_cart_exist) {
                                $alert = "shop-cart.php";
                            } else {
                                $alert = "index.php";
                            } ?>
                            <a href="<?php echo $alert; ?>
                            " class="btn btn-default">View Cart</a>
                            <a href="shop-payment.php?method=buyallcart" class="btn btn-primary">Checkout</a>
                            <?php
                            // }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--END CART -->

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation">
                <ul>
                    <?php
                    $getcateList = $cat->showCatListAsc();
                    if ($getcateList) {
                        while ($rsGetCate = $getcateList->fetch_assoc()) {



                    ?>
                            <li class="dropdown dropdown-megamenu">
                                <a class="dropdown-toggle" href="shop-product-list-cate.php?cateName=<?php echo $rsGetCate['cateName']; ?>">
                                    <?php echo $rsGetCate['cateName']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="header-navigation-content">
                                            <div class="row">
                                                <div class="col-md-4 header-navigation-col">
                                                    <h4>Brands</h4>

                                                    <ul>
                                                        <?php
                                                        $brandheader = new Brand();
                                                        $cateName = $rsGetCate['cateName'];
                                                        $getBrandheader = $brandheader->showBrandfollowCatNameNoLimit($cateName);
                                                        if ($getBrandheader) {
                                                            while ($rsBrandHeader = $getBrandheader->fetch_assoc()) {
                                                        ?>
                                                                <li><a href="shop-product-brand.php?brand=<?php echo $rsBrandHeader['brandName'] ?>"><?php echo $rsBrandHeader['brandName'] ?></a>
                                                                </li>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </ul>
                                                </div>
                                                <?php
                                                if ($rsGetCate['cateName'] == 'LapTop') {
                                                    echo '<div class="col-md-4 header-navigation-col">
                                                <h4>Demands</h4>
                                                <ul>
                                                    <li><a href="shop-product-list.php"> Office</a></li>
                                                    <li><a href="shop-product-list.php">Gaming</a></li>
                                                    <li>
                                                        <a href="shop-product-list.php">Thin and light</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">Graphics - technical</a>
                                                    </li>
                                                    <li><a href="shop-product-list.php">Student</a></li>
                                                    <li><a href="shop-product-list.php">Touch</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 header-navigation-col">
                                                <h4>Price range</h4>
                                                <ul>
                                                    <li>
                                                        <a href="shop-product-list.php">Under 10tr VND</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">From 10-15tr VND</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">From 16-20tr VND</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">Over 20tr VND</a>
                                                    </li>
                                                </ul>
    
                                                <h4>configuration</h4>
                                                <ul>
                                                    <li>
                                                        <a href="shop-product-list.php">core i3/ryzen 3</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">core i5/ryzen 5</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">core i7/ryzen 7</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">core i9/ryzen 9</a>
                                                    </li>
                                                </ul>
                                            </div>';
                                                } else if ($rsGetCate['cateName'] == 'Smartphone') {
                                                    echo '<div class="col-md-4 header-navigation-col">
                                                    <h4>Price range</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="shop-product-list.php">Under 2tr VNĐ</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">From 2-4tr VNĐ</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">From 4-7tr VNĐ</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">From 7-10tr VNĐ</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">Over 10tr VNĐ </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-4 header-navigation-col">
                                                    <h4>Hot Phone</h4>
                                                    <ul>
                                                        <li>
                                                            <a href="shop-product-list.php">Iphone 15 series</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">Galaxy s23 ultra series</a>
                                                        </li>
                                                        <li>
                                                            <a href="shop-product-list.php">Xiaomi 13 series</a>
                                                        </li>
                                                    </ul>
                                                </div>';
                                                } else if ($rsGetCate['cateName'] == 'PC') {
                                                    echo '
                                                <div class="col-md-4 header-navigation-col">
                                                <h4>PC components</h4>
                                                <ul>
                                                    <li><a href="shop-product-list.php">Ram</a></li>
                                                    <li><a href="shop-product-list.php">CPU</a></li>
                                                    <li><a href="shop-product-list.php">VGA</a></li>
                                                    <li><a href="shop-product-list.php">Main</a></li>
                                                    <li><a href="shop-product-list.php">Case</a></li>
                                                    <li>
                                                        <a href="shop-product-list.php">Hard drive</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">Radiators</a>
                                                    </li>
                                                    <li><a href="shop-product-list.php">See all </a></li>
                                                </ul>
                                            </div>
                                                <div class="col-md-4 header-navigation-col">
                                                <h4>PC type</h4>
                                                <ul>
                                                    <li>
                                                        <a href="shop-product-list.php">Pre-configured</a>
                                                    </li>
                                                    <li><a href="shop-product-list.php">Build PC</a></li>
                                                    <li>
                                                        <a href="shop-product-list.php">All in one</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 header-navigation-col">
                                                <h4>Demands</h4>
                                                <ul>
                                                    <li><a href="shop-product-list.php"> Office</a></li>
                                                    <li><a href="shop-product-list.php">Gaming</a></li>
                                                    <li>
                                                        <a href="shop-product-list.php">Graphics - technical</a>
                                                    </li>
                                                </ul>
                                            </div>
                                           ';
                                                } else {
                                                    echo '<div class="col-md-4 header-navigation-col">
                                                <h4>Price range</h4>
                                                <ul>
                                                    <li>
                                                        <a href="shop-product-list.php">Under 2tr VNĐ</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">From 2-4tr VNĐ</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">From 4-7tr VNĐ</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">From 7-10tr VNĐ</a>
                                                    </li>
                                                    <li>
                                                        <a href="shop-product-list.php">Over 10tr VNĐ </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-4 header-navigation-col">
                                            <h4>Hot Tablet</h4>
                                            <ul>
                                                <li>
                                                    <a href="shop-product-list.php">Ipad series</a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php">Galaxy tablet series</a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php">Xiaomi series</a>
                                                </li>
                                            </ul>
                                        </div>';
                                                }

                                                ?>


                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </li>
                    <?php    }
                    }
                    ?>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="shop-product-list.php" method="post">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="form-control" name="find-product" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit" name="submit-find">
                                            Search
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- Header END -->