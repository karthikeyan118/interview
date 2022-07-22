<?php
require_once("../classes/connect.php");

class Login extends Database{
  public function __construct(){
    $this->conn = $this->connect();  
  }

  public function loggingIn($email,$pin) { 
     $row = $this->conn->query("SELECT * FROM admin WHERE email = '".$email."' AND password='".$pin."' LIMIT 1")->fetch();     
     if($row){ 
       $_SESSION['email'] = $row['email']; 
       $_SESSION['id'] = $row['adm_id'];       
       header ('location:index.php');    
     }
     return $row;
     }
    
     // function to insert user details
     function insertVal($email,$pin){ 
        $sql ="INSERT INTO admin(email,password) VALUES(?,?)"; 
       $result = $this->conn->prepare($sql)->execute([$email,$pin]);     
        $_SESSION['id'] = $this->conn->lastInsertId(); 
        $_SESSION['email'] = $email;
        header('location:index.php');
        return $result;
       }
    }
?>