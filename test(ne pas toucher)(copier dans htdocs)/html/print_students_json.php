<?php 

	require('templates/config.php');
	$sql = "SELECT * FROM test";
	$result = mysqli_query($conn,$sql);

	$array = [];
	while($row = mysqli_fetch_assoc($result)){
		$array[] =  $row;
	}

	$json_array = json_encode($array);
	print_r($json_array);
 ?>