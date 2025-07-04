<?php
namespace Core;
use PDO;
use Core\Router;
class Database{
    public $conn;
    public $st;
    public function __construct($config,$username='root',$password=''){
       
        $dsn="mysql:".http_build_query($config,'',';');

        $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); 

        $this->conn = new PDO($dsn, $username, $password,$options);

    }
    public function query($query,$params=[]){
       
      
            $this->st = $this->conn->prepare($query); 
            $this->st->execute($params); 

           
            return  $this;
            
       
    }

    public function find(){
        return $this->st->fetch();
    }

    public function findORfail(){
       $result= $this->find();
       if(!$result){
         abort(404);
       }
       return $result;
    }

    public function getAll(){
        return $this->st->fetchAll(PDO::FETCH_ASSOC);
    }
}
