<?php 
 
// Load the database configuration file 
include_once 'dbconfig.php'; 
?>
   <?php 
    // Fetch records from database 
    $result = $db->query("SELECT * FROM TALKGROUPS ORDER BY TALKGROUP ASC"); ?> 
    {"results": [
    <?php if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>{"tgid": <?php echo $row['TALKGROUP']; ?>, "callsign": "<?php echo $row['NAME']; ?>", "id": "<?php echo $row['TALKGROUP']; ?>"}, 
    <?php } } else{ ?>
        No talkgroup(s) found...
    <?php } ?> {"tgid": 9990, "callsign": "ECHO", "id": "9990"}]}