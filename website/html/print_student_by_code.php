<?php 

if (isset($_POST['code'])) {
	$code = $_POST['code'];
	require('../html/templates/config.php');
	$sql = "SELECT * FROM etudiants WHERE code = '$code'";
	$result = mysqli_query($conn,$sql);
	$student = mysqli_fetch_assoc($result);
	print_r(json_encode($student));

}

 ?>
