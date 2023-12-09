<?php
session_start();

if(isset($_GET['productid'])) {
    $productId = $_GET['productid'];
    if($productId == 0) {
        // Xóa toàn bộ giỏ hàng
        unset($_SESSION['cart']);
    } else {
        // Xóa sản phẩm cụ thể khỏi giỏ hàng
        if(isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}

header("Location: viewCart.php");
exit;
?>