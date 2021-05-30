<?php 

if(preg_match('/students/',$_SERVER['SCRIPT_FILENAME'])){
    $link = "add_student.php";
    $txt = "Ajouter etudiant";
}
if(preg_match('/units/',$_SERVER['SCRIPT_FILENAME'])){
    $link = "add_unit.php";
    $txt = "Ajouter module";
}
if(preg_match('/professors/',$_SERVER['SCRIPT_FILENAME'])){
    $link = "add_professor.php";
    $txt = "Ajouter professeur";
}
?>
<nav id="secondaryNavbar">
<ol>
   <center><li ><a href=<?=$link?>> <?=$txt?></a></li></center> 
</ol>
</nav>

 