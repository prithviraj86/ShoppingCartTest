<?php
class ProductPrice{
    private $conn;
    private $table='product_price';
    private $product_id;
    private $price;
    private $special_price;

    public function __construct(Database $db,Product $pobj)
    {
        $this->conn=$db->dbConn;
        $this->setProductId($pobj->getId());



    }
    public function insertProductPrice(array $product)
    {
        $this->setPrice($product['price']);
        $this->setSpecialPrice($product['sprice']);
        $sql="insert into ".$this->table."(
                                    product_id,
                                    price,
                                    special_price)
                           values(".$this->getProductId().",".
                                    $this->getPrice().",".
                                    $this->getSpecialPrice().")";
        $result=mysqli_query($this->conn,$sql);
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
    public function setPrice($price)
    {
        $this->price=$price;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setSpecialPrice($sprice)
    {
        $this->special_price=$sprice;
    }
    public function getSpecialPrice()
    {
        return $this->special_price;
    }



}
?>