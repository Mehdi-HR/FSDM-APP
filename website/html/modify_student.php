<?php
require('templates/data.php');

if (isset($_GET['codeE'])) {
	$codeE = $_GET['codeE'];
    $etudiant=getStudentByCode($codeE);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'etudiant</title>
</head>
<body>
<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Modifier l'etudiant&nbsp&nbsp: <?=$etudiant['code_etudiant']?></h1>
	</div>
	<hr>
</header>
<section>
	<div class="form">
	<form class="myForm" action="update_student.php" id="form" method="POST">
			
			<!--code-->
			<input type="hidden" id="code" name="code" value ="<?=$etudiant['code_etudiant']?>" ><br>
            <br>
			

			<!--nom-->
			<label>Entrer le nom &nbsp &nbsp &nbsp:</label>
			<input type="text" id="nom"name="nom"  value = "<?=$etudiant['nom']?>" required><br>
			<br>
			<!--prenom-->
			<label>Entrer le prenom:</label>
			<input type="text" id="prenom" name="prenom" value = "<?=$etudiant['prenom']?>" required><br>
			<br>

			<!--cin-->	
			<label>Entrer le cin  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cin" name="cin" placeholder="Entrer le cin ici" value = "<?=$etudiant['cin']?>" required> <br>
            <br>

			<!--email-->
			<label>Entrer l'email  &nbsp &nbsp :</label>
			<input type="text" id="email" name="email"  value = "<?=$etudiant['email']?>" required> <br><br>
			

			<!--cne-->
			<label>Entrer le cne  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cne" name="cne" placeholder="Entrer le cne ici" value = "<?=$etudiant['cne']?>" required> <br><br>
					

			<!--id_filiere-->
			<label>Entrer la filiere  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cne" name="id_filiere" placeholder="Entrer le cne ici" value = "<?=$etudiant['id_filiere']?>" required> <br>
			
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