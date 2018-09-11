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

<h1>Commandes effectuées</h1>

<div class="container body-content">

    <table class="table table-striped table-hover table-bordered" width="75%">
        <thead>
        <tr>
            <th width="200">Date de la commande</th>
            <th>Contenu</th>
            <th width="120"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        // objet "liste des commandes" valide ?
        if ($commandes) {
            $count = count($commandes);
            $i = 0;
            $idCmd = 0;
            while ($i < $count)
            {
                // On affiche chaque entrée une à une
                $commande = $commandes[$i];
                ?>
                <tr>
                    <td><?php
                        $date = new DateTime($commande->date);
                        echo $date->format("d/m/Y");
                        ?></td>
                    <td><?php
                        $idCmd = $commande->idcmd;
                        echo '<ul>';
                        while ($i < $count && $idCmd == $commande->idcmd) {
                            echo '<li>' .  $commande->libelle . ' (' . $commande->quantity . 'x)</li>';
                            $i++;
                            if ($i < $count)
                                $commande = $commandes[$i];
                        }
                        echo '</ul>';
                        ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" target="_blank"
                           href="/client/controller/cmdfacture.php?id=<?= $idCmd ?>"
                           title="Editer la facture"><i class="fa fa-file-pdf-o fa-lg"></i>&nbsp;Editer la facture</a>
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

</div>

<script type="text/javascript" src="/client/script/commandes.js"></script>

</body>
</html>
