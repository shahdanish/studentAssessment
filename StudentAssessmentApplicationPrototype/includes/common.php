<?php
  define("FULLPATH","http://localhost/csit/index.php");
  
  include("classes/class.DB.php");
   $dbobj =new DB();
   $dbobj->connect();
  session_start();
?>