<?php
namespace App\Models;

abstract class CRUD extends \PDO{
   final public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=e2396650;port=3306; charset=utf8', 'e2396650','EVz04n17YCXqnBLKpGWy');
    }

    // mysql:host=localhost;dbname=e2396650;port=3306; charset=utf8', 'e2396650','EVz04n17YCXqnBLKpGWy

   final public function select($field = null, $order = 'ASC'){
        if($field == null){
            $field = $this->primaryKey;
        }
        $sql = "SELECT * FROM $this->table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    final public function selectId($value){
        $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey ";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

    final public function insert($data){
        // print_r($data);
        // die();
        $data_keys = array_fill_keys($this->fillable, '');
        $data = array_intersect_key($data, $data_keys);
        $fieldName = implode(', ', array_keys($data));
        $fieldvalue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $this->table ($fieldName) values ($fieldvalue)";        

        $stmt= $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->lastInsertId();
        }else{
            return false;
        }
        
    }

    public function unique($field, $value){
        $field = $field ?? $this->primaryKey;

        $sql = "SELECT * FROM $this->table WHERE $field = :$field";
        $stmt= $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        }
    }

}

?>