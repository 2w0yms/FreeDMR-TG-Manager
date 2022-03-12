<?php
	include('../dbconfig.php');
 
	$TALKGROUP=$_POST['TALKGROUP'];
	$NAME=$_POST['NAME'];
	$COUNTRY=$_POST['COUNTRY'];
 
	mysqli_query($db,"insert into `TALKGROUPS` (TALKGROUP,NAME,COUNTRY) values ('$TALKGROUP','$NAME','$COUNTRY')");
	header('location:index.php');
 
?>