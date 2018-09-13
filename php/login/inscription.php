<?php
include('../functions.php');
$bdd = getDatabase();

	if(((!empty($_POST['pseudo'])) AND !empty($_POST['nom'])) AND (!empty($_POST['prenom'])) AND (!empty($_POST['email'])) AND (!empty($_POST['motdepasse'])))
	{
	$req = $bdd->prepare('SELECT email, pseudo from etudiant WHERE email = :email OR pseudo = :pseudo');
	$req->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
	$req->bindValue(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
	$req->execute();
	$check=$req->fetch();
	if ($check)
	{
	echo' Adresse E-mail ou Pseudonyme déjà utilisé.';
	}
	else
	{

    $req = $bdd->prepare('INSERT INTO etudiant(pseudo, nom, prenom, email, motdepasse, regime, allergies)
	VALUES(:pseudo, :nom, :prenom, :email, :motdepasse, :regime, :allergies)');
	// $req->bindValue(':id',$_POST['idEtudiant'],PDO::PARAM_INT);
	$req->bindValue(':pseudo',$_POST['pseudo'],PDO::PARAM_STR);
	$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
	$req->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
	$req->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
	$req->bindValue(':motdepasse',$_POST['motdepasse'],PDO::PARAM_STR);
	$req->bindValue(':regime',$_POST['regime'],PDO::PARAM_STR);
	$req->bindValue(':allergies',$_POST['allergies'],PDO::PARAM_STR);
	
	if ($req->execute()){
			header('Location: formEtud.php');
		
	}
	else
	{
	echo 'Erreur system';
	}
	$req->closeCursor();
	}
}
?>
