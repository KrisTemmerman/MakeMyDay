<?php

class DB {
	protected $db_name = 'mmday';
	protected $db_user = 'root';
	protected $db_pass = 'root';
	protected $db_host = 'localhost';
	
	//automatically should open a db connection
	public function __construct() {
		$connection = mysql_connect($this->db_host, $this->db_user, $this->db_pass);
		mysql_select_db($this->db_name) or die(mysql_error());
		return true;
	}
	public function processRowSet($rowSet, $singleRow=false)
	{
		$resultArray = array();
		while($row = mysql_fetch_assoc($rowSet))
		{
			array_push($resultArray, $row);
		}
		
		if($singleRow === true)
			return $resultArray[0];
			
		return $resultArray;
	}
	
	
	public function select($table, $where) {
		$sql = "SELECT * FROM $table WHERE $where";
		$result = mysql_query($sql);
		if(mysql_num_rows($result) == 1)
			return $this->processRowSet($result, true);
		return $this->processRowSet($result);
	}
	
	
	public function update($data, $table, $where) {
		foreach ($data as $column => $value) {
			$sql = "UPDATE $table SET $column = $value WHERE $where";
			mysql_query($sql) or die(mysql_error());
		}
		return true;
	}
	
	
	public function insert($data, $table) {
		
		$columns = "";
		$values = "";
		
		foreach ($data as $column => $value) {
			$columns .= ($columns == "") ? "" : ", ";
			$columns .= $column;
			$values .= ($values == "") ? "" : ", ";
			$values .= $value;
		}
		
		$sql = "insert into $table ($columns) values ($values)";
				
		mysql_query($sql) or die(mysql_error());
		
		//Return iD
		return mysql_insert_id();
		
	}
	
}

?>