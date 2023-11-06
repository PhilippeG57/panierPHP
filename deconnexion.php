<?php

session_start();

//tout retirer sauf le userTemp
unset($_SESSION['userId']);;
unset($_SESSION['userNom']);;
unset($_SESSION['userPrenom']);;
unset($_SESSION['userEmail']);;
unset($_SESSION['userPwd']);;
unset($_SESSION['userRole']);;
unset($_SESSION['userDate']);;

header('Location:index.php');

?>