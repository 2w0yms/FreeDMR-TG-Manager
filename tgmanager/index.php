<!DOCTYPE html>
<html>
<head>
<title>FreeDMR TG Management</title>
<!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
        <meta charset="utf-8">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
        <?php
        	include('../dbconfig.php');
					$query=mysqli_query($db,"select * from `TALKGROUPS` ORDER BY COUNTRY ASC, TALKGROUP ASC");
					$counter = $query->num_rows;
		?>
</head>
	<div>
	    <h2 align="center"><img src="../logo.png" /></br></br>FreeDMR Talkgroup Management Portal</br><?php echo $counter ?> Talkgroups</h2></br>
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a></br></br><a href="https://freedmr.cymru/tg-manager-help/" class="btn btn-success">TG Manager Help</a></br></br></p>
	    <div>
		<form id="tgedit" method="POST" action="add.php">
		    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		    <th>Submit New Talkgroup</br></br>Talkgroup</th>
		    <th>Name (Max 40 Characters)</th>
		    <th>Bridges (Max 60 Characters)</th>
		    <th>Country</th>
		    <th>MCC</th>
		    <th>Functions</th>
		    </thead>
		    <tbody>
		    <td><input id="TALKGROUP" type="number" minlength="4" maxlength="7" name="TALKGROUP" required></td>
			<td><input id="NAME" type="text" minlength="3" maxlength="40" name="NAME" required></td>
			<td><input id="BRIDGES" type="text" minlength ="3" maxlength="60" name="BRIDGES"></td>
			<td><input id="COUNTRY" type="text" minlength="2" maxlength="30" name="COUNTRY" required></td>
			<td><input id="MCC" type="number" minlength="3" maxlength="6" name="MCC" required></td>
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
				<th>Bridges</th>
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
							<td><?php echo $row['BRIDGES']; ?></td>
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