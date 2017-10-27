<?php
class Product
{
Private $id;
Private $name;
Private $uid;
Private $uname;
public function __construct(User $user, array $product) {
if(empty($user) or empty($product))
{
throw new Exception("Wrong data");
}
else
{
$this->setPid($product['id']);
$this->setPname($product['name']);
$this->uid =$user->getUid();
$this->uname =$user->getUname();
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
public function getUid()
{
return $this->uid;
}
public function getUname()
{
return $this->uname;
}

}