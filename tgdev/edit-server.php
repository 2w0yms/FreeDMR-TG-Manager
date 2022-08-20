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
		<tbody class="thead-dark">
		<tr><th>Name (Max 30 Chars)</td><td><input id="name" type="text" size="30" minlength="3" maxlength="30" value="<?php echo $row['name']; ?>" name="name" required></td></tr>
		<tr><th>Website (Full URL with http/https)</th><td><input id="website" type="text" size="50" maxlength="50" value="<?php echo $row['website']; ?>" name="website"></td></tr>
		<tr><th>Dashboard (URL to Main Dashboard)</th><td><input id="dashboard" type="text" size="50" minlength="3" maxlength="50" value="<?php echo $row['dashboard']; ?>" name="dashboard" required></td></tr>
		<tr><th>Dashboard 2 (URL to Secondary Dashboard)</th><td><input id="dashboard2" type="text" size="50" maxlength="50" value="<?php echo $row['dashboard2']; ?>" name="dashboard2"></td></tr>
		<tr><th>Telegram (Leave out @)</th><td><input id="telegram" type="text" size="30" maxlength="30" value="<?php echo $row['telegram']; ?>" name="telegram"></td></tr>
		<tr><th>Social Media (URL to Group or Page)</th><td><input id="socials" type="text" size="80" maxlength="80" value="<?php echo $row['socials']; ?>" name="socials"></td></tr>
		<tr><th>MCC</th><td><input id="mcc" type="number" minlength="3" maxlength="6" value="<?php echo $row['mcc']; ?>" name="mcc" required></td></tr>
		<tr><th>Function</th><td><input class="btn btn-success" type="submit" name="submit"> 
		<?php if($_SESSION['isadmin'] == 2) { echo '<a href="delete-server.php?id='.$row['serverid'].'" class="btn btn-danger">Delete</a>'; } ?>
		<a href="servers.php" class="btn btn-warning">Back</a></td></tr>
		</tbody>
		</table>
	</form>
	<script>
$("#tgedit").validate();
</script>
</body>
</html>
