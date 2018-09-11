<?php
session_start();
session_destroy();
// include("includes/index.html");
// include("includes/menu.php");

// if ($id==0) erreur(ERR_IS_NOT_CO);
// Cliquez <a href="'.htmlspecialchars($_SERVER['HTTP_REFERER']).'">ici</a> 
// pour revenir à la page précédente.<br />
echo '<p>Vous êtes à présent déconnecté <br/>
Cliquez <a href="index.html">ici</a> pour revenir à la page principale</p>';
echo '</div></body></html>';
?>
