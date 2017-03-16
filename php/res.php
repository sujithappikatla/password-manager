<?php
require 'connection.php';

$id = $_POST['id'];
$query = 'SELECT * FROM '.$_COOKIE["control"].' WHERE id='.$id.'';
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));
$result = mysqli_fetch_array($res);




echo '
		<div class="panel-group" id="panels">
				<div class="panel panel-primary">
					<div class="panel-heading">Username/Email</div>
					<div class="panel-body">'.$result['username'].'</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">Password</div>
					<div class="panel-body">'.$result['password'].'</div>
				</div>
				
			</div>
			<div class="panel panel-primary" id="panels">
					<div class="panel-heading">Comments</div>
					<div class="panel-body">'.$result['comments'].'</div>
			</div>';
?>