<?php

// Đường dẫn tới các file controller và model
$controllerPath = './controllers/';
$modelPath = './models/';

// Xác định controller được yêu cầu
if (isset($_GET['controller'])) {
    $requestedController = $_GET['controller'];
} else {
    // Controller mặc định nếu không có yêu cầu
    $requestedController = 'default';
}

// Tạo đường dẫn tới file controller
$controllerFile = $controllerPath . $requestedController . '.php';

// Kiểm tra sự tồn tại của file controller
if (file_exists($controllerFile)) {
    // Include file controller
    include_once($controllerFile);
} else {
    // File controller không tồn tại
    echo 'Controller file not found.';
    exit;
}

// Tạo tên lớp controller dựa trên tên file
$controllerClass = 'Ctrl_' . ucfirst($requestedController);

// Kiểm tra sự tồn tại của lớp controller
if (class_exists($controllerClass)) {
    // Tạo đối tượng controller
    $controller = new $controllerClass();

    // Gọi phương thức invoke() của controller
    $controller->invoke();
} else {
    // Lớp controller không tồn tại
    echo 'Controller not found.';
}

?>