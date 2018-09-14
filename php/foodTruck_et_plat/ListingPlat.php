<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Yannis
 * Date: 13/09/2018
 * Time: 09:49
 */

/*//protection pour le backoffice
session_start();
if (!isset($_SESSION['idAdmin'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../index.php");
    exit;
}
*/
/*$auteur="";
$response = $bdd->query("SELECT nom, prenom FROM etudiant WHERE idEtudiant = " . $row1["idCreateur"]);
if($row = $response->fetch()) {
    $auteur = $row['nom'] . " " . $row['prenom'];
}*/
?>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Listes des plats
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Quantité</th>
                    <th>Régime</th>
                    <th>Allergies</th>

                </tr>
                </thead>
                <?php
                include('../functions.php');
                $bdd = $bdd = getDatabase();
                $reponse = $bdd->query('SELECT * FROM plat order by idPlat');
                while ($row1 = $reponse->fetch()) {

                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row1['nom']; ?></td>
                        <td><?php echo $row1['prix']; ?></td>
                        <td><?php echo $row1['imagePlat']; ?></td>
                        <td><?php echo $row1['quantite']; ?></td>
                        <td><?php echo $row1['regime']; ?></td>
                        <td><?php echo $row1['allergies']; ?></td>
                        <td>
                            <?php
                            echo "<form method='post' action='templateplat.php'>";
                            echo "<input type='hidden' name='idPlat' value='". $row1['idPlat'] . "' >";
                            echo "<input type='hidden' name='idCamion' value='". $row1['idCamion'] . "' >";
                            echo "<input type='hidden' name='prix' value='". $row1['prix'] . "' >";
                            echo "<input type='number' name='quantite'>";
                            echo "<input type='submit' value='achetter'>";
                            echo "</form>";
                            ?>
                                    <?php

                            ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </table>
        </div>
    </div>

</div>
