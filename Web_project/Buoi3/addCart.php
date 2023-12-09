<?php
// Khởi động session
session_start();

// Kiểm tra nếu giỏ hàng không tồn tại, tạo mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['idsp'])) {
    $productId = $_GET['idsp'];

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
    if (isset($_SESSION['cart'][$productId])) {
        // Nếu sản phẩm đã tồn tại, cộng thêm số lượng mới vào số lượng hiện có
        $_SESSION['cart'][$productId] += 1;
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm sản phẩm mới vào giỏ hàng với số lượng là 1
        $_SESSION['cart'][$productId] = 1;
    }
}

// Chuyển hướng về trang danh sách sản phẩm
header("Location: DanhsachSP.php");
exit;
?>