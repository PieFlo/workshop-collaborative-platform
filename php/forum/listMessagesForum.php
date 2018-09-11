<?php
/**
 * Created by PhpStorm.
 * User: pfpou
 * Date: 11/09/2018
 * Time: 12:09
 */
include('../functions.php');

$bdd = getDataBase();
$stmt = $bdd->prepare("SELECT idMessage, idAuteur, idSujet, contenu, dateMessage, idEtudiant, pseudo FROM message, etudiant WHERE idSujet = 1 AND message.idAuteur = etudiant.idEtudiant ORDER BY message.dateMessage ASC");
$stmt->execute();
$messages = $stmt->fetchAll();
echo "<h2>Sujet : test</h2>";
foreach ($messages as $message){
    echo "<br/><br/>Message de ".$message['pseudo']." le ".$message['dateMessage']."<br/>".$message['contenu'];
}


//displayVar();
?>
<br/><br/>
<form method="post" action="addMessageForum.php">
    <textarea id="contenu" rows="10" cols="50">
    </textarea>
    <input type="submit" id="newMessage" value="Submit">
</form>
