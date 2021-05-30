<?php
 session_start();
if (!(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))){
  header("Location: index.php");
} 
require('templates/data.php');
require('templates/config.php');

if(isset($_GET['id_module'])){
    $id_module=$_GET['id_module'];
  }

if(isset($_POST['annee_universitaire'])){
  $annee_choisie = $_POST['annee_universitaire'];    
}
else{
  $annee_choisie = getActualUniYear();
}

$condition = "";
if($annee_choisie == getActualUniYear()){
  $condition = "AND 
  (upper(m.etat) != upper('non inscrit'))";
}
if($annee_choisie < getActualUniYear()){
  $condition = "AND 
  (upper(m.etat) = upper('non valide')OR upper(m.etat) = upper('valide'))";  
}

$sql="SELECT e.code_etudiant, e.nom, e.prenom, m.note ,m.etat FROM etudiants e INNER JOIN etudiant_module m ON e.code_etudiant =m.code_etudiant WHERE m.id_module= '$id_module'".$condition."AND m.annee_universitaire = '$annee_choisie';";
 

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

	<div id="main" >
		<h1>Liste des etudiants du module <?php echo "$id_module"; ?></h1>
	</div>
  <div style="  margin-left: 90%">
    <form method="POST">
        <select id="annee_universitaire" name="annee_universitaire" onchange="this.form.submit();">
            <?php foreach ($annees_universitaires as $annee_universitaire) { ?>
              <option value="<?=$annee_universitaire?>" <?php if($annee_universitaire==$annee_choisie) echo "selected"; ?>><?=$annee_universitaire?></option>
            <?php } ?>
        </select>

    </form>
  </div>
      <div style="  display: flex;
  justify-content: center;">
      <form method="POST" id="convert_form" action="../api's/export.php">
<table border="solid" id="table_content">
<thead>
  
<tr>
<th>Code etudiant</th>
<th>Nom</th>
<th>Prenom</th>
<th>Etat</th>
<th>Note</th>
</tr>

</thead>

<tbody>
  
<?php foreach ($etudiants as $e) { ?>
     
     
         <tr>
             <td> <?= $e["code_etudiant"] ?> </a></td>
             <td> <?= $e["nom"] ?> </a></td>
             <td> <?= $e["prenom"] ?> </a></td>
             <td> <?= $e["etat"] ?> </a></td>             
             <td> <?= $e["note"] ?> </a></td>
                         
         </tr>  
 
     <?php } ?>

</tbody>

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

</html>
