<?php
include '../class/studentclass.php';
<<<<<<< HEAD
$pass_encrypt=md5($_POST['std_pass']);
=======
$pass_encrypt=md5($_POST['var4']);
>>>>>>> dbf07b30a49fd2bf0855bc829fed64bf1db0d456
$db = new database('localhost', 'studentassessment', 'root', '');
$sql="INSERT INTO studentdata (std_name, std_class, std_rollnumber,std_password) 
<<<<<<< HEAD
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
=======
VALUES ('$_POST[var1]', '$_POST[var2]','$_POST[var3]','$pass_encrypt')";
$result=$db->query($sql);
if($result);
{
	echo"your record has bee updated";
}
 ?>
>>>>>>> dbf07b30a49fd2bf0855bc829fed64bf1db0d456
