<?php	

if(isset($_GET["codeF"])){
	$id_filiere = $_GET["codeF"];
}
else{
	$id_filiere = 'SMI';	#filiere par defaut
}

require('templates/data.php');

//Calcul
$listeEtudiantsFiliere = getListeParFiliere($id_filiere);
$nbEtudiantsFiliere = count($listeEtudiantsFiliere);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste des etudiants</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("templates/header.php");

	 ?>		
	<div id="main">
		<h1>Liste des etudiants de la filiere: <?php echo "$id_filiere"; ?></h1>
	</div>
	<hr>
</header>
<section>

	    <table border="table" cellspacing="1px" cellpadding="5px">
			<thead>
				<tr>
					<th>Code</th> 
					<th>Nom</th>
					<th>Prenom</th>
					<th>CIN</th>
					<th>Email</th>
					<th>CNE</th>
					<th>Filiere</th>
					<th>Details</th>					

				</tr>
			</thead>
			<tbody>
				<?php
				for ($i=0; $i < $nbEtudiantsFiliere ; $i++) {
					$codeE = $listeEtudiantsFiliere[$i]['code_etudiant']; 
				 	echo "
					
					 	<tr>
						 	<td>$codeE</td>
					 		<td>{$listeEtudiantsFiliere[$i]['nom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['prenom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['cin']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['email']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['cne']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['id_filiere']}</td>
					 		<td>";
					 ?>		
					<a style = "text-decoration: none;" class= 'details' href='student_details.php?codeE=<?=$codeE?>'> ... </a>
					<?php  
					echo"  </td>
					 	</tr>
					";
				 } 
				 ?>																			
			</tbody>
		</table>

	<hr>
</section>

<?php
	include('templates/nav.php');
?>
<hr>

<?php 
	include('templates/footer.php');
 ?>

</body>
</html>