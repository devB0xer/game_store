<?php

namespace App\Config;

class DatabaseConfig
{
    private $host = "127.127.126.50";
    private $db_name = "game_store";
    private $username = "root";
    private $password = "";
    private $conn;

    // получение соединения с базой данных
    public function getConnection(){
        try {
            $this->conn = new \PDO(
                "mysql:host=$this->host;dbname=$this->db_name", 
                $this->username, 
                $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (\PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
            http_response_code(500);
            die;
        } 
    }
}