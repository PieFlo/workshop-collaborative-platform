<?php
session_start();
?>
<html>
<head>

</head>
<body>
<?php

include("../functions.php");
$bdd= getDataBase();
var_dump($_POST);
//(sizeof($_POST) === 4)
  if(isset($_POST['idPlat']) and isset($_POST['idCamion']) and isset($_POST['prix']) and isset($_POST['quantite'])){
      $idCreateur = 1;
      $prix = $_POST['prix'];
      $quantite = $_POST['quantite'];
      $quantite = number_format($quantite);
      var_dump($quantite);

      $prixTot = $prix * $quantite;
      $prixTot = (float)$prixTot;

      $bdd= getDataBase();


      $stmt = $bdd->prepare(' INSERT INTO commande(prixTotal , idCreateur)values(:prixTotal, :idCreateur)');
      //$stmt ->execute(array(
         // 'prixTotal' => $prixTot,
         // 'idCreateur' => $idCreateur));
      $stmt->bindValue(':prixTotal', $prixTot, PDO::PARAM_INT);
      $stmt->bindValue(':idCreateur', $idCreateur, PDO::PARAM_INT);
      $stmt->execute();

      $stmt->closeCursor();

     $requete = $bdd->prepare(' SELECT idCommande FROM commande where idCreateur = :idCreateur ');
      $requete ->bindValue(':idCreateur', $idCreateur, PDO::PARAM_INT);
      $requete ->execute();
      while($rowl = $requete -> fetch())
      {
          $commander = $rowl['idCommande'];
      }

      $requete-> closeCursor();



          // $req = $bdd->prepare('INSERT INTO platvendu(quantiteVendu,idPlat,idDemande) VALUES(?, ?, ?)');
          $req = $bdd->prepare(' INSERT INTO platvendu(quantiteVendu , idPlat , idDemande)values(:quantiteVendu, :idPlat ,:idDemande)');
          $req->bindValue(':quantiteVendu', $_POST['quantite'], PDO::PARAM_INT);
          $req->bindValue(':idPlat', $_POST['idPlat'], PDO::PARAM_INT);
          $req->bindValue(':idDemande', $commander, PDO::PARAM_INT);
          $req->execute();
          // $req->execute(array($_POST['quantite'], $_POST['idPlat'], $_POST['idCamion']));
          //  $resultat = $req->fetch();

          $_SESSION['achat'] = 1;




        if (!$stmt)
        {
            echo "ErreurResultat 111111";
        }
        else
        {
            exit();
        }
    }

    else

    {
        echo "erreur 22222";
        exit();



}


  ?>
</body>
</html>