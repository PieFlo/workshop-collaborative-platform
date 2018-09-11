<?php
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
// Le modèle
require ($INC_DIR. "/model/publisher.php");

$bdd = getDataBase();
//
if ($bdd) {
    // connexion réussie
    // Mise à jour dans la bd
    $stmt = $bdd->prepare("UPDATE employee SET login = CONCAT(LOWER(fname), '.', LOWER(lname)), password = :pPwdCrypt");
    $passwordCrypted = password_hash('test', PASSWORD_DEFAULT);
    $stmt->bindParam(':pPwdCrypt', $passwordCrypted);
    $nbModifs = $stmt->execute();

    echo "Login et mot de passe changés";
}