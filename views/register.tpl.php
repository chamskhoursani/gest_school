<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
<?php



if (isset($_REQUEST['nom'], $_REQUEST['prenom'], $_REQUEST['email'], $_REQUEST['mot_de_passe'], $_REQUEST['mobile'], $_REQUEST['adresse'], $_REQUEST['code_postal']))
{
	// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
	$nom = stripslashes($_REQUEST['nom']);
	// $nom_professeur = mysqli_real_escape_string($conn, $nom_professeur); 
	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$prenom = stripslashes($_REQUEST['prenom']);
	// $prenom_professeur = mysqli_real_escape_string($conn, $prenom_professeur);
    	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$email = stripslashes($_REQUEST['email']);
	// $email = mysqli_real_escape_string($conn, $email);
	// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
	$password = stripslashes($_REQUEST['mot_de_passe']);
	// $password = mysqli_real_escape_string($conn, $password);
    	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$mobile = stripslashes($_REQUEST['mobile']);
	// $mobile = mysqli_real_escape_string($conn, $mobile);
    	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$adresse = stripslashes($_REQUEST['adresse']);
	// $adresse = mysqli_real_escape_string($conn, $adresse);
    	// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
	$codepostal = stripslashes($_REQUEST['code_postal']);
	// $codepostal = mysqli_real_escape_string($conn, $codepostal);
	
	// $query = "INSERT into `utilisateur` (nom, prenom, email, mot_de_passe, mobile, adresse, code_postal)
	// 			VALUES ('$nom', '$prenom', '$email','".hash('sha256', $password)."', '$mobile', '$adresse', '$codepostal')";
	// $res = mysqli_query($conn, $query);

 
  $database= new DBData (); 
  $data = [
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'mot_de_passe' => $password,
    'mobile' => $mobile,
    'adresse' => $adresse,
    'code_postal' => $codepostal,
];

 $res = $database->insert_user($data);

    ///-( success case user added )
    if($res)
    {
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='login.php'> se connecter</a></p>
			 </div>";
    }
}
else
{
?>
<form class="box" action="" method="post">
	<!-- <h1 class="box-logo box-title">AUTHENTIFICATION</h1> -->
    <h1>S'inscrire</h1>
    <div class="row">
      <input type="text" class="box-input col-12" name="nom" placeholder="Nom" required />
      <input type="text" class="box-input col-12" name="prenom" placeholder="Prenom" required />
      <input type="email" class="box-input col-12" name="email" placeholder="Email" required />
      <input type="password" class="box-input col-12" name="mot_de_passe" placeholder="Mot de passe" required />
      <input type="text" class="box-input col-12" name="mobile" placeholder="Mobile" required>
      <input type="text" class="box-input col-12" name="adresse" placeholder="Adresse" required>
      <input type="text" class="box-input col-12" name="code_postal" placeholder="Code postal" required>
      <input type="submit" name="submit" value="S'inscrire" class="box-button mt-3" />
    </div>

    <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
</form>
<?php } ?>
</body>
</html>