<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// Le contrôleur

// Obtention de la liste
$items = null;

$carts = getCart();
if ($carts) {
    $items = $carts->getItems();
}

// La vue
require ($INC_DIR. "/client/view/carts.php");
