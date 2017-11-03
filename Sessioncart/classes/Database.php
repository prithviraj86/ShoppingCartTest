<?php
class Database
{
	private $serverName="localhost";
    private $userName="root";
    private $password="";
    private $dbName='store';
	public $dbConn;
	
	
	public function __construct()
	{
		$this->dbConn= new mysqli($this->serverName, $this->userName, $this->password, $this->dbName);
		if($this->dbConn)
		return $this->dbConn;
		
	}
}