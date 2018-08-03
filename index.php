
<?php  

$index_url = "http://stardev.net/light_controller/index.php";

$servername = "localhost";
$username = "admin_pi";
$password = "raspberry";
$dbname = "admin_raspi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function set_light($light, $value){
	global $conn;
	$sql = "UPDATE states SET $light = '$value'";
	$conn->query($sql);
} 

if (isset($_GET['red'])) {
	if ($_GET['red']=="1") {
		set_light("red", "1");
	}else{
		set_light("red", "0");
	}
}

if (isset($_GET['yellow'])) {
	if ($_GET['yellow']=="1") {
		set_light("yellow", "1");
	}else{
		set_light("yellow", "0");
	}
}

if (isset($_GET['blue'])) {
	if ($_GET['blue']=="1") {
		set_light("blue", "1");
	}else{
		set_light("blue", "0");
	}
}


$sql = "SELECT * FROM states";
$result = $conn->query($sql);
$states = $result->fetch_assoc();

if (isset($_GET['need_for']) && $_GET['need_for']=="json") {
	echo json_encode($states);
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	.btn-default.red{
    		border-color: #d9534f;
    	}
    	.btn-default.yellow{
    		border-color: #f0ad4e;
    	}
    	.btn-default.blue{
    		border-color: #337ab7;
    	}
    </style>
  </head>
  <body>
    <div class="container">

	<div class="row">
        <div class="col-sm-4 col-sm-offset-4">
        	
          	<h1 class="text-center">Light Controller</h1>
          	<br>
          	<hr>
          	<br>
        </div>
    </div>
    	
	<div class="row">
        <div class="col-sm-4 col-sm-offset-4">

          	<h4 class="text-center">Red Light</h4>
          	<p class="text-center">
          		<?php if ($states['red']=="1") {
          			?><a class="btn btn-danger" href="?red=0" role="button">Tutn off</a><?php
          		}else{
          			?><a class="btn btn-default red" href="?red=1" role="button">Tutn on</a><?php
          		} ?>
          		
          	</p><br><br>
			
			<h4 class="text-center">Yellow Light</h4>
          	<p class="text-center">
          		<?php if ($states['yellow']=="1") {
          			?><a class="btn btn-warning" href="?yellow=0" role="button">Tutn off</a><?php
          		}else{
          			?><a class="btn btn-default yellow" href="?yellow=1" role="button">Tutn on</a><?php
          		} ?>
          		
          	</p><br><br>

          	<h4 class="text-center">Blue Light</h4>
          	<p class="text-center">
          		<?php if ($states['blue']=="1") {
          			?><a class="btn btn-primary" href="?blue=0" role="button">Tutn off</a><?php
          		}else{
          			?><a class="btn btn-default blue" href="?blue=1" role="button">Tutn on</a><?php
          		} ?>
          		
          	</p><br><br>
          	
        </div>
    </div>


		
		      

    </div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
