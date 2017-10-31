<?php 
class Product
{
	private $id;
	private $userid;
	private $name;
	
	public function __construct(User $user, array $product)
	{
		
		$this->conn=mysqli_connect('localhost','root','','testshopping');

        if(!$this->conn)
        {
            throw new Exception("Connection Fail");
        }
	}
	
	
	public function setPname($name)
    {
        if(!is_string($name))
        {
        throw new Exception("Product name must be a string!");
        }
        else
        {
        $this->name=$name;
        }
    }
    public function getPname()
    {
         return $this->name;
    }
    public function setPid($id)
    {
        if(!is_integer($id))
        {
        throw new Exception("Product id must be a number!");
        }
        else
        {
        $this->id=$id;
        }
    }
    public function getPid()
    {
        return $this->id;
    }
	
	
}

?>