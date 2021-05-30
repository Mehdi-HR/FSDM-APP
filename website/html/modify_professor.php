<?php
 session_start();
require('templates/data.php');
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
	

if (isset($_GET['codeP'])) {
	$codeP = $_GET['codeP'];
    $professor=getProfByCode($codeP);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le professeur&nbsp&nbsp: <?=$professor['code_prof']?></title>
</head>
<body>
<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Modifier le professeur&nbsp&nbsp: <?=$professor['code_prof']?></h1>
	</div>
</header>
<section>
	<div class="form">
	
	<form class="myForm" action="update_professor.php" id="form" method="POST">
			
			<!--code-->
			<input type="hidden" id="code_prof" name="code_prof" value ="<?=$professor['code_prof']?>" ><br>
            <br>
			

			<!--nom-->
			<label>Entrer le nom &nbsp &nbsp &nbsp:</label>
			<input type="text" id="nom"name="nom"  value = "<?=$professor['nom']?>" required><br>
			<br>
			<!--prenom-->
			<label>Entrer le prenom:</label>
			<input type="text" id="prenom" name="prenom" value = "<?=$professor['prenom']?>" required><br>
			<br>

			<!--cin-->	
			<label>Entrer le cin  &nbsp &nbsp &nbsp :</label>
			<input type="text" id="cin" name="cin" placeholder="Entrer le cin ici" value = "<?=$professor['cin']?>" required> <br>
            <br>

			<!--email-->
			<label>Entrer l'email  &nbsp &nbsp :</label>
			<input type="text" id="email" name="email"  value = "<?=$professor['email']?>" required> <br><br>
			

			
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