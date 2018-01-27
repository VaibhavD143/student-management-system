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
		
		$stmt=$conn->prepare("INSERT INTO student_info (studentid,firstname,lastname,gender,emailid,mno,address,birthdate,username,password) VALUES (?,?,?,?,?,?,?,?,?,?)");
		$stmt->bind_param("ssssssssss",$studentid,$firstname,$lastname,$gender,$emailid,$mno,$address,$birthdate,$username,$password);
		$studentid=$_POST['sid'];
		$firstname=$_POST['fname'];
		$lastname=$_POST['lname'];
		$gender=$_POST['gender'];
		$emailid=$_POST['emailid'];
		$mno=$_POST['mobileno'];
		$address=$_POST['address'];
		$birthdate=$_POST['bdate'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		//print_r($_FILES);
		//echo $_SESSION['rest_id'];
		

		
		
		
		
		if($stmt->execute())
		{
			$query="SHOW TABLES LIKE 'T%';";
			$res=$conn->query($query);
			while($row=$res->fetch_assoc())
			{
				//echo $row['Tables_in_student_managment (T%)'];
				if( $row['Tables_in_student_managment (T%)'] != "teacher_info" )
				{	$query="ALTER TABLE `".$row['Tables_in_student_managment (T%)']."` ADD `".$studentid."` VARCHAR(1) NOT NULL DEFAULT 'p'";
					if(!$conn->query($query))
					{
						echo "Error <br>".$conn->error;
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
								</html>
								");

					}
				}	
			}
			$target_dir = "images/main/";
			$target_file = $target_dir .$studentid.".".basename($_FILES["picture"]["type"]);
			$uploadOk = 1;
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				echo "in1";
				$check = getimagesize($_FILES["picture"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			//$file_pattern="owner_images/main/".$_SESSION['rest_id'].".*";
			//array_map("unlink", glob( $file_pattern ));
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			}
			else 
			{
				if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) 
				{
					echo '<script type="text/javascript">
						mymodal();
						</script>';
					die("	<html>
							<body>
							<p>Successfully created...<p>
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
							</html>
							");
			
				}
				else 
				{
					echo "	<html>
							<body>
							<p>You will be redirected in <span id='counter'>5</span> second(s).</p>
							<script type='text/javascript'>
							function countdown() {
								var i = document.getElementById('counter');
								if (parseInt(i.innerHTML)<=0) {
									location.href = 'index.php?var=2';
								}
								i.innerHTML = parseInt(i.innerHTML)-1;
							}
							setInterval(function(){ countdown(); },1000);
							</script>
							</body>
							</html>
							";
				}
			}
		}
		else
		{
			echo "Error <br>".$conn->error;
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
#abc {
	height: 150px;
	width: 150px;
}

</style>
</head>

<body>

	<div class="header_regi">
	<br>
	<br>
		<h2 style="margin:0;padding-left:15px;color:white;">Registration Form</h2>
	
	<br>
	</div>
	
	
	<div class="form_regi">
    <br>
	<br>
	<br>
	<br>
	<form id="reg_form" class="col s12" action="" method="POST" enctype="multipart/form-data">
	
	
	<div  align="right" >
	
		<?php echo "<img id='abc' src='images/sample.png' alt='select image' /><br/>"; ?>      
	</div>
	
	<div class="file-field input-field">
      <div class="btn">
        <span>File</span>
		<input type="file" accept="image/*" id="picture" name="picture" onchange="fn(this);">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
	  
	  
	  
	  <div class="row">
        <div class="input-field col s12">
          <input  id="first_name" type="text" class="validate" name="sid" pattern="[sS][1-9]+" title="Must start with 'S'">
          <label for="first_name">Student Id</label>
        </div>
	  </div>
	  
	  
	  <div class="row">
        <div class="input-field col s6">
          <input  id="first_name" type="text" class="validate" name="fname" pattern="[a-zA-Z]+" title="Firstname is must be in Alphabets"/>
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" name="lname" pattern="[a-zA-Z]+" title="Lastname is must be in Alphabets" />
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
			<input id="last_name" type="text" class="validate" name="mobileno" pattern="^[789]\d{9}$" title="Invalid Mobile Number"/>
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
		<div class="input-field col s6">
			<input id="last_name" type="text" class="validate" name="username" />
			<label for="last_name">Username</label>
		</div>
		
		<div class="input-field col s6">
          <input id="password" type="password" class="validate" name="password"pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="Minimum 8 characters at least 1 Alphabet and 1 Number"/>
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
<script>
     function fn(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#abc').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</html>
<?php } ?>