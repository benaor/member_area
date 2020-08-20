<?php
session_start();
session_unset();
session_destroy();
setcookie('log', '', time() -86400, '/', null, false, true);

//redirect to login
header('location: connexion.php');