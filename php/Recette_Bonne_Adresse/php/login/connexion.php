<?php
include('../functions.php');

$bdd=getDatabase();
if (isset($_POST['email']) and isset($_POST['motdepasse'])) {
    $requete=$bdd->prepare('SELECT * FROM etudiant WHERE email = :mail ');
    $requete->bindvalue(':mail', $_POST['email'], PDO::PARAM_INT);
    $requete->execute();


 if ($donnee=$requete->fetch()) { // si tu trouves un resultat
        if ($donnee['motdepasse']==$_POST['motdepasse']) {
            session_start();
            $reponse = $bdd->query('SELECT idEtudiant, pseudo, nom, prenom, email FROM etudiant ');

                // On affiche chaque entrée une à une
    while ($test = $reponse->fetch()){
        $_SESSION['idEtudiant']=$donnee['idEtudiant'];
        $_SESSION['pseudo']=$donnee['pseudo'];
        $_SESSION['nom']=$donnee['nom'];
        $_SESSION['prenom']=$donnee['prenom'];
        $_SESSION['email']=$donnee['email'];
    }

    $reponse->closeCursor(); // Termine le traitement de la requête

            echo'Vous êtes connecté';
            header('location: ../../index.html'); // A changer une fois la page de redirection créer
         } 
         else { 
         // Mot de passe incorrect
            echo' Mot de passe incorrect <br> <a href="formEtud.php">Retour</a> ' ;
        }
     } 
     else {
         // utilisateur incorrect
        echo ' Adresse mail incorrect <br> <a href="formEtud.php">Retour</a>';

     }
    }

?>