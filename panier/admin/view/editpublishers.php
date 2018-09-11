<!DOCTYPE html>
<html>
<head>
    <title>Edition d'un éditeur</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require ($INC_DIR. "/html/header.inc.html");
    ?>
</head>

<body>
<div id="wrapper">
    <?php
    include_once($INC_DIR. "/admin/menu.inc.php");
    ?>

    <div id="page-wrapper">

        <h2>Edition d'un éditeur</h2>
        <?php
        if (! empty($alertMessage)) {
        ?>
        <div class="alert alert-<?= $alertCSS ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?= $alertMessage ?>
        </div>
        <?php
}
?>

        <a href="/admin/controller/listepubrecherche.php">Retour à la liste</a>
        <br />
        <br />

        <?php
        if ($publisher == null) {
        ?>
        <p>L'éditeur n'existe pas</p>
        <?php
        }
        else {
            if ($canEdit == false) {
                echo '<p>Vous devez vous <a href="/share/controller/login.php">identifier</a> pour modifier les valeurs</p>';
            }
        ?>

        <form action="/admin/controller/editPublisher.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom de l'éditeur</label>
                <input type="text" class="form-control" name="pub_name" placeholder="Entrez le nom de l'éditeur" value="<?= $publisher->pub_name ?>" <?= ($canEdit? "":"disabled='disabled'") ?> />
            </div>
            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" class="form-control" name="city" placeholder="Entrez le nom de la ville" value="<?= $publisher->city ?>" <?= ($canEdit? "":"disabled='disabled'") ?> />
            </div>
            <div class="form-group">
                <label for="state">Etat</label>
                <input type="text" class="form-control" name="state" placeholder="Entrez le nom de l'état" value="<?= $publisher->state ?>" <?= ($canEdit? "":"disabled='disabled'") ?> />
            </div>
            <div class="form-group">
                <label for="country">Pays</label>
                <select name="cbCountry" class="form-control" <?= ($canEdit? "":"disabled='disabled'") ?> >
                    <?php
                    // Obtention de la liste des pays
                    foreach($countries as $country)
                    {
                        echo '<option value="'.$country->id.'"';
                        if ($publisher->idCountry == $country->id) {
                            echo ' selected ';
                        }
                        echo '>'.$country->libelle.'</option>';
                    }
                    ?>
                </select>
            </div>

            <input type="hidden" name="pub_id" value="<?php echo $pub_id ?>" />
            <?php if ($canEdit) { ?>
                <input type="submit" value="Valider" class="btn btn-primary" />
            <?php } ?>

        </form>
        <?php
        }
        ?>

    </div>
</div>
</body>
</html>