<?php
include 'inc/header.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit-find'])) {
    $findContent = $_POST['find-product'];
    $findContentProduct = $product->findProductByContent($findContent);
}

?>
<div class="main">
    <div class="container">
        <div class="row" style="margin-bottom: 20px;">
            <div class="col-lg-4">
                <ul class="breadcrumb" style="font-size: 1.5rem;">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="">Store</a></li>
                    <li class="active">HomeStore</li>
                </ul>
            </div>
            <div class="col-lg-8">
                <ul style="list-style: none;">
                    <li class="menu-search" style="width: 70%;">
                        <div class="search-box">
                            <form action="" method="post">
                                <div class="input-group">
                                    <input type="text" placeholder="Search" class="form-control" name="find-product">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" name="submit-find" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>

            </div>

        </div>

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar col-md-3 col-sm-5">
                <ul class="list-group margin-bottom-25 sidebar-menu">
                    <?php
                    $show_cateName = $cat->showCatListAsc();
                    if ($show_cateName) {
                        while ($resultCate = $show_cateName->fetch_assoc()) {


                    ?>

                            <li class="list-group-item clearfix dropdown active "><a class="collapsed" href="shop-product-list.php"><i class="fa fa-angle-right"></i>
                                    <?php $catename = $resultCate['cateName'];
                                    echo $catename; ?> </a>

                                <ul class="dropdown-menu" style="display:block;">
                                    <li class="list-group-item dropdown clearfix active">
                                        <a href="javascript:void(0);" class="collapsed"><i class="fa fa-angle-right"></i>
                                            Brand


                                        </a>
                                        <ul class="dropdown-menu" style="display:block;">
                                            <?php
                                            $brand = new Brand();
                                            $show_brand = $brand->showBrandfollowCatNameNoLimit($catename);
                                            if ($show_brand) {
                                                while ($resultBrand = $show_brand->fetch_assoc()) {


                                            ?>
                                                    <li class="list-group-item dropdown clearfix">

                                                        <a href="shop-product-brand.php?brand=<?php echo $resultBrand['brandName']; ?>"><i class="fa fa-angle-right"></i>
                                                            <?php echo $resultBrand['brandName']; ?>
                                                        </a>
                                                    </li>

                                            <?php
                                                }
                                            } ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>

                <div class="sidebar-filter margin-bottom-25">
                    <h2>Filter</h2>


                    <h3>Price</h3>
                    <label for="priceRange">Price Range:</label>
                    <input type="range" id="priceRange" name="priceRange" min="0" max="10000" step="10" value="500">

                    <div style="justify-content: space-between;" id="selectedRange">Selected Range: $<span id="rangeValue">500</span></div>

                    <script>
                        // Lắng nghe sự kiện thay đổi giá trị trên thanh trượt
                        document.getElementById('priceRange').addEventListener('input', function() {
                            // Hiển thị giá trị đã chọn
                            document.getElementById('rangeValue').innerText = this.value;
                        });
                    </script>
                    <div id="slider-range"></div>
                </div>


                <div class="sidebar-products clearfix">
                    <h2>Bestsellers</h2>
                    <div class="item">
                        <a href="shop-item.php"><img src="assets/pages/img/products/k1.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                        <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                        <div class="price">$31.00</div>
                    </div>
                    <div class="item">
                        <a href="shop-item.php"><img src="assets/pages/img/products/k4.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                        <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                        <div class="price">$23.00</div>
                    </div>
                    <div class="item">
                        <a href="shop-item.php"><img src="assets/pages/img/products/k3.jpg" alt="Some Shoes in Animal with Cut Out"></a>
                        <h3><a href="shop-item.php">Some Shoes in Animal with Cut Out</a></h3>
                        <div class="price">$86.00</div>
                    </div>
                </div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-9 col-sm-7">

                <div class="row list-view-sorting clearfix">

                    <div class="col-md-2 col-sm-2">
                        <!-- <a href="javascript:;"><i class="fa fa-th-large"></i></a>
                        <a href="javascript:;"><i class="fa fa-th-list"></i></a> -->
                        <h2 style="font-size: 25px; font-weight: 600;"><?php echo 'HomeStore'; ?></h2>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="pull-right">
                            <label class="control-label">Show:</label>
                            <select class="form-control input-sm">
                                <option value="#?limit=24" selected="selected">24</option>
                                <option value="#?limit=25">25</option>
                                <option value="#?limit=50">50</option>
                                <option value="#?limit=75">75</option>
                                <option value="#?limit=100">100</option>
                            </select>
                        </div>

                        <div class="pull-right">
                            <label class="control-label">Sort&nbsp;By:</label>
                            <select class="form-control input-sm">
                                <option value="#?sort=p.sort_order&amp;order=ASC" selected="selected">Default</option>
                                <option value="#?sort=pd.name&amp;order=ASC">Name (A - Z)</option>
                                <option value="#?sort=pd.name&amp;order=DESC">Name (Z - A)</option>
                                <option value="#?sort=p.price&amp;order=ASC">Price (Low &gt; High)</option>
                                <option value="#?sort=p.price&amp;order=DESC">Price (High &gt; Low)</option>
                                <option value="#?sort=rating&amp;order=DESC">Rating (Highest)</option>
                                <option value="#?sort=rating&amp;order=ASC">Rating (Lowest)</option>
                                <option value="#?sort=p.model&amp;order=ASC">Model (A - Z)</option>
                                <option value="#?sort=p.model&amp;order=DESC">Model (Z - A)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- BEGIN PRODUCT LIST -->
                <div class="row product-list">
                    <!-- PRODUCT ITEM START -->
                    <?php
                    if (isset($findContent) && $findContent != null) {
                        if ($findContentProduct) {
                            while ($resultProduct = $findContentProduct->fetch_assoc()) {



                    ?>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="product-item" style="width: 195px; height: 253px;">
                                        <div class="pi-img-wrapper">
                                            <img src="./admin/uploads/<?php echo $resultProduct['Img']; ?>" width="150" class="img-responsive" alt="Berry Lace Dress">
                                            <div>
                                                <a href="./admin/uploads/<?php echo $resultProduct['Img']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                                <a href="#<?php echo $resultProduct['ProductID']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                            </div>
                                        </div>
                                        <h3><a href="shop-item-details.php?productID=<?php echo $resultProduct['ProductID']; ?>"><?php echo $resultProduct['productName']; ?></a>
                                        </h3>
                                        <div class="pi-price">$<?php echo $resultProduct['Price']; ?></div>
                                        <form action="" method="post">
                                            <input type="hidden" name="productID" value="<?php echo $resultProduct['ProductID']; ?>">
                                            <input type="hidden" name="quanlity" value="1">
                                            <button class="btn btn-default add2cart" type="submit" name="submit-cart"><i class="fa fa-shopping-cart"></i> Add-cart</button>
                                        </form>
                                    </div>
                                    <div id="<?php echo $resultProduct['ProductID']; ?>" style="display: none; width: 700px;">
                                        <div class="product-page product-pop-up">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-3">
                                                    <div class="product-main-image">
                                                        <img src="admin/uploads/<?php echo $resultProduct['Img']; ?>" class="img-responsive" alt="<?php echo $resultProduct['productName']; ?>" class="img-responsive">
                                                    </div>
                                                    <div class="product-other-images" style="display: flex;">
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-9">
                                                    <h2><?php echo $resultProduct['productName']; ?></h2>
                                                    <div class="price-availability-block clearfix">
                                                        <div class="price">
                                                            <strong><span>$</span><?php echo $resultProduct['Price']; ?></strong>
                                                            <em>$<span><?php echo $resultProduct['Price']; ?></span></span></em>
                                                        </div>
                                                        <div class="Status">
                                                            Status: <strong><?php
                                                                            if ($resultProduct['Status'] == 0) {
                                                                                echo 'New seal';
                                                                            } else {
                                                                                echo 'Old 99%';
                                                                            }
                                                                            ?></strong>
                                                        </div>
                                                    </div>
                                                    <div class="description">
                                                        <p style="font-size: 16px;"><span><i class="fa-solid fa-info"></i></span>
                                                            <?php echo $resultProduct['Decription']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="product-page-options">
                                                        <div class="pull-left">
                                                            <label class="control-label">Config:
                                                                <span style="font-size: 15px; color: brown;align-items: center;"><?php echo $resultProduct['Config']; ?></span></label>

                                                        </div>
                                                        <div class="pull-left">
                                                            <label class="control-label">Color:
                                                                <span style="font-size: 15px; color: brown; align-items: center;"><?php echo $resultProduct['Color']; ?></span></label>

                                                        </div>
                                                    </div>
                                                    <div class="product-page-cart">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="productID" value="<?php echo $resultProduct['ProductID'] ?>">
                                                            <div class="product-quantity">
                                                                <input id="product-quantity" type="number" value="1" readonly name="quanlity" min="1" max="<?php echo $resultProduct['Quanlity'] ?>">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" name="submit-cart">Add to
                                                                cart</button>
                                                            <a href="shop-item-details.php?productID=<?php echo $resultProduct['ProductID'] ?>" class="btn btn-default">More details</a>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="sticker sticker-sale"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        } else {
                            echo '
                <script>
                    if (typeof window !== "undefined") {
                        window.addEventListener("DOMContentLoaded", function() {
                            var notification = "NO RESULT";
                            if (notification !== "") {
                                
                                alert(notification);
                                window.location.href = "shop-product-list.php";
                            
                            }else{
                                window.location.href = "404.php";
                            
                            }
                        });
                    }
                </script>
            ';
                        }
                    } else {

                        $productList = $product->showProductList();
                        if ($productList) {
                            while ($resultProduct = $productList->fetch_assoc()) {
                            ?>
                                <div class="col-md-3 col-sm-4 col-xs-6">
                                    <div class="product-item" style="width: 195px; height: 253px;">
                                        <div class="pi-img-wrapper">
                                            <img src="./admin/uploads/<?php echo $resultProduct['Img']; ?>" width="150" class="img-responsive" alt="Berry Lace Dress">
                                            <div>
                                                <a href="./admin/uploads/<?php echo $resultProduct['Img']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                                                <a href="#<?php echo $resultProduct['ProductID']; ?>" class="btn btn-default fancybox-fast-view">View</a>
                                            </div>
                                        </div>
                                        <h3><a href="shop-item-details.php?productID=<?php echo $resultProduct['ProductID']; ?>"><?php echo $resultProduct['productName']; ?></a>
                                        </h3>
                                        <div class="pi-price">$<?php echo $resultProduct['Price']; ?></div>
                                        <form action="" method="post">
                                            <input type="hidden" name="productID" value="<?php echo $resultProduct['ProductID']; ?>">
                                            <input type="hidden" name="quanlity" value="1">
                                            <button class="btn btn-default add2cart" type="submit" name="submit-cart"><i class="fa fa-shopping-cart"></i> Add-cart</button>
                                        </form>
                                    </div>
                                    <div id="<?php echo $resultProduct['ProductID']; ?>" style="display: none; width: 700px;">
                                        <div class="product-page product-pop-up">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-3">
                                                    <div class="product-main-image">
                                                        <img src="admin/uploads/<?php echo $resultProduct['Img']; ?>" class="img-responsive" alt="<?php echo $resultProduct['productName']; ?>" class="img-responsive">
                                                    </div>
                                                    <div class="product-other-images" style="display: flex;">
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                        <a href="admin/uploads/<?php echo $resultProduct['Img'];  ?>" class="fancybox-button" rel="photos-lib"><img alt="dell16" width="100" src="admin/uploads/<?php echo $resultProduct['Img'];  ?>"></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-9">
                                                    <h2><?php echo $resultProduct['productName']; ?></h2>
                                                    <div class="price-availability-block clearfix">
                                                        <div class="price">
                                                            <strong><span>$</span><?php echo $resultProduct['Price']; ?></strong>
                                                            <em>$<span><?php echo $resultProduct['Price']; ?></span></span></em>
                                                        </div>
                                                        <div class="Status">
                                                            Status: <strong><?php
                                                                            if ($resultProduct['Status'] == 0) {
                                                                                echo 'New seal';
                                                                            } else {
                                                                                echo 'Old 99%';
                                                                            }
                                                                            ?></strong>
                                                        </div>
                                                    </div>
                                                    <div class="description">
                                                        <p style="font-size: 16px;"><span><i class="fa-solid fa-info"></i></span>
                                                            <?php echo $resultProduct['Decription']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="product-page-options">
                                                        <div class="pull-left">
                                                            <label class="control-label">Config:
                                                                <span style="font-size: 15px; color: brown;align-items: center;"><?php echo $resultProduct['Config']; ?></span></label>

                                                        </div>
                                                        <div class="pull-left">
                                                            <label class="control-label">Color:
                                                                <span style="font-size: 15px; color: brown; align-items: center;"><?php echo $resultProduct['Color']; ?></span></label>

                                                        </div>
                                                    </div>
                                                    <div class="product-page-cart">
                                                        <form action="" method="post">
                                                            <input type="hidden" name="productID" value="<?php echo $resultProduct['ProductID'] ?>">
                                                            <div class="product-quantity">
                                                                <input id="product-quantity" type="number" value="1" readonly name="quanlity" min="1" max="<?php echo $resultProduct['Quanlity'] ?>">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit" name="submit-cart">Add to
                                                                cart</button>
                                                            <a href="shop-item-details.php?productID=<?php echo $resultProduct['ProductID'] ?>" class="btn btn-default">More details</a>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="sticker sticker-sale"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <?php
                            }
                        }
                    }
                    ?>
                    <!-- PRODUCT ITEM END -->

                </div>



                <!-- END PRODUCT LIST -->
                <!-- BEGIN PAGINATOR -->
                <div class="row">
                    <div class="col-md-4 col-sm-4 items-info">Items 1 to 9 of 10 total</div>
                    <div class="col-md-8 col-sm-8">
                        <ul class="pagination pull-right">
                            <li><a href="javascript:;">&laquo;</a></li>
                            <li><a href="javascript:;">1</a></li>
                            <li><span>2</span></li>
                            <li><a href="javascript:;">3</a></li>
                            <li><a href="javascript:;">4</a></li>
                            <li><a href="javascript:;">5</a></li>
                            <li><a href="javascript:;">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- END PAGINATOR -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
    </div>
</div>



<?php
include 'inc/footer.php';
?>