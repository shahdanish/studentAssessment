<html>
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
//$sql = 'SELECT * FROM studentdata LIMIT 0,5';
//$db->query($sql);
// Display the results
/*while ($row = $db->fetch()) {
  // Display results here
  print_r($row);
  
}*/
 ?>
 <head>
    <link href="../css/student_profile.css" rel="stylesheet" type="text/css">
 </head>
 <body>
 <div class="studentdashboard">
	<div class="student_data">
		<label>Class:</label><?php  ?>
	</div>
 </div>
 </body>
 </html>