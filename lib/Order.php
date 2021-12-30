<?php
namespace ClothesShop\Lib;
include_once 'Database.php';

class Order extends Database{

    private $id;
    private $productid;
    private $clientid;
    private $order_date;

    protected static $db_table = "orders";
    protected static $db_table_fields = array( 'id','productid','clientid','order_date');
    
//orderid
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }


//productid
    public function getProductId(){
        return $this->productid;
    }

    public function setProductId($productid){
        $this->productid = $productid;
    }


    //clientid
    public function getClientId(){
        return $this->clientid;
    }

    public function setClientId($clientid){
        $this->clientid = $clientid;
    }

//order_date
    public function getOrder_date(){
        return $this->order_date;
    }

    public function setOrder_date($order_date){
        $this->order_date = $order_date;
    } 

}
?>
