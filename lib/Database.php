<?php
namespace ClothesShop\Lib;
use Exception;
use PDO;
use ReflectionClass;

abstract class Database{

    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'clothes';

    public function __construct(){
        $this->connectDB();
    }

    private function connectDB(){
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e){
            echo "Lidhja me bazen e shenimeve deshtoi " . $e->getMessage();
        }
    }

    public function prepare($sql){
        return $this->connectDB()->prepare($sql);
    }

    public function getClassName(){
        $class_name = new ReflectionClass($this); 
        return $class_name = ucfirst($class_name->getShortName());
    }

    public function properties_value(){
        $properties = array();
        $class = new ReflectionClass($this);
        $methods = $class->getMethods();
        foreach ($methods as $method) {
            if (substr($method->name, 0, 3) === 'get') {
                foreach (static::$db_table_fields as $field) {
                    if (substr(strtolower($method->name), 3, strlen($method->name) - 1) === $field) {
                        if ($field != 'id') {
                            $properties[substr(strtolower($method->name), 3)] = $this->{$method->name}();
                        }
                    }
                }
            }
        }
        return $properties;
    }


    public function get_all(){
        $sql = "SELECT * FROM " . static::$db_table;
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function get_by_id($id){   
        $sql = "SELECT * FROM " . static::$db_table;
        $sql .= " WHERE id=" . $id;
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        $result = $stmt->fetch();
        return $result;
    }


    public function create(){
        try {
            $p = $this->properties_value();
            $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($p)) . ")";
            $sql .= "VALUES('" . implode("','", array_values($p)) . "')";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }


    public function update($id){
        try {
            $properties = $this->properties_value();
            $properties_pair = array();
            foreach ($properties as $key => $value) {
                $properties_pair[] = "{$key}='{$value}'";
            }
            $sql = "UPDATE " . static::$db_table . " SET ";
            $sql .= implode(", ", $properties_pair);
            $sql .= " WHERE id = " . $id;
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public function delete($id){
        try {
            $sql = "DELETE from " . static::$db_table . " WHERE id = $id";
            $stmt = $this->prepare($sql);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }     

    public function order_clientid($id){
        $sql="SELECT o.id, o.productid, o.clientid, o.order_date from orders o 
        INNER JOIN products p on o.productid=p.id INNER JOIN clients c on o.clientid=c.id WHERE o.clientid=$id";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ . "\\{$this->getClassName()}");
        $result = $stmt->fetchAll();
        return $result;
    }
       
/*
       public function logout()
       {
           session_destroy();
           unset($_SESSION['index.php']);
           return true;
       }
*/
    
    public function login($email, $password){
        $sql = "SELECT * FROM clients WHERE email = '$email' AND password='$password'";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        if($result){
                if($result['email']==$email && $result['password']== $password){
                    session_start();
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['firstname'] = $result['firstname'];
                    $_SESSION['lastname'] = $result['lastname'];
                    $_SESSION['date'] = $result['date'];
                    $_SESSION['phone'] = $result['phone'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['password'] = $result['password'];
                    $_SESSION['account_number'] = $result['account_number'];
                    $_SESSION['role'] = $result['role'];
                }
                if ($result['role']=='1'){
                header ("location: admin.php");
              }
          else{
              header ("location: view_product.php");
            }
         }
     }           
}
?>


