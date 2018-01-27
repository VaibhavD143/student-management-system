<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username=$_POST['username'];
		$emailid=$_POST['emailid'];
		include('connection.php');
		$query="SELECT emailid,password FROM student_info WHERE username='".$username."'";
		$result=$conn->query($query);
		//print_r($result);
		if($result->num_rows > 0)
		{
			$row=$result->fetch_assoc();
			if($row['emailid'] == $emailid)
			{
				include('mailer.php');
			}
			else
			{
				echo "email id is not matching";
			}
		}
		else
		{
			echo "no username exist";
		}
	}
?>
<html>
<body>
<p>You will be redirected in <span id="counter">5</span> second(s).</p>
<script type="text/javascript">
function countdown() {
    var i = document.getElementById('counter');
    if (parseInt(i.innerHTML)<0) {
        location.href = 'index.php';
    }
    i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>
</body>
</html>