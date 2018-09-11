<?php

header('Content-type: application/json');

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");


// On démarre les sessions
session_start();

$status = 0;
$quantity = 0;
if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {

    $carts = getCart();
    if ($carts) {
        $quantity = $carts->getTotalQuantity();
        $status = 1;
    }
}

echo json_encode(array('status' => $status, 'quantity' => $quantity));