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
    $query=mysqli_query($db,"select * from `TALKGROUPS` ORDER BY COUNTRY ASC, TALKGROUP ASC");
  } else {
      
    $query=mysqli_query($db,"select * from `TALKGROUPS` WHERE MCC = '$MCC' ORDER BY COUNTRY ASC, TALKGROUP ASC");
  }
        	
					
    $counter = $query->num_rows;
				
		?>
</head>
	<div>
	    <h2 align="center"><img src="../logo.png" /></br></br>FreeDMR Talkgroup Management Portal</br><?php echo $counter ?> Talkgroups</h2></br></br></br>
	    <table class="table table-striped table-bordered">
		<thead class="thead-dark">
		<th>Username</th><th>Permitted MCC</th><th>System Admin</th>
		</thead>
		<tbody><td><?php echo $_SESSION['username']; ?></td><td><?php echo $_SESSION['mcc']; ?></td><td><?php echo $_SESSION['isadmin']; ?></td></tbody>
		</table></br></br>
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a> <a href="servers.php" class="btn btn-warning">Manage Server listing</a> <?php if($_SESSION['isadmin'] == 1){ echo '<a href="create_user.php" class="btn btn-warning">Add User</a>'; } ?> <a href="login.php" class="btn btn-danger">Log Out</a></br></br></p>
	    <div>
		<form id="tgedit" method="POST" action="add.php">
		    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		    <th>Submit New Talkgroup</br></br>Talkgroup</th>
		    <th>Name (Max 60 Characters)</th>
		    <th>Country</th>
		    <th>MCC</th>
		    <th>Functions</th>
		    </thead>
		    <tbody>
		    <td><input id="TALKGROUP" type="number" minlength="4" maxlength="7" name="TALKGROUP" required></td>
			<td><input id="NAME" type="text" minlength="3" maxlength="60" name="NAME" required></td>
			<td><input id="COUNTRY" type="text" minlength="2" maxlength="30" name="COUNTRY" required></td>
			<td><?php	if($_SESSION['isadmin'] == 1)
  {
    echo '<input id="MCC" type="number" minlength="3" maxlength="6" name="MCC" required>';
  } else {
      
    echo '<input id="MCC" type="hidden" name="MCC" value='.$MCC.'>'.$MCC.'';
  }
  
  ?></td>
			<td><input class="btn btn-success" type="submit" name="add"></td>
			</tbody></table>
		</form>
		<script>
$("#tgedit").validate();
</script>
		</div>
	</div>
	<br>
	<div>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Manage Existing Talkgroup</th>
				<th>Name</th>
				<th>Country</th>
				<th>MCC</th>
				<th>Functions</th>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['TALKGROUP']; ?></td>
							<td><?php echo $row['NAME']; ?></td>
							<td><?php echo $row['COUNTRY']; ?></td>
							<td><?php echo $row['MCC']; ?></td>
							<td>
							<a href="edit.php?id=<?php echo $row['TALKGROUP']; ?>" class="btn btn-success">Manage TG</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</html>