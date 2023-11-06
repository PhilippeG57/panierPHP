<?php 
session_start();
include('pdo.php');


	$stmt = $pdo->prepare('DELETE from panier where id = :id');
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
	
	
	header('Location:'.$_SERVER['HTTP_REFERER']);
	exit;





?>