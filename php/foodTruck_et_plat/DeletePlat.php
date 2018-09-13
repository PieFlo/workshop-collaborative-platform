<?php
/**
 * Created by PhpStorm.
 * User: Yannis
 * Date: 11/09/2018
 * Time: 13:57
 */
session_start();
include("../functions.php");
$bdd = getdatabase();
// if the 'id' variable is set in the URL, we know that we need to edit
if (isset($_GET['idPlat'])) {

    $req = $bdd->prepare("DELETE FROM plat WHERE idPlat =" . $_GET["idPlat"]);
    header("Location: DisplayPlat.php");
    $req->execute();
    $req->closeCursor();
}
?>