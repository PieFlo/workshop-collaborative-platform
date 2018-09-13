<?php

session_start();
if (!isset($_SESSION['nom']) and !isset($_SESSION['mdp']) and !isset($_SESSION['idTruck'])) {
    echo "Vous n'êtes pas connecté.";
    header("location:" . "../index.php");
    exit;

}
$idTruck = $_SESSION['idTruck'];
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
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Regime</th>
                    <th>Allergies</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php
                include('../functions.php');
                $bdd = getDatabase();
                $stmt = $bdd->prepare("SELECT * FROM plat WHERE idCamion = :idTruck");
                $stmt->execute(array('idTruck' => $idTruck));
                while ($donnee = $stmt->fetch()){


                ?>
                <tbody>
                <tr>
                    <td><?php echo $donnee['nom']; ?></td>
                    <td><?php echo $donnee['prix']; ?></td>
                    <td><?php echo $donnee['regime']; ?></td>
                    <td><?php echo $donnee['allergies']; ?></td>
                    <td>
                        <?php
                        echo "Modifier : <a href='EditPlatTEST.php?idPlat=" . $donnee['idPlat'] . "'>" . $donnee['idPlat'] . "<a><br>";
                        echo "supprimer : <a href='DeletePlat.php?idPlat=" . $donnee['idPlat'] . "'>" . $donnee['idPlat'] . "<a><br>";
                        ?>
                    </td>
                </tr>
                </tbody>
                <?php
                }
                $stmt->closeCursor(); // Termine le traitement de la requête

                ?>
               <a href='insertPlatForm.php'> ajouter une recette : <a>
            </table>
        </div>
    </div>
</div>
<?php
if(isset($_SESSION['connecter']) and $_SESSION['connecter']== 1){
    ?>
    <script>
        alert("vous étés dejá connecter");
    </script>
    <?php
    $_SESSION['connecter']= 0;
}

?>
