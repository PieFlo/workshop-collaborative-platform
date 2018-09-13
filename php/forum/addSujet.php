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
<div><a href='listSujets.php'>Retour<a/></div><br/>
<form method="post" action="addMessage.php">
    <div>

    <input id="nomSujet" name="nomSujet"  placeholder="Votre sujet." required />
    </div><br/>
    <input type="hidden" id="idAuteur" name="idAuteur" value="<?= $_SESSION['idEtudiant'] ?>"/>
    <div>
    <textarea id="contenu" name="contenu" rows="10" cols="50" placeholder="Votre texte." required></textarea>
    </div><br/>
    <input type="submit" value="Submit">
</form>

<?php
//displayVar();
?>