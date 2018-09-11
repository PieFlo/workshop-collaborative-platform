<?php
session_start();

session_destroy();

header("Location: /client/controller/listeediteur.php");
