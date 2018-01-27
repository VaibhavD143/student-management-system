<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$conn=new mysqli("127.0.0.1","root","","student_managment");
		if($conn->connect_error)
		{
			die("coudn't connect database");
		}
		$string=$_POST['tid'];
		$string=explode(" ",$string);
		
		$tid=$string[0];
		
		$totstudent=$string[1];
		
		$date = $_POST['inputdate'];
		
		$absentno=$_POST['absentno'];
		$absentno=explode(",",$absentno);
		$absentstudents=count($absentno);
		array_walk($absentno, function(&$item) { $item = 's'.$item; });
		$absentno=implode(",",$absentno);
		
		$query="INSERT INTO ".$tid." (date,".$absentno.") VALUES (\"".$date."\"";
				
		for($i=0;$i < $absentstudents ; $i++)
		{
			$query=$query.",\"a\"";
		}
		
		$query=$query.")";
		if($conn->query($query))
		{	
			$_SESSION['msg']="Attendance submitted";
			header('location:index.php');
		}	
		else
		{
			echo "Error:<br>" . $conn->error;
			$_SESSION['msg']="Coudn't Insert";
		}				
	}
	else
	{
		die("unauthorized access");	
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
