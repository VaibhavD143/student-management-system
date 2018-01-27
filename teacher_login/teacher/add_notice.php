<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		session_start();
	
		include('connection.php');
		$query="INSERT INTO notice (teacherid,notice_subject,notice_body) VALUES ('".$_POST['teacherid']."','".$_POST['notice_subject']."','".$_POST['notice_body']."')";
		if(!$conn->query($query))
		{
			echo $conn->error;
			$_SESSION['msg']="Coudn't Add";
		}
		else
		{
			$_SESSION['msg']="Notice Added";
			header('location:index.php');
		}
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


