<?php
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
        <i class="fa fa-table"></i> Listes des bonnes adresses
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Intitulé du lieu</th>
                    <th>Adresse</th>
                    <th>Description</th>
                    <th>Site web</th>
                    <th>Régime</th>
                    <th>Allergies</th>
                    <th>Budget (€)</th>
                    <th>Qui propose?</th>
                </tr>
                </thead>
                <?php
                include('../functions.php');
                $bdd = $bdd = getDatabase();
                $reponse = $bdd->query('SELECT * FROM bonneaddresse');
                while ($row1 = $reponse->fetch()) {

                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row1['nom']; ?></td>
                        <td><?php echo $row1['address']; ?></td>
                        <td><?php echo $row1['description']; ?></td>
                        <td><?php echo $row1['siteWeb']; ?></td>
                        <td><?php echo $row1['regime']; ?></td>
                        <td><?php echo $row1['allergies']; ?></td>
                        <td><?php echo $row1['budget']; ?></td>
                        <td><?php echo $row1['idCreateur']; ?></td>
                        <td>
                            <?php
                            echo "Consulter la bonne adresse : <a href='template.php?id=" . $row1["idBonAddresse"] . "'>" . $row1["idBonAddresse"] . "<a><br>";
                            ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </table>
            <a href="DisplayBonneAdresse.php">Mes bonnes adresses</a>
        </div>
    </div>
</div>
