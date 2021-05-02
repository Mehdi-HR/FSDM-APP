<?php 

require('../templates/config.php');

$code = ''; 
$nom = ''; 
$prenom = '';
$cin = ''; 
$email = '';
$cne = '';
$id_filiere = '';

$errors = ['code'=>'', 'nom'=>'', 'prenom'=>'','cin'=>'', 'email'=>'', 'cne'=>'','id_filiere'=>''];
if(isSet($_POST['envoyer']))
{
	$code = intval(mysqli_real_escape_string($conn,trim($_POST['code'])));
	$nom = mysqli_real_escape_string($conn,trim($_POST['nom']));
	$prenom = mysqli_real_escape_string($conn,trim($_POST['prenom']));
	$cin = mysqli_real_escape_string($conn,trim($_POST['cin']));
	$email = mysqli_real_escape_string($conn,trim($_POST['email']));
	$cne = mysqli_real_escape_string($conn,trim($_POST['cne']));
	$id_filiere = mysqli_real_escape_string($conn,trim($_POST['id_filiere']));

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

	//cne
	if(empty($cne)){
		$errors['cne'] = 'Veuillez entrer un cne';
	}else{
		if (!preg_match('/^([A-Za-z]([0-9]{9}))$/', $cne)) {
			$errors['cne'] = 'Veuillez entrer un cne valide';
			}	
	}		

	//id_filiere
	if(empty($id_filiere)){
		$errors['id_filiere'] = 'Veuillez entrer un id de filiere';
	}else{
		if (!preg_match('/^[A-Za-z]{3}$/', $id_filiere)) {
			$errors['id_filiere'] = 'Veuillez entrer un id de module valide';
			}	
	}

if( !array_filter($errors) ){
	$type = 'E';
	$sql = "INSERT INTO etudiants(code_etudiant,nom,prenom,cin,email,cne,id_filiere) VALUES ('$code','$nom','$prenom','$cin','$email','$cne','$id_filiere');";
	if( mysqli_query($conn,$sql) ){
		$password = $cin;
		$hash = hash("sha256",$password,false);
		$sql2 = "INSERT INTO utilisateurs(code,nom,prenom,type,cin,email,hash) VALUES ('$code','$nom','$prenom','$type','$cin','$email','$hash');";
		mysqli_query($conn,$sql2);
		header('Location: ../index.php');
	}		
	else{
		echo "failed to run insert query";
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
	<title>Ajouter un etudiant</title>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
</head>
<body>
<header id="mainHeader"> 
<?php 

include("../templates/header.php");

?>	
	<div id="main">
		<h1>Ajouter un etudiant</h1>
	</div>
	<hr>
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

			<!--cne-->
			<label>Entrer le cne  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cne" name="cne" placeholder="Entrer le cne ici" value = "<?php echo $cne ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['cne']} </strong>" ?> </div>
			<br>		

			<!--id_filiere-->
			<label>Choisir une filiere:</label>
			<select class="mySelect" id="id_filiere" name="id_filiere" >
				<option>SMI</option>				
				<option>SMA</option>
				<option>SVI</option>
				<option>STU</option>
				<option>SMP</option>
				<option>SMC</option>				
			</select>			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['id_filiere']} </strong>" ?> </div>
			<br>


			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
	</div>
	<hr>
</section>

<?php 	

require('../templates/nav.php');

 ?>
<hr>

<?php 	

require('../templates/footer.php');

 ?>



</body>
</html>