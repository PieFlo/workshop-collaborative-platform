<?php
/**
 * Created by PhpStorm.
 * User: pfpou
 * Date: 11/09/2018
 * Time: 17:10
 */

include('../functions.php');
if (isset($_POST) && count($_POST) > 0) {
    $date = new DateTime();
    $dateMessage = $date->format('Y-m-d H:i:s');

    extract(array_map("htmlspecialchars", $_POST));
    $bdd = getDataBase();

        try {
            $stmt = $bdd->prepare("INSERT INTO message(idAuteur, idSujet, contenu, dateMessage) 
                                            VALUES (:idAuteur,:idSujet,:contenu,:dateMessage)");
            $stmt->bindParam(':idAuteur', $idAuteur);
            $stmt->bindParam(':idSujet', $idSujet);
            $stmt->bindParam(':contenu', $contenu);
            $stmt->bindParam(':dateMessage', $dateMessage);


            $nbInsert = $stmt->execute();
        } catch (Exception $e) {
            $nbInsert = 0;
        }
        if ($nbInsert == 1) {
            header('Location:listMessages.php');
        } else {
            echo "Le message n'as pas été envoyé.";
        }

}

//displayVar();
?>