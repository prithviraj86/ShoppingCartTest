<?php
class ProductPrice{
    private $conn;
    private $table='product_price';



    public function __construct(Database $db)
    {
        $this->conn=$db->dbConn;




    }
    public function insertProductPrice(Product $pobj)
    {
        $sql="insert into ".$this->table."(
                                    product_id,
                                    price,
                                    special_price)
                           values(".$pobj->getId().",".
                                    $pobj->getPrice().",".
                                    $pobj->getSpecialPrice().")";
        $result=mysqli_query($this->conn,$sql);
        return $result;
    }




}
?>