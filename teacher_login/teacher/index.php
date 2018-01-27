<?php

session_start();
if(!isset($_SESSION['auth']))
{
	die('unauthorised access!');
}
	
$uname=$_SESSION['uname'];

include("connection.php");
$query="SELECT teacherid FROM teacher_info WHERE username=\"".$uname."\"";
$fired=$conn->query($query);
$r=$fired->fetch_assoc();
$tid=$r['teacherid'];


?>
<html>
<head>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

	<!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>








	
	<!-- Latest compiled and minified CSS 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	-->
	
<style>
.changeplaceholdercolor::-webkit-input-placeholder { /* WebKit, Blink, Edge */
    color:gray;
}

#logout_tab{
	
	color:gray;
}

.hideinputfields
{
	display:none;
}

#test1,#test2,#test4,#test3{
	background-image:url('images/ddu-logo.png');
	background-repeat: no-repeat;
	background-attachment: fixed;
	background-position: 50% 50%;
	background-color: hsla(0,0%,100%,0.90);
    background-blend-mode: overlay;
	background-size:25% 30%;
}

#test5_1{	
	background-image:url('images/notice_board.jpg');
	background-repeat: no-repeat;
	background-attachment: absolute;
	background-position: 50% 122%;
	background-color: hsla(0,0%,100%,0.20);
    background-blend-mode: overlay;
	background-size:100% 95%;
}
#totstudent {
border: 2px solid #a1a1a1;
    padding: 10px 40px; 
    background: #dddddd;
    width: 500px;
    border-radius: 25px;
}

</style>

</head>

