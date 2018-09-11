<!DOCTYPE html>
<html>
<head>
    <title>Panier</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    include_once ($INC_DIR."/html/header.inc.html");
    ?>
</head>

<body>

<?php
include_once($INC_DIR."/client/html/menu.inc.php");
?>

<h1>Panier</h1>

<div class="container body-content">

    <table id="listItems" class="table table-striped table-hover table-bordered" width="75%">
        <thead>
        <tr>
            <th>Editeur</th>
            <th>Quantité</th>
            <th width="240"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // objet "publisher" valide ?
        if ($items) {
            foreach ($items as $item)
            {
                // On affiche chaque entrée une à une
                ?>
                <tr id="<?= $item->getId() ?>">
                    <td id="libelle"><?=$item->getName() ?></td>
                    <td id="quantity"><?=$item->getQuantity() ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" id="btnAddCartItem"
                           href="#"
                            title="Ajouter"><i
                                class="fa fa-plus fa-lg"></i></a>
                        <a class="btn btn-danger btn-sm" id="btnRemoveCartItem"
                           href="#"
                           title="Retirer"><i class="fa fa-minus fa-lg"></i></a>
                    </td>
                </tr>
                <?php
            }
        }
        else {
            echo "<tr><td colspan='3'>Aucun résultat</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php
$enabled = false;
// objet "$publisher" valide ?
if ($items) {
  $enabled = true;
}
?>
<a id="validateCart" class="btn btn-success btn-sm" href='/client/controller/cartvalidate.php' title="Commander"
    <?= ($enabled? "":"disabled=disabled") ?>><i class="fa fa-check-circle-o fa-2x" aria-hidden="true"></i>&nbsp;Commander</a>

    <a id="clearCart" class="btn btn-danger btn-sm" href='#' title="Vider le panier"
        <?= ($enabled? "":"disabled=disabled") ?>><i class="fa fa-remove fa-2x" aria-hidden="true"></i>&nbsp;Vider le panier</a>
</div>

<script type="text/javascript" src="/client/script/commandes.js"></script>
<script type="text/javascript" src="/client/script/carts.js"></script>

</body>
</html>