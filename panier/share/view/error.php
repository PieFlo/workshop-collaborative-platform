<!DOCTYPE html>
<html>
<head>
    <title>Erreur</title>
    <?php
    $INC_DIR = $_SERVER["DOCUMENT_ROOT"];
    require ($INC_DIR. "/html/header.inc.html");
    ?>
</head>

<body>
<div id="wrapper">
    <div id="page-wrapper">

        <h2>Erreur</h2>

        <p>L'erreur suivante est survenue:</p>
        <p>
        <?php
        if (isset($messageErreur)) {
            echo $messageErreur;
        }
        ?>
        </p>
    </div>
</div>
</body>
</html>