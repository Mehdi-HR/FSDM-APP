<?php 
 session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 

if (isset($_GET['id_module'])) {
	$code = $_GET['id_module'];
}

require('templates/data.php');

$module =  getUnitById($code);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details de l'module : <?=$code?></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("templates/header.php");  ?>

	 <?php
	include('templates/nav.php');
?> 
	 
	<div id="main">
		<h1>Details du module : <?=$code?> </h1>
	</div>
<center>
<div>
	    <table border="table" cellspacing="1px" cellpadding="5px">
	    	<?php foreach ($module as $key => $value) {
	    		$Key = ucfirst($key);
	    		echo " 
	    			<tr> 
		    			<td class = 'keys'> <strong> $Key </strong></td>
		    			<td> $value </td>
	    			</tr>
	    			 ";
	    	}
	    	?>
	    </table>	

	</div>

	</center>
	
	    <div>
		    <ul style="padding-left: 30%">
		    	<li><a  style="color: #E31215; " 
		    			href="modify_unit.php?id_module=<?=$code?>">Modifier</a></li>
		    	<li><a  style="color: #E31215;padding-left:4%" 
		    			href="delete_unit.php?id_module=<?=$code?>">Supprimer</a></li>
				<li><a  style="color: #E31215;padding-left:4%" 
		    			href="unit_students.php?id_module=<?=$code?>">Liste des etudiants </a></li>
				<li><a  style="color: #E31215;padding-left:4%" href="affect_grades.php?id_module=<?=$code?>">Gerer les notes</a></li>								    	
		    </ul>	    	
	    </div>
</header>


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