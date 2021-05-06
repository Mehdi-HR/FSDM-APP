<?php	//POUR ACCEDER A LA LISTE DES MODULES PAR FILIERES

require('templates/config.php');


$sql="SELECT nom_filiere ,id_filiere FROM filieres ; ";


$result = mysqli_query($conn,$sql);
if ( false === $result ) {
    printf("error: %s\n", mysqli_error($conn));
  }
//   else {
//     echo '     done.';
//   }


    $filieres=[];
    while( $filiere = mysqli_fetch_assoc($result)){
        $filieres[]=$filiere;
    }
    //echo json_encode($filieres); 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste des filieres</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
	<?php 

		include("templates/header.php");

	 ?>
	 <hr>
<?php
	include('templates/nav.php');
?>
<hr>
	<div id="main">
		<h1>Affichage des filieres : </h1>
	</div>
	<hr>
	<div class="liste">
		<h3>Cliquez sur une filiere pour voir les listes de modules</h3>
			<?php foreach($filieres as $f){?>
                 <a href="units_list.php?id_filiere=<?=$f['id_filiere']?>"><?=$f['nom_filiere']?></a><br>
                 
          
          
           <?php }

            
            ?>

	
	</div>
	<hr>
</header>


<?php 
	include('templates/footer.php');
 ?>

</body>
</html>