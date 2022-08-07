<?php
	include('../dbconfig.php');
	  session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
    $serverid=$_POST['serverid'];
	$name=$_POST['name'];
	$website=$_POST['website'];
	$dashboard=$_POST['dashboard'];
	$dashboard2=$_POST['dashboard2'];
	$telegram=$_POST['telegram'];
	$socials=$_POST['socials'];
	$mcc=$_POST['mcc'];
 
	mysqli_query($db,"insert into `SERVERS` (serverid,name,website,dashboard,dashboard2,telegram,socials,mcc) values ('$serverid','$name','$website','$dashboard','$dashboard2','$telegram','$socials','$mcc')");
	header('location:servers.php');
 
?>