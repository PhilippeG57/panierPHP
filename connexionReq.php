<?php 
session_start();
include('pdo.php');
include('fonctions.php');

$stmt = $pdo->prepare('SELECT * from users WHERE email = :email');
$stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
$stmt->execute();
$userExist=$stmt->fetch();


if(!empty($userExist))
{		
	$pass=pwd($userExist['salt'],$_POST['pwd']);
	
	if($userExist['pwd'] == $pass)
	{
		
		if ($_POST['remember'] == true){
			setcookie('email',$_POST['email'],time()+365*24*3600);
            setcookie('pwd',$_POST['pwd'],time()+365*24*3600);
		}
		else{
			setcookie('email',$_POST['email'],time()-1);
            setcookie('pwd',$_POST['pwd'],time()-1);
		}
		
		
		$_SESSION['userId'] = $userExist['id'];
		$_SESSION['userNom'] = $userExist['nom'];
		$_SESSION['userPrenom'] = $userExist['prenom'];
		$_SESSION['userEmail'] = $userExist['email'];
		$_SESSION['userPwd'] = $userExist['pwd'];
		$_SESSION['userDate'] = $userExist['dateinscription'];
		$_SESSION['userRole'] = $userExist['role'];
		header('Location:index.php');
	}
	else
	{
		header('Location:seConnecter.php?error=authEmail');
	}
}

else
{
	header('Location:seConnecter.php?error=authEmail');
}


 ?>