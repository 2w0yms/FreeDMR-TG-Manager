<link href="bootstrap.css" rel="stylesheet">

<?php 
$backupdir = "/home/freedmr/public_html/talkgroups/backups";
$csvdir = "/home/freedmr/public_html/talkgroups";
 
// Load the database configuration file 
include_once 'dbconfig.php'; 
 
copy("$csvdir/Talkgroups_FreeDMR.csv", "$backupdir/Talkgroups_FreeDMR_backup.csv");
copy("$csvdir/Talkgroups_Bridges.csv", "$backupdir/Talkgroups_Bridges_backup.csv");
copy("$csvdir/talkgroup_ids.csv", "$backupdir/talkgroup_ids_backup.csv");
copy("$csvdir/server_list.csv", "$backupdir/server_list_backup.csv");
unlink("$csvdir/talkgroup_ids.csv");
unlink("$csvdir/Talkgroups_FreeDMR.csv");
unlink("$csvdir/Talkgroups_Bridges.csv");
unlink("$csvdir/server_list.csv");

// Fetch records from database 
$query = $db->query("SELECT * FROM TALKGROUPS ORDER BY COUNTRY DESC");
$counter = $query->num_rows;

if($query->num_rows > 0){ 
    $filename = "$csvdir/talkgroup_ids.csv";
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
     // Set column headers 
    $fields = array('id', 'callsign', 'tgid'); 
    fwrite($f, implode(",", $fields). PHP_EOL);
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){
        $lineData = array($row['TALKGROUP'], $row['NAME'], $row['TALKGROUP']); 
        fwrite($f, implode(",", $lineData). PHP_EOL); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
// Close the file
fclose($f);
} 

// Fetch records from database 
$query = $db->query("SELECT * FROM TALKGROUPS ORDER BY COUNTRY DESC"); 

if($query->num_rows > 0){ 
    $filename = "$csvdir/Talkgroups_FreeDMR.csv"; 
     
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
      // Set column headers 
    $fields = array('Country', 'Talk Groups', 'Name');
    fwrite($f, implode(",", $fields). PHP_EOL);
    
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){
        $tgname = '<img src="https://freedmr.cymru/talkgroups/flags/' .$row['MCC']. '.png" /> ' .$row['NAME']. '';
        $lineData = array($row['COUNTRY'], $row['TALKGROUP'], $tgname); 
        fwrite($f, implode(",", $lineData). PHP_EOL);
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
// Close the file
fclose($f);
} 

// Fetch records from database 
$query = $db->query("SELECT * FROM TALKGROUPS ORDER BY COUNTRY DESC"); 

if($query->num_rows > 0){ 
    $filename = "$csvdir/Talkgroups_Bridges.csv"; 
     
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
      // Set column headers 
    $fields = array('Country', 'Talkgroup', 'Bridges');
    fwrite($f, implode(",", $fields). PHP_EOL);
    
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){
        $tgbridges = '<img src="https://freedmr.cymru/talkgroups/flags/' .$row['MCC']. '.png" /> ' .$row['BRIDGES']. '';
        $lineData = array($row['COUNTRY'], $row['TALKGROUP'], $tgbridges);
    if ($row['BRIDGES'] != '') {
        fwrite($f, implode(",", $lineData). PHP_EOL);
    }
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
// Close the file
fclose($f);
} 

// Fetch records from database 
$query = $db->query("SELECT * FROM SERVERS ORDER BY name ASC"); 
$counterb = $query->num_rows;

if($query->num_rows > 0){ 
    $filename = "$csvdir/server_list.csv"; 
     
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
      // Set column headers 
    $fields = array('Flag', 'ServerID', 'Country Name', 'Dashboard', 'Dashboard2', 'Website', 'Telegram', 'Socials');
    fwrite($f, implode(",", $fields). PHP_EOL);
    
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){
        $flag = '<img src="https://freedmr.cymru/talkgroups/flags/' .$row['mcc']. '.png" />';
        $name = '<div style="color:#20bd67">' .$row['name']. '</div>';
        if ($row['website'] !== '') { $website = '<a href="'.$row['website'].'" target="_blank">Website</a>'; } else { $website = ''; }
        if ($row['dashboard'] !== '') { $dashboard = '<a href="'.$row['dashboard'].'" target="_blank">Dashboard</a>'; } else { $dashboard = ''; }
        if ($row['dashboard2'] !== '') { $dashboard2 = '<a href="'.$row['dashboard2'].'" target="_blank">Dashboard 2</a>'; } else { $dashboard2 = ''; }
        if ($row['telegram'] !== '') { $telegram = '<a href="https://t.me/'.$row['telegram'].'" target="_blank">Telegram</a>'; } else { $telegram = ''; }
        if ($row['socials'] !== '') { $socials = '<a href="'.$row['socials'].'" target="_blank">Social Media</a>'; } else { $socials = ''; }
        $lineData = array($flag, $row['serverid'], $name, $dashboard, $dashboard2, $website, $telegram, $socials);
    if ($row['serverid'] != '') {
        fwrite($f, implode(",", $lineData). PHP_EOL);
    }
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
// Close the file
fclose($f);
} 

echo "Total number of Talkgroups: $counter. </br>";
echo "Total number of Servers: $counterb. </br>";
echo "CSV files have been updated.";

?>

</br></br><a href="index.php" class="btn btn-success">Return</a>

<?php

exit;

?>
