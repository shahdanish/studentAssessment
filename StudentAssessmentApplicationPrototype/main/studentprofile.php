<?php
include '../class/studentclass.php';
 
$db = new database('localhost', 'studentassessment', 'root', '');
// Perform a query selecting five articles
$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
VALUES ('$_POST[username]', '$_POST[class]','$_POST[rollnumber]','$_POST[password]')";
$db->query($sql); // Creates a MySQLResult object
$sql = 'SELECT * FROM studentdata LIMIT 0,5';
$db->query($sql);
// Display the results
while ($row = $db->fetch()) {
  // Display results here
  print_r($row);
  
}
 ?>