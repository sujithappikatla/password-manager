<?php
$query = 'SELECT * FROM '.$_COOKIE["control"].'';
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));



while($result = mysqli_fetch_array($res) ){
	
	if($result['website_name']!="Password-Manager"){
		echo '<option class="dd" value="'.$result['id'].'"><center>'.$result['website_name'].'</center></option>';
	}
	
}



?>