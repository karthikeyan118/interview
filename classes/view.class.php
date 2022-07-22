<?php
require_once("../classes/connect.php");
class View extends database{
    public function __construct(){
        $this->conn = $this->connect();  
      } 
      
    function viewTask($id){  
        return $this->conn->query("SELECT first_name,last_name,age,gender,email,address FROM employee WHERE emp_id='".$id."'");        
    }
   }
?>