<?php 
		include("../functions.php");
		$bdd =getdatabase();
$nom='DEBUG NOM';
$auteur = 'DEBUG AUTEUR';
$ingredient = 'DEBUG ingredient';
$etape = 'DEBUG etape';
$img = 'DEBUG IMG';
$tpsPrepa = 'DEBUG TPS';
$regime = 'DEBUG regime';
$allergie = 'DEBUG allergie';
$budget = 'DEBUG budget';

		$reponse= $bdd->query('SELECT nom, idCreateur, ingredient, steps, imageRecette, tempsPreparation, regime, allergies, budget  FROM recette where idRecette = '.$_GET['id'].' ');	
		if($row1 = $reponse->fetch()) {
			$nom = $row1["nom"];
			// $auteur = $row1["idCreateur"];
			 $auteur = "";

			 $response = $bdd->query("SELECT nom, prenom FROM etudiant WHERE idEtudiant = " . $row1["idCreateur"]);
	    	if($row = $response->fetch()) {
	     		$auteur = $row['nom']." ".$row['prenom'];
	     		$ingredient = $row1['ingredient'];
	     		$etape = $row1['steps'];
	     		$img = $row1['imageRecette'];
	     		$tpsPrepa = $row1['tempsPreparation'];
	     		$regime = $row1['regime'];
	     		$allergie = $row1['allergies'];
	     		$budget = $row1['budget'];
	     		//$ingredient = $row1[''];
	     	}
	     }

     	echo "recette=".$nom ."<br />";
     	echo "auteur=".$auteur ."<br />";
     	echo "ingredients=".$ingredient ."<br />";
     	echo "etape=".$etape ."<br />";

?>
<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Workshop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Workshop template" />
	<meta name="keywords" content="" />
	<meta name="author" content="NOMDUGROUPE" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="css/superfish.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">
	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
	<!-- CS Select -->
	<link rel="stylesheet" href="css/cs-select.css">
	<link rel="stylesheet" href="css/cs-skin-border.css">
	
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<div id="fh5co-blog-section" class="fh5co-section-gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center heading-section animate-box">
						<h1><?php 
						echo $nom;?>
						</h1>
							<div class="container">
							<p>Recette proposé par : <?php
								echo $auteur; ?></p><br>
							<p>Temps de préparation :<br><?php
								echo $tpsPrepa; ?><br></p>
<!-- 							<p>Allergies :<br><?php
								//echo $allergie; ?><br></p>
							<p>Régime :<br><?php
							//echo $regime;
							?><br></p> -->
								<div class="col-lg-4 col-md-4 col-sm-6">
									<div class="fh5co-blog animate-box">
									<img class="img-responsive" src="images/place-2.jpg" alt="">
											<?php echo $img; ?>
								</div>
							</div>
							<p>Allergies :<br><?php
								echo $allergie; ?><br></p>
							<p>Régime :<br><?php
							echo $regime;
							?><br></p>
							<p>Budget :<?php echo " ";echo $budget; ?>€ </p>
						</div>	
					</div>
					
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<h3>Ingrédients de la recette :</h3>
					<?php
					echo $ingredient;
					?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					Etape de la recette : <br>
					<?php echo $etape ?><!--  ifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeisifoehfoehfoiehfoieshofiehsoefhsoifhesohfohefsoihefiohfiohfio <br> nsoehfoieshfohfoeihsoiehsoifhoiefhioheoihfeis -->
				</div>
			</div>	
		</div>
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->

	<!-- jQuery -->


	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/sticky.js"></script>

	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.min.js"></script>
	<!-- CS Select -->
	<script src="js/classie.js"></script>
	<script src="js/selectFx.js"></script>
	
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

