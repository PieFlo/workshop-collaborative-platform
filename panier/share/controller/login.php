<?php
// On démarre les sessions
session_start();

// Le modèle
$INC_DIR = $_SERVER["DOCUMENT_ROOT"];
require($INC_DIR. "/model/publisher.php");

$error = 0;

if (isset($_POST["login"])) {
    // 1 - On récupère l'id du formulaires
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $redirect = isset($_POST['redirect']) ?  htmlspecialchars($_POST['redirect']) : "";

    $user = authenticateUser($login, $password);
    if ($user)
    {
        $_SESSION["loginUser"] = $login;
        $_SESSION["roleUser"] = $user->role;
        if (!empty($redirect))
        {
            header("Location: " . $redirect);
        } elseif ($user->role == 100) {
            header("Location: /admin/controller/listepubrecherche.php");
        } else {
            header("Location: /client/controller/listeediteur.php");
        }
    }
    else {
        $error = 1;
        // La vue
        require ($INC_DIR. "/share/view/login.php");
    }
}
else
{
    // La vue
    require ($INC_DIR. "/share/view/login.php");
}

