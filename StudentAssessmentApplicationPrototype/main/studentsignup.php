<?php
include '../class/studentclass.php';
$pass_encrypt=md5($_POST['password']);
$db = new database('localhost', 'studentassessment', 'root', '');
// Perform a query selecting five articles
$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
VALUES ('$_POST[username]', '$_POST[classselected]','$_POST[rollnumber]','$pass_encrypt')";
$db->query($sql); // Creates a MySQLResult object
echo"your record has bee updated";
header('location:../signupform.php#tologin');
 ?>