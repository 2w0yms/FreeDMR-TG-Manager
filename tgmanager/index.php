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
<script>
	$.validator.setDefaults({
		submitHandler: function() {
			alert("submitted!");
		}
	});

	$().ready(function() {
		// validate signup form on keyup and submit
		$("#tgedit").validate({
			rules: {
				TALKGROUP: {
					required: true,
					minlength: 4
					maxlength: 7
				},
				COUNTRY: {
					required: true,
					minlength: 3
					maxlength: 30
				},
				NAME: {
					required: true,
					minlength: 3
					maxlength: 30
				},
			},
			messages: {
				TALKGROUP: {
					required: "Please enter a Talkgroup",
					minlength: "Talkgroups are a minimum of 4 digits"
					maxlength: "Talkgroups are a minimum of 7 digits"
				},
				COUNTRY: {
					required: "Please enter a Country",
					minlength: "Please enter a minimum of 3 digits"
					maxlength: "Please enter a minimum of 30 digits"
				},
				NAME: {
					required: "Please enter a Talkgroup Name",
					minlength: "Please enter a minimum of 3 digits"
					maxlength: "Please enter a minimum of 30 digits"
				},
			}
		});
	});
	</script>
</head>

	<div>
	    <h2 align="center"><img src="https://freedmr.cymru/wp-content/uploads/2021/05/Logo-768x162-1.png" /></br></br>FreeDMR Talkgroup Management Portal</h2></br>
	    <p align="center"><a href="../" class="btn btn-success">Return to Homepage</a></br></br></p>
	    <div>
		<form id="tgedit" method="POST" action="add.php">
		    <table class="table table-striped table-bordered">
			<thead class="thead-dark">
		    <th>Submit New Talkgroup</br></br>Talkgroup</th>
		    <th>Name</th>
		    <th>Country</th>
		    <th>Functions</th>
		    </thead>
		    <tbody>
		    <td><input id="TALKGROUP" type="number" minlength="4" maxlength="7" name="TALKGROUP" required></td>
			<td><input id="COUNTRY" type="text" minlength="3" maxlength="30" name="NAME" required></td>
			<td><input id="NAME" type="text" minlength="3" maxlength="30" name="COUNTRY" required></td>
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