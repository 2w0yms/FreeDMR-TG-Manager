<!DOCTYPE html>
<html>
<head>
<title>FreeDMR TG Management</title>
	<?php
  session_start();
  if($_SESSION['login'] != "OK")
  {
    header('Location: login.php');
    exit();
  }
?>
<!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
        <meta charset="utf-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <?php
        	include('../dbconfig.php');
        	$MCC = $_SESSION['mcc'];
        	if($_SESSION['isadmin'] == 1 OR $_SESSION['isadmin'] == 2)
  {
    $query=mysqli_query($db,"select * from `SERVERS` ORDER BY NAME ASC");
  } else {
      
    $query=mysqli_query($db,"select * from `SERVERS` WHERE MCC = '$MCC' ORDER BY NAME ASC");
  }
        	
					
    $counter = $query->num_rows;
				
		?>
</head>
	<div>
	    <h2 align="center"><img src="../logo.png" /></br></br>FreeDMR Server Management Portal</br><?php echo $counter ?> Servers</h2></br></br></br>
	    <table class="table table-striped table-bordered">
		<thead class="thead-dark">
		<th>Username</th><th>Permitted MCC</th><th>System Admin</th>
		</thead>
		<tbody><td><?php echo $_SESSION['username']; ?></td><td><?php echo $_SESSION['mcc']; ?></td><td><?php echo $_SESSION['isadmin']; ?></td></tbody>
		</table></br></br>
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a> <a href="../tgdev" class="btn btn-warning">Return to TG Manager</a> <a href="login.php" class="btn btn-danger">Log Out</a></br></br></p>
	    <div>
		<?php	if($_SESSION['isadmin'] == 2) 
		{ 
		echo '<form id="tgedit" method="POST" action="add-server.php">
		    <table class="table table-striped table-bordered">
		    <tbody>
		    <tr><th>Submit New Server</th></tr>
		    <tr><th>Server ID</th><td><input id="serverid" type="number" minlength="4" maxlength="7" name="serverid" size="7" required></td></tr>
			<tr><th>Name (Max 30 chars)</th><td><input id="name" type="text" size="30" minlength="3" maxlength="30" name="name" required></td></tr>
			<tr><th>Website (Full URL with http/https)</th><td><input id="website" type="text" size="50" minlength="2" maxlength="50" name="website"></td></tr>
			<tr><th>Dashboard (URL to Main Dashboard)</th><td><input id="dashboard" type="text" size="50" minlength="2" maxlength="50" name="dashboard" required</td></tr>
			<tr><th>Dashboard 2 (URL to Secondary Dashboard)</th><td><input id="dashboard2" type="text" maxlength="50" size="50" name="dashboard2"</td></tr>
			<tr><th>Telegram (Leave out @)</th><td><input id="telegram" name="telegram" type="text" size="30" maxlength="30"></td></tr>
			<tr><th>Social Media (URL to Group or Page)</th><td><input id="socials" name="socials" size="80" maxlength="80" type="text"</td></tr>
			<tr><th>MCC</th><td><input id="mcc" type="number" minlength="3" maxlength="6" size="6" name="mcc" required></td></tr>
			<tr><td><input class="btn btn-success" type="submit" name="add"></td></tr>
			</tbody></table>
		</form>';
		} ?>
		<script>
$("#tgedit").validate();
</script>
		</div>
	</div>
	<br>
	<div>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
			<th>Edit existing Server</th>
		    <th>Name</th>
		    <th>Website</th>
		    <th>Dashboard</th>
		    <th>Dashboard 2</th>
		    <th>Telegram</th>
		    <th>Social Media</th>
		    <th>MCC</th>
		    <th>Functions</th>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['serverid']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><a href="<?php echo $row['website']; ?> " target="_blank"><?php echo $row['website']; ?></a></td>
							<td><a href="<?php echo $row['dashboard']; ?>" target="_blank"><?php echo $row['dashboard']; ?></a></td>
							<td><a href="<?php echo $row['dashboard2']; ?>" target="_blank"><?php echo $row['dashboard2']; ?></a></td>
							<td><a href="https://t.me/<?php echo $row['telegram']; ?>" target="_blank"><?php echo $row['telegram']; ?></a></td>
							<td><a href="<?php echo $row['socials']; ?>" target="_blank"><?php echo $row['socials']; ?></a></td>
							<td><?php echo $row['mcc']; ?> <img src="../flags/<?php echo $row['mcc']; ?>.png"</img> </td>
							<td>
							<a href="edit-server.php?id=<?php echo $row['serverid']; ?>" class="btn btn-success">Manage Server</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</html>
