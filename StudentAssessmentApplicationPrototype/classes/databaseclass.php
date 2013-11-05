<?php
class database
{
	//define variables
	var $str_host;
	var $str_db;
	var $str_user;
	var $str_password;
	var $res_connection;
	var $res_result;
	
	// The constructor
	function __construct()
	{
		// Set-up the class variables from the parameters.
		$this->str_host     = "localhost";
		$this->str_db       = "studentassessment";
		$this->str_user     = "root";
		$this->str_password = "gosign";
		// Connect to MySQL
		$this->res_connection = mysql_connect($this->str_host, $this->str_user, $this->str_password);
		if(!$this->res_connection)
		{
			return false;
		}
		// Select desired database
		return mysql_select_db($this->str_db, $this->res_connection);
	}
	
	/*methods of class*/
	function query($sql){
		return $this->res_result = mysql_query($sql, $this->res_connection);
	}	
	
	function fetch(){	
		return mysql_fetch_assoc($this->res_result);	
	
	}
}

?>