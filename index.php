<?php
	error_reporting(E_ALL ^ E_WARNING);
	session_unset();
	session_destroy();
	//echo "hello";
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login/Logout animation concept</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
  

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
      <link rel="stylesheet" href="css/style.css">
<style>

body{
	background-image:url('images/ddu2.jpg');
	background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: 0% 0%; 
	background-size:100% 100%;
	border:5px solid white; 
}
#ddu-logo{
	position:relative;
	top:20px;
}
</style>
  
</head>
<body>
  <div class="co" >
  <div class="demo">
    <div class="login">
      <div id="ddu-logo" >
		<center>
		<img src="images/ddu-logo.png" alt="DDU LOGO" width="330px" height="270px"/>
		</center>
	  </div>
	 
      <div class="login__form">
		<h1 align="left" ><span style="color:#990000;font-size:1.2em;"><?php 
			if(isset($_GET['msg']))
				echo $_GET['msg'];
		?></span></h1>
	    <form action="authentication.php" method="post">
		<div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
          <input type="text" class="login__input name" placeholder="Username" name="studentname"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" class="login__input pass" placeholder="Password" name="password"/>
        </div>
		<a href="./forget/send_pass.php" style="color:white;">
			<span style="font-size:2.3em;position:relative;left:70px" align="right">I've forgotten something</span>
		</a>
        <input class="login__submit" type="submit" style="background-color:#246a75;padding:0px;margin-top:20px;" value="Sign in"/>
		<!--<button type="button" class="login__submit" onclick="authentication.php">Sign in</button> -->
        </form>
		<p class="login__signup">Don't have an account? &nbsp;<a href="registration.php">Sign up</a></p>
      </div>
    </div>
    
  </div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>


</body>
</html>
