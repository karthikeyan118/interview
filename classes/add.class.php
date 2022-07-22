<?php
require_once("../classes/connect.php");
class Add extends Database{
    public function __construct(){
      $this->conn = $this->connect();  
    }
  
    public function Add($mail,$err){ 
        $rows = $this->conn->query("SELECT * FROM employee WHERE email = '".$mail."'")->fetchAll();       
        foreach($rows as $row) {          
          if($mail ==  $row['email'] ){
            $err['email'] = 'email already taken!';
          }  
        }
        return $err;
       } 
   
        // function to insert user details
        function insertEmp($fname,$lname,$age,$gender,$email,$address){ 
         $sql ="INSERT INTO employee(first_name,last_name,age,gender,email,address) VALUES(?,?,?,?,?,?)"; 
        $result = $this->conn->prepare($sql)->execute([$fname,$lname,$age,$gender,$email,$address]);           
         header('location:index.php');
         return $result;
        }
      }
?>