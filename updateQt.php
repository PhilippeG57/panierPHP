<?php

session_start();
include('pdo.php');

$stmt = $pdo->prepare('SELECT Pa.id as idP, Pa.quantite as qtPanier, P.quantite as qtProduit, P.prix as prix, P.id as idProduit
 from panier Pa, produits P 
WHERE Pa.produits = P.id AND Pa.id = :id');
$stmt->bindValue(':id', $_GET['panier'], PDO::PARAM_INT);
$stmt->execute();
$panier = $stmt->fetch();


if(isset($_SESSION['couponCode']))
				{
					
					$couponVal = $_SESSION['couponId'];
$stmt = $pdo->prepare('SELECT * from coupons where id = :code');
		$stmt->bindValue(':code', $_SESSION['couponId'], PDO::PARAM_STR);
		$stmt->execute();
		$coupon = $stmt->fetch();


		if($coupon['type'] == '%')
		{
			$percent = 1-($coupon['remise']/100);
			$newPrix = $panier['prix']*$percent;
			
		}
		else{
			$newPrix = $panier['prix']-$coupon['remise'];
		}
				}
				else{
					$couponVal = null;
					$newPrix = $panier['prix'];
				}
				

if($_GET['action'] == 'add')
{
	$newQt = $panier['qtPanier'] + 1;
	$newQtProduit = $panier['qtProduit'] - 1;
	$newPrix2 = $newPrix * $newQt;
	
	
	if($panier['qtProduit'] > 0)
	{
		$req = $pdo->prepare("
		UPDATE panier set quantite = :quantite, prixTotal = :prixTotal, coupons = :coupon where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$panier['idP'],
			':quantite'=>$newQt,
			':coupon'=>$couponVal,
			':prixTotal'=>$newPrix2
			
		));
		
		$req->closeCursor();
		
		
		
		$req = $pdo->prepare("
		UPDATE produits set quantite = :quantite where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$panier['idProduit'],
			':quantite'=>$newQtProduit
			
		));
		
		$req->closeCursor();
		
		header('Location:cart.php?message=validate');
		exit;
	}
	else
	{
		header('Location:cart.php?message=outstock');
		exit;
	}
	
}
else
{
	$newQt = $panier['qtPanier'] - 1;
	$newPrix2 = $newPrix * $newQt;
	$newQtProduit = $panier['qtProduit'] + 1;
	
	if($newQt >= 1)
	{
		
		$req = $pdo->prepare("
		UPDATE panier set quantite = :quantite, prixTotal = :prixTotal, coupons = :coupon where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$panier['idP'],
			':quantite'=>$newQt,
			':coupon'=>$couponVal,
			':prixTotal'=>$newPrix2			
		));
		
		$req->closeCursor();
		
		$req = $pdo->prepare("
		UPDATE produits set quantite = :quantite where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$panier['idProduit'],
			':quantite'=>$newQtProduit
			
		));
		
		$req->closeCursor();
		
		header('Location:cart.php?message=validate');
		exit;
	}
	else{
		
		$stmt = $pdo->prepare('DELETE from panier where id = :id');
$stmt->bindValue(':id', $panier['idP'], PDO::PARAM_INT);
$stmt->execute();

$req = $pdo->prepare("
		UPDATE produits set quantite = :quantite where id = :id",
		array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

		$req->execute(
		array(
			':id'=>$panier['idProduit'],
			':quantite'=>$newQtProduit
			
		));
		
		$req->closeCursor();

header('Location:cart.php?message=validate');
		exit;
	}	
}


