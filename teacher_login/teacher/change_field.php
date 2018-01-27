<?php
	//echo 'in chage_field.php';
	session_start();
	$teacherid=$_POST['teacherid'];
	$field_name=$_POST['field_name'];
	$new_value=$_POST['new_value'];
	//print_r($_POST);
	include("connection.php");
	
	$query="UPDATE `teacher_info` SET `".$field_name."` = '".$new_value."' WHERE `teacher_info`.`teacherid` = '".$teacherid."'";
	
	if($conn->query($query))
	{
		$_SESSION['msg']="Field Modified";
		header('location:index.php');
	}
	else
	{
		echo "Error:<br>" . $conn->error;
		$_SESSION['msg']="Coudn't modify";
	}
	
	
?> 
<html>
<body>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
<script type="text/javascript">
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
