<?php
class Database{
    //properties
    private $host = "localhost";
    private $user = "root";
    private $pwd = "135798438336612345";
    private $dbname = "interview"; 
    //methods 
    protected function connect(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;      
        $pdo = new PDO($dsn,$this->user,$this->pwd);
        $pdo->setattribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;     
    } 
  }

?>