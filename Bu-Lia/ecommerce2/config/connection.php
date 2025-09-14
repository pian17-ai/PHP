<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = 'gr6882899';
    private $db = 'ecommerce';

    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->conn->connect_error) {
            die ("Connection failed : " . $this->conn->connect_error);
        }
    }
}