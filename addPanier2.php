<?php
/* AJOUT DANS LE PANIER PAR LA PAGE D'ACCUEIL */
session_start();
include('pdo.php');

if(!isset($_SESSION['userTemp'])){
    $_SESSION['userTemp'] = time();
}

$_POST['quantity']=1;

//MISE A JOUR DE LA QUANTITE RESTANTE DANS PRODUIT
$stmt = $pdo->prepare('SELECT * from produits WHERE id=:id');
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch();

$quantiteRestante = $product['quantite']-$_POST['quantity'];
if($product['quantite'] >= $_POST['quantity']){
    $req = $pdo->prepare("UPDATE produits SET quantite = :quantite where id = :id",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $req->execute(
        array(
            ':id'=>$_GET['id'],
            ':quantite'=>$quantiteRestante
        )
    );
    $req->closeCursor();

    //VERIFICATION D'UN COUPON ET CHANGEMENT DU PRIX SI ON EN A UN
    if(isset($_SESSION['couponCode'])){
        $couponVal = $_SESSION['couponId'];
        $stmt = $pdo->prepare('SELECT * from coupons WHERE id = :id');
        $stmt->bindValue(':id', $_SESSION['couponId'], PDO::PARAM_INT);
        $stmt->execute();
        $coupon->$stmt-fetch();

        if($coupon['type']=="%"){
            $percent = 1-($coupon['remise']/100);
            $newPrix = $_GET['prix']*$percent;
        }
    }else{
        $couponVal = null;
        $newPrix = $_GET['prix'];
    }

    // AJOUT DU PRODUIT DANS LE PANIER
    $req = $pdo->prepare("INSERT INTO panier(produits,dateAdd,userTemp,quantite,prixTotal,coupons)
    VALUES (:produits,:dateAdd,:userTemp,:quantite,:prixTotal,:coupons)",
    array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

    $req->execute(
        array(
            ':produits'=>$_GET['id'],
            ':dateAdd'=>date('Y-m-d H:i:s'),
            ':userTemp'=>$_SESSION['userTemp'],
            ':quantite'=>$_POST['quantity'],
            ':prixTotal'=>$_POST['quantity']*$newPrix,
            ':coupons'=>$couponVal
        )
    );
    $req->closeCursor();
    header('Location:index.php?product=added');
}
else{
    header('Location:index.php?message=outstock&id='.$_GET['id']);
}

?>