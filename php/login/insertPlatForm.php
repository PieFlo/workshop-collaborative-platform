
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
                <h1 class="txt1" >Bienvenue</h1><br>
                <h1 class="txt1" >Ajoutez un plat</h1><br>
                <h1><a class="txt1" href="../../index.html">Revenir un menu principal</a></h1><br>
            </div>
            <form class="login100-form validate-form" action="insertplat.php" method="POST">

                <div class="wrap-input100 validate-input m-b-10">
                    <label for="inputNom" class="sr-only">nom du plat</label>
                    <input class="input100" type="text" name="nom" placeholder="nom" required autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
                </div>

                <div class="wrap-input100 validate-input m-b-10">
                    <label for="inputNom" class="sr-only">Prix du plat</label>
                    <input class="input100" type="text" name="prix" placeholder="prix du plat" required autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
								<i class="fa fa-user"></i>
							</span>
                </div>

                <div class="wrap-input100 validate-input m-b-10">
                    <label for="inputNom" class="sr-only">Quantité disponible</label><br>
                    <input class="input100" type="text" name="quantite" placeholder="quantité dispo" required autofocus>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
								<i class="fa fa-user"></i>
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


                <input type="hidden" name="idCamion" value="1">
                <div class="container-login100-form-btn p-t-10">
                    <button type="submit" class="login100-form-btn">Ajoutez</button>
                </div>

            </form>
        </div>
    </div>
</div>
<?php
session_start();
if(isset($_SESSION['enregistrement']) and $_SESSION['enregistrement']== 1){
    ?>
    <script>
            alert("Le Plat a été Ajouté");
    </script>
<?php
    $_SESSION['enregistrement']= 0;
}

?>
</body>
</html>