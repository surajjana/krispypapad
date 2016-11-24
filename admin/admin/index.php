<?php
    session_start();
    if(isset($_SESSION['login'])){
	header("Location: home.php");
    }
    if(isset($_GET['Message'])){
	$message = $_GET['Message'];
    }
?>
<!DOCTYPE html>

<html>
    <head>
	<title>Krispy Papad | Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/favicon.png" />	
        <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/agency.min.css" rel="stylesheet">
	<link href="../css/main.css" rel="stylesheet">
	    
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    </head>
    <body>
	<nav class="navbar navbar-inverse">
	    <div class="container-fluid">
		<div class="navbar-header">
		    <a class="navbar-brand" href="index.php">
			<img src="../img/brand.png" alt="KP" style="margin-top:-16px;" />
		    </a>
		</div>
	    </div>
	</nav>
	<div class="container">
	    <div class="row">
		<div class="admin-login col-md-5 col-sm-8">
		    <div class="text-18">
			Admin Login
			<hr/>
		    </div>
		    <div class="border-light"></div>
		    <form action="login.php" method="post">
			<table class="table borderless">
			    <tr>
				<td>Username</td>
				<td>:</td>
				<td><input class="form-control" type="text" name="username"></td>
			    </tr>
			    <tr>
				<td>Password</td>
				<td>:</td>
				<td><input class="form-control" type="password" name="password"></td>
			    </tr>
			    <tr>
				<td colspan="3"><input class="button btn btn-primary" type="submit" value="Submit" name="submit"></td>
			    </tr>
			</table>
			 <hr/>
		    </form>
		    <div class="text-12">
			<?php
			if(isset($message))
			    echo $message;
			?>
		    </div>
		</div>
	    </div>
	</div>
    </body>
</html>
