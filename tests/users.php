<?php
class User
{
	public $id;
	public $name;
	public function __construct($id, $name) {
		if(empty($id) or empty($name))
		{
			throw new Exception("Wrong data");
		}
		else
		{
			$this->id = $id;
			$this->name = $name;
		}

      
    }
	public function getUname()
	{
		return $this->name;
	}
	public function getUid()
	{
		return $this->id;
	}	
}

?>