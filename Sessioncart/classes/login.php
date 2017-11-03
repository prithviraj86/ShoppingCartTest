<?php
class Login
{
    private $table='customers';
    private $db;
    public $conn;

    public function __construct()
    {
        $this->db=new Database();
        //print_r($this->conn);
        $this->conn=$this->db->dbConn;
    }
    public function login(string $email,string $password)
    {

        $sql="select id from ".$this->table." where email='$email' and password='$password'";
        //echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        $data=mysqli_fetch_array($result);
        if($data['id']>0)
        {
        $_SESSION['user_id']=$data['id'];
        return $data['id'];
        }
        else
        {
            return false;
        }

    }

}