<?php
include("../functions.php");
session_start();
if (isset($_SESSION['nom']) and isset($_SESSION['mdp']) and isset($_SESSION['idTruck'])) {
    echo "Vous n'êtes pas connecté.";
    $_SESSION['connecter']= 1;
    header("location:" . "./displayPlat.php");
    exit;

}
?>
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
                <h1 class="txt1" >Bienvenue</h1><br>
                <h1 class="txt1" ></h1><br>
                <h1><a class="txt1" href="../../index.html">Revenir un menu principal</a></h1><br>
            </div>
            <form class="login100-form validate-form" action="connexionPhp.php" method="POST">

                <div class="wrap-input100 validate-input m-b-10">
                    <label for="inputNom" class="sr-only">nom du FoodTruck</label>
                    <input class="input100" type="text" name="nom" placeholder="nom" required autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
                </div>

                <div class="wrap-input100 validate-input m-b-10">
                    <label for="inputNom" class="sr-only">mot de pass</label>
                    <input class="input100" type="pasword" name="mdp" placeholder="mot de passe" required autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
                </div>


                <div class="container-login100-form-btn p-t-10">
                    <button type="submit" class="login100-form-btn">Connexion</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
if(isset($_SESSION['pasConnecter']) and $_SESSION['pasConnecter']== 1){
    ?>
    <script>
        alert("Mauvesse mot de passe!");
    </script>
    <?php
    $_SESSION['pasConnecter']= 0;
}

?>

</body>
</html>