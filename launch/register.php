<?php include('mysqlInterface.php'); ?>
<?php
        $name = $_POST['name'];
        $email = $_POST['email'];
	$phone = $_POST['phone'];
        $message = $_POST['message'];
        
	$sql = "INSERT INTO kp(name,email,phone,message,date) VALUES('$name','$email','$phone','$message',now())";
	$result = mysqli_query($db,$sql);

?>
