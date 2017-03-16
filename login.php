<!DOCTYPE html>
<head>
	<title>PASSWORD-MANAGER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style2.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css"/>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	
</head>
<body>
	<div id="shader"></div>
	<nav class="navbar navbar-inverse">
	  <div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>                        
		  </button>
		  <a class="navbar-brand" href="#">PASSWORD-MANAGER</a>
		 </div>
		<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
		  
		  <li><a href="#">About</a></li>
		  
		</ul>
		<ul class="nav navbar-nav navbar-right">
		  
		  <li><a href="#" data-toggle="modal" data-target="#myModal">Register</a></li>
		  <li><a >&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
		</ul>
	  </div>
	  </div>
	</nav>
	
	
	<div id="loginform">
		
					<div class="progress" id="pgs">
					<div id ="pgs" class="progress-bar progress-bar-striped active" role="progressbar"
						aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						
					</div>
					</div>
				  <div class="form-group">
					<label for="email">Username/Email</label>
					<input type="text" class="form-control" id='lusername' name="username">
				  </div>
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id='lpassword' name="password">
				  </div>
				 
				  <div id="lfb"></div>
				  <input type="submit" value="LOG-IN" id="submit" class="form-control" name="submit">
		
	
	</div>
	<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

			
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Register a Account</h4>
			  </div>
			  <div class="modal-body">
				<div class="progress" id="regpgs">
					<div id ="pgs" class="progress-bar progress-bar-striped active" role="progressbar"
						aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						
					</div>
				</div>
				<div class="form-group">
					<label for="email">Full Name</label>
					<input type="text" class="form-control" id="name" name="name">
				  </div>
				  <div class="form-group">
					<label for="email">Username</label>
					<input type="text" class="form-control" id="username" name="username">
					<div id="usercheck"></div>
				  </div>
				  <div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email">
				  </div>
				  <div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" id="password" name="password">
				  </div>
				  <div class="form-group">
					<label for="pwd">Confirm Password:</label>
					<input type="password" class="form-control" id="cnfpassword" name="cnfpassword">
				  </div>
				  <div class="form-group">
					<label for="pwd">Mobile No:</label>
					<input type="mobile" class="form-control" id="mobile" name="mobile">
				  </div>
				  <div id="fb"></div>
				  <input type="submit" value="Register" id="submit1" class="form-control" name="submit1">
					<div id="fb"></div>
				
			  </div>
			  
			</div>

		  </div>
	</div>

	
	<script>
	$("#pgs").hide();
	$("#regpgs").hide();
	$(document).ready(function(){
		$("#pgs").hide();
		$("#regpgs").hide();
		
		$("#lusername").keyup(function(){
			user = $("#lusername").val();
			$.post("php/checkuser.php",{username:user}).done(function(data){
				if(data=="false"){
					$("#lusername").css({"border-color":"green","border-width":"2px"});	
				}
				if(data=="true"){	
					$("#lusername").css({"border-color":"red","border-width":"2px"});
				}
				
			});
		});
		
		$("#submit").click(function(){
			$("#pgs").show();
			usernam = $.trim($("#lusername").val());
			
			passwor = $.trim($("#lpassword").val());
			

			if(usernam!="" && passwor!="" ){
				$.post( "php/loginer.php", {username:usernam,password:passwor}).done(function( data ) {
					
					if(data=="true"){
						window.location.replace("index.php");
					}else{
						$("#pgs").hide();
						$("#lfb").html("</h4><center>Credentials doesn\'t match</center></h4>");
						
					}
					
				});
			}else{
				$("#pgs").hide();
				$("#lfb").html("</h4><center>Fill all fields</center></h4>");
			}
		});
		
		
		
		
		$("#username").keyup(function(){
			user = $("#username").val();
			$.post("php/checkuser.php",{username:user}).done(function(data){
				if(data=="false"){
					$("#username").css({"border-color":"red","border-width":"2px"});
					$("#usercheck").html('<h6><center>username already exists</center></h6>');
				}
				
				
				if(data=="true"){
					$("#usercheck").html('');
					$("#username").css({"border-color":"green","border-width":"2px"});
				}
				
			});
		});
		
		
		
		
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
		$("#submit1").click(function(){
			$("#regpgs").show();
			nam = $.trim($("#name").val());
			usernam = $.trim($("#username").val());
			emai = $.trim($("#email").val());
			passwor = $.trim($("#password").val());
			mobil = $.trim($("#mobile").val());

			if(nam!="" && usernam!="" && emai!="" && passwor!="" && mobil!=""){
				$.post( "php/register.php", { name: nam,username:usernam,email:emai,password:passwor,mobile:mobil}).done(function( data ) {
					$("#regpgs").hide();
					$("#name").val("");
					$("#username").val("");
					$("#email").val("");
					$("#password").val("");
					$("#cnfpassword").val("");
					$("#mobile").val("");
					$("#fb").html(data);
					
				});
			}else{
				$("#regpgs").hide();
				$("#fb").html("</h4>Fill all fields</h4>");
			}
		});
	});
	
	
	</script>
	
</body>