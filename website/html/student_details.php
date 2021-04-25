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
	<div id="main">
		<h1>Details de l'etudiant : <?=$code?> </h1>
	</div>
	<hr>
	<div>
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
	    <div>
		    <ul>
		    	<li><a  style="color: #E31215; padding-left:18%" 
		    			href="modify_student.php?codeE=<?=$code?>">Modifier</a></li>
		    	<li><a  style="color: #E31215;padding-left:4%" 
		    			href="delete_student.php?codeE=<?=$code?>">Supprimer</a></li>	    	
		    </ul>	    	
	    </div>
	</div>
	<hr>
</header>
<?php
	include('templates/nav.php');
?>
<hr>

<?php 
	include('templates/footer.php');
 ?>

</body>
</html>