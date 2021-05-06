<?php
if(isset($_GET["codeE"])){
    $code=$_GET["codeE"];
}
require('templates/config.php');
$sql="SELECT nom_module, e.id_module, etat, id_semestre, e.note FROM etudiant_module e INNER JOIN modules m ON e.id_module=m.id_module WHERE e.code_etudiant='$code'";
$result=mysqli_query($conn,$sql);
$modules=[];
if ( false===$result ) {
    printf("error: %s\n", mysqli_error($conn));
  }else{
while($module=mysqli_fetch_assoc($result)){
    $modules[]=$module;
}
//echo json_encode($modules); 
  }

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modules</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<?php 

		include("templates/header.php");

	 ?>

<body>
<?php 	

require('templates/nav.php');

 ?>
<h1>Modules de l'etudiant&nbsp&nbsp: <?=$code?></h1>
<center>    

    <table border='table'>

    <tr>
    <td>Code</td>
    <td> Module</td>
    <td>Semestre</td>
    <td>Etat</td>
    <td>Note</td>
    </tr>
  <?php  foreach($modules as $m){?>
        <tr>
        
        <td><?=$m["id_module"]?></td>
        <td><?=$m["nom_module"]?></td>
        <td><?=$m["id_semestre"]?></td>
        <td><?=$m["etat"]?></td>  
        <td><?=$m["note"]?></td>    

    </tr>
   
   <?php }?>

    </table>

</center>

</body>

<?php 
	include('templates/footer.php');
 ?>
</html>
 