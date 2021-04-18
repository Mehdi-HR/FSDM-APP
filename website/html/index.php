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
		<li><a href="add_professor.php">Ajouter un professeur</a></li>
		<li><a href="add_unit.php">Ajouter un module</a></li>		
		</h1> <li><a href="logout.php">Logout</a></li>	
		<h1  style="font-size: 1rem; text-align: center; "><?=$_SESSION['user_full_name']?>
	</ul>
</nav>
<hr>

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
