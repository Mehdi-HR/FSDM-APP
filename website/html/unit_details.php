<?php 

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
	 <hr>
	 <?php
	include('templates/nav.php');
?>
<hr>
	 
	<div id="main">
		<h1>Details du module : <?=$code?> </h1>
	</div>
	<hr>
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
	    <div>
		    <ul>
		    	<li><a  style="color: #E31215; padding-left:18%" 
		    			href="modify_unit.php?id_module=<?=$code?>">Modifier</a></li>
		    	<li><a  style="color: #E31215;padding-left:4%" 
		    			href="delete_unit.php?id_module=<?=$code?>">Supprimer</a></li>	    	
		    </ul>	    	
	    </div>
	</div>
	<hr>
</header>


<?php 
	include('templates/footer.php');
 ?>

</body>
</html>