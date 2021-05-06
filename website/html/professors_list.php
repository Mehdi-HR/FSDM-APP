<?php	


require('templates/data.php');



?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste des professeurs</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("templates/header.php");

	 ?>		
<?php
	include('templates/nav.php');
?>
	<div id="main">
		<h1>Liste des professeurs: </h1>
	</div>
</header>
<section>
<center>
	    <table border="table" cellspacing="1px" cellpadding="5px">
			<thead>
				<tr>
					<th>Code</th> 
					<th>Nom</th>
					<th>Prenom</th>
					<th>CIN</th>
					<th>Email</th>
					<th>Details</th>					

				</tr>
			</thead>
			<tbody>
				<?php 
                    for ($i=0; $i <count($professeurs) ; $i++) {
						$code = $professeurs[$i]['code_prof'];
				 	echo "
					 	<tr>
                            <td>$code</td>
					 		<td>{$professeurs[$i]['prenom']}</td>
					 		<td>{$professeurs[$i]['nom']}</td>
					 		<td>{$professeurs[$i]['cin']}</td>
					 		<td>{$professeurs[$i]['email']}</td>
					 		
					 		
					 		<td>";
					 ?>		
					<a style = "text-decoration: none;" class= 'details' href='professor_details.php?codeP=<?=$code?>'> ... </a>
					<?php  
					echo"  </td>
					 	</tr>
					";
				 } 
				 ?>																			
			</tbody>
		</table>
	
	
</center>


</section>


<?php
	include('templates/nav2.php');
?>	

<?php 
	include('templates/footer.php');
 ?>

</body>
</html>