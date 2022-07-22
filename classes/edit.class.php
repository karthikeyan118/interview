<?php
require_once("../classes/connect.php");
class Edit extends Database{
    public function __construct(){
        $this->conn = $this->connect();  
      }

    function getId($id){   
        return $this->conn->query("SELECT first_name,last_name,age,gender,email,address FROM employee WHERE emp_id='".$id."'");   
    }

    function editEmp($empId,$fname,$lname,$age,$gender,$email,$address){    
       $qry = "UPDATE employee SET first_name=?,last_name=?,age=?,gender=?,email=?,address=? WHERE emp_id ='".$empId."'";
       $this->conn->prepare($qry)->execute([$fname,$lname,$age,$gender,$email,$address]); 
     echo "<script>window.location.href='index.php';</script>";
    
    }
   }



?>