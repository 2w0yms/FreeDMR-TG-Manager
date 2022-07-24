<?php
	include('../dbconfig.php');
	 session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
	$id=$_GET['id'];
	$query=mysqli_query($db,"select * from `SERVERS` where serverid='$id'");
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
<title>Server Editor</title>
</head>
<body>
	<h2 align="center">Manage Server</h2></br>
	<form id="tgedit" method="POST" action="update-server.php?id=<?php echo $id; ?>">
	    <table class="table table-striped table-bordered">
		<thead class="thead-dark">
		<th>Name (Max 100 Characters)</th>
		<th>Website</th>
		<th>Dashboard</th>
		<th>Hostname</th>
		<th>Telegram</th>
		<th>Facebook</th>
		<th>Twitter</th>
		<th>Other</th>
		<th>MCC & Flag</th>
		<th>Functions</th>
		</thead>
		<tbody>
		<td><input id="name" type="text" minlength="3" maxlength="100" value="<?php echo $row['name']; ?>" name="name" required></td>
		<td><input id="website" type="text" maxlength="100" value="<?php echo $row['website']; ?>" name="website"></td>
		<td><input id="dashboard1" type="text" minlength="3" maxlength="100" value="<?php echo $row['dashboard1']; ?>" name="dashboard1" required></td>
		<td><input id="host" type="text" maxlength="100" value="<?php echo $row['host']; ?>" name="host" required></td>
		<td><input id="telegram" type="text" maxlength="100" value="<?php echo $row['telegram']; ?>" name="telegram"></td>
		<td><input id="facebook" type="text" maxlength="100" value="<?php echo $row['facebook']; ?>" name="facebook"></td>
		<td><input id="twitter" type="text" maxlength="100" value="<?php echo $row['twitter']; ?>" name="twitter"></td>
		<td><input id="other" type="text" maxlength="100" value="<?php echo $row['other']; ?>" name="other"></td>
		<td><input id="mcc" type="number" minlength="3" maxlength="6" value="<?php echo $row['mcc']; ?>" name="mcc" required></td>
		<td><input class="btn btn-success" type="submit" name="submit"> <a href="delete.php?id=<?php echo $row['serverid']; ?>" class="btn btn-danger">Delete</a> <a href="servers.php" class="btn btn-warning">Back</a></td>
		</tbody>
		</table>
	</form>
	<script>
$("#tgedit").validate();
</script>
</body>
</html>