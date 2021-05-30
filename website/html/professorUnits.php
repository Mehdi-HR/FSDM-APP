<?php
 session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) { 
if(isset($_GET["codeP"])){
    $code=$_GET["codeP"];
}
require('templates/config.php');
$sql="SELECT m.nom_module, m.id_module, m.id_semestre, p.annee_universitaire FROM professeur_module p INNER JOIN modules m ON p.id_module = m.id_module  WHERE code_prof = '$code';" ;
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

<h1>Modules du professeur&nbsp&nbsp: <?=$code?></h1>
<center>
  
    <table border='table'>

    <tr>
    <td>Code</td>
    <td> Module</td>
    <td>Semestre</td>
    <td>Annee Universitaire</td>
    
    </tr>
  <?php  foreach($modules as $m){?>
        <tr>
        
        <td><?=$m["id_module"]?></td>
        <td><?=$m["nom_module"]?></td>
        <td><?=$m["id_semestre"]?></td>
       <td><?=$m["annee_universitaire"]?></td>

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
<?php 
}else {
 header("Location: index.php");
}
?>

</html>