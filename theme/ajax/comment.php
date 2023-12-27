<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once('../classes/product.php');

$db = new Database();
$product = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formData'])) {
    parse_str($_POST['formData'], $formData);
    $index = isset($formData['index']) ? $formData['index'] : null;
    $productID = isset($formData['productID']) ? $formData['productID'] : null;
    $fullname = isset($formData['fullname']) ? mysqli_real_escape_string($db->link, $formData['fullname']) : null;
    $email = isset($formData['email']) ? mysqli_real_escape_string($db->link, $formData['email']) : null;
    $commentContent = isset($formData['commentContent']) ? mysqli_real_escape_string($db->link, $formData['commentContent']) : null;
    $userID = isset($formData['userID']) ? $formData['userID'] : null;


    // Kiểm tra dữ liệu đầu vào
    if (empty($fullname) || empty($email) || empty($commentContent)) {
        echo 'Error: Missing required fields.';
        exit;
    }
    $sql_check = "SELECT * FROM comment WHERE CreatedBy = '$userID'";
    $result_check = $db->select($sql_check);
    if ($result_check != false) {
        $value = $result_check->fetch_assoc();
        $star = $value['StarRate'];
        $sql = "INSERT INTO comment(Name, Email, Details, productID, StarRate, CreatedBy) VALUES ('$fullname', '$email', '$commentContent', '$productID', '$star', '$userID')";
    } else {
        $sql = "INSERT INTO comment(Name, Email, Details, productID, StarRate, CreatedBy) VALUES ('$fullname', '$email', '$commentContent', '$productID', '$index', '$userID')";
    }
    $result = $db->insert($sql);
    if ($result) {
        echo 'Success: Comment added successfully.';
    } else {
        echo 'Error: Unable to add comment to the database.';
    }
} else if (
    $_SERVER['REQUEST_METHOD'] == 'GET' &&
    isset($_GET['productID']) &&
    isset($_GET['take']) &&
    isset($_GET['skip'])
) {
    $data_in = [
        'take' => htmlspecialchars($_GET['take']) ?? 5,
        'skip' => htmlspecialchars($_GET['skip']) ?? 0,
        'productID' => htmlspecialchars($_GET['productID'])
    ];
    $sql = "SELECT * FROM comment WHERE productID = '$data_in[productID]' ORDER BY comment.CmtID DESC LIMIT $data_in[take] OFFSET $data_in[skip]";
    $result = $db->select($sql);
    if ($result == false) {
        $res = [
            "status" => 'failed',
            "message" => "No data found",
            "data" => [],
            'total_cmt' => 0
        ];
        echo json_encode($res);
        return;
    }
    $data = [];
    while ($row = $result->fetch_assoc()) {
        array_push($data, $row);
    }
    $total_cmt_of_idProduct = $product->showQuanComment($data_in['productID']);
    $res = [
        "status" => 'success',
        "message" => "Reponse ok",
        "data" => $data,
        'total_cmt' => $total_cmt_of_idProduct,
    ];
    echo json_encode($res);
}