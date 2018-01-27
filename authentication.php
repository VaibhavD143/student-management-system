<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		
		
		$sname=$_POST['studentname'];
		$pass=$_POST['password'];
		
		$conn=new mysqli("127.0.0.1","root","","student_managment");
		if($conn->connect_error)
		{
			die("connection failed in authentication.php");
		}
		
		$query="SELECT studentid,firstname FROM student_info WHERE username=\"".$sname."\" AND password=\"".$pass."\"";
		//echo $query;
		$result=$conn->query($query);
		//print_r($result);
		if($result->num_rows > 0)
		{
			$row=$result->fetch_assoc();
			$studentid=$row['studentid'];
			$firstname=$row['firstname'];
			print_r($row);
			session_start();
			$_SESSION['studentid']=$studentid;
			$_SESSION['firstname']=$firstname;
			$_SESSION['username']=$sname;
			header('location:./student/index.php');
			
		}
		
		else
		{
				header("location:index.php?msg=Username/Password is wrong!");
		}
		
		
		
	}
?>