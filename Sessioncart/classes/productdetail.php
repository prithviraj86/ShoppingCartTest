<?php
class ProductDetail{
    private $conn;
    private $table='product_details';

    private $product_id;
    private $manufacturer;
    private $quantity;
    private $weight;
    private $description;

    public function __construct(Database $db,Product $pobj)
    {
        $this->conn=$db->dbConn;
        $this->setProductId($pobj->getId());



    }
    public function insertProductDetail(array $product)
    {
        $this->setManufacturer($product['manufacturer']);
        $this->setQuantity($product['quantity']);
        $this->setWeight($product['weight']);
        $this->setDescription($product['description']);
        $sql="insert into ".$this->table."(
                                        product_id,
                                        manufacturer,
                                        quantity,
                                        weight,
                                        description) 
                                    values(".
                                        $this->getProductId().",'".
                                        $this->getManufacturer()."',".
                                        $this->getQuantity().",'".
                                        $this->getWeight()."','".
                                        $this->getDescription()."')";
       // echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        if(!$result)
        {
            throw new Exception('Product not inserted');
        }
        return $result;
    }
    public function setProductId($pid)
    {
        $this->product_id=$pid;
    }
    public function getProductId()
    {
        return $this->product_id;
    }
    public function setManufacturer($manufacturer)
    {
        $this->manufacturer=$manufacturer;
    }
    public function getManufacturer()
    {
        return $this->manufacturer;
    }
    public function setQuantity($quantity)
    {
        $this->quantity=$quantity;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public  function setWeight($weight)
    {
        $this->weight=$weight;
    }
    public function getWeight()
    {
        return $this->weight;
    }
    public  function setDescription($description)
    {
        $this->description=$description;
    }
    public function getDescription()
    {
        return $this->description;
    }
}
?>