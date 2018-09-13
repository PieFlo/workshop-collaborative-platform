<?php
/**
 * Created by PhpStorm.
 * User: Yannis
 * Date: 11/09/2018
 * Time: 13:57
 */

include("../functions.php");
$bdd = getdatabase();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['id'])) {

    $req = $bdd->prepare("DELETE FROM bonneaddresse WHERE idBonAddresse =" . $_GET["id"]);
    header("Location: DisplayBonneAdresse.php");
    $req->execute();
    $req->closeCursor();
}
?>