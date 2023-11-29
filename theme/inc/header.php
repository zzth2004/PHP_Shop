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
    <link
        href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all"
        rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all"
        rel="stylesheet" type="text/css" />
    <!--- fonts for slider on the index page -->
    <!-- Fonts END -->

    <!-- Global styles START -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Global styles END -->

    <!-- Page level plugin styles START -->
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
    <script src="../admin/ckeditor/ckeditor.js"></script>

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
                        <li><a href="shop-account.php">My Account</a></li>
                        <li>
                            <a href="shop-wishlist.php">My Cart||<i class="fa fa-shopping-cart"></i></a>
                        </li>
                        <li><a href="shop-checkout.php">Checkout</a></li>
                        <li><a href="login.php">Log In</a></li>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>
    </div>

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">
            <a class="site-logo" href="index.php"><img src="assets/corporate/img/logos/logo-shop-red.png"
                    alt="Metronic Shop UI" /></a>

            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

            <!-- BEGIN CART -->
            <div class="top-cart-block">
                <div class="top-cart-info">
                    <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
                </div>
                <i class="fa fa-shopping-cart"></i>

                <div class="top-cart-content-wrapper">
                    <div class="top-cart-content">
                        <ul class="scroller" style="height: 250px">
                            <li>
                                <a href="shop-item.php"><img src="assets/pages/img/cart-img.jpg"
                                        alt="Rolex Classic Watch" width="37" height="34" /></a>
                                <span class="cart-content-count">x 1</span>
                                <strong><a href="shop-item.php">Rolex Classic Watch</a></strong>
                                <em>$1230</em>
                                <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                            </li>
                        </ul>
                        <div class="text-right">
                            <a href="shop-shopping-cart.php" class="btn btn-default">View Cart</a>
                            <a href="shop-checkout.php" class="btn btn-primary">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--END CART -->

            <!-- BEGIN NAVIGATION -->
            <div class="header-navigation">
                <ul>
                    <li class="dropdown dropdown-megamenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            Laptop
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Brands</h4>
                                            <ul>
                                                <li><a href="shop-product-list.php">Macbook</a></li>
                                                <li><a href="shop-product-list.php">Dell</a></li>
                                                <li><a href="shop-product-list.php">Asus</a></li>
                                                <li><a href="shop-product-list.php">Acer</a></li>
                                                <li><a href="shop-product-list.php">Gamming</a></li>
                                                <li><a href="shop-product-list.php">Lenovo</a></li>
                                                <li><a href="shop-product-list.php">Surface</a></li>
                                                <li><a href="shop-product-list.php">Gigabyte</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 header-navigation-col">
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
                                        </div>
                                        <div class="col-md-12 nav-brands">
                                            <ul>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="Mac" alt="Mac"
                                                            src="assets/corporate/img/logos/apple-mac.png" /></a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="Dell" alt="Dell"
                                                            src="assets/corporate/img/logos/dell_logo.png" /></a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="Asus" alt="Asus"
                                                            src="assets/corporate/img/logos/asus1.jpg" /></a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="Lenovo" alt="Lenovo"
                                                            src="assets/corporate/img/logos/lenovo.jpg" /></a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="Surface" alt="Surface"
                                                            src="assets/corporate/img/logos/surface.jpg" /></a>
                                                </li>
                                                <li>
                                                    <a href="shop-product-list.php"><img title="HP" alt="HP"
                                                            src="assets/corporate/img/logos/hp_logo.png" /></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-megamenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            Smartphone
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Brands</h4>
                                            <ul>
                                                <li><a href="shop-product-list.php">IPhone</a></li>
                                                <li><a href="shop-product-list.php">Samsung</a></li>
                                                <li><a href="shop-product-list.php">Oppo</a></li>
                                                <li><a href="shop-product-list.php">Xiaomi</a></li>
                                                <li><a href="shop-product-list.php">Vivo</a></li>
                                                <li><a href="shop-product-list.php">Nokia</a></li>
                                                <li>
                                                    <a href="shop-product-list.php">Normal phone</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 header-navigation-col">
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
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-megamenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            Tablets
                        </a>
                        <ul class="dropdown-menu">
                            <li style="width: 400px">
                                <div class="header-navigation-content">
                                    <div class="row">
                                        <div class="col-md-4 header-navigation-col">
                                            <h4>Brands</h4>
                                            <ul>
                                                <li><a href="shop-product-list.php">IPad</a></li>
                                                <li><a href="shop-product-list.php">Samsung</a></li>
                                                <li><a href="shop-product-list.php">Oppo</a></li>
                                                <li><a href="shop-product-list.php">Xiaomi</a></li>
                                                <li><a href="shop-product-list.php">Huawei</a></li>
                                                <li><a href="shop-product-list.php">Nokia</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 header-navigation-col">
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
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-megamenu">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            PC
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="header-navigation-content">
                                    <div class="row">
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
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                            Pages
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="shop-index.php">Home Default</a></li>
                            <li class="active">
                                <a href="shop-index-header-fix.php">Home Header Fixed</a>
                            </li>
                            <li>
                                <a href="shop-index-light-footer.php">Home Light Footer</a>
                            </li>
                            <li><a href="shop-product-list.php">Product List</a></li>
                            <li><a href="shop-search-result.php">Search Result</a></li>
                            <li><a href="shop-item.php">Product Page</a></li>
                            <li>
                                <a href="shop-shopping-cart-null.php">Shopping Cart (Null Cart)</a>
                            </li>
                            <li><a href="shop-shopping-cart.php">Shopping Cart</a></li>
                            <li><a href="shop-checkout.php">Checkout</a></li>
                            <li><a href="shop-about.php">About</a></li>
                            <li><a href="shop-contacts.php">Contacts</a></li>
                            <li><a href="shop-account.php">My account</a></li>
                            <li><a href="shop-wishlist.php">My Wish List</a></li>
                            <li>
                                <a href="shop-goods-compare.php">Product Comparison</a>
                            </li>
                            <li><a href="shop-standart-forms.php">Standart Forms</a></li>
                            <li><a href="shop-faq.php">FAQ</a></li>
                            <li><a href="shop-privacy-policy.php">Privacy Policy</a></li>
                            <li>
                                <a href="shop-terms-conditions-page.php">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </li>
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="form-control" />
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">
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