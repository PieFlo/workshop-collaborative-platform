<?php
include('functions.php');
$bdd=getDataBase();
?>
<form action="gerermagasins.php" method="post" id="formagasins">
    <label>choisir une competence:</label>
    <select name='stor_id' form="formagasins">
        <?php
$reponse = $bdd->query('SELECT * FROM  stores');

// On affich chaque entrée une à une
while ($donnees = $reponse->fetch()) {
    ?>
    <option value="<?=$donnees{"stor_id"}?>"><?=$donnees['stor_name']?></option>";
        <?php
}


?>
        </select><br>
    <input type="radio" name="chois" value="suppression">suppression<br>
    <input type="radio" name="chois" value="edition">edition<br>
    <input type="submit" value='valider'>
    </form>