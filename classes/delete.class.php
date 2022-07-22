<?php
require_once("../classes/connect.php");
class Delete extends database{
    public function __construct(){
        $this->conn = $this->connect();  
      }
      
    function Del(){
        $deleteId = $_REQUEST['emp'];
        $delTask = "DELETE FROM employee WHERE emp_id='".$deleteId."'";
        $this->conn->prepare($delTask)->execute();        
        header ('location:index.php');
            }
        }
?>