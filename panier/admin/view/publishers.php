<!DOCTYPE html>
<html>
<head>
    <title>Liste des éditeurs</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    include_once ($INC_DIR  ."/html/header.inc.html");
    ?>
</head>

<body>

<div id="wrapper">
    <?php
    include_once($INC_DIR ."/client/html/menu.inc.php");
    ?>

    <div id="page-wrapper">
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

        <table class="table table-striped table-hover table-bordered" width="75%">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Ville</th>
                <th>Etat</th>
                <th>Pays</th>
                <th width="240"></th>
            </tr>
            </thead>
            <tbody>
            <?php
            // objet "$publisher" valide ?
            if ($publishers) {
                foreach ($publishers as $publisher)
                {
                    // On affiche chaque entrée une à une
                    ?>
                    <tr>
                        <td><?=$publisher->pub_name?></td>
                        <td><?=$publisher->city?></td>
                        <td><?=$publisher->state?></td>
                        <td><?=$publisher->libelle?></td>
                        <td>
                            <?php
                            if (isset($_SESSION["loginUser"]) && !empty(["loginUser"])) {
                                ?>
                                <a class="btn btn-primary btn-sm"
                                   href="/admin/controller/editPublisher.php?id=<?= $publisher->pub_id ?>"><i
                                            class="fa fa-edit fa-lg"></i>&nbsp;Modifier</a>
                                <a class="btn btn-danger btn-sm"
                                   href="/admin/controller/delPublisher.php?id=<?= $publisher->pub_id ?>"
                                   title="Supprimer l'éditeur"><i class="fa fa-trash-o fa-lg"></i>&nbsp;Supprimer</a>

                                <?php
                            }
                            ?>
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
    </div>
</div>

</body>
</html>
