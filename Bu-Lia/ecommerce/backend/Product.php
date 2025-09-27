<?php
include '../php.ini';
include '../koneksi.php';

class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "gr6882899";
    private $dbname = "ecommerce";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }
}

class Product {
    private $db;

    public function __construct($db)
    {
        $this->db = $db->conn;
    }

    public function getProducts() {
        $sql = "SELECT * from products";
        return $this->db->query($sql);
    }

    public function getProduct($id) {
        $sql = "SELECT * from products where id_product='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }
}
