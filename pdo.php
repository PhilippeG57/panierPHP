<?php 
	$dbh = 'mysql:host=localhost;dbname=adidas';
	$user = 'root';
	$pass = '';


	try {
	$pdo = new PDO($dbh, $user, $pass);
	$pdo->exec("SET CHARACTER SET utf8");
	} catch (PDOException $e) {
	print "Erreur !: " . $e->getMessage();
	die();
	}
 ?>

