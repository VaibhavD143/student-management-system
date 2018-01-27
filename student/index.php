<?php
	session_start();
	if(!isset($_SESSION['studentid']))
	{
		die("unauthorised");
	}
	$studentid=$_SESSION['studentid'];
?>
<html>
<head>
	<title>Student Side</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<style>

#option1 , #option3 {
	background-image:url('images/ddu-logo.png');
	background-size:25% 30%;
	background-repeat: no-repeat;
	background-attachment: fixed;
    background-position: 64% 50%;
    background-color: hsla(0,0%,100%,0.90);
    background-blend-mode: overlay;
    background-repeat: no-repeat;
}
#option2{
	background-image:url('images/notice_board.jpg');
	background-repeat: no-repeat; 
	background-size: 100% 100%;
}
.notice_board{
	color:black;
}

.student_tab{
	color:powderblue;
	font-size:1.2em;
	font-weight:500;
}

#nav_back{
	background-image:url('images/ddu2.jpg');
	background-size:100% 100%;
	background-color: hsla(0,0%,100%,0.30);
    background-blend-mode: overlay;
}
</style>	  
	  
</head>
<body>

	<header>
		<div class="row" >
		<ul id="nav-mobile" class="side-nav fixed tabs" >
			<div id="nav_back" style="">
			<br>
			<br>
			<img src="./../images/main/<?php echo $studentid; ?>" alt="Profil Picture" height="100px" width="100px" class="circle"/>
			<br>
			
			<span style="font-size:1.5em;color:white;"><b>&emsp;Hello <?php echo $_SESSION['firstname'];?></b></span>
			<br>
			<span style="font-size:em;color:white;">&emsp;&nbsp;&nbsp;<?php echo $_SESSION['username'];?></span>
			<hr>
			</div>
			<br>
			<li class="bold tab col s12"><a href="#option1" class="waves-effect waves-teal active"><span class="student_tab">About</span></a></li>
			<li class="bold tab col s12"><a href="#option3" class="waves-effect waves-teal"><span class="student_tab">Attendance</span></a></li>
			<li class="bold tab col s12"><a href="#option2" class="waves-effect waves-teal"><span class="student_tab">Notice Board</span></a></li>
			<li class="bold tab col s12"><a href="#option4" class="waves-effect waves-teal"><span class="student_tab">
			<div align="center">
				<button class="btn btn-default" onclick="logout()">Logout</button>
			</div></span></a></li>
		</ul>
		</div>
	</header>		
	<div style="padding-left:325px;">
			<div id="option1" class="col s12">
				<br>
				<?php 
									
					include('connection.php');
					$query="SELECT * FROM student_info WHERE studentid=\"".$studentid."\"";
					$result=$conn->query($query);
					$row=$result->fetch_assoc();
				?>

				<center>
				<table style="width:90%;" class="bordered highlight" >
				  <tr>
					<th >Student id:</th>
					<td><?php echo $row['studentid'];?></td>
					<td ><input disabled="disabled"  type="button" id="btn1" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  
				  <tr>
					<th>Username:</th>
					<td ><?php echo $row['username'];?></td>
					<td><input type="button" id="btn2"  class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Firstname:</th>
					<td ><?php echo $row['firstname'];?></td>
					<td><input type="button" id="btn3" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Lastname:</th>
					<td ><?php echo $row['lastname'];?></td>
					<td><input type="button" id="btn4" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Birthdate:</th>
					<td ><?php echo $row['birthdate'];?></td>
					<td><input type="button" id="btn5" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Gender:</th>
					<td ><?php echo $row['gender'];?></td>
					<td><input type="button" id="btn6" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Email:</th>
					<td ><?php echo $row['emailid'];?></td>
					<td><input type="button" id="btn7" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Mobile no:</th>
					<td ><?php echo $row['mno'];?></td>
					<td><input type="button" id="btn8" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				  <tr>
					<th>Address:</th>
					<td ><?php echo $row['address'];?></td>
					<td><input type="button" id="btn9" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
				  </tr>
				</table>
				</center>
				<br><br>
			
				
				<br>	
				
			<div id="modal_edit" class="modal">
				<form action="change_field_s.php" method="post">
					<div class="modal-content">
					  <h4>Edit Field</h4>
					  <input readonly type="text" value="<?php echo $studentid;?>" name="studentid"/>
					  <input readonly class="field_name" type="text" value="not selected" name="field_name"/>
					  <input type="text" name="new_value" placeholder="Enter new value"/>
					</div>
					<div class="modal-footer">
					  <button type="submit"	class="modal-action modal-close waves-effect waves-green btn-flat">Submit</button>
					</div>
				</form>
			</div>
				
			</div>
			
			
			
			<div id="option2" class="notice_board white-text" style="height:100%;" >
				<br>
				<center>
				<h3><b>NOTICE BOARD</b></h3>
				</center>
				<div style="padding-left:35px;">
				<?php
					include('connection.php');
					
					$query="SELECT * FROM notice";
				
					$result=$conn->query($query);
					$con=1;
					if($result->num_rows > 0)
					{
							while($row=$result->fetch_assoc())
							{
							?>
							<h5><span><?php echo $con.")  "; ?></span><span><?php	echo "<b>".$row['notice_subject']."</b><br>";?></span></h5>	
							<span>&emsp;&emsp;&emsp;&emsp;<?php	echo $row['notice_body']."<br>";?></span>
							<!--<span><?php	echo $row['notice_time']."<br>";?></span>-->
							<span style="padding-left:850px;">
							<?php	
								$query="SELECT * FROM teacher_info WHERE teacherid='".$row['teacherid']."'";
								$res=$conn->query($query);
								if(!$res->num_rows > 0)
								{
									die("coudnt fetch teacher name in notice");
								}
								$r=$res->fetch_assoc();
								echo "-- &nbsp".$r['firstname']." ".$r['lastname'];
								 
							?></span>
							
						
							
							<?php	$con++;
							}
					}
					else
					{
						echo "No notice";
					}
				?>
				</div>
			</div>
			<div id="option3" style="width:98%;height:100%;"	>
				<?php
					include('connection.php');
					$query="SHOW TABLES LIKE 'T%';";
					$res=$conn->query($query);
				?>
				<table class="striped centered" >
					<thead>
					  <tr>
						  <th>Subject Name</th>
						  <th>Total</th>
						  <th>Present</th>
						  <th>Percentage</th>
					  </tr>
					</thead>
					<tbody>
					<?php
					while($row=$res->fetch_assoc())
					{
						
						if( $row['Tables_in_student_managment (T%)'] != "teacher_info" )
						{	
							$query="SELECT COUNT(*) AS num_rec FROM ".$row['Tables_in_student_managment (T%)'];
							$result=$conn->query($query);
							$r=$result->fetch_assoc();
							$num_rec=(int)$r['num_rec'];
							$query="SELECT COUNT(".$studentid.") AS pre_num FROM ".$row['Tables_in_student_managment (T%)']." WHERE ".$studentid."='p';";
							$result=$conn->query($query);
							$ro=$result->fetch_assoc(); 
								
							$pre_num=(int)$ro['pre_num'];
							
							
					?>	
					

					  <tr>
						<td ><?php echo $row['Tables_in_student_managment (T%)'];?></td>
						<td><?php echo $num_rec;?></td>
						<td><?php echo $pre_num;?></td>
						<td><?php 
						if($num_rec != 0)
							echo $pre_num/$num_rec;
						else
							echo '0';
						?></td>
					  </tr>

			
				<?php
						}	
					}
				?>
					</tbody>
				</table>
			</div>
		
	</div>
	
  
        
	
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   
 
 <script>
	
	function logout()
	{
		location.href='./../index.php';
	}
	
	$(".button-collapse").sideNav();

	$('.edit_clicked').click(function()
	{
		var btn_field={btn1:"teacherid",btn2:"username",btn3:"firstname",btn4:"lastname",btn5:"birthdate",btn6:"gender",btn7:"emailid",btn8:"mno",btn9:"address"};
		//alert();
		var bid=this.id;
		$(".field_name").val(btn_field[bid]);
		//alert($(this).attr('id'));
		
		//alert(bid);
		//alert("in");
	});
	
	$(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
	
 </script>
 
</body>
</html>