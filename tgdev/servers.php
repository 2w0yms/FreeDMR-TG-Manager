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
        	if($_SESSION['isadmin'] == 1)
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
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a> <a href="../" class="btn btn-warning">Return to TG Manager</a> <a href="login.php" class="btn btn-danger">Log Out</a></br></br></p>
	    <div>
		<?php	if($_SESSION['isadmin'] == 1) 
		{ 
		echo '<form id="tgedit" method="POST" action="add-server.php">
		    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		    <th>Submit New Server</br></br>Server ID</th>
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
		    <td><input id="serverid" type="number" minlength="4" maxlength="7" name="serverid" required></td>
			<td><input id="name" type="text" minlength="3" maxlength="100" name="name" required></td>
			<td><input id="website" type="text" minlength="2" maxlength="100" name="website"></td>
			<td><input id="dashboard1" type="text" minlength="2" maxlength="100" name="dashboard1" required</td>
			<td><input id="host" type="text" name="host" required</td>
			<td><input id="telegram" name="telegram" type="text"</td>
			<td><input id="facebook" name="facebook" type="text"</td>
			<td><input id="twitter" name="twitter" type="text"</td>
			<td><input id="other" name="other" type="text"</td>
			<td><input id="mcc" type="number" minlength="3" maxlength="6" name="mcc" required></td>
			<td><input class="btn btn-success" type="submit" name="add"></td>
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
				<?php
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['serverid']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><a href="<?php echo $row['website']; ?>"><?php echo $row['website']; ?></a></td>
							<td><a href="<?php echo $row['dashboard1']; ?>"><?php echo $row['dashboard1']; ?></a></td>
							<td><?php echo $row['host']; ?></td>
							<td><a href="<?php echo $row['telegram']; ?>"><?php echo $row['telegram']; ?></a></td>
							<td><a href="<?php echo $row['facebook']; ?>"><?php echo $row['facebook']; ?></a></td>
							<td><a href="<?php echo $row['twitter']; ?>"><?php echo $row['twitter']; ?></a></td>
							<td><?php echo $row['other']; ?></td>
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