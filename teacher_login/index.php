<?php
error_reporting(E_ALL ^ E_WARNING);
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Teacher Login</title>
 
  

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
      <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

<style>
#sign_up{
	color:white;
	
}
#sign_up:hover{
	color:red;
}
</style>
  
</head>

<body>
  <div class="container">
  <div class="login">
  	<h1 class="login-heading">
      <strong>Welcome.</strong> Please login.</h1>
	  <label id="wrong_label" style="color:red;font-size:0.9em;display:none;">Username/Password is wrong!</label>
      <form action="" method="post">
        <input type="text" name="user" placeholder="Username" required="required" class="input-txt" />
          <input type="password" name="password" placeholder="Password" required="required" class="input-txt" />
          <div class="login-footer">
             <a href="send_pass.php" class="lnk">
              <span class="icon icon--min">ಠ╭╮ಠ</span> 
              I've forgotten something
            </a>
            <button type="submit" class="btn-default btn btn--right"><span style="position:relative;top:-13px;">Sign in</span>  </button>
    
          </div>
		  <div style="color:white;">
				<center>
					New User?
					<a href="registration.php" id="sign_up" ><u>Sign up</u></a>
				</center>
		  </div>
      </form>
  </div>
</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   
 
<?php
	if($_SERVER['REQUEST_METHOD']=="POST"){
		//include("connection.php");
		try{
			$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=student_managment','root','');
		
			$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$query1="select * from teacher_info where username=\"".$_POST['user']."\" AND password=\"".$_POST['password']."\"";
			$query=$dbhandler->query($query1);
			if($r=$query->fetch()){
				session_start();
				$_SESSION['uname']=$r['username'];
				$_SESSION['firstname']=$r['firstname'];
				$_SESSION['msg']="Welcome ".$r['firstname'];
				$_SESSION['auth']="nothing";
				//print_r($r);
				header("location:teacher/index.php");
			}
			else{
				echo "
				<script>
					$('#wrong_label').show();
				</script>
				";
			}
		}
		catch(PDOException $e){
		echo $e->getMessage();
		die();
		}
	}
?>  
<script>

<?php
	if(isset($_GET['msg']))
	{
?>
	
	Materialize.toast("Registration Successful",2000,'rounded');
<?php
	}
?>
</script>
	
    <script src="js/index.js"></script>

</body>
</html>
