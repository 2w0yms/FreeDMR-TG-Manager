<?php
	include('../dbconfig.php');
	 session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
	$id=$_GET['id'];
	$query=mysqli_query($db,"select * from `TALKGROUPS` where TALKGROUP='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
    <!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<head>
<title>Talkgroup Editor</title>
</head>
<body>
	<h2 align="center">Manage Talkgroup</h2></br>
	<form id="tgedit" method="POST" action="update.php?id=<?php echo $id; ?>">
	    <table class="table table-striped table-bordered">
		<thead class="thead-dark">
		<th>Name (Max 40 Characters)</th>
		<th>Bridges (Max 60 Characters)</th>
		<th>Country</th>
		<th>MCC</th>
		<th>Functions</th>
		</thead>
		<tbody>
		<td><input id="NAME" type="text" minlength="3" maxlength="40" value="<?php echo $row['NAME']; ?>" name="NAME" required></td>
		<td><input id="BRIDGES" type="text" maxlength="60" value="<?php echo $row['BRIDGES']; ?>" name="BRIDGES"></td>
		<td><input id="COUNTRY" type="text" minlength="2" maxlength="30" value="<?php echo $row['COUNTRY']; ?>" name="COUNTRY" required></td>
		<td><input id="MCC" type="number" minlength="3" maxlength="6" value="<?php echo $row['MCC']; ?>" name="MCC" required></td>
		<td><input class="btn btn-success" type="submit" name="submit"> <a href="delete.php?id=<?php echo $row['TALKGROUP']; ?>" class="btn btn-danger">Delete</a> <a href="index.php" class="btn btn-warning">Back</a></td>
		</tbody>
		</table>
	</form>
	<script>
$("#tgedit").validate();
</script>
</body>
</html>