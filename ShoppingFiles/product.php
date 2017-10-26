<?php
include('users.php');
class Product
{
	public $id;
	public $name;
	public $uid;
	public $uname;
	public function __construct(User $user, array $product) {
		if(empty($user) or empty($product))
		{
			throw new Exception("Wrong data");
		}
		else
		{
			$this->id = $product['id'];
			$this->name = $product['name'];
			$this->uid =$user->getUid();
			$this->uname =$user->getUname();
		}

      
    }
	public function getName()
	{
		return $this->name;
	}
	public function getId()
	{
		return $this->id;
	}
}
?>