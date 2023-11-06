<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> Connexion </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<header style="background-color:black; text-align:center;">
		<div style="padding:20px 0px 20px 0px">
			<div>
			<a style="font-size:30px; color:#01C3FF"><strong>CONNEXION / INSCRIPTION</strong></a><br>
			</div>
			<div>
			<a href="index.php" style="decoration:none; float:right; margin-right:20px; font-size:20px; color:black"><strong>Acceder à la boutique sans se connecter</strong></a><br>
			</div>
		</div>
	</header>
		<br><br>
	<body>
	
		<?php
		if(isset($_GET['error']) && $_GET['error'] == 'authEmail')
		{
		?>
		<span style="color:red; padding-left:40px"> Erreur : l'email est incorrect ou n'existe pas.</span>
		<?php
		}
		?>
		
		<?php
		if(isset($_GET['error']) && $_GET['error'] == 'authPwd')
		{
		?>
		<span style="color:red; padding-left:40px"> Erreur : le mot de passe est incorrect.</span>
		<?php
		}
		?>
		
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center pt-5">
					<form action='connexionReq.php' method='POST'>
						<label style="font-size:30px"><strong>EMAIL</strong></label><br>
						<Input type="text" Name="email" value="<?=isset($_COOKIE['email'])? $_COOKIE['email']:"";?>" style="width:80%; padding:1%"><br><br>
						<label style="font-size:30px"><strong>MOT DE PASSE</strong></label><br>
						<Input type="Password" Name="pwd" value="<?=isset($_COOKIE['pwd'])? $_COOKIE['pwd']:"";?>" style="width:80%; padding:1%"> <br><br><br>
						<Input type="Submit" Value="CONNEXION" onclick="return(confirm('ATTENTION : Si vous cochez \'se souvenir de moi\', vous accepterez les cookies (sinon aucun cookie ne sera crée)'));" style="margin-right:8%; background-color:grey; color:white; width:35%; padding:1%; font-weight:bold">
						<br><br>
						<Input type="checkbox" name="remember" checked>
						<label style="font-size:20px" >Se souvenir de moi</label><br>
						<a href="inscription.php">Pas encore conecté ? Clique ici</a>
					</form>
					
				</div>
			</div>
		</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>