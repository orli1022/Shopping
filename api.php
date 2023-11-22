<?php
require('backend/model.php');

// 設定內容類型為 JSON
header('Content-Type: application/json');

// 獲取行動碼
$act = isset($_REQUEST['act']) ? $_REQUEST['act'] : '';

// API 處理
switch ($act) {
    case "getProductList":
        $products = getProductList();
        echo json_encode($products);
        break;

    case "getDetail":
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0;
        $product = getDetail($id);
        echo json_encode($product);
        break;

    case "addCart":
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0;
        $result = addCart($id);
        echo json_encode(['success' => $result]);
        break;

    case "getCartList":
        $cart = getCartList();
        echo json_encode($cart);
        break;

    case "delCart":
        $id = isset($_REQUEST['id']) ? (int)$_REQUEST['id'] : 0;
        $result = delCart($id);
        echo json_encode(['success' => $result]);
        break;

    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

?>
