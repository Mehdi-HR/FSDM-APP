<?php 

if (isset($_GET['codeP'])) {
	$code = $_GET['codeP'];
}

require('templates/data.php');

$professeur = getProfByCode($code);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Details du professeur : <?=$code?></title>
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
		<h1>Details du professeur : <?=$code?> </h1>
	</div>
	<div>
<center>
	
   <table border="table" cellspacing="1px" cellpadding="5px">
	    	<?php foreach ($professeur as $key => $value) {
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

</center>
	 

	</div>
	    <div>
		    <ul>
		    	<li><a  style="color: #E31215; padding-left:12%" 
		    			href="modify_professor.php?codeP=<?=$code?>">Modifier</a></li>
		    	<li><a  style="color: #E31215;padding-left:4%" 
		    			href="delete_professor.php?codeP=<?=$code?>">Supprimer</a></li>	    
				<li><a  style="color: #E31215;padding-left:4%" 
		    			href="professorUnits.php?codeP=<?=$code?>">Modules</a></li>	 		    				
		    </ul>	    	
	    </div>
</header>

<?php 
	include('templates/footer.php');
 ?>

</body>
</html>