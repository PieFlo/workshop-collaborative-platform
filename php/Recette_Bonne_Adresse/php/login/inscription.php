<?php
include('../functions.php');
$bdd = getDatabase();

	if((!empty($_POST['nom'])) AND (!empty($_POST['prenom'])) AND (!empty($_POST['email'])) AND (!empty($_POST['motdepasse'])) AND (!empty($_POST['regime'])) AND (!empty($_POST['allergies'])))
	{
	$req = $bdd->prepare('SELECT email from etudiant where email = :email');
	$req->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
	$req->execute();
	$check=$req->fetch();
	if ($check)
	{
	echo' Adresse E-mail déjà prise';
	}
	else
	{

    $req = $bdd->prepare('INSERT INTO etudiant(nom, prenom, email, motdepasse, regime, allergies)
	VALUES(:nom, :prenom, :email, :motdepasse, :regime, :allergies)');
	// $req->bindValue(':id',$_POST['idEtudiant'],PDO::PARAM_INT);
	$req->bindValue(':nom',$_POST['nom'],PDO::PARAM_STR);
	$req->bindValue(':prenom',$_POST['prenom'],PDO::PARAM_STR);
	$req->bindValue(':email',$_POST['email'],PDO::PARAM_STR);
	$req->bindValue(':motdepasse',$_POST['motdepasse'],PDO::PARAM_STR);
	$req->bindValue(':regime',$_POST['regime'],PDO::PARAM_STR);
	$req->bindValue(':allergies',$_POST['allergies'],PDO::PARAM_STR);
	
	if ($req->execute()){
			header('Location: formClient.php');
		
	}
	else
	{
	echo 'Erreur system';
	}
	$req->closeCursor();
	}
}
?>
