<?php
session_start();
include("pdo.php");
date_default_timezone_set('Europe/Paris');

$stmt = $pdo->prepare('SELECT * from users WHERE email = :email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$userExist=$stmt->fetch();

if(empty($userExist)){
    //Insertion des données dans la table users
    $req = $pdo->prepare("
        INSERT INTO users(nom,prenom,mdp,email,role,dateinscription)
        VALUES (:nom,:prenom,:mdp,:email,:role,:dateinscription)",
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $req->execute(
        array(
            ':nom' =>$_POST['nom'],
            ':prenom' =>$_POST['prenom'],
            ':mdp' =>password_hash($_POST['pwd'], PASSWORD_DEFAULT),
            ':email' =>$_POST['email'],
            ':role' =>"client",
            ':dateinscription' =>date('Y-m-d H:i:s')
        )
    );

    $req->closeCursor();

    header("Location:index.php?inscription=success");
}else{
    header("Location:inscription.php?inscription=error");
}
?>