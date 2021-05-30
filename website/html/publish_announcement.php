<?php 


session_start();

if (!(isset($_SESSION['user_id']) && isset($_SESSION['user_email']))){
	header('Location: index.php');
}  
require('templates/config.php');

$title = ''; 
$content = ''; 


$errors = ['title'=>'', 'content'=>''];
if(isSet($_POST['envoyer']))
{
	$title = mysqli_real_escape_string($conn,trim($_POST['title']));
	$content = mysqli_real_escape_string($conn,trim($_POST['content']));
	

	//title
	if(empty($title)){
		$errors['title'] = 'Veuillez entrer un titre';
	}
	//content
	if(empty($content)){
		$errors['content'] = 'Veuillez entrer un contenu';
	}

if( !array_filter($errors) ){
	$date_publication = date('Y-m-d');

	$sql = "INSERT INTO annonces(titre,contenu,date_publication) 
			VALUES('$title','$content','$date_publication')";
	$result = mysqli_query($conn,$sql);
	if($result == true){
		header('Location: index.php');
	}else {
		printf("%s",mysqli_error($conn));		
		echo "failed to run insert query";
	}
}else{
	echo "bad user input";	
	}

mysqli_close($conn);		
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Publier une annonce</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header id="mainHeader"> 
<?php 

include("templates/header.php");

?>	
	<div id="main">
		<h1>Publier une annonce</h1>
	</div>
</header>
<section>
	<div class="form">
		<form class="myForm" id="form" method="POST">
			
			<!--titre-->
			<label>Entrer le titre &nbsp &nbsp :</label>
			<br>
			<textarea  id="title" name="title" maxlength="255" 
			value = "<?php echo $title ?>" required ></textarea> 
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['title']} </strong>" ?> </div> 
			<br>

			<!--contenu-->
			<label>Entrer l'article &nbsp &nbsp &nbsp:</label>
			<br>
			<textarea id="content"name="content" maxlength="20000"
			value = "<?php echo $content ?>" required>
			</textarea>
			<br>
			<div class="error" style="color:#E31215;" > <?php echo " <strong> {$errors['content']} </strong>" ?> </div> 
			<br>

			


			<input type="submit" id="submit" name="envoyer" value="Envoyer">	
			<input type="reset" name="annuler" value="Annuler">	
		</form>
	</div>
</section>

<?php 	

require('templates/nav.php');

 ?>

<?php 	

require('templates/footer.php');

 ?>


</body>
</html>