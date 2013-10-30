<?php
include '../classes/databaseclass.php';
include '../classes/studentclass.php';
	$stdobj = new student();
	$stdobj->insertStudent($_POST);
 ?>
