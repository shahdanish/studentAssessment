<?php
include '../class/studentclass.php';
$pass_encrypt=md5($_POST['std_pass']);
$db = new database('localhost', 'studentassessment', 'root', '');
// Perform a query selecting five articles
$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
VALUES ('$_POST[std_nam]', '$_POST[std_clssel]','$_POST[std_rn]','$pass_encrypt')";
$result=$db->query($sql); // Creates a MySQLResult object
if($result){	
	echo"your record has bee updated";
}
else{
	echo"not updated";
}
 ?>
 <div style="widht: 400px height: 300px; display: inline-block">fdjakfdjlkafdjljdfljdflak</div>