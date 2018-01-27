<?php

$conn=new mysqli("127.0.0.1","root","","student_managment");
if($conn->connect_error)
{
	die("couldnt connect to database");
}

?>