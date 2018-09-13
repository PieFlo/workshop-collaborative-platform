<?php
/*//protection pour le backoffice
session_start();
if (!isset($_SESSION['idAdmin'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../index.php");
    exit;
}
*/?>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom fonts for this template-->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- Page level plugin CSS-->
<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="css/sb-admin.css" rel="stylesheet">

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Listes des recettes
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Ingredients</th>
                    <th>Étapes essentielles</th>
                    <th>Image</th>
                    <th>Temps de préparation</th>
                    <th>Régime</th>
                    <th>Allergies</th>
                    <th>Budget</th>
                    <th>Cuisto</th>
                    <th>Avis</th>
                </tr>
                </thead>
                <?php
                include('./functions.php');
                $bdd = $bdd = getDatabase();
                $reponse = $bdd->query('SELECT * FROM recette');
                while ($row1 = $reponse->fetch()) {

                    ?>
                    <tbody>
                    <tr>
                        <td><?php echo $row1['idRecette']; ?></td>
                        <td><?php echo $row1['nom']; ?></td>
                        <td><?php echo $row1['ingredient']; ?></td>
                        <td><?php echo $row1['steps']; ?></td>
                        <td><?php echo $row1['imageRecette']; ?></td>
                        <td><?php echo $row1['tempsPreparation']; ?></td>
                        <td><?php echo $row1['regime']; ?></td>
                        <td><?php echo $row1['allergies']; ?></td>
                        <td><?php echo $row1['budget']; ?></td>
                        <td><?php echo $row1['idCreateur']; ?></td>
                        <td><?php echo $row1['idAvis']; ?></td>
                        <td>
                            <?php
                            echo "Modifier : <a href='EditRecette.php?id=" . $row1["idRecette"] . "'>" . $row1["idRecette"] . "<a><br>";
                            echo "supprimer : <a href='DeleteRecette.php?id=" . $row1["idRecette"] . "'>" . $row1["idRecette"] . "<a><br>";
                            /*echo "ajouter une recette : <a href='AddRecette.php?id=" . $row1["idRecette"] . "'>" . $row1["idRecette"] . "<a>";*/
                            ?>
                        </td>
                    </tr>
                    </tbody>
                    <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </table>
            <?php echo "<a href='AddRecette.php?id=" . $row1["idRecette"] . "'>" . "Ajouter une recette" . "<a>"; ?>
        </div>
    </div>
</div>
