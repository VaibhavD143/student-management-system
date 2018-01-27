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
     function fn(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#abc').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<style>
#abc {
	height: 50%;
	width: 50%;
}
</style>
</head>
<body>
<?php 
	//session_start();
	//include("header_owner.php"); 
?>
<div class="container">
<div class="row">
<div class="col s12 center">
<h2 class="red-text header">Main Picture Upload</h2>
<div class="divider"></div>
<br/>
<form action="verify_main_upload.php" method="POST" enctype="multipart/form-data">
<?php echo '<img id="abc" src="images/sample.png" alt="select image"/><br/>'; ?>
<div class="file-field input-field">
      <div class="btn red">
        <span>File</span>
        <input type="file" accept="image/*" id="picture" name="picture" onchange="fn(this);">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
	<input type="text" name="temp"/>
<button class="btn waves-effect red waves-light btn-large" type="submit" name="action">Upload
    <i class="material-icons right">send</i>
  </button>
</form>
</div>
</div>
</div>
</body>
</html>