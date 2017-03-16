<?php
	require 'connection.php';
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	
	$query = "INSERT INTO users(name,username,password,email,mobile) VALUES('".$name."','".$username."','".$password."','".$email."','".$mobile."')";
	
	
	
	$que = "CREATE TABLE ".$username." (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  website_name varchar(255) NOT NULL,
		  username varchar(255) NOT NULL,
		  password varchar(255) NOT NULL,
		  comments longtext NOT NULL,
		  PRIMARY KEY (id)
		)";
	
	mysqli_query($conn,$que) or die(mysqli_error($conn));
	mysqli_query($conn,$query) or die(mysqli_error($conn));
	
	$q = "INSERT INTO ".$username."(website_name,username,password) VALUES('Password-Manager','".$username."','".$password."')";
	
	mysqli_query($conn,$q) or die(mysqli_error($conn));
	echo '<h4><center>User Created</center></h4>';



?>