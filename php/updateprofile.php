<?php

if(isset($_POST['submit3'])){
	$name = $_POST['name'];
	$password = $_POST['password'];
	$cnfpassword = $_POST['cnfpassword'];
	
	if($password==$cnfpassword){
		$query = "UPDATE ".$_COOKIE["control"]." SET password='".$password."' WHERE id='1'";
		mysqli_query($conn,$query) or die(mysqli_error($conn));
		$que = "UPDATE users SET name='".$name."',password='".$password."' WHERE username='".$_COOKIE["control"]."'";
		mysqli_query($conn,$que) or die(mysqli_error($conn));
		
	}
	
}


?>