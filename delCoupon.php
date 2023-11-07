<?php
session_start();
include('pdo.php');

$stmt = $pdo->prepare('SELECT * from coupons where code = :code');
$stmt->bindValue(':code', $_SESSION['couponId'], PDO::PARAM_STR);
$stmt->execute();
$coupon = $stmt->fetch();


	$stmt = $pdo->prepare('SELECT * from  produits P, panier Pa 
	where Pa.produits = P.id 
	AND Pa.userTemp = :userTemp');
	$stmt->bindValue(':userTemp', $_SESSION['userTemp'], PDO::PARAM_INT);
	$stmt->execute();
	$produits = $stmt->fetchAll();
	
	
	
	foreach($produits as $res)
	{
		
		 $newPrix = $res['prix']*$res['quantite'];
		
		$req = $pdo->prepare("
		UPDATE panier set prixTotal = :prixTotal, coupons = :coupons where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$res['id'],
			':prixTotal'=>$newPrix,
			':coupons'=>null
		));
		
		$req->closeCursor();
		
	unset($_SESSION['couponCode']);
	unset($_SESSION['couponId']);
	unset($_SESSION['couponRegle']);
	
		
		
		
		
	}
header('Location:cart.php');
		exit;
	



?>