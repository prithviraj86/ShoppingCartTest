<?php
class ProductDetail{
    private $conn;
    private $table='product_details';



    public function __construct(Database $db)
    {
        $this->conn=$db->dbConn;




    }
    public function insertProductDetail(Product $pobj)
    {

        $sql="insert into ".$this->table."(
                                        product_id,
                                        manufacturer,
                                        quantity,
                                        weight,
                                        description) 
                                    values(".
                                        $pobj->getId().",'".
                                        $pobj->getManufacturer()."',".
                                        $pobj->getQuantity().",'".
                                        $pobj->getWeight()."','".
                                        $pobj->getDescription()."')";
       // echo $sql;die;
        $result=mysqli_query($this->conn,$sql);
        if(!$result)
        {
            throw new Exception('Product not inserted');
        }
        return $result;
    }


}
?>