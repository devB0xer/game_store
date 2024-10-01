<?php

namespace App\Core;

use App\Config\Database;

class Model
{
    protected $conn;

    public $table_name;

    protected $columns; 

    public function __construct(Database $db = new Database) {
        $this->conn = $db->getConnection();
    }

    public function setСolumns(array $arr){
        $this->columns = 'someString';
        return $this;
    }

    public function get()
    {

        $query = "SELECT " . $this->columns . " FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getAll()
    {

        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function getWhere(string $param){

        $query = "SELECT * FROM " . $this->table_name . "WHERE" . $param;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;

    }
}