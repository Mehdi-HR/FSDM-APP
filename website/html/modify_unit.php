<?php
require('templates/data.php');

if (isset($_GET['id_module'])) {
	$id_module = $_GET['id_module'];
    $module=getUnitById($id_module);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier module</title>
</head>
<body>

<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Modifier le module&nbsp&nbsp: <?=$module['id_module']?></h1>
	</div>
</header>
<section>
	<div class="form">


	<form class="myForm" action="update_unit.php" id="form" method="POST">
			
			<!--id_module-->
			<input type="hidden" id="id_module" name="id_module" value ="<?=$module['id_module']?>" ><br>
            <br>
			

			<!--nom_module-->
			<label>Nom du module:</label>
			<input type="text" id="nom_module"name="nom_module"  value = "<?=$module['nom_module']?>" disabled><br>
			<br>
			<!--id_filiere-->
			<label>Id de la filiere:&nbsp &nbsp</label>
			<input type="text" id="id_filiere" name="id_filiere" value = "<?=$module['id_filiere']?>" disabled><br>
			<br>

			<!--code_prof-->	
			<label>Entrer le code du professeur:   &nbsp &nbsp &nbsp </label>
			<input type="text" id="code_prof" name="code_prof" value = "<?=$module['code_prof']?>" > <br>
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



</body>
</html>