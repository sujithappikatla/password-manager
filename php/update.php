<?php
if(isset($_POST['submit1'])){
	$id = $_POST['dropdown'];
	$account = $_POST['account'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$comments = $_POST['comments'];
	
	$query = "UPDATE ".$_COOKIE["control"]." SET website_name='".$account."',username='".$username."',password='".$password."',comments='".$comments."' WHERE id='".$id."'";
	mysqli_query($conn,$query) or die(mysqli_error($conn));
	
}



?>