<link href="bootstrap.css" rel="stylesheet">

<?php 
 
// Load the database configuration file 
include_once 'dbconfig.php'; 
 
// Fetch records from database 
$query = $db->query("SELECT * FROM TALKGROUPS ORDER BY COUNTRY DESC");
$counter = $query->num_rows;

copy("Talkgroups_FreeDMR.csv", "Talkgroups_FreeDMR_backup.csv");
copy("talkgroup_ids.csv", "talkgroup_ids_backup.csv");
unlink('talkgroup_ids.csv');
unlink('Talkgroups_FreeDMR.csv');
 
if($query->num_rows > 0){ 
    $filename = "talkgroup_ids.csv";
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
     // Set column headers 
    $fields = array('id', 'callsign', 'tgid'); 
    fwrite($f, implode(",", $fields). PHP_EOL);
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){$lineData = array($row['TALKGROUP'], $row['NAME'], $row['TALKGROUP']); 
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
    $filename = "Talkgroups_FreeDMR.csv"; 
     
    // Create a file pointer 
    $f = fopen($filename, 'a');
    
      // Set column headers 
    $fields = array('Country', 'Talk Groups', 'Name');
    fwrite($f, implode(",", $fields). PHP_EOL);
    
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){$lineData = array($row['COUNTRY'], $row['TALKGROUP'], $row['NAME']); 
        fwrite($f, implode(",", $lineData). PHP_EOL);
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
// Close the file
fclose($f);
} 


rename("talkgroup_ids.csv", "./public_html/talkgroups/talkgroup_ids.csv");
rename("Talkgroups_FreeDMR.csv", "./public_html/talkgroups/Talkgroups_FreeDMR.csv");

echo "Total number of Talkgroups: $counter. ";
echo "CSV files have been updated.";

?>

</br></br><a href="index.php" class="btn btn-success">Return</a>

<?php

exit;

?>