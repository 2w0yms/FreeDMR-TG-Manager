<?php
	include('../dbconfig.php');
 
	$TALKGROUP=$_POST['TALKGROUP'];
	$NAME=$_POST['NAME'];
	$BRIDGES=$_POST['BRIDGES'];
	$COUNTRY=$_POST['COUNTRY'];
	$MCC=$_POST['MCC'];
 
	mysqli_query($db,"insert into `TALKGROUPS` (TALKGROUP,NAME,BRIDGES,COUNTRY,MCC) values ('$TALKGROUP','$NAME','$BRIDGES','$COUNTRY','$MCC')");
	header('location:index.php');
 
?>