<html>
<head>
	<link rel="stylesheet" type="text/css" href="materialize/css/materialize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript" src="jQuery/jquery-3.1.1.min.js"></script>
	<script src="materialize/js/materialize.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>   

<script>
$(document).ready(function(){
    $('.modal').modal({ complete: function() {window.location.href="edit_images.php"; } } );
  });
  function mymodal() {
	  $('#popup').modal('open');
  };
  </script>
</head>
<body>
<div id="popup" class="modal">
    <div class="modal-content">
      <h4>Picture Uploaded Successfully</h4>
      <p>Your main picture has been uploaded successfully.Click on OK button to Continue.</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
    </div>
  </div>
<?php
echo $_POST['temp'];
session_start();

//echo $_SESSION['rest_id'];
$target_dir = "images/main/";
$target_file = $target_dir ."first.".basename($_FILES["picture"]["type"]);
$uploadOk = 1;
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["picture"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
//$file_pattern="owner_images/main/".$_SESSION['rest_id'].".*";
//array_map("unlink", glob( $file_pattern ));
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
		echo '<script type="text/javascript">
			mymodal();
			</script>';
			echo "uploaded";
			//header("location:a.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
</body>
</html>