<body>
	<div class="row">
    <div class="col s12 teal lighten-2" width="100%">
      <ul class="tabs tabs-transparent fixed ">
        <li class="tab col s3"><a class="active" href="#test1"><b>Search</a></li>
        <li class="tab col s3"><a  href="#test2">Attendence</a></li>
        <li class="tab col s2"><a href="#test4">Email</a></li>
        <li class="tab col s2 "><a href="#test3">About</a></li>
		<li class="tab col s2 "><a   href="#test5">Notice</b></a></li>
      </ul>
    </div>
	<div class="container">
    
	<div id="test1" class="col s12">
		<div class="row">
		<br>
		<br>
			
		<form action="index.php" method='post'>
		
		<div class="input-group col s5" >
			<input type="text" class="form-control changeplaceholdercolor" style="height:50px;font-size:20px;color:black;padding-left:15px;" placeholder="Search by Name..." onfocus="clear_area()" id="firstname" name="firstname">
		</div>
				<div class="col s1">
				</div>
		<div class="input-group col s6" >
			<input type="text" class="form-control changeplaceholdercolor" style="height:50px;font-size:20px;color:black;padding-left:15px;" placeholder="Search by Lastname..." onfocus="clear_area()" id="lastname" name="lastname">
		</div>
		
		
		<center>
		
						<div class="input-group-btn" style="padding-right:5px;">
							<input class="btn btn-default" type="button" name="b1" onclick="get('name')" value="submit"/>
							<i class="glyphicon glyphicon-search"></i>
						
						</div>
		</center>
		</form>
	
					<!--add icon image here
					<i class="glyphicon glyphicon-search"></i>
					-->
					<!--<button class="btn btn-default" name="b1" type="submit">
					
					</button>-->
					
		
		</div>
		<div>
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<form action="index.php" method='post'>
			<div class="input-group">
				<input type="text" class="form-control changeplaceholdercolor"  onfocus="clear_area()" style="height:50px;font-size:20px;color:black;padding-left:15px;" placeholder="Search by StudentId..." id="studentid" name="studentid">
				<center>
				<div class="input-group-btn" style="padding-right:5px;">
					<!--<input class="btn btn-default" type="submit" name="b2"/>-->
					<button class="btn btn-default" type="button" onclick="get('id')" name="b2">
					<i class="glyphicon glyphicon-search"></i>submit
					</button> 
				</div>
				</center>
			</div>
		</form>
		
		</div>
		<hr/>
		<br>
		<center>
		<img id="st_img" src="" alt="Profile Picture" height="100px" width="100px" style="display:none;"/>
		</center>
		<br>
	<table id="student_info_fadin" style="width:100%;display:none" class="bordered">
	  
	  <tr>
		<th>Student id:</th>
		<td id="st_id"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Username:</th>
		<td id="st_uname"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Firstname:</th>
		<td id="st_fname"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Lastname:</th>
		<td id="st_lname"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Birthdate:</th>
		<td id="st_bd"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Gender:</th>
		<td id="st_g"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Email:</th>
		<td id="st_e"></td>
		<td>
		<form action="mailer.php" method="post">
			<input hidden type="text" id="st_ef" value="noid@gmail.com" name="selected[]"/>
			<input type="text" name="tid" value="<?php echo $tid;?>" hidden/>
			<button data-target="modal2" class="btn btn-default" type="submit">Mail</button>
			
			<div id="modal2" class="modal modal-fixed-footer" >
				<div class="modal-content">
					<h5>Mail-Detail<h5>
					<div class="row">
						<div class="col s12 input-field">
							<input type="text" name="subject_mail" id="subject_mail"/>
							<label for="subject">Subject</label>
						</div>
					</div>
					<div class="row ">
						<div class="col s12 input-field">
							<textarea name="body_mail" class="materialize-textarea" id="body_mail"></textarea>
							<label for="body_mail">Body</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 input-field">
							<input type="password" name="password" id="password"/>
							<label for="password">Password</label>
						</div>
					</div>
				</div>
				

					<div class="modal-footer">
						<div class="input-group-btn" style="padding-right:5px;">
						<input class="btn btn-default" type="submit"  value="submit"/>
						<!--<i class="glyphicon glyphicon-search"></i> -->
						</div>
						
					</div>
				
			</div>
		</form>
		</td>
	  </tr>
	  <tr>
		<th>Mobile no:</th>
		<td id="st_mb"></td>
		<td></td>
	  </tr>
	  <tr>
		<th>Address:</th>
		<td id="st_ad"></td>
		<td></td>
	  </tr>
	</table>
	</div>
	
	<!--#test2-->
	
	<div id="test2"style="height:100%;" >
	<div class="row">
		<div class="col s12">
			<b><p id="totstudent" class="flow-text">Total No. of students are :&nbsp;&nbsp;<?php 
			include("connection.php");
			$query="select count(studentid) as num_rows from student_info";
			$res=$conn->query($query);
			$tot=$res->fetch_assoc();
			echo $tot['num_rows']; ?></p></b>
		</div>
	</div>
	<form id="attendenceform" action="insert_attendance.php" method="post">	
		
		<div class="row" >
			<div class="col s12 " >
				<div class="chips chips-placeholder"></div>
			</div>
		
		</div>
		<input id="inputdate" type="date" style="color:black;" placeholder="Date" class="datepicker" onchange="validationofdate()">
		<button id="attendencesubmission" type="button" onclick="proc()" class="btn btn-default disabled">
			click!
		</button>
	
		<p id="temp"></p>
		<br>
		<p class="attendance_table_fadein" id="temp2"></p>
		
		<table id="attendance_table" class="striped centered attendance_table_fadein">
		
		</table>
		<br>
		<center>
		<button id="attendenceconfirmation" type="submit" style="display:none;" class="attendance_table_fadein btn wave-effect wave-light">
			Confirm!
		</button>
		<button type="button" style="display:none;" class="attendance_table_fadein btn wave-effect wave-light" value="reset" onclick="location.reload()">
			Reset
		</button>
		</center>
	
	</form>
	</div>
    
	
	
	
	
	
	<div id="test3" class="container col s12">
		<div class="flow-text">
		<br>
		<center>
		<?php 
				include("connection.php");
				$query="SELECT * FROM teacher_info WHERE teacherid=\"".$tid."\"";
				$result=$conn->query($query);
				$row=$result->fetch_assoc();
		?>
		<h4>
		<?php
				echo "Hello ".$row['firstname']." ".$row['lastname'];
		?>
		</h4>
		</center>
		
		<table style="width:100%;" class="striped" >
		  <tr>
			<th >Teacher id:</th>
			<td><?php echo $row['teacherid'];?></td>
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
			<th>Subject:</th>
			<td ><?php echo $row['subject'];?></td>
			<td><input type="button" id="btn7" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
		  </tr>
		  <tr>
			<th>Qualification:</th>
			<td ><?php echo $row['qualification'];?></td>
			<td><input type="button" id="btn8" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
		  </tr>
		  <tr>
			<th>Email:</th>
			<td ><?php echo $row['emailid'];?></td>
			<td><input type="button" id="btn9" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
		  </tr>
		  <tr>
			<th>Mobile no:</th>
			<td ><?php echo $row['mno'];?></td>
			<td><input type="button" id="btn10" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
		  </tr>
		  <tr>
			<th>Address:</th>
			<td ><?php echo $row['address'];?></td>
			<td><input type="button" id="btn11" class="btn btn-default edit_clicked" data-target="modal_edit"  value="Edit"/></td>
		  </tr>
		</table>
		</div>
		<div id="modal_edit" class="modal">
			<form action="change_field.php" method="post">
				<div class="modal-content">
				  <h4>Edit Field</h4>
				  <input readonly type="text" value="<?php echo $tid;?>" name="teacherid"/>
				  <input readonly class="field_name" type="text" value="not selected" name="field_name"/>
				  <input type="text" name="new_value" placeholder="Enter new value"/>
				</div>
				<div class="modal-footer">
				  <button type="submit"	class="modal-action modal-close waves-effect waves-green btn-flat">Submit</button>
				</div>
			</form>
		</div>
		<br><br>
		<div align="right">
			
			<input type="button" onclick="log_me_out()" name="logout" value="Logout" class="btn btn-default"/>
		</div>
	</div>
    

	
	
	
	
	<div id="test4" class="col s12">
		<form action="mailer.php" method="post">
			<?php 
				include("connection.php");
				$query="SELECT * FROM student_info WHERE 1";
				$result=$conn->query($query);
				if($result->num_rows > 0)
				{
					
			?>
			<br><br><br>
			
			<table  style="width:100%;" class="striped">
			
			<thead>
			  <tr align="center">
				  <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student Id</th>
				  <th>Student Firstname</th>
				  <th>Student Lastname</th>
				  <th>&emsp;&emsp;&emsp;&emsp;&emsp;Email Id</th>
			  </tr>
			</thead>
			
			<?php
					while($row=$result->fetch_assoc())
					{
			?>
					
				<tr>
				<td>
					
					<input type="checkbox" value="<?php echo $row['studentid'];?>" id="<?php echo $row['studentid'];?>" name="selected[]"/>
					<label for="<?php echo $row['studentid'];?>" style="color:black;font-size:1em;"><?php echo $row['studentid'];?></label>
				</td>
				<td>
					<?php echo $row['firstname'];?>
				</td>
				<td>
					<?php echo $row['lastname'];?>
				</td>
				<td>
					<?php echo $row['emailid'];?>
				</td>
				</tr>

			<?php
		//				echo $row['studentid'];
					}
				}
				
				
				else
				{
						echo "fail in fetching table student_info";
				}
			?>
			
			<tr>
				<td>
					<input type="checkbox" value="checkAll" id="checkAll"/>
					<label for="checkAll" style="color:black;font-size:1em;">CHECKAll</label>
				</td>
			</tr>
			
			</table>
			<br>
			<input type="text" name="tid" value="<?php echo $tid;?>" hidden/>
			
			
			<!-- Modal Trigger -->
			<center>
			  <button data-target="modal1" type="button" class="btn">Mail</button>
			</center>
			<!-- Modal Structure -->
			<div id="modal1" class="modal modal-fixed-footer" >
				<div class="modal-content">
					<h5>Mail-Detail<h5>
					<div class="row">
						<div class="col s12 input-field">
							<input type="text" name="subject_mail" id="subject_mail"/>
							<label for="subject">Subject</label>
						</div>
					</div>
					<div class="row ">
						<div class="col s12 input-field">
							<textarea name="body_mail" class="materialize-textarea" id="body_mail"></textarea>
							<label for="body_mail">Body</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 input-field">
							<input type="password" name="password" id="password"/>
							<label for="password">Password</label>
						</div>
					</div>
				</div>
				

					<div class="modal-footer">
						<div class="input-group-btn" style="padding-right:5px;">
						<input class="btn btn-default" type="submit"  value="submit"/>
						<!--<i class="glyphicon glyphicon-search"></i> -->
						</div>
						
					</div>
				
			</div>



			<!--<center>
			<div class="input-group-btn" style="padding-right:5px;">
				<input class="btn btn-default" type="submit"  value="submit"/>
				<i class="glyphicon glyphicon-search"></i>
			</div>
			</center> -->
		</form>
		<?php
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
			if(isset($_POST['selected']))
				print_r($_POST['selected']);
		}
		?>
	</div>
	<div id="test5">
	<div id="test5_1" style="height:100%;">
		<br><br>
		<center>
		<h3 style="color:powderblue">Notice Board</h3>
		</center>
		<div style="padding-left:40px;">
			<?php
				include('connection.php');
				
				$query="SELECT * FROM notice";
				
				$result=$conn->query($query);
				$con=1;
				if($result->num_rows > 0)
				{
						while($row=$result->fetch_assoc())
						{
							echo $con.")";
							echo $row['notice_time']."<br>";
							echo $row['teacherid']."<br>";
							echo "<b>".$row['notice_subject']."</b><br>";
							echo $row['notice_body']."<br>";
							$con++;
						}
				}
				else
				{
					echo "No notice";
				}
			?>
		</div>
		
		
		
		</div>
		<br>
		<!-- Modal Trigger -->
			<center>
			 	<button data-target="notice_modal" class="btn waves-effect waves-light" type="button">
					<i class="material-icons left">add</i>Add
					<i class="material-icons right">add</i>
				</button>
			</center>
			<!-- Modal Structure -->
			<div id="notice_modal" class="modal modal-fixed-footer" >
				<div class="modal-content">
					<h5>Notice-Detail<h5>
					<div class="row">
					<form class="col s12" action="add_notice.php" method="post">
						<input hidden type="text" name="teacherid" value="<?php echo $tid;?>">
						<div class="row">
							<div class="input-field col s12">
							  <input id="notice_subject" type="text" name="notice_subject">
							  <label for="notice_subject">Subject</label>
							</div>
						</div>
						
						<div class="row">	
							<div class="input-field col s12">
								<textarea id="notice_body" class="materialize-textarea" name="notice_body"></textarea>
								<label for="notice_body">Body</label>
							</div>
						</div>
						
				</div>
				</div>
						<div class="modal-footer">
							<div align="right">
							<button class="btn waves-effect waves-light" type="submit" name="action">
								Add
							</button>
						</div>
					</form>					
					</div>
				
			</div>
	
	</div>
	
	
	
	
	
	
	
	
	
	</div>

  </div>
        
