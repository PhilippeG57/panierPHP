<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title> Inscription </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<header style="background-color:black; text-align:center;">
		<div style="padding:20px 0px 20px 0px">
			<div>
			<a style="font-size:30px; color:#01C3FF"><strong>INSCRIPTION</strong></a>
			</div>
		</div>
	</header>
		<br>
	<body>
				<span style="color:red; padding-left:40px">Erreur : l'email ou le pseudo existe déja.</span>
		<div class="container-fluid"  style="padding-left:10%">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="padding:20px 0px 40px 8%">
					<form action='inscriptionReq.php' method='POST'>
						<label style="font-size:15px"><strong>NOM</strong></label><br>
						<Input type="text" Name="nom" style="width:80%; padding:1%"><br><br>
						<label style="font-size:15px"><strong>PRENOM</strong></label><br>
						<Input type="text" Name="prenom" style="width:80%; padding:1%"><br><br>						
						<label style="font-size:15px"><strong>EMAIL</strong></label><br>
						<Input type="email" Name="email" style="width:80%; padding:1%"><br><br>
						<label style="font-size:15px"><strong>MOT DE PASSE</strong></label><br>
						<Input type="Password" Name="pwd" style="width:80%; padding:1%"> <br><br>
						<Input type="Submit" Value="S'INSCRIRE" style="margin-left:22%; background-color:grey; color:white; width:35%; padding:1%; font-weight:bold">
					</form>
				</div>
			</div>
		</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>