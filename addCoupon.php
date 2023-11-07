<?php
session_start();
include('pdo.php');

$dateJour = date('Y-m-d H:i:s');

$stmt=$pdo->prepare('SELECT * from coupons WHERE code = :code AND debut <= "'.$dateJour.'" AND fin >= "'.$dateJour.'"');
$stmt->bindValue(':code', $_POST['code'], PDO::PARAM_STR);
$stmt->execute();
$coupon = $stmt->fetch();

if(!empty($coupon)){
    $_SESSION['couponCode'] = $coupon['code'];
    $_SESSION['couponId'] = $coupon['id'];
    $_SESSION['couponRegle'] = $coupon['remise'].$coupon['type'];

    //APPLIQUER LA REMISE AUX PRODUITS DU PANIER
    $stmt=$pdo->prepare('SELECT * from panier WHERE userTemp = :userTemp');
    $stmt->bindValue(':userTemp', $_SESSION['userTemp'], PDO::PARAM_STR);
    $stmt->execute();
    $produits = $stmt->fetchALL();

    foreach($produits as $res){
        if($coupon['type'] == "%"){
            $percent = 1-($coupon['remise']/100); //Si la remise est de 20%, percent renverra 0.8
            $newprix = $res['prixTotal']*$percent;
        }else{
            $newprix=$res['prixTotal']-$coupon['remise'];
        }
    

        $req = $pdo->prepare('UPDATE panier set prixTotal = :prixTotal, coupons = :coupons WHERE id=:id',
        array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $req->execute(
            array(
                ':id'=>$res['id'],
                ':prixTotal'=>$newprix,
                ':coupons'=>$coupon['id']
            )
        );
    }
    header('Location:cart.php?message=validecode&code='.$_POST['code']);
}
else{
    header("Location:cart.php?message=invalidecode");
    exit;
}
?>