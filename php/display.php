<?php

$query = 'SELECT * FROM '.$_COOKIE["control"].'';
$res =mysqli_query($conn,$query) or die(mysqli_error($conn));
$num= mysqli_num_rows($res);


while($result = mysqli_fetch_array($res) ){
	echo '<div class="tag" id="'.$result['id'].'">
		<span>'.$result['website_name'].'</span>
		</div>';
}
?>