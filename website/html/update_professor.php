<?php
if(isset($_POST['envoyer'])){

$id= $_POST['code_prof'];
echo $id;
require('templates/config.php');
//UPDATE PROFESSOR
	$sql = "UPDATE professeurs SET nom='$_POST[nom]' ,prenom='$_POST[prenom]',  cin='$_POST[cin]', email='$_POST[email]'
    WHERE code_prof ='$id' ;";
 $result = mysqli_query($conn, $sql);
 if ( false===$result ) {
   printf("error: %s\n", mysqli_error($conn));
 }
 else {
   echo '     Professors UPDATED.';
 }
 //UPDATE UTILISATEURS
 $sql2 = "UPDATE utilisateurs SET nom='$_POST[nom]' ,prenom='$_POST[prenom]',  cin='$_POST[cin]', email='$_POST[email]'
 WHERE code ='$id' ;";
 $result2 = mysqli_query($conn, $sql2);
if ( false===$result2 ) {
    printf("error: %s\n", mysqli_error($conn));
  }
  else {
    echo '      Utilisateurs UPDATED.';
  }





}
header("refresh:2;url=professor_details.php?codeP=$id");
?>