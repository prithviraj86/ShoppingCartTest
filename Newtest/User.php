<?php
class User
{
    Private $id;
    Private $name;
    Private $user;



    public function __construct($id,$name)
    {
        if(empty($id) or empty($name))
        {
            throw new Exception("Wrong data");
        }
        else
        {
            $this->setUid($id);
            $this->setUname($name);
        }
    }
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
}

?>