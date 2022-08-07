<?php
 session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
	$id=$_GET['id'];
	include('../dbconfig.php');
	mysqli_query($db,"delete from `SERVERS` where serverid='$id'");
	header('location:servers.php');
?>