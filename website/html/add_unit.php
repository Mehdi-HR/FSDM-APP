<?php 
	require('templates/data.php');
    require('templates/config.php');

    $code_prof = ''; 
    $nom = ''; 
    $id_filiere = '';
    $id_module = '';
    $id_semestre = '';
	$errors = ['code_prof'=>'', 'nom'=>'', 'id_filiere'=>'', 'id_module'=>'','id_semestre'=>''];
	if(isSet($_POST['envoyer']))
	{
		$nom = mysqli_real_escape_string($conn,trim($_POST['nom']));
		$id_module = mysqli_real_escape_string($conn,trim($_POST['id_module']));
		$id_filiere = mysqli_real_escape_string($conn,trim($_POST['id_filiere']));
		$code_prof = intval(mysqli_real_escape_string($conn,trim($_POST['code_prof'])));
		$id_semestre = intval(mysqli_real_escape_string($conn,trim($_POST['id_semestre'])));
		
		//id_module
		if(empty($id_module)){
			$errors['id_module'] = 'Veuillez entrer un id de module';
		}else{
			if (!preg_match('/^([A-Za-z][0-9]{2})$/', $id_module)) {
				$errors['id_module'] = 'Veuillez entrer un id de module valide';
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
		if(empty($code_prof)){
			$errors['code_prof'] = 'Veuillez entrer un code de professeur';
		}else{
			if ($code_prof < 1) {
				$errors['code_prof'] = 'code > 0 !!!';
				}	
        }
        

        //id semestre
		if(empty($id_semestre)){
			$errors['id_semestre'] = 'Veuillez entrer un id de professeur';
		}else{
			if ($id < 1) {
				$errors['id_semestre'] = 'id_semestre > 0 !!!';
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
		$sql = "INSERT INTO modules(id_module,nom_module,id_filiere,code_prof,id_semestre) 
				VALUES ('$id_module','$nom','$id_filiere','$code_prof','$id_semestre');";
		if( mysqli_query($conn,$sql) ){
			$students= getListeParFiliere($id_filiere);
			foreach ($students as $student) {
				$code_etudiant = $student['code_etudiant'];
				$sql2 = "INSERT INTO etudiant_module(code_etudiant,id_module,etat) 
					VALUES ('$code_etudiant','$id_module','non inscris')";
				mysqli_query($conn,$sql2) or die("second query failed");		 
			}
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
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Ajouter un module</h1>
	</div>
	<hr>
</header>
<section>
	<div class="form">
		<form class="myForm" id="form" method="POST">
			
            <!--id_module-->
			<label>Entrer le id du module:</label>
			<input type="text" id="id_module" name="id_module" placeholder="Entrer l' id ici" value = "<?php echo $id_module ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['id_module']} </strong>" ?> </div>
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
			<input type="number" id="code_prof" name="code_prof" placeholder="Exemple: 59855" 
			value = "<?php echo $code_prof ?>" required>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['code_prof']} </strong>" ?> </div> 
			<br>

            <!--id_filiere-->
			<label>Choisir une filiere &nbsp &nbsp &nbsp &nbsp  :</label>
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
			<!--id_semestre-->
			<label>Choisir un semestre &nbsp &nbsp &nbsp &nbsp  :</label>
			<select class="mySelect" id="id_semestre" name="id_semestre" >
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				<option>6</option>				
			</select>			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['id_semestre']} </strong>" ?> </div>
			<br>
			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
	</div>
	<hr>
</section>
<?php 	

require('templates/nav.php');

 ?>
<hr>

<?php 	

require('templates/footer.php');

 ?>



</body>
</html>