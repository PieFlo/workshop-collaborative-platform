<?php
/**
 * Created by PhpStorm.
 * User: pfpou
 * Date: 11/09/2018
 * Time: 12:09
 */
if(isset($_GET) && count($_GET) > 0 ){
session_start();
include('../functions.php');
echo "<a href='listSujets.php'>Retour<a/>";
$bdd = getDataBase();

$stmt = $bdd->prepare("SELECT m.idMessage, m.idAuteur, m.idSujet, contenu, dateMessage, m.idAuteur, pseudo, s.nomSujet 
FROM message m, etudiant e, sujet s WHERE m.idSujet = :idSujet AND m.idAuteur = e.idEtudiant AND s.idSujet = m.idSujet ORDER BY m.dateMessage ASC");
$stmt->bindParam(':idSujet', $_GET["id"]);
$stmt->execute();
$messages = $stmt->fetchAll();
echo "<h3>Sujet : ".$messages[0]['nomSujet']."</h3>";
foreach ($messages as $message){
    echo "<br/>Message de ".$message['pseudo']." le ".$message['dateMessage']."<br/>".$message['contenu']."<br/>";
}



?>
<br/><br/>
<form method="post" action="addMessage.php">
    <input type="hidden" id="idAuteur" name="idAuteur" value="<?= $_SESSION['idEtudiant'] ?>"/>
    <input type="hidden" id="idSujet" name="idSujet" value="<?= $messages[0]['idSujet'] ?>"/>
    <textarea id="contenu" name="contenu" rows="10" cols="50">
    </textarea>
    <input type="submit" value="Submit">
</form>
<?php } else
    header('Location:listSujets.php');
//displayVar();
?>

