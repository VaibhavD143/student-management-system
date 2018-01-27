<?php

$tid="t01";
	$type=$_REQUEST["type"];
	
	
	try{
		$dbhandler = new PDO('mysql:host=127.0.0.1;dbname=student_managment','root','');
		
		$dbhandler->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
	
	
	
	if($type=="name")
	{
		$fname=$_REQUEST["fname"];
		$lname=$_REQUEST["lname"];
	
				$query1="select * from student_info where firstname=\"".$fname."\" AND lastname=\"".$lname."\"";
	}
	else
	{
			$id=$_REQUEST["value"];
			$query1="select * from student_info where studentid=\"".$id."\"";
		
	}
				$query=$dbhandler->query($query1);
	
		if($r=$query->fetch()){
			
			echo $r['studentid'].";";
			echo $r['firstname'].";";
			echo $r['lastname'].";";
			echo $r['gender'].";";
			echo $r['emailid'].";";
			echo $r['mno'].";";
			echo $r['address'].";";
			echo $r['birthdate'].";";
			echo $r['username'];
		}
		else
		{
			echo "no";
		}
	}
	catch(PDOException $e){
		echo $e->getMessage();
		die();
	}	


?>
