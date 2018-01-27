<?php
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		include("connection.php");
		//echo "student id is:".$_POST['sid'];
		/*$temp=$_POST['sid'];
		if($conn->query("INSERT INTO student_info (studentid) VALUES ($temp)"))
		{
			echo "done";
		}*/
		//$conn->query("INSERT INTO student_info(studentid) VALUES (int($_POST['sid']))");
		/*if($conn->query("INSERT INTO student_info (studentid,firstname,lastname,gender,emailid,mno,address,birthdate,username,password) VALUES ($_POST['sid'],$_POST['fname'],$_POST['lname'],$_POST['gender'],$_POST['emailid'],$_POST['mobileno'],$_POST['address'],$_POST['bdate'],$_POST['username'],$_POST['password'])") == "TRUE")
		{
			echo "created";
		}
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}*/
		if($_POST['tid'] =="" or $_POST['qualification'] =="" or $_POST['subject'] =="" or $_POST['tid'] =="" or $_POST['fname'] == "" or $_POST['lname'] == "" or $_POST['gender'] == "" or $_POST['emailid'] == "" or $_POST['mobileno'] == "" or $_POST['address'] == "" or $_POST['bdate'] == "" or $_POST['username'] == "" or $_POST['password'] == "")
		{
			echo "Input field can't be empty";
			die("	<html>
					<body>
					<p>You will be redirected in <span id='counter'>5</span> second(s).</p>
					<script type='text/javascript'>
					function countdown() {
						var i = document.getElementById('counter');
						if (parseInt(i.innerHTML)<=1) {
							location.href = 'index.php';
						}
						i.innerHTML = parseInt(i.innerHTML)-1;
					}
					setInterval(function(){ countdown(); },1000);
					</script>
					</body>
					</html>");
		}
		
		
		$stmt=$conn->prepare("INSERT INTO teacher_info (teacherid,firstname,lastname,gender,emailid,mno,address,birthdate,username,password,subject,qualification) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssssss",$teacherid,$firstname,$lastname,$gender,$emailid,$mno,$address,$birthdate,$username,$password,$subject,$qualification);
		$teacherid=$_POST['tid'];
		$firstname=$_POST['fname'];
		$lastname=$_POST['lname'];
		$gender=$_POST['gender'];
		$emailid=$_POST['emailid'];
		$mno=$_POST['mobileno'];
		$address=$_POST['address'];
		$birthdate=$_POST['bdate'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$subject=$_POST['subject'];
		$qualification=$_POST['qualifications'];
		if(!$stmt->execute())
		{
			echo "Error:<br>" . $conn->error;
			echo "	<html>
					<body>
					<p>You will be redirected in <span id='counter'>5</span> second(s).</p>
					<script type='text/javascript'>
					function countdown() {
						var i = document.getElementById('counter');
						if (parseInt(i.innerHTML)<=0) {
							location.href = 'index.php';
						}
						i.innerHTML = parseInt(i.innerHTML)-1;
					}
					setInterval(function(){ countdown(); },1000);
					</script>
					</body>
					</html>
					";
		}
		else
		{
			$query="SELECT studentid FROM student_info WHERE 1";
			$res=$conn->query($query);
			
			$query="CREATE TABLE ".$teacherid." (`counter` int(3) NOT NULL AUTO_INCREMENT,`date` varchar(15) NOT NULL";	 
			
			while($row=$res->fetch_assoc())
			{
				//print_r($row);
				$query=$query.",".$row['studentid']." varchar(1) NOT NULL DEFAULT 'p'";
			}
			$query=$query.",PRIMARY KEY (`counter`))";
			if(!$conn->query($query))
			{
				echo "Error <br>".$conn->error;
				die( "	<html>
						<body>
						<p>You will be redirected in <span id='counter'>5</span> second(s).</p>
						<script type='text/javascript'>
						function countdown() {
							var i = document.getElementById('counter');
							if (parseInt(i.innerHTML)<=0) {
								location.href = 'index.php';
							}
							i.innerHTML = parseInt(i.innerHTML)-1;
						}
						setInterval(function(){ countdown(); },1000);
						</script>
						</body>
						</html>
						");
			}
			else
			{
				header('location:index.php?msg=1');
			}
		}
		
				
	}
	else
	{
?>

          

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
<style>
.header_regi{
	background-color:#26a69a;
	padding:0px;
	margin:0;
}
.form_regi{
	background-color:white;
	width:80%;
	position:relative;
	left:10%;
}

.header_topic{
	color:#AFAFAF;
	font-size:1.15em;
}
.radio_gender{
	position:relative;
	top:5;
}

.datepicker::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:#AFAFAF;
}
#reg_form{
	background-image:url('images/ddu-logo.png');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: 50% 50%;
	background-color: hsla(0,0%,100%,0.90);
    background-blend-mode: overlay;
	background-size:25% 30%;
}


</style>
</head>

<body >

	<div class="header_regi">
	<br>
	<br>
		<h2 style="margin:0;padding-left:15px;color:white;">Teacher Registration Form</h2>
	
	<br>
	</div>
	
	
	<div class="form_regi">
    <br>
	<br>
	<br>
	<br>
	<form id="reg_form" class="col s12" action="" method="POST">
      
	  <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" name="tid"pattern="[tT][1-9]+" title="Must start with 'T'">
          <label for="first_name">Teacher id</label>
        </div>
	  </div>
	  
	  
	  <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="fname" pattern="[a-zA-Z]+" title="Firstname is must be in Alphabets"/>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="lname" pattern="[a-zA-Z]+" title="Lastname is must be in Alphabets"/>
          <label for="last_name">Last Name</label>
        </div>
      </div>
	  <div class="row">
		
		<span class="header_topic col">Gender :</span>
		<div class="radio_gender">
			<p>
				<input class="with-gap" type="radio" id="test1" name="gender" value="male"/>
				<label for="test1">Male</label>
			</p>
			<p style="position:relative;left:86;">
				<input class="with-gap" type="radio" id="test2" name="gender" value="female"/>
				<label for="test2">Female</label>
			</p>
		</div>
	  </div>
	  
      
      <div class="row">
        <div class="input-field col s6">
          <input id="email" type="email" class="validate" name="emailid">
          <label for="email">Email</label>
        </div>
	
		<div class="input-field col s6">
			<input id="last_name" type="text" class="validate" name="mobileno" pattern="^[789]\d{9}$" title="Invalid Mobile Number" />
			<label for="last_name">Mobile no.</label>
		</div>
	  </div>
	  
	  <div class="row">
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea" name="address"></textarea>
          <label for="textarea1">Address</label>
        </div>
      </div>
	  <div class="row">
		<div class="col s12">
			<input placeholder="Birth-Date" type="date" class="datepicker" name="bdate">
		</div>
	  </div>
	  <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" name="subject">
          <label for="first_name">Subject</label>
        </div>
	  </div>
	  <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" name="qualifications">
          <label for="first_name">Qualifications</label>
        </div>
	  </div>	  
	  
      <div class="row">
		<div class="input-field col s6">
			<input id="last_name" type="text" class="validate" name="username"/>
			<label for="last_name">Username</label>
		</div>
		
		<div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 characters at least 1 Alphabet and 1 Number" />
          <label for="password">Password</label>
        </div>
      </div>

	  <!--
	  <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
	  <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div> -->
	  <div class="row">
		<div class="col s12">
			<button class="btn waves-effect waves-light" type="submit" name="action">Submit
				<i class="material-icons right">send</i>
			</button>
		</div>
	  </div>
    </form>
	</div>
	
	<!-- Compiled and minified JavaScript -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
	
</body>
<script>     
	$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 55 // Creates a dropdown of 15 years to control year
  });
  $('.disabled').trigger('autoresize');
</script>
</html>
<?php }?>