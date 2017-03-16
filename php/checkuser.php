<?php
include 'connection.php';

$username = $_POST['username'];
$query = "SELECT * FROM users WHERE username='".$username."'";
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));
$rows = mysqli_num_rows($res);
if($rows==0){
	echo 'true';
}else{
	echo 'false';
}




?>