<!-- Bootstrap 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
 <!--Bootstrap-->
  
 
 
	<!-- Compiled and minified JavaScript -->
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   
 

 
 
 
  
	<script>

		Materialize.toast('<?php echo $_SESSION['msg'];?>',2000,'rounded');
						
		function log_me_out()
		{
			location.href = './../index.php';
		}
	
		$('.edit_clicked').click(function()
		{
			var btn_field={btn1:"teacherid",btn2:"username",btn3:"firstname",btn4:"lastname",btn5:"birthdate",btn6:"gender",btn7:"subject",btn8:"qualification",btn9:"emailid",btn10:"mno",btn11:"address"};
			//alert();
			var bid=this.id;
			$(".field_name").val(btn_field[bid]);
			//alert($(this).attr('id'));
			
			//alert(bid);
			//alert("in");
		});
	
	
		$('.datepicker').pickadate({
			selectMonths: true, // Creates a dropdown to control month
			selectYears: 55 // Creates a dropdown of 15 years to control year
			//format: 'dd-mm-yyyy'
		});
		
		
		$(document).ready(function(){
			$('ul.tabs').tabs();
		});
        $('.chips-placeholder').material_chip({
			placeholder: 'Enter a tag',
			secondaryPlaceholder: '+Tag',
			
		});
		
		function proc()
		{
			var tmp=[];
			tmp=$('.chips-placeholder').material_chip('data');
			//tmp.sort();
			absentno=[];
			for(var i=0;i<tmp.length;i++)
			{
				absentno.push(tmp[i].tag);
			}
			absentno.sort();
			absentno=String(absentno);
			
			var totstudent=parseInt(<?php echo $tot['num_rows'];?>);
			
			var table=document.getElementById("attendance_table");
			var row;
			var col1;
			var col2;
			//document.getElementById("attendance_table").style.visibility="";
			for(i=0;i<totstudent;i++)
			{
				row=table.insertRow(i);
				col1=row.insertCell(0);
				col2=row.insertCell(1);
				col1.innerHTML=i+1;
				if(absentno.indexOf(i+1) === -1)
					col2.innerHTML='present';
				else
					col2.innerHTML='absent';
			}
			var table="<table class='striped centered'><thead><tr><th data-field='id'>Student ID</th><th data-field='price'>Present/Absent</th></tr></thead><tbody>";
			
			/*for(i=0;i<totstudent;i++)
			{
				tmp="<tr><td>";
				tmp=tmp.concat(i+1);
				tmp=tmp.concat("</td><td>Eclair</td><td>")
				tmp=tmp.concat(absentno[i]);
				tmp=tmp.concat("</td></tr>");
				table.concat(tmp);
			}*/
			table.concat("</tbody></table>");
			document.getElementById("temp2").innerHTML=table;
			$("#attendance_table").hide();
			$("#temp2").hide();
			$(".attendance_table_fadein").fadeIn(3000);
			var inputfield=document.createElement("INPUT");
			inputfield.setAttribute("type","text");
			inputfield.setAttribute("name","absentno");
			inputfield.setAttribute("class","hideinputfields");
			inputfield.value=absentno;
			document.forms['attendenceform'].appendChild(inputfield);
			
			inputfield=document.createElement("INPUT");
			inputfield.setAttribute("type","text");
			inputfield.setAttribute("name","inputdate");
			inputfield.setAttribute("class","hideinputfields");
			inputfield.value=document.forms['attendenceform'].inputdate.value;
			document.forms['attendenceform'].appendChild(inputfield);
			
			inputfield=document.createElement("INPUT");
			inputfield.setAttribute("type","text");
			inputfield.setAttribute("name","tid");
			inputfield.setAttribute("class","hideinputfields");
			inputfield.value="<?php echo $tid;?>"+" "+totstudent;
			document.forms['attendenceform'].appendChild(inputfield);
			
			//$(".hideinputfields").hide();
		}
		function validationofdate()
		{
			var inputdate=document.forms['attendenceform'].inputdate.value;
			var currentdate=new Date();
			inputdate=new Date(inputdate);
			if(currentdate >= inputdate )
			{
				$("#attendencesubmission").removeClass("disabled");
			}	
				
			else
			{
				$("#attendencesubmission").addClass('disabled');
			}	
		}
		
		
		
		function get(str)
		{
			var fn,ln,value;
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
					
					if (this.readyState == 4 && this.status == 200) {
						var data=this.responseText;
						
						if($.trim(data)=="no")
						{
							Materialize.toast('No results found!',2000,'rounded');
						}
						else
						{
							
							var data_array=data.split(';');
							document.getElementById("st_id").innerHTML=data_array[0];
							
							document.getElementById("st_img").src="./../../images/main/".concat(data_array[0]);
							document.getElementById("st_img").style.display=null;
							
							document.getElementById("st_fname").innerHTML=data_array[1];
							document.getElementById("st_lname").innerHTML=data_array[2];
							document.getElementById("st_g").innerHTML=data_array[3];
							document.getElementById("st_e").innerHTML=data_array[4];
							document.getElementById("st_ef").value=data_array[0];
							document.getElementById("st_mb").innerHTML=data_array[5];
							document.getElementById("st_ad").innerHTML=data_array[6];
							document.getElementById("st_bd").innerHTML=data_array[7];
							document.getElementById("st_uname").innerHTML=data_array[8];
							
							$("#student_info_fadin").fadeIn(); 
						}
					}
				};
				
			
			
			
			if(str=="name")
			{
			
				fn=document.getElementById('firstname').value;
			     ln=document.getElementById('lastname').value;
		
					xmlhttp.open("POST", "data_fetch.php?type=" + str+"&fname="+fn+"&lname="+ln, true);
					xmlhttp.send();
		
			}
			else{
				value=document.getElementById('studentid').value;
				xmlhttp.open("POST", "data_fetch.php?type=" + str+"&value="+value, true);
					xmlhttp.send();
		
			}
			
				
		
		}
		
		function clear_area()
		{
							$("#st_img").fadeOut();
							document.getElementById("st_id").innerHTML="";
							document.getElementById("st_fname").innerHTML="";
							document.getElementById("st_lname").innerHTML="";
							document.getElementById("st_g").innerHTML="";
							document.getElementById("st_e").innerHTML="";
							document.getElementById("st_mb").innerHTML="";
							document.getElementById("st_ad").innerHTML="";
							document.getElementById("st_bd").innerHTML="";
							document.getElementById("st_uname").innerHTML="";


								$("#student_info_fadin").fadeOut();	
		}
		
		$(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal').modal();
		});
		
		$("#checkAll").click(function(){
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
		
		$(document).ready(function(){
			// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
			$('.modal_edit').modal();
		 });
	</script>
	

  </body>
</html>