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
		<p> Bienvenue dans la page d'accueil de notre application Web. Vous pouvez gerer d'une maniere tres aisee la base de donnees des etudiants. En accedant a la liste, vous pouvez voir le detail d'un etudiant et le modifier ou le supprimer. A partir du menu, vous pouvez ajouter un nouveau etudiant ou afficher toute la liste. 
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
