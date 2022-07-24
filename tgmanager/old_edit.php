<?php
	include('../dbconfig.php');
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
<head>
<title>Talkgroup Editor</title>
</head>
<body>
	<h2 align="center">Manage Talkgroup</h2></br>
	<form method="POST" action="update.php?id=<?php echo $id; ?>">
	    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		<th>Name</th>
		<th>Country</th>
		<th>Functions</th>
		</thead>
		<tbody>
		<td><input type="text" value="<?php echo $row['NAME']; ?>" name="NAME"></td>
		<td><input type="text" value="<?php echo $row['COUNTRY']; ?>" name="COUNTRY"></td>
		<td><input class="btn btn-success" type="submit" name="submit"> <a href="delete.php?id=<?php echo $row['TALKGROUP']; ?>" class="btn btn-danger">Delete</a> <a href="index.php" class="btn btn-warning">Back</a></td>
		</tbody>
		</table>
	</form>
</body>
</html>