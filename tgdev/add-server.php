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
	$dashboard1=$_POST['dashboard1'];
	$host=$_POST['host'];
	$telegram=$_POST['telegram'];
	$facebook=$_POST['facebook'];
	$twitter=$_POST['twitter'];
	$other=$_POST['other'];
	$mcc=$_POST['mcc'];
 
	mysqli_query($db,"insert into `SERVERS` (serverid,name,website,dashboard1,host,telegram,facebook,twitter,other,mcc) values ('$serverid','$name','$website','$dashboard1','$host','$telegram','$facebook','$twitter','$other','$mcc')");
	header('location:servers.php');
 
?>