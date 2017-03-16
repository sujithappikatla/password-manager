<?php
require 'connection.php';

$id = $_POST['id'];

if($id>0){
	$query = 'SELECT * FROM '.$_COOKIE["control"].' WHERE id='.$id.'';
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));
$result = mysqli_fetch_array($res);


echo ' <div class="form-group">
						<label for="email">Account Name</label>
						<input type="text" class="form-control" name="account" value="'.$result['website_name'].'">
					  </div>
						<div class="form-group">
						<label for="email">Username/Email</label>
						<input type="text" class="form-control" name="username" value="'.$result['username'].'">
					  </div>
					  <div class="form-group">
						<label for="pwd">Password:</label>
						<input type="text" class="form-control" name="password" value="'.$result['password'].'">
					  </div>
					  <div class="form-group">
						<label for="pwd">Comments:</label>
						<textarea rows="5" cols="100" class="form-control" name="comments" >'.$result['comments'].'</textarea>
					  </div>
					  
					  <input type="submit" value="Update Account" id="submit" class="form-control" name="submit1" id="click">';

}



?>