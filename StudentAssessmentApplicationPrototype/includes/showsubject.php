<?php
include '../classes/databaseclass.php';
include '../classes/teacherclass.php';
if(isset($_POST['clas'])){
	$dbobj= new database();
	$classname=$_POST['clas'];
	$table = "";
	$query= "SELECT * FROM subject WHERE subject_class = '$classname'";
	$result = $dbobj->query($query);
	while($row=$dbobj->fetch($result)) {   
	$tablerow = "<option>" . $row['subject_name'] . "</option>";
	$table .= $tablerow;
    }
	echo $table;
}
?>