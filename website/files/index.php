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
     <hr>
<?php
    include('../html/templates/nav.php');
?>
<hr>
    <div id="main">
        <h1>Uploads : </h1>
    </div>
    <hr>

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
    <hr>

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

