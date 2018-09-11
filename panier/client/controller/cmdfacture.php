<?php

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require ($INC_DIR. "/model/publisher.php");
require ($INC_DIR. "/client/class/Cart.php");

// On démarre les sessions
session_start();

// Le contrôleur
$isOK = false;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $idCmd = htmlspecialchars($_GET['id']);
    // L'id doit être une valeur numérique
    if (is_numeric($idCmd)) {
        if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
            // Obtention de la liste
            $commandeDetails = getCommande($_SESSION["loginUser"], $idCmd);
            // On décortique la commande
            if ($commandeDetails) {
                // On obtient la première ligne
                $commande = $commandeDetails[0];
                $date = new DateTime($commande->date);

                // convert to PDF
                require_once($INC_DIR. '/share/vendor/autoload.php');
                // La vue
                require ($INC_DIR. "/client/view/cmdpdf.php");
            }
        }

        $isOK = true;
    }
}

if (! $isOK) {
    // Manque d'informations
    $messageErreur = "La commande n'a pas été trouvé";
    require ($INC_DIR. "/share/view/error.php");
}
