<?php
	include('../dbconfig.php');
	$id=$_GET['id'];
 
	$NAME=$_POST['NAME'];
	$BRIDGES=$_POST['BRIDGES'];
	$COUNTRY=$_POST['COUNTRY'];
	$MCC=$_POST['MCC'];
 
	mysqli_query($db,"update `TALKGROUPS` set NAME='$NAME', BRIDGES='$BRIDGES', COUNTRY='$COUNTRY', MCC='$MCC' where TALKGROUP='$id'");
	header('location:index.php');
?>