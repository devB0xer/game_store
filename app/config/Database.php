<?php

namespace App\Config;

class Database
{
    private $host = "127.127.126.50";
    private $db_name = "game_store";
    private $username = "root";
    private $password = "";
    public $conn;

    // получение соединения с базой данных
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new \PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password);
        } catch (\PDOException $exception) {
            echo "Ошибка соединения: " . $exception->getMessage();
            http_response_code(500);
            die;
        }

        return $this->conn;
    }
}