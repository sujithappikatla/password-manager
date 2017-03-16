<?php

include 'connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));
$result = mysqli_fetch_array($res);
$rows = mysqli_num_rows($res);

if($rows==1){
	setcookie("control",$result['username'],time()+3600, '/', NULL, 0 );
	echo 'true';
}else{
	echo 'false';
}

?>