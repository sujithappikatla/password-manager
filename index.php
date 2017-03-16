<!DOCTYPE html>
<head>
	<title>PASSWORD-MANAGER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>
<body>
	<?php require 'php/connection.php'; ?>
	<?php require 'php/insert.php'; ?>
	<?php require 'php/update.php'; ?>
	<?php require 'php/updateprofile.php'; ?>
	<div id="shader"></div>
	<?php
	
	if(isset($_COOKIE["control"])){
		echo '
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand">PASSWORD-MANAGER</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="">Home</a></li>
			
			<li><a href="" data-toggle="modal" data-target="#myModal">Add New Account</a></li>
			<li><a href="" data-toggle="modal" data-target="#myModal2" id="edt">Edit Passwords</a></li>
		  </ul>
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="" data-toggle="modal" data-target="#myModal3" ></span>Edit Profile</a></li>
			<li><a  id="logout">Log out</a></li>
			<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Account</h4>
			  </div>
			  <div class="modal-body">
				<form action="index.php" method="post">
				
				<div class="form-group">
					<label for="email">Account Name</label>
					<input type="text" class="form-control" name="account">
				  </div>
				  <div class="form-group">
					<label for="email">Username/Email</label>
					<input type="text" class="form-control" name="username">
				  </div>
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="text" class="form-control" name="password">
				  </div>
				  <div class="form-group">
					<label for="pwd">Comments:</label>
					<textarea rows="7" cols="100" class="form-control" name="comments"></textarea>
				  </div>
				  
				  <input type="submit" value="ADD NEW ACCOUNT" id="submit" class="form-control" name="submit">
				</form>
			  </div>
			  
			</div>

		  </div>
	</div>
	
	
	
	
	<div id="myModal3" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Change Profile</h4>
			  </div>
			  <div class="modal-body">
				<form action="index.php" method="post">
				<div class="form-group">
					<label for="email"> Name</label>
					<input type="text" class="form-control" name="name">
				  </div>
				  
				  <div class="form-group">
					<label for="pwd">New Password:</label>
					<input type="password" class="form-control" id="password" name="password">
				  </div>
				  <div class="form-group">
					<label for="pwd">Confirm Password:</label>
					<input type="password" class="form-control" id="cnfpassword" name="cnfpassword">
				  </div>
				  
				  
				  <input type="submit" value="Change" id="submit" class="form-control" name="submit3">
				</form>
			  </div>
			  
			</div>

		  </div>
	</div>
	
	
	
	
	
	
	
	
	
	
	<div id="myModal2" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Account</h4>
			  </div>
			  <div class="modal-body">
				<form action="index.php" method="post">
				<div class="form-group">
					<label for="email">Select Account</label>
					<select name="dropdown" class="form-control">
						<option value="0">SELECT</option>'; ?>
						<?php require 'php/options.php'; ?>
					<?php echo '	
					</select>
				  </div>
				<div id="retpart">
					
				</div> 
				</form>
			  </div>
			  
			</div>

		  </div>
	</div>
	
	<div class="clse" ><h2>X</h2></div>
	
	<div id="mainbox">
		<div id="tags">';?>
			<?php
			
			 require 'php/display.php'
			?>
			
		<?php echo'	
		
		</div>
		
		<div id="data">
			
			
		</div>
		
		
	
	</div>';
		
		
		
		
		
	}else{
		header('Location:login.php');
	}
	

	?>
	
	
	<script>
		
		$(document).ready(function(){
			
			
			$("#cnfpassword").keyup(function(){
			pass = $("#password").val();
			cnfpass = $("#cnfpassword").val();
			if(pass!=cnfpass){
				$("#cnfpassword").css({"border-color":"red","border-width":"2px"});
			}
			if(pass==cnfpass){
				$("#cnfpassword").css({"border-color":"green","border-width":"2px"});
			}
			});
			
			$("#logout").click(function(){
				
				$.post( "php/logout.php",{}).done(function( data ) {
					window.location.replace("login.php");
				});
			});
			
			$(".tag").click(function(){
				iid = $(this).attr('id');
				
				$.post( "php/res.php", { id: iid}).done(function( data ) {
					$("#data").html(data);
				});
				
				$( "#tags" ).slideUp( "slow");
				$( "#data" ).css({"display":"block"});
				
				$( "#data" ).slideDown( "slow");
				$( ".clse" ).css({"display":"block"});
			});
			$(".clse").click(function(){
				
				$( ".clse" ).css({"display":"none"});
				$( "#tags" ).slideDown( "slow");
				//$( "#data" ).css({"display":"none"});
				$( "#data" ).slideUp( "slow");
				
			});
			
			
				$( "select" ).change(function () {
				
				$( "select option:selected" ).each(function() {
				  str = $(this).attr('value');
				});
				
				$.post( "php/retreive.php", { id: str}).done(function( data ) {
					$("#retpart").html(data);
				});
				}).change();
			
			
			
			
		});
	
	</script>
	
	
</body>