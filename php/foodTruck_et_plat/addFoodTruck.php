<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="../login/css/util.css">
    <link rel="stylesheet" type="text/css" href="../login/css/main.css">

</head>
<body>
    <div class="limiter">

        <div class="container-login100" style="background-image: url('../login/images/img-01.jpg');">

            <div class="wrap-login100 p-t-190 p-b-30">
                <div class="text-center w-full">
                    <h2>EPSI FOODTRUCK PARCKING LOT</h2>
                </div>
                Bienvenue à l'EPSI PARKING LOT. <br /><br />Ici vous pouvez enregistrer votre Food Truck et aider
                optimiser votre busines avec des etudiant de l'EPSI<br />
                </p>
                <a class="btn" href="index.php">Vous avez déjà un compte?</a>
            </div>


    <div class="container">
        <div class="text-center w-full">
            <h1><a class="txt1" href="../../index.html">Revenir à l'accueil</a></h1><br>
        </div>
        <h3>Formulaire d'inscription</h3>
        <form class="login100-form validate-form" action="insertFoodTruck.php" method="post" enctype="multipart/form-data">
            <div class="wrap-input100 validate-input m-b-10">
            <label for="nom" class="sr-only">Nom du foodtruck</label>
            <input class="input100" type="text" id="fname" name="nom" placeholder="Entrez votre nom"><br/>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
            </div>

            <label for="arrive">Heure d'arrive</label>
            <input type="time" id="appt-time" name="arrive"
                   min="9:30" max="11:00" required />
            <span class="hours">Office hours: 9:30 to 11</span><br/>

            <label for="appt-time">Heure depart</label>
            <input type="time" id="appt-time" name="depart"
                   min="14:00" max="16:00" required />
            <span class="hours">Office hours: 14:00 to 16:30</span><br/>

            E-mail: <input type="email" name="email"><br/>

            <label for="campus">Campus</label>
            <select name="campus">
                <option value="Bordeaux">Bordeaux</option>
                <option value="Grenoble">Grenoble</option>
                <option value="Nantes">Nantes</option>
                <option value="Paris">Paris</option>
                <option value="Montpellier">Montpellier</option>
                <option value="Lyon">Lyon</option>
                <option value="Gorge De Loup">Gorge De Loup</option>
                <option value="Lille">Lille</option>
            </select><br/>
            <label> <strong> mot de passe : </strong></label>
            <input type="hidden" name="mdp" value="
			<?php
            include("../functions.php");
            $pass = genererMDP(8);
            session_start();
            $_SESSION['mdp'] = $pass;
            ?>"/><br/>
            <button type="submit" class="btn btn-primary" name="valider">Enregistrer</button>
        </form>
    </div>
</div>
    </div>
    </div>


</body>
</html>