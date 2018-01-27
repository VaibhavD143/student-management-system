<?php
	//echo 'in chage_field.php';
	$studentid=$_POST['studentid'];
	$field_name=$_POST['field_name'];
	$new_value=$_POST['new_value'];
	//print_r($_POST);
	include("connection.php");
	
	$query="UPDATE `student_info` SET `".$field_name."` = '".$new_value."' WHERE `student_info`.`studentid` = '".$studentid."'";
	
	if($conn->query($query))
	{
		echo "succesfully modified";
		
	}
	else
	{
		echo "Error:<br>" . $conn->error;
	}
	
	
?> 
<html>
<body>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
<script type="text/javascript">
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
