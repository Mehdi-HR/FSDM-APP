<?php	
 session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 

require('templates/data.php');

if(isset($_GET['id_filiere'])){

	$filiere=$_GET['id_filiere'];
}
$modules=getUnitsOfCourse($filiere);



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
	 <?php
	include('templates/nav.php');
?>
	 
	<div id="main">
		<h1>Liste des modules: </h1>
	</div>
</header>
<section>
<center>	

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



</center>

</section>

<div style="padding-left : 20%">	
<?php
	include('templates/nav2.php');
?>

</div>
	


<?php 
	include('templates/footer.php');
 ?>
  <?php 
}else {
 header("Location: index.php");
}
?>
</body>
</html>