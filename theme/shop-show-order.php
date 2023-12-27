<?php
include 'inc/header.php';
?>

<div>
    <div class="row" style="display: flex;">
        <div class="col-lg-9 col-md-8" style="border: 2px solid #333; margin: 0 0 20px 40px;">
            <h1 style="font-weight: bold; text-align: center; padding: 15px 0 0 0;">Bought List</h1>
            <hr style="border: 1px solid #333; width: 70%; align-items: center; justify-content: center; ">
            <table style="width: 100%; text-align: center; margin-bottom: 20px; font-size: 15px;">
                <tr style="justify-content: center; text-align: center; margin-bottom: 15px;">
                    <th style=" margin-left: 10px;  text-align: center;">STT</th>
                    <th style=" text-align: center;">Name</th>
                    <th style=" text-align: center;">Image</th>
                    <th style=" text-align: center;">Quantity</th>
                    <th style=" text-align: center;">Price</th>
                    <th style=" text-align: center;">Delivery method</th>
                    <th style=" text-align: center;">Payment method</th>
                    <th style=" text-align: center;">Status</th>
                    <th style=" text-align: center;">Date order</th>
                    <th style=" text-align: center;">Action</th>
                </tr>
                <?php
                $listOder = $cart->showOder();
                if ($listOder) {
                    $product = 0;
                    $subTotal = 0;
                    $totalShip = 0;
                    $i = 1;
                    while ($result = $listOder->fetch_assoc()) {

                ?>

                <tr style="margin-bottom: 20px; border-bottom: 1px solid #333; height: 45px;">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $result['productName'] ?></td>
                    <td><img src="./admin/uploads/<?php echo $result['Img'] ?>"
                            alt="<?php echo $result['productName'] ?>" width="30">
                    </td>
                    <td><?php echo $result['OderQuanlity'] ?></td>
                    <td><strong><span>$</span><?php echo $result['Price']; ?></strong></td>
                    <td><?php echo $result['Delivery_method'];
                                if ($result['Delivery_method'] == 'Express') {
                                    $shipcost = 15;
                                } else if ($result['Delivery_method'] == 'Post-office') {
                                    $shipcost = 8;
                                } else {
                                    $shipcost = 10;
                                }

                                ?></td>
                    <td><?php echo $result['PaymentMethod']; ?></td>
                    <td><?php
                                if ($result['status'] == '0') {
                                    echo 'Pending';
                                } else {
                                    echo 'Processed';
                                } ?></td>
                    <td><?php echo $fm->formatDate($result['OderDate']); ?></td>
                    <td>
                        <a href="#<?php echo  $result['OderID']; ?>" class="fancybox-fast-view">View</a>
                        <?php
                                echo ' || ';
                                if ($result['status'] == '0') {
                                    echo 'N/A';
                                } else {
                                }
                                ?>
                    </td>
                    <!-- fastview oderdetails -->
                    <div id="<?php echo  $result['OderID']; ?>" style="display: none;">
                        <div class="checkout-total-block" style=" width: 700px;">

                            <div class="row" style="justify-content: space-between;">
                                <div class="col-md-4 col-lg-5">
                                    <?php
                                            $showOderView = $cart->showOrderToViewbyOderdate($result['OderDate']);
                                            if ($showOderView) {
                                                $totalQuanPro = 0;
                                                $totalPrice = 0;
                                                while ($resultToView = $showOderView->fetch_assoc()) {

                                                    $totalQuanPro += $resultToView['OderQuanlity'];
                                                    $totalPrice += $resultToView['Price'];

                                            ?>
                                    <ul>
                                        <li style="justify-content: space-between;">
                                            <em><?php echo $resultToView['productName'] ?></em>


                                            <strong><a href="admin/uploads/<?php echo $resultToView['Img']; ?>"
                                                    class="fancybox-button"><img
                                                        src="admin/uploads/<?php echo $resultToView['Img']; ?>"
                                                        width="40" class="img-responsive"
                                                        alt="<?php echo $resultToView['productName']; ?>"
                                                        class="img-responsive"></a></strong>

                                        </li>

                                    </ul>
                                    <?php
                                                }
                                            }
                                            ?>
                                </div>

                                <div class="col-md-8 col-lg-7" style="border-left: 1px solid #333; right: 0%;">
                                    <ul>
                                        <li>
                                            <em>Total product</em>

                                            <strong class="price"><?php echo $totalQuanPro; ?></strong>
                                        </li>
                                        <li>
                                            <em>Sub Total</em>

                                            <strong class="price"><span>$</span><?php echo  $totalPrice; ?></strong>
                                        </li>
                                        <li>
                                            <em>VAT(5%)</em>

                                            <strong class="price"><span>$</span><?php $VAT_cost = $totalPrice * 0.05;
                                                                                        echo $VAT_cost; ?></strong>
                                        </li>
                                        <li>
                                            <em>Ship Cost</em>

                                            <strong class="price"><span>$</span><?php echo $shipcost; ?></strong>
                                        </li>
                                        <li>
                                            <em>Delivering method</em>

                                            <strong class="price"><?php echo $result['Delivery_method']; ?></strong>

                                        </li>
                                        <li>
                                            <em>Payment method</em>

                                            <strong class="price"><?php echo $result['PaymentMethod']; ?></strong>

                                        </li>
                                        <li>
                                            <em>Order Date</em>

                                            <strong><?php echo $fm->formatDate($result['OderDate']); ?></strong>
                                        </li>

                                        <li class="checkout-total-price">
                                            <em>Total Cost</em>
                                            <strong class="price"><span>$</span><?php $totalCost = $totalPrice + $VAT_cost + $shipcost;
                                                                                        echo $totalCost; ?></strong>
                                        </li>
                                    </ul>
                                </div>




                                <div class="sticker"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end fastview -->
                </tr>
                <?php
                        $i++;
                        $subTotal += $totalCost;
                        $product += $result['OderQuanlity'];
                    }
                }
                ?>

            </table>

        </div>
        <div class="col-lg-3 col-md-4" style="border: 2px solid #333; margin: 0 25px 20px 20px; height: 300px;">
            <div
                style="font-size: 18px; font-weight: 600; text-align: center; align-items: center; padding: 10px 0 0px 0;">
                <strong><em>View
                        order
                        details</em></strong>
            </div>

            <div class="checkout-total-block" style="width: 330px; padding: 10px;">
                <ul>
                    <li>
                        <em>Total product</em>

                        <strong class="price"><?php echo $product; ?></strong>
                    </li>
                    <li>
                        <em>Sub total</em>

                        <strong class="price"><span>$</span><?php echo $subTotal; ?></strong>
                    </li>
                    <li class="checkout-total-price">
                        <em>Total Cost</em>
                        <strong class="price"><span>$</span><?php echo $subTotal ?></strong>
                    </li>
                </ul>
            </div>
            <hr style="border: 1px solid #333; width: 70%; align-items: center; justify-content: center; ">
            <div style="text-align: center;">
                <em><strong>Thank you for your orders</strong> <br>
                    <strong>Looking forward to your next purchase</strong></em>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>
</div>


<?php
include 'inc/footer.php';
?>