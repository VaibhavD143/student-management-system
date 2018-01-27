<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Student Login</title>
 
  

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
      <link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  
</head>

<body>
  <div class="container">
  <div class="login">
  	<h1 class="login-heading">
      Please Enter Username</h1>
	  <label id="wrong_label" style="color:red;font-size:0.9em;display:none;">Username/Password is wrong!</label>
      <form action="forget_pass.php" method="post">
        <input type="text" name="username" placeholder="Username" required="required" class="input-txt" />
          <input type="text" name="emailid" placeholder="Email Id" required="required" class="input-txt" />
          <div class="login-footer">
             
            <button type="submit" class="btn-default btn btn--right"><span style="position:relative;top:-13px;">Submit</span>  </button>
    
          </div>
      </form>
  </div>
</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   
     <script src="js/index.js"></script>

</body>
</html>
