<?php
require('templates/config.php');
if(isset($_GET['id_module'])){
    $module=$_GET['id_module'];
  }

$sql="SELECT e.code_etudiant, e.nom, e.prenom  FROM etudiants e INNER JOIN etudiant_module m ON e.code_etudiant =m.code_etudiant WHERE m.id_module= '$module'; ";


$result = mysqli_query($conn, $sql);

    $modules=[];
    while( $module = mysqli_fetch_assoc($result)){
        $modules[]=$module;
    }
  

//echo json_encode($modules); 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student by Unit</title>
 <?php header("Content-type: 	application/vnd.ms-excel");
header('Content-Disposition: attachment; filename=liste_etudiants_'.$module.'.xls');?> 
</head>
<body>

<table border="solid">
<tr>
<td>Code etudiant</td>
<td>Nom</td>
<td>Prenom</td>
</tr>

<?php foreach ($modules as $m) { ?>
		 
		 
         <tr>
             <td> <?= $m["code_etudiant"] ?> </a></td>
             <td> <?= $m["nom"] ?> </a></td>
             <td> <?= $m["prenom"] ?> </a></td>
                         
         </tr>	
 
     <?php } ?>
</table>
    
</body>
</html>