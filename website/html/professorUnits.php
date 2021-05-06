<?php
if(isset($_GET["codeP"])){
    $code=$_GET["codeP"];
}
require('templates/config.php');
$sql="SELECT m.nom_module, m.id_module, m.id_semestre FROM modules m INNER JOIN professeurs p ON p.code_prof=m.code_prof WHERE p.code_prof='$code'";
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

<h1>Modifier l'etudiant&nbsp&nbsp: <?=$code?></h1>
<center>
  
    <table border='table'>

    <tr>
    <td>Code</td>
    <td> Module</td>
    <td>Semestre</td>
    
    </tr>
  <?php  foreach($modules as $m){?>
        <tr>
        
        <td><?=$m["id_module"]?></td>
        <td><?=$m["nom_module"]?></td>
        <td><?=$m["id_semestre"]?></td>
       

       </tr>
   
   <?php }?>

    </table>
  
</center>

</body>
<?php 	

require('templates/nav.php');

 ?>
<?php 
	include('templates/footer.php');
 ?>
</html>
