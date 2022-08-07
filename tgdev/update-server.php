<?php
	include('../dbconfig.php');
	$id=$_GET['id'];
 
	$name=$_POST['name'];
	$website=$_POST['website'];
	$dashboard=$_POST['dashboard'];
	$dashboard2=$_POST['dashboard2'];
	$telegram=$_POST['telegram'];
	$socials=$_POST['socials'];
	$mcc=$_POST['mcc'];
 
	mysqli_query($db,"update `SERVERS` set name='$name', website='$website', dashboard='$dashboard', dashboard2='$dashboard2', telegram='$telegram', socials='$socials', mcc='$mcc' where serverid='$id'");
	header('location:servers.php');
?>