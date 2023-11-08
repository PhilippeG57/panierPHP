<?php

session_start();

//tout retirer sauf le userTemp
unset($_SESSION['userId']);
unset($_SESSION['userNom']);
unset($_SESSION['userPrenom']);
unset($_SESSION['userEmail']);
unset($_SESSION['userRole']);
unset($_SESSION['userDate']);
unset($_SESSION['userTemp']);

header('Location:index.php?deconnexion=success');

?>