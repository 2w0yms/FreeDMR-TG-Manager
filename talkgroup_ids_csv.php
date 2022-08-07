<?php 
 
// Load the database configuration file 
include_once 'dbconfig.php'; 
?>
   <?php 
    // Fetch records from database 
    $result = $db->query("SELECT * FROM TALKGROUPS ORDER BY TALKGROUP ASC"); 
    if($result->num_rows > 0){ 
        while($row = $result->fetch_assoc()){ 
    ?>
<?php echo $row['COUNTRY']; ?>,<?php echo $row['TALKGROUP']; ?>,<?php echo $row['NAME']; ?><?php echo PHP_EOL; ?>
    <?php } }else{ ?>
        No talkgroup(s) found...
    <?php } ?>