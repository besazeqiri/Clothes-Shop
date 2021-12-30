<?php

namespace ClothesShop\Lib;
include_once 'Database.php';

class Client extends Database{
    
    private $id;
    private $firstname;
    private $lastname;
    private $date;
    private $phone;
    private $email;
    private $password;
    private $account_number;

    protected static $db_table = "clients";
    protected static $db_table_fields = array( 'id','firstname','lastname','date','phone','email','password','account_number');
    
//clientid
    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

//firstname
    public function getFirstname(){
        return $this->firstname;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }  

//lastname

    public function getLastname(){
        return $this->lastname;
    }

    public function setLastname($lastname){
        $this->lastname = $lastname;
    } 

//date

    public function getDate(){
        return $this->date;
    }


    public function setDate($date){
        $this->date= $date;
    }

//phone

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($phone){
        $this->phone = $phone;
    } 

//email
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    } 

//password
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    } 


//account_number

    public function getAccount_number(){

         return $this->account_number;
    }

    public function setAccount_number($account_number){
         $this->account_number =$account_number;
    }



/*role
    public function getRole(){
    return $this->role;
   }

    public function setRole($role){
    $this->role = $role;
    } 
*/

}
?>
