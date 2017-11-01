<?php
include('connection.php');
class login extends Database
{

    public $conn;
    public function __construct()
    {
        //$this->conn=new Database();
        //print_r($this->conn);
        $this->conn=parent::__construct();
    }
    public function login($email,$password)
    {

        $sql="select id from customers where email='$email' and password='$password'";
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