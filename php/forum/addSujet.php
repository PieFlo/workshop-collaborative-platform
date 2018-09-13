<?php
/**
 * Created by PhpStorm.
 * User: pfpou
 * Date: 12/09/2018
 * Time: 16:03
 */

session_start();
include('../functions.php');
?>
<a href='listSujets.php'>Retour<a/><br/>
<form method="post" action="addMessage.php">
    <div>
    <label for="nomSujet">Nom du sujet</label>
    <input id="nomSujet" name="nomSujet" />
    </div>
    <input type="hidden" id="idAuteur" name="idAuteur" value="<?= $_SESSION['idEtudiant'] ?>"/>
    <div>
    <label for="contenu">Premier message</label>
    <textarea id="contenu" name="contenu" rows="10" cols="50">
    </textarea>
    </div>
    <input type="submit" value="Submit">
</form>

<?php
displayVar();
?>