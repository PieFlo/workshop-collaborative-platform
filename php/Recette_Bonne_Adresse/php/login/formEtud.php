<!DOCTYPE html>
<html>
<head>
	<title>Biocash | Login Admin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
	<body>
		<div class="limiter">
			<div class="container-login100" style="background-image: url('images/img-01.jpg');">
				<div class="wrap-login100 p-t-190 p-b-30">
					<form class="login100-form validate-form" action="connexion.php" method="POST">
						<div class="wrap-input100 validate-input m-b-10" data-validate = "Identifiant requis">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
						</div>
						<div class="wrap-input100 validate-input m-b-10" data-validate = "Mot de passe requis">
							<input class="input100" type="password" name="motdepasse" placeholder="Mot de passe">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock"></i>
							</span>
						</div>
						<div class="container-login100-form-btn p-t-10">
							<button type="submit" class="login100-form-btn">Connexion</button>
						</div>

						<div class="text-center w-full p-t-25 p-b-230">
							<a href="forgot.php" class="txt1">
								Compte ou mot de passe oublié ?
							</a>
						</div>
						<div class="text-center w-full">
							<a class="txt1" href="formInscription.php">
								Créer un nouveau compte
								<i class="fa fa-long-arrow-right"></i>						
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</body>
</html>