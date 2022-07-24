<?php
	include('../dbconfig.php');
	  session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
	$TALKGROUP=$_POST['TALKGROUP'];
	$NAME=$_POST['NAME'];
	$COUNTRY=$_POST['COUNTRY'];
	$MCC=$_POST['MCC'];
 
	mysqli_query($db,"insert into `TALKGROUPS` (TALKGROUP,NAME,COUNTRY,MCC) values ('$TALKGROUP','$NAME','$COUNTRY','$MCC')");
	header('location:index.php');
 
?>