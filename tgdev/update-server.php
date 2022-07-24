<?php
	include('../dbconfig.php');
	$id=$_GET['id'];
 
	$name=$_POST['name'];
	$website=$_POST['website'];
	$dashboard1=$_POST['dashboard1'];
	$host=$_POST['host'];
	$telegram=$_POST['telegram'];
	$facebook=$_POST['facebook'];
	$twitter=$_POST['twitter'];
	$other=$_POST['other'];
	$mcc=$_POST['mcc'];
 
	mysqli_query($db,"update `SERVERS` set name='$name', website='$website', dashboard1='$dashboard1', host='$host', telegram='$telegram', facebook='$facebook', twitter='$twitter', other='$other', mcc='$mcc' where serverid='$id'");
	header('location:servers.php');
?>