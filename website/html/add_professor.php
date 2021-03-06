<?php 

session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 


require('templates/config.php');

$code = ''; 
$nom = ''; 
$prenom = '';
$cin = ''; 
$email = '';
	$errors = ['code'=>'', 'nom'=>'', 'prenom'=>'','cin'=>'', 'email'=>''];
	if(isSet($_POST['envoyer']))
	{
		$code = intval(mysqli_real_escape_string($conn,trim($_POST['code'])));
		$nom = mysqli_real_escape_string($conn,trim($_POST['nom']));
		$prenom = mysqli_real_escape_string($conn,trim($_POST['prenom']));
		$cin = mysqli_real_escape_string($conn,trim($_POST['cin']));
		$email = mysqli_real_escape_string($conn,trim($_POST['email']));

		//code
		if(empty($code)){
			$errors['code'] = 'Veuillez entrer un code';
		}else{
			if ($code < 1) {
				$errors['code'] = 'code > 0 !!!';
				}	
		}
		//nom
		if(empty($nom)){
			$errors['nom'] = 'Veuillez entrer un nom';
		}else{
			if (!preg_match('/^([A-Za-z\s])+$/', $nom)) {
				$errors['nom'] = 'Veuillez entrer un nom valide';
				echo "test";
				}	
		}
		//prenom
		if(empty($prenom)){
			$errors['prenom'] = 'Veuillez entrer un prenom';
		}else{
			if (!preg_match('/^([A-Za-z\s])+$/', $prenom)) {
				$errors['prenom'] = 'Veuillez entrer un prenom valide';
				}	
		}

		//cin	
		if(empty($cin)){
			$errors['cin'] = 'Veuillez entrer un cin';
		}else{
			if (!preg_match('/^(([A-Za-z])+([0-9])+)$/', $cin)) {
				$errors['cin'] = 'Veuillez entrer un cin valide';
				}	
		}

		//email
		if(empty($email)){
			$errors['email'] = 'Veuillez entrer un email';
		}else{
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
				$errors['email'] = 'Veuillez entrer un email valide';
				}	
        }
		

	if( !array_filter($errors) ){
		$date = date('d-m-y');
		$type = 'P';
		$sql = "INSERT INTO professeurs(code_prof,nom,prenom,cin,date_inscription,email) VALUES ('$code','$nom','$prenom','$cin','$date','$email');";
		if( mysqli_query($conn,$sql) ){
			$password = $cin;
			$hash = hash("sha256",$password,false);
			$sql2 = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,date_inscription,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$date','$email','$hash');";
			mysqli_query($conn,$sql2);
			header('Location: index.php');
		}else{
			echo "Failed to run insert query";
		}
	}else{
		echo "bad user input";	
		}

	mysqli_close($conn);		
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un professeur</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Ajouter un professeur</h1>
	</div>
</header>
<section>
	<div class="form">
		<form class="myForm" id="form" method="POST">
			
			<!--code-->
			<label>Entrer le code &nbsp &nbsp :</label>
			<input type="number" id="code" name="code" placeholder="Exemple: 59855" 
			value = "<?php echo $code ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['code']} </strong>" ?> </div> 
			<br>

			<!--nom-->
			<label>Entrer le nom &nbsp &nbsp &nbsp:</label>
			<input type="text" id="nom"name="nom" placeholder="Entrer le nom ici" 
			value = "<?php echo $nom ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['nom']} </strong>" ?> </div> 
			<br>

			<!--prenom-->
			<label>Entrer le prenom:</label>
			<input type="text" id="prenom" name="prenom" placeholder="Entrer le prenom ici" value = "<?php echo $prenom ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['prenom']} </strong>" ?> </div>
			<br>	

			<!--cin-->	
			<label>Entrer le cin  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cin" name="cin" placeholder="Entrer le cin ici" value = "<?php echo $cin ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['cin']} </strong>" ?> </div>						
			<br>	

			<!--email-->
			<label>Entrer l'email  &nbsp &nbsp :</label>
			<input type="text" id="email" name="email" placeholder="Entrer l'email ici" value = "<?php echo $email ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['email']} </strong>" ?> </div>
			<br>



			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
	</div>
</section>

<?php 	

require('templates/nav.php');

 ?>


<?php 	

require('templates/footer.php');

 ?>


<?php 
}else {
 header("Location: index.php");
}
?>
</body>
</html>