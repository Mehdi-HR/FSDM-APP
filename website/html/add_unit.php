<?php 

    require('templates/config.php');

    $code_p = ''; 
    $nom = ''; 
    $id_f = '';
    $id_m = '';
	$errors = ['code_p'=>'', 'nom'=>'', 'id_f'=>'', 'id_m'=>''];
	if(isSet($_POST['envoyer']))
	{
		$nom = mysqli_real_escape_string($conn,trim($_POST['nom']));
		$id_m = mysqli_real_escape_string($conn,trim($_POST['id_m']));
		$id_f = mysqli_real_escape_string($conn,trim($_POST['id_f']));
		$code_p = intval(mysqli_real_escape_string($conn,trim($_POST['code_p'])));

		
		//id_m
		if(empty($id_m)){
			$errors['id_m'] = 'Veuillez entrer un id de module';
		}else{
			if (!preg_match('/^([A-Za-z][0-9]{3})$/', $id_m)) {
				$errors['id_m'] = 'Veuillez entrer un id de module valide';
				}	
			
		}

		//nom
		if(empty($nom)){
			$errors['nom'] = 'Veuillez entrer un nom';
		}else{
			if (!preg_match('/^([A-Za-z0-9\s])+$/', $nom)) {
				$errors['nom'] = 'Veuillez entrer un nom valide';
				echo "test";
				}	
		}		


		//code
		if(empty($code_p)){
			$errors['code_p'] = 'Veuillez entrer un code de professeur';
		}else{
			if ($code_p < 1) {
				$errors['code_p'] = 'code > 0 !!!';
				}	
        }
        
		//id_f
		if(empty($id_f)){
			$errors['id_f'] = 'Veuillez entrer un id de filiere';
		}else{
			if (!preg_match('/^[A-Za-z]{3}$/', $id_f)) {
				$errors['id_f'] = 'Veuillez entrer un id de module valide';
				}	
		}	



	if( !array_filter($errors) ){
		$sql = "INSERT INTO modules(id_m,nom_m,id_f,code_p) VALUES ('$id_m','$nom','$id_f','$code_p');";
		if( mysqli_query($conn,$sql) ){
			header('Location: index.php');
		}else{
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
	<title>Ajouter un module</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<div class="headerBG"> 
		<img src="../images/fsdm_trans.png">
	</div>	
	<div id="main">
		<h1>Ajouter un module</h1>
	</div>
	<hr>
</header>
<section>
	<div class="form">
		<form class="myForm" id="form" method="POST">
			
            <!--id_m-->
			<label>Entrer le id_m &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :</label>
			<input type="text" id="id_m" name="id_m" placeholder="Entrer l' id ici" value = "<?php echo $id_m ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['id_m']} </strong>" ?> </div>
			<br>

			<!--nom-->
			<label>Entrer le nom &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp :</label>
			<input type="text" id="nom"name="nom" placeholder="Entrer le nom ici" 
			value = "<?php echo $nom ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['nom']} </strong>" ?> </div> 
			<br>		

			<!--code-->
			<label>Entrer le code du prof :</label>
			<input type="number" id="code_p" name="code_p" placeholder="Exemple: 59855" 
			value = "<?php echo $code_p ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['code_p']} </strong>" ?> </div> 
			<br>

            <!--id_f-->
			<label>Entrer le id_f &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  :</label>
			<select class="mySelect" id="id_f" name="id_f" >
				<option>SMI</option>
				<option>SMA</option>
				<option>SVI</option>
				<option>STU</option>
				<option>SMP</option>
				<option>SMC</option>				
			</select>			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['id_f']} </strong>" ?> </div>
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
		<li><a href="add_student.php">Ajouter un etudiant</a></li>
		<li><a href="add_professor.php">Ajouter un professeur</a></li>
		<li><a href="#main">Ajouter un module</a></li>

	</ul>
</nav>
<hr>

<?php 	

require('templates/footer.php');

 ?>



</body>
</html>