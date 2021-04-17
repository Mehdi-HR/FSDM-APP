<?php 

require('templates/config.php');

$code = $nom = $prenom = '';
	$errors = ['code'=>'', 'nom'=>'', 'prenom'=>''];
	if(isSet($_POST['envoyer']))
	{
		$code = intval(mysqli_real_escape_string($conn,trim($_POST['code'])));
		$nom = mysqli_real_escape_string($conn,trim($_POST['nom']));
		$prenom = mysqli_real_escape_string($conn,trim($_POST['prenom']));

		if(empty($code)){
			$errors['code'] = 'Veuillez entrer un code';
		}else{
			if ($code < 1) {
				$errors['code'] = 'code > 0 !!!';
				}	
		}

		if(empty($nom)){
			$errors['nom'] = 'Veuillez entrer un nom';
		}else{
			if (!preg_match('/^([A-Za-z\s])+$/', $nom)) {
				$errors['nom'] = 'Veuillez entrer un nom valide';
				echo "test";
				}	
		}
		if(empty($nom)){
			$errors['prenom'] = 'Veuillez entrer un prenom';
		}else{
			if (!preg_match('/^([A-Za-z\s])+$/', $prenom)) {
				$errors['prenom'] = 'Veuillez entrer un prenom valide';
				}	
		}

	if( !array_filter($errors) ){
		$sql = "INSERT INTO test(code,nom,prenom) VALUES ('$code','$nom','$prenom')";
		if( mysqli_query($conn,$sql) ){
			header('Location: index.php');
		}else{
			echo "failed to run insert query";
		}
	}else{
		echo "bad user input";	
		}

	mysqli_close();	
}





?>



<!DOCTYPE html>
<html>
<head>
	<title>Ajouter un etudiant</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<div class="headerBG"> 
		<img src="../images/fsdm_trans.png">
	</div>	
	<div id="main">
		<h1>Ajouter un etudiant</h1>
	</div>
	<hr>
</header>
<section>
	<div class="form">
		<form class="myForm" id="form" method="POST">
			<label>Entrer le code &nbsp &nbsp :</label>
			<input type="number" id="code" name="code" placeholder="Exemple: 59855" 
			value = "<?php echo $code ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['code']} </strong>" ?> </div> 
			<br>
			<label>Entrer le nom &nbsp &nbsp &nbsp:</label>
			<input type="text" id="nom"name="nom" placeholder="Entrer le nom ici" 
			value = "<?php echo $nom ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['nom']} </strong>" ?> </div> 
			<br>
			<label>Entrer le prenom:</label>
			<input type="text" id="prenom" name="prenom" placeholder="Entrer le prenom ici" value = "<?php echo $prenom ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['prenom']} </strong>" ?> </div>			
			<br>									
			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
	</div>
	<hr>
</section>

<nav id="mainNavbar">
	<ul>
		<li><a href="index.php">Acceuil</a></li>
		<li><a href="#main">Ajouter un etudiant</a></li>
	</ul>
</nav>
<hr>

<?php 	

require('templates/footer.php');

 ?>



</body>
</html>