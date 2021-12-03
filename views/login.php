<!DOCTYPE html>
<html>
<head>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
require('connexion.php'); /*  recup de la variable conn*/ 
session_start();/* ouverture de la session*/ 
$result = [];
if (isset($_POST['email'])){
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn, $email);
	
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn, $password);
    
	/*Requete verification du compte*/ 
	$query = "SELECT * FROM `express_compte` WHERE email='$email' and mot_de_passe='".hash('sha256', $password)."'";
	$result = mysqli_query($conn,$query) or die(mysql_error());
	

	if (mysqli_num_rows($result) == 1) {
		$user = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $user['email'];
		$_SESSION['id_compte'] = $user['id_compte'];
		$_SESSION['type'] = $user['type'];


	// 	$query= "INSERT into `session` (id_compte) VALUES ('{$user[id_compte]}')";
	// $res = mysqli_query($conn, $query);
	
		// Add all information you want here to use it in any page like :
		//  $_SESSION['nom'] = $user['nom']
		// vérifier si l'utilisateur est un administrateur ou un utilisateur

		if ($user['type'] == 'admin') {
			
			header('location: cuisine_2.php');		  
		}else{
			header('location: cuisine_1.php');
		}
		
	}else{
		$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
	}


}


// if (mysqli_num_rows($result) == 1) {
// 	$sql= "INSERT into `session` (id_compte) VALUES {$user['id_compte']}";
// 	$res = mysqli_query($conn, $sql);
// }



?>
<form class="box" action="" method="post" name="login">
<h1>connexion client</h1>
<input type="text" class="box-input" name="email" placeholder="Email"/>
<input type="password" class=" box-input" name="password" placeholder="Mot de passe"/>
<input type="submit" value="Connexion " name="submit" class="box-button"/>
<p class="box-register">Vous n'avez pas encore un compte ?<a href="register.php">S'inscrire</a></p>
<?php if (!empty($message)) : ?>
    <p class="errorMessage"><?= $message; ?></p>
<?php endif; ?>
</form>



</body>
</html>