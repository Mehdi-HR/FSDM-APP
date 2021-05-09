<!DOCTYPE html>
<html>
<head>
    <title>Uploads</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
    <?php 

        include("../html/templates/header.php");

     ?>
<nav id="mainNavbar">
<ul style="padding-left: 27%">
    <li><a href="../html/index.php">Acceuil</a></li>
    <li><a href="../html/courses_list.php">Liste des etudiants</a></li>
    <li><a href="../html/professors_list.php">Liste des professeurs</a></li>
    <li><a href="../html/units_list.php">Liste de modules</a></li>
    <li><a href="./index.php">Ressources</a></li>

</ul>

</nav>

    <div id="main">
        <h1>Uploads : </h1>
    </div>

</header>


<section>
        
<table  cellspacing="1px" cellpadding="5px">

<?php

$files = scandir("uploads");

for ($a = 2; $a < count($files); $a++)
{
    ?>
    
        <tr>
            
            <td><?php echo $files[$a]; ?></td>

                <td>        
                    <a href="uploads/<?php echo $files[$a]; ?>" download="<?php echo $files[$a]; ?>">Download
                    </a>
                </td>
                <td>        
   <a href="delete.php?name=uploads/<?php echo $files[$a]; ?>" style="color: red;">
                Delete
            </a>
                </td>    
        </tr>

    <?php
}

?>
</table>

</section>    

<section>
    
<div class="form">
<form class="myForm" id="form" method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" value="Upload">
</form>
</div>    
</section>

<?php 
    include('../html/templates/footer.php');
 ?>
</body>
</html>

