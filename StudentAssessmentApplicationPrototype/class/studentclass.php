<?php
//define class
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
	function __construct($str_host, $str_db, $str_user, $str_password)
	{
		// Set-up the class variables from the parameters.
		$this->str_host     = (string) $str_host;
		$this->str_db       = (string) $str_db;
		$this->str_user     = (string) $str_user;
		$this->str_password = (string) $str_password;
		// Connect to MySQL
		$this->res_connection = mysql_connect($this->str_host, $this->str_user, $this->str_password);
		if(!$this->res_connection)
		{
			return false;
		}
		// Select desired database
		return mysql_select_db($this->str_db, $this->res_connection);
	}
	
	// The destructor
	function __destruct()
	{
		// Close a mysql connection we might've created earlier
		if ($this->res_connection)
		{
			  mysql_close($this->res_connection);
		}
	}
	
	/*methods*/
	function query($sql){
		// Query SQL
		return $this->res_result = mysql_query($sql, $this->res_connection);
	}		

	function fetch(){
		// Fetch result		
		return mysql_fetch_assoc($this->res_result);	
	}		
			
}

?>