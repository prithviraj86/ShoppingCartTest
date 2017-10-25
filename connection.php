<?php
// used to get mysql database connection
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "shopping_cart";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public function __construct(){
     
        $this->conn = null;
 
        $this->conn =mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if (!$this->conn) {
            die('Could not connect to database!');
        } else {
        
        return $this->conn;
    }
 
}
?>