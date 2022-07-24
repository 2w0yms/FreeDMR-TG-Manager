<?php
 session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
	$id=$_GET['id'];
	include('../dbconfig.php');
	mysqli_query($db,"delete from `TALKGROUPS` where TALKGROUP='$id'");
	header('location:index.php');
?>