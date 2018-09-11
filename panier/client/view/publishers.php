<!DOCTYPE html>
<html>
<head>
    <title>Liste des éditeurs</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    include_once ($INC_DIR."/html/header.inc.html");
    ?>
</head>

<body>

<?php
include_once($INC_DIR."/client/html/menu.inc.php");
?>

<h1>Liste des éditeurs</h1>

<div class="container body-content">
<!-- Formulaire de recherche -->
<form action="" method="post" class="form-inline">
    <div class="form-group">
        <label for="nom">Le nom commence par :</label>
        <input type="text" class="form-control" name="nom" placeholder="Entrez le nom" value="<?= $nom ?>"/>
    </div>

    <div class="form-group">
        <label for="cbState">Etat :</label>
        <select id="cbState" name="cbState" class="form-control">
            <option value="" <?php if (empty($state)) {echo "selected";} ?>>Tous</option>
            <?php
            $listeEtats = getUniqueStates();
            foreach ($listeEtats as $ligne)
            {
                echo "<option value='$ligne->state'" . ($state==$ligne->state ? "selected" : "") . ">$ligne->state</option>";
            }
            ?>
        </select>
    </div>

    <input type="submit" value="Rechercher" class="btn btn-default" />
</form>
<br >

    <div class="row">
    <?php
    // objet "$publisher" valide ?
    if ($publishers) {
        foreach ($publishers as $publisher)
        {
            // On affiche chaque entrée une à une
            ?>
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4><?= $publisher->pub_name ?></h4>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-9">
                                <span><?= $publisher->city . ", " . $publisher->libelle ?></span>
                            </div>
                            <div class="col-xs-3">
                                <a href='/client/controller/cart.php?id=<?= $publisher->pub_id ?>' title="Ajouter au panier"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    else {
        echo "<tr><td colspan='3'>Aucun résultat</td></tr>";
    }
    ?>
    </div>

</div>

<script type='text/javascript' src='/client/script/commandes.js'></script>

</body>
</html>
