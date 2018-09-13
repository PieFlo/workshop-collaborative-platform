<!DOCTYPE html>
<html>
<head>
	<title>WorkShop | Inscription</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
	<body>
		<div class="limiter">

			<div class="container-login100" style="background-image: url('images/img-01.jpg');">

				<div class="wrap-login100 p-t-190 p-b-30">
					<div class="text-center w-full">
						<h1><a class="txt1" href="../../index.html">Revenir à l'accueil</a></h1><br>
					</div>
					<form class="login100-form validate-form" action="inscription.php" method="POST">

                        <div class="wrap-input100 validate-input m-b-10">
                            <label for="inputPseudo" class="sr-only">Pseudonyme d'anonymat</label>
                            <input class="input100" type="text" name="pseudo" placeholder="pseudo" required autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-10">
							<label for="inputNom" class="sr-only">Nom de famille</label>
							<input class="input100" type="text" name="nom" placeholder="nom" required autofocus>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10">
							<label for="inputNom" class="sr-only">Prénom</label>
							<input class="input100" type="text" name="prenom" placeholder="prenom" required autofocus>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10">
							<label for="inputNom" class="sr-only">Adresse de messagerie</label><br>
							<input class="input100" type="email" name="email" placeholder="Email" required autofocus>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10">
						<label for="inputNom" class="sr-only">Mot de passe</label><br>
							<input class="input100" type="password" name="motdepasse" placeholder="Mot de passe" required autofocus>
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input m-b-10">
							<label for="inputNom" class="sr-only">Régime alimentaire</label>
							<input class="input100" type="text" name="regime" placeholder="hallal, vegan, ...">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>
						
						<div class="wrap-input100 validate-input m-b-10">
							<label for="inputNom" class="sr-only">Allergie alimentaire</label>
							<input class="input100" type="text" name="allergies" placeholder="allergie">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>

				

						<div class="container-login100-form-btn p-t-10">
							<button type="submit" class="login100-form-btn">Inscription</button>
						</div>

						<div class="text-center w-full p-t-25 p-b-230">
							<a class="txt1" href="formEtud.php">Vous avez deja un compte ? Cliquez ici</a>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</body>
</html>