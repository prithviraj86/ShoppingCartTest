<?php
session_start();
class Database{
	public $serverName="localhost";
	public $userName="root";
	public $password="";
	public $dbName='store';
	public $conn;
	
	public function __construct()
	{
		$this->conn= new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
		if($this->conn)
		return $this->conn;
		
	}
}