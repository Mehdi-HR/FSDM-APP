<?php	

if(isset($_GET["codeF"])){
	$filiere = $_GET["codeF"];
}
else{
	$filiere = 'SMI';	#filiere par defaut
}

require('templates/data.php');

//Calcul
$listeEtudiantsFiliere = getListeParFiliere($filiere);
$nbEtudiantsFiliere = count($listeEtudiantsFiliere);
$listeEtudiantsReussisFiliere = getListeReussisParFiliere($filiere);
$nbEtudiantsReussisFiliere = count($listeEtudiantsReussisFiliere);
$meilleurNoteFiliere = getMeilleurNoteParFiliere($filiere);
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
		<h1>Liste des etudiants de la filiere: <?php echo "$filiere"; ?></h1>
	</div>
	<hr>
</header>
<section>
	<div class="stats">
		<p>Nombre des etudiants reussis : <?php echo $nbEtudiantsReussisFiliere ; ?> 
			<br>
		Meilleur note : <?php echo $meilleurNoteFiliere ?>
		</p>		
	</div>
	<hr>
	    <table border="table" cellspacing="1px" cellpadding="5px">
			<thead>
				<tr> 
					<th>Nom</th>
					<th>Prenom</th>
					<th>Note</th>
					<th>Mention</th>					
					<th>Details</th>					

				</tr>
			</thead>
			<tbody>
				<?php
				for ($i=0; $i < $nbEtudiantsFiliere ; $i++) {
					$mention = getMention($listeEtudiantsFiliere[$i]['note']);
					$codeE = $listeEtudiantsFiliere[$i]['code']; 
				 	echo "
					
					 	<tr>
					 		<td>{$listeEtudiantsFiliere[$i]['nom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['prenom']}</td>
					 		<td>{$listeEtudiantsFiliere[$i]['note']}</td>
					 		<td>$mention</td>	
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