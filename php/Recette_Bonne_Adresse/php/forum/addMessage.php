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
    if(isset($_POST['nomSujet'])){ // Si on vient de addSujet.php
        try {
            $stmt = $bdd->prepare("INSERT INTO sujet(nomSujet, idAuteur, dateDernierMsg) VALUES (:nomSujet, :idAuteur, :dateDernierMsg)");
            $stmt->bindParam(':nomSujet', $nomSujet);
            $stmt->bindParam(':idAuteur', $idAuteur);
            $stmt->bindParam(':dateDernierMsg', $dateMessage);

            $nbInsert = $stmt->execute();
            $idSujet = $bdd->lastInsertId();
        } catch (Exception $e) {
            $nbInsert = 0;
        }
        if($nbInsert<1)
            echo "Le sujet n'as pas été ajouté.";
    }
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
    if ($nbInsert > 0) {
        if(isset($_POST['idSujet'])){ // Si on vient de addMessage.php
            try
            {
                $stmt = $bdd->prepare ("UPDATE sujet SET dateDernierMsg = :dateMessage WHERE idSujet = :idSujet ");
                $stmt->bindParam(':idSujet', $idSujet);
                $stmt->bindParam(':dateMessage', $dateMessage);
                $nbModifs = $stmt->execute();
            }
            catch (Exception $e)
            {
                $nbModifs = 0;
            }
        }
        header('Location:listMessages.php?id='.$idSujet);
    } else {
        echo "Le message n'as pas été envoyé.";
    }

}else
    header('Location:listSujets.php');

//displayVar();
?>