<?php
	include('../dbconfig.php');
	$id=$_GET['id'];
 
	$NAME=$_POST['NAME'];
	$COUNTRY=$_POST['COUNTRY'];
 
	mysqli_query($db,"update `TALKGROUPS` set NAME='$NAME', COUNTRY='$COUNTRY' where TALKGROUP='$id'");
	header('location:index.php');
?>