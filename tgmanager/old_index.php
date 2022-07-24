<!DOCTYPE html>
<html>
<head>
<title>FreeDMR TG Management</title>
<!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
        <meta charset="utf-8">
</head>

	<div>
	    <h2 align="center"><img src="https://freedmr.cymru/wp-content/uploads/2021/05/Logo-768x162-1.png" /></br></br>FreeDMR Talkgroup Management Portal</h2></br>
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a></br></br></p>
	    <div>
		<form method="POST" action="add.php">
		    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		    <th>Submit New Talkgroup</br></br>Talkgroup</th>
		    <th>Name</th>
		    <th>Country</th>
		    <th>Functions</th>
		    </thead>
		    <tbody>
		    <td><input type="int" name="TALKGROUP"></td>
			<td><input type="text" name="NAME"></td>
			<td><input type="text" name="COUNTRY"></td>
			<td><input class="btn btn-success" type="submit" name="add"></td>
			</tbody></table>
		</form>
		</div>
	</div>
	<br>
	<div>
		<table class="table table-striped table-bordered">
			<thead class="thead-dark">
				<th>Manage Existing Talkgroup</th>
				<th>Name</th>
				<th>Country</th>
				<th>Functions</th>
			</thead>
			<tbody>
				<?php
					include('../dbconfig.php');
					$query=mysqli_query($db,"select * from `TALKGROUPS` ORDER BY COUNTRY ASC, TALKGROUP ASC");
					while($row=mysqli_fetch_array($query)){
						?>
						<tr>
							<td><?php echo $row['TALKGROUP']; ?></td>
							<td><?php echo $row['NAME']; ?></td>
							<td><?php echo $row['COUNTRY']; ?></td>
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