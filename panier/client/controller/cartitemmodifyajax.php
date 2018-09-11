<?php
header('Content-type: application/json');

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");


// On démarre les sessions
session_start();

$status = 0;
$pub_id = 0;
$quantity = 0;
$quantityTotal = 0;

if (isset($_SESSION["cart"]) && $_SESSION["cart"] != null) {
    // Le panier
    $cart = $_SESSION["cart"];

    if (isset($_POST['id'])) {
        $pub_id = htmlspecialchars($_POST['id']);
        // L'id doit être une valeur numérique
        if (is_numeric($pub_id)) {
            // Faut-il ajouter ou supprimer
            $add = true;
            if (isset($_POST['action'])) {
                if ($_POST['action'] == 'remove') {
                    $quantity = $cart->remove($pub_id, 1);
                }
                else if ($_POST['action'] == 'add') {
                    $quantity = $cart->add($pub_id, 1);
                }
            }
        }
    } else if ($_POST['action'] == 'clear') {
        $cart->clear();
    }
    $quantityTotal = $cart->getTotalQuantity();
    $status = 1;
}

echo json_encode(array('status' => $status, 'id' => $pub_id, 'quantity' => $quantity, 'quantityTotal' => $quantityTotal));