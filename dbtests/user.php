<?php
class User
{
    Private $id;
    Private $name;
    Private $email;
    Private $user;
    public $conn;


    public function __construct()
    {
        $this->conn=mysqli_connect('localhost','root','','testshopping');

        if(!$this->conn)
        {
            throw new Exception("Connection Fail");
        }

    }
    //Getter and setter for username
    public function setUname($name)
    {
        if(!is_string($name))
        {
            throw new Exception("Username must be a string!");
        }
        else
        {
            $this->name=$name;
        }
    }
    public function getUname()
    {
        return $this->name;
    }
    //Getter and setter for user id
    public function setUid($id)
    {
        if(!is_integer($id))
        {
            throw new Exception("User id must be a number!");
        }
        else
        {
            $this->id=$id;
        }
    }
    public function getUid()
    {
        return $this->id;
    }
    //Getter and setter for email
    public function setUemail($email)
    {
        if($email=='')
        {
            throw new Exception("Please enter email address ");
        }
        else
        {
            $this->email=$email;
        }
    }
    public function getUemail()
    {
        return $this->email;
    }

    public function selectUserById($id)
	{
		$string="select name,email from user where id=".$id;
		$result=mysqli_query($this->conn,$string);
		$data=mysqli_fetch_assoc($result);
		return $data;
	}
	public function selectUsers()
	{
		$string="select name,email from user";
		$result=mysqli_query($this->conn,$string);
		
		
		return $result->num_rows;
		
	}
	//Insert user detail
    public function insertUser($name,$email)
    {
		$this->setUname($name);
		$this->setUemail($email);
        $string = "INSERT INTO USER (name,email) VALUES ('" . $this->getUname() . "','" . $this->getUemail()  . "')";
        $insstatus=mysqli_query($this->conn, $string);
        return $insstatus;
    }
	//Update user detail
	public function updateUser($id,$name,$email)
    {
		$this->setUid($id);
		$this->setUname($name);
		$this->setUemail($email);
        $string = "Update User SET name='" . $this->getUname() . "',email='" . $this->getUemail()  . "' where id=".$this->id;
        $upstatus=mysqli_query($this->conn, $string);
        return $upstatus;
    }
	//Delete user detail
	public function deleteUser($id)
    {
		$this->setUid($id);
        $string = "delete from User where id=".$this->id;
        $upstatus=mysqli_query($this->conn, $string);
        return $upstatus;
    }
}
// $obj=new user();
// $obj->selectUsers(1);
?>	
