<?php
require_once("../classes/connect.php");
class data extends database{
    public function __construct(){
      $this->conn = $this->connect();  
    }
  
     function myLists() { 
     $records = $this->conn->query("SELECT * FROM employee");      
     return $records;
     }
    }
?>