<?php
class Product 
{
	public $id;
	public $name;
	public function __construct($id, $name) {
		if(empty($id) or empty($name))
		{
			throw new Exception("Wrong data ");
		}
		else
		{
			$this->id = $id;
			$this->name = $name;
		}

      
    }
}
?>