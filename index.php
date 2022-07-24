<?php 
 
// Load the database configuration file 
include_once 'dbconfig.php'; 
?>
<head>
<title>FreeDMR Talkgroup Export</title>
<!-- Bootstrap core CSS -->
        <link href="bootstrap.css" rel="stylesheet">
        <!-- Add custom CSS here -->
        <link href="style.css" rel="stylesheet">
<meta charset="utf-8">
</head>
    <h2 align="center"><img src="logo.png" /></br></br>FreeDMR Talkgroup Export</h2></br>
<div class="col-md-12 head">
    <div align="center" class="float-right">
        <a href="talkgroup_ids_csv.php" class="btn btn-success"><i class="dwn"></i>Live CSV</a> <a href="talkgroup_ids_json.php" class="btn btn-success"><i class="dwn"></i>Live JSON</a> <a href="talkgroup_ids_flags_json.php" class="btn btn-success"><i class="dwn"></i>Live JSON with Flags</a> <a href="Talkgroups_FreeDMR.csv" class="btn btn-success"><i class="dwn"></i>Talkgroups_FreeDMR.csv</a> <a href="talkgroup_ids.csv" class="btn btn-success"><i class="dwn"></i>talkgroup_ids.csv</a> <a href="Talkgroups_Bridges.csv" class="btn btn-success"><i class="dwn"></i>Talkgroups_Bridges.csv</a> 
        <a href="tgmanager" class="btn btn-danger"><i class="dwn"></i> Manage TG Database</a> <a href="tgid_cron.php" class="btn btn-warning"><i class="dwn"></i> Manually update CSVs</a></br></br>
        <?php
$result = $db->query("SELECT * FROM TALKGROUPS ORDER BY COUNTRY ASC, TALKGROUP ASC"); 
$counter = $result->num_rows;
$filename="Talkgroups_FreeDMR.csv";
echo "Talkgroups CSV Last Updated: ". date ("d F Y H:i:s.", filemtime($filename)) ." Number of Talkgroups: $counter";
?>
    </div>
</div></br>

</br></br>
<!-- Data list table --> 
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>TALKGROUP</th>
            <th>NAME</th>
            <th>BRIDGES</th>
            <th>COUNTRY</th>
        </tr>
    </thead>
    <tbody>
   <?php 
    // Fetch records from database 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
        <tr>
            <td><?php echo $row['TALKGROUP']; ?></td>
            <td><img src='http://freedmr.cymru/talkgroups/flags/<?php echo $row['MCC']; ?>.png' /> <?php echo $row['NAME']; ?></td>
            <td><?php echo $row['BRIDGES']; ?></td>
            <td><?php echo $row['COUNTRY']; ?></td>
        </tr>
    <?php } }else{ ?>
        <tr><td colspan="7">No talkgroup(s) found...</td></tr>
    <?php } ?>
    </tbody>
</table>