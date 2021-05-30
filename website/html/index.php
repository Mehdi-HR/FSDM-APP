<?php 
  session_start();

  if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
?>
<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
<?php  

include("templates/header.php");

?>
	<div id="main">
		<h1>Gestion des etudiants</h1>
	</div>
	<div class="paragraph">
		<p> Bienvenue dans la page d'accueil de l'application web designee pour l'administration de la faculte des sciences Dhar ElMehraz.
			<br>
		Autant qu'administrateur, l'application:
		<br>
		-Vous donne acces aux tables des etudiants,des professeurs ainsi que des modules.	
		<br>
		-Vous permet d'ajouter/de modifier/de supprimer tout etudiant, professeur ou module de la FSDM.
		<br>	
		-Vous permet de telecharger la liste des etudiants inscrits actuellement a chaque module et entrer leurs notes par l'intermediaire d'Excel. 
		<br>
		-Vous permet aussi d'affecter a tout moment, un module au professeur qui l'enseigne.
		<br>		
		-Vous offre la possibilite de telecharger sur le site des differentes ressources accessibles par les etudiants(emplois du temps,planning d'Examen...). 
		<br>
		-Vous permet de publier des annonces aux utilisateurs de la FSDM APP.
		<br>
			<strong>Testez!</strong></p>
	</div>

</header>
<?php
include('templates/nav.php');	
?>


<?php 	

require('templates/footer.php');

 ?>

</body>
</html>
<?php 
}else {
   header("Location: login.php");
}
 ?>
