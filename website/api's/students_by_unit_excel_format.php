<?php
require('../html/templates/config.php');
if(isset($_GET['id_module'])){
    $id_module=$_GET['id_module'];
  }

$sql="SELECT e.code_etudiant, e.nom, e.prenom  FROM etudiants e INNER JOIN etudiant_module m ON e.code_etudiant =m.code_etudiant WHERE m.id_module= '$id_module'; ";


$result = mysqli_query($conn, $sql);

    $etudiants=[];
    while( $etudiant = mysqli_fetch_assoc($result)){
        $etudiants[]=$etudiant;
    }
  
//echo json_encode($modules); 

//header("Content-type:application/vnd.ms-excel");
//header('Content-Disposition: attachment; filename=liste_etudiants_'.$module.'.xls');?> 

<!DOCTYPE html>
<html>
<head>
	<title>Liste des etudiants du module </title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
-->
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("../html/templates/header.php");

	 ?>		
<hr>
<?php
	include('../html/templates/nav.php');
?>
<hr>
	<div id="main">
		<h1>Liste des etudiants du module <?php echo "$id_module"; ?></h1>
	</div>
	<hr>
</header>
<section>
<form method="POST" id="convert_form" action="export.php">
<table border="solid" id="table_content">
<tr>
<td>Code etudiant</td>
<td>Nom</td>
<td>Prenom</td>
</tr>

<?php foreach ($etudiants as $e) { ?>
		 
		 
         <tr>
             <td> <?= $e["code_etudiant"] ?> </a></td>
             <td> <?= $e["nom"] ?> </a></td>
             <td> <?= $e["prenom"] ?> </a></td>
                         
         </tr>	
 
     <?php } ?>
</table>
<input type="hidden" name="file_content" id="file_content" />
<button type="button" name="convert" id="convert" class="btn btn-primary">Convert</button>
</form>	
    <hr>
</section>

<?php
	include('../html/templates/nav2.php');
?>	
<hr>

<?php 
	include('../html/templates/footer.php');
 ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</body>
</html>

<script>
$(document).ready(function(){
 $('#convert').click(function(){
    var table_content = '<table>';
    table_content += $('#table_content').html();
    table_content += '</table>';
    $('#file_content').val(table_content);
    $('#convert_form').submit();
  });
});
</script>

