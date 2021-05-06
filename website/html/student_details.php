<?php 

if (isset($_GET['codeE'])) {
	$code = $_GET['codeE'];
}

require('templates/data.php');

$etudiant = getStudentByCode($code);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details de l'etudiant : <?=$code?></title>
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
		<h1>Details de l'etudiant : <?=$code?> </h1>
	</div>
	<div style=" margin-left: 35%">
	    <table border="table" cellspacing="1px" cellpadding="5px">
	    	<?php foreach ($etudiant as $key => $value) {
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
	    <div>
		    <ul>
		    	<li><a  style="color: #E31215; padding-left:14%" 
		    			href="modify_student.php?codeE=<?=$code?>">Modifier</a></li>
		    	<li><a  style="color: #E31215;padding-left:4%" 
		    			href="delete_student.php?codeE=<?=$code?>">Supprimer</a></li>	    							
				<li><a  style="color: #E31215;padding-left:4%" 
		    			href="studentUnits.php?codeE=<?=$code?>">Modules</a></li>			    			
		    </ul>	    	
	    </div>
</header>


<?php 
	include('templates/footer.php');
 ?>

</body>
</html>