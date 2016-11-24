<?php
session_start();
if($_REQUEST['username']=="admin" && $_REQUEST['password']=="admin"){
   $_SESSION['login'] = "admin";
   header("Location: home.php");
}
else{
   $Message = urlencode("Wrong username or password. Please try again");
   header("Location:index.php?Message=".$Message);
}
?>