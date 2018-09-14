<?php
/**
 * Created by PhpStorm.
 * User: pfpou
 * Date: 12/09/2018
 * Time: 11:07
 */

session_start();
include('header.html');
include('../functions.php');
echo "<a href='addSujet.php'>Ajouter un nouveau sujet<a/><br/><br/>";
$bdd = getDataBase();
$stmt = $bdd->prepare("SELECT idSujet, idAuteur, nomSujet, pseudo, dateDernierMsg FROM sujet, etudiant WHERE etudiant.idEtudiant = sujet.idAuteur ORDER BY dateDernierMsg DESC");
$stmt->execute();
$sujets = $stmt->fetchAll();
?>
<table class="table">
    <thead>
    <tr>
        <th width="300">Sujet</th>
        <th>Auteur</th>
        <th>Date du dernier message</th>
    </tr>
    </thead>
    <?php
foreach ($sujets as $sujet){
  ?>
    <tr><td><a href="listMessages.php?id=<?=$sujet['idSujet']?>"><?php echo $sujet['nomSujet'];?></a></td>
        <td><?php echo $sujet['pseudo'];?></td>
        <td><?php echo $sujet['dateDernierMsg'];?></td>
    </tr>
    <?php
}
include('footer.html');
?>
</table>
