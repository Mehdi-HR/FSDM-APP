<!DOCTYPE html>
<html>
<head>
	<title>Acceuil</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<div class="headerBG"> 
		<img src="../images/fsdm_trans.png" height="300px" width="700">	
	</div>
	<div id="main">
		<h1>Gestion des etudiants</h1>
	</div>
	<hr>
	<div class="paragraph">
		<p> Bienvenue dans la page d'accueil de notre application Web. Vous pouvez gerer d'une maniere tres aisee la base de donnees des etudiants. En accedant a la liste, vous pouvez voir le detail d'un etudiant et le modifier ou le supprimer. A partir du menu, vous pouvez ajouter un nouveau etudiant ou afficher toute la liste. 
			<strong>Testez!</strong></p>
	</div>
	<hr>
</header>
<nav id="mainNavbar">
	<ul>
		<li><a href="#main">Acceuil</a></li>
		<li><a href="add_student.php">Ajouter un etudiant</a></li>
	</ul>
</nav>
<hr>

<?php 	

require('templates/footer.php');

 ?>

</body>
</html>