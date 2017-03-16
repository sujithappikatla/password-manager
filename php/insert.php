<?php
if(isset($_POST['submit'])){
	$account = $_POST['account'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$comments = $_POST['comments'];
	
	$query = "INSERT INTO ".$_COOKIE["control"]."(website_name,username,password,comments) VALUES('".$account."','".$username."','".$password."','".$comments."')";
	mysqli_query($conn,$query) or die(mysqli_error($conn));
	
}


?>