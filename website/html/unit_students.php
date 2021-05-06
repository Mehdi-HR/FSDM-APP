<?php
require('templates/config.php');
if(isset($_GET['id_module'])){
    $id_module=$_GET['id_module'];
  }

$sql="SELECT e.code_etudiant, e.nom, e.prenom, m.note  FROM etudiants e INNER JOIN etudiant_module m ON e.code_etudiant =m.code_etudiant WHERE m.id_module= '$id_module'AND 
  (upper(m.etat) = upper('inscrit') OR upper(m.etat) = upper('valide') OR upper(m.etat) = upper('reinscrit')) ;";


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
     <title>Liste des etudiants du module <?php echo "$id_module"; ?></title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="../css/style.css">
   </head>
   <body>
   <header id="mainHeader"> 
<?php 

include("templates/header.php");

?>
<?php
	include('../html/templates/nav.php');
?>

	<div id="main">
		<h1>Liste des etudiants du module <?php echo "$id_module"; ?></h1>
	</div>
      <div style="  display: flex;
  justify-content: center;">
      <form method="POST" id="convert_form" action="../api's/export.php">
<table border="solid" id="table_content">
<tr>
<td>Code etudiant</td>
<td>Nom</td>
<td>Prenom</td>
<td>Note</td>
</tr>

<?php foreach ($etudiants as $e) { ?>
		 
		 
         <tr>
             <td> <?= $e["code_etudiant"] ?> </a></td>
             <td> <?= $e["nom"] ?> </a></td>
             <td> <?= $e["prenom"] ?> </a></td>
             <td> <?= $e["note"] ?> </a></td>
                         
         </tr>	
 
     <?php } ?>
</table>
<input type="hidden" name="file_content" id="file_content" />
<button style = " margin-left:30%" type="button" name="convert" id="convert" class="btn btn-primary">Telecharger</button>
<br><br>
</form>	
          
      </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 

<?php
  include('templates/nav2.php');
?>   
	


<?php 
	include('templates/footer.php');
 ?>
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