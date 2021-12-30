<?php 
namespace ClothesShop\Lib;
include_once 'Database.php';

class Product extends Database{

    private $id;
    private $name_product;
    private $color;
    private $size;
    private $price;
    private $quantity;
    private $image_url;

    protected static $db_table = "products";
    protected static $db_table_fields = array( 'id','name_product','color','size','price','quantity','image_url');
    
//productid
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }


//name
    public function getName_product(){
        return $this->name_product;
    }

    public function setName_product($name_product){
        $this->name_product = $name_product;
    }

//color
    public function getColor(){
        return $this->color;
    }

    public function setColor($color){
        $this->color = $color;
    }  

//size
    public function getSize(){
        return $this->size;
    }

    public function setSize($size){
        $this->size = $size;
    } 


//price
    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    } 

//quantity
    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    } 

//image_url
    public function getImage_url(){
        return $this->image_url;
    }

    public function setImage_url($image_url){
        $this->image_url = $image_url;
    } 

}
?>
