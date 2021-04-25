<?php	


require('templates/data.php');



?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste des modules</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("templates/header.php");

	 ?>		
	 <hr>
	 <?php
	include('templates/nav.php');
?>
<hr>
	 
	<div id="main">
		<h1>Liste des modules: </h1>
	</div>
	<hr>
</header>
<section>

	    <table border="table" cellspacing="1px" cellpadding="5px">
			<thead>
				<tr>
					<th>Id_Module</th> 
					<th>Nom module</th>
					<th>Id_filiere</th>
					<th>Details</th>
										

				</tr>
			</thead>
			<tbody>
				<?php 
                    for ($i=0; $i <count($modules) ; $i++) {
				 	echo "
					
					 	<tr>
                            <td>{$modules[$i]['id_module']}</td>
					 		<td>{$modules[$i]['nom_module']}</td>
					 		<td>{$modules[$i]['id_filiere']}</td>
					 		
					 		
					 		<td>";
					 ?>		
					<a style = "text-decoration: none;" class= 'details' href='unit_details.php?id_module=<?=$modules[$i]['id_module']?>'> ... </a>
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
	include('templates/nav2.php');
?>	
<hr>

<?php 
	include('templates/footer.php');
 ?>

</body>
</html>