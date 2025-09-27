<?php

require_once __DIR__ . '/../config/connection.php';

class Product {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->conn;
    }

    public function getProducts() {
        return $this->db->query("SELECT * from products");
    } 

    public function getProduct($id) {
        $sql = "SELECT * from products where id_product='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function insert($data) {
        $sql = "INSERT into products values ('{$data['id_product']}', '{$data['name_product']}', '{$data['price']}', '{$data['stock']}', '{$data['img']}')";
        return $this->db->query($sql);
    }

    public function update($data) {
        $sql = "UPDATE products set id_product='{$data['id_product']}', name_product='{$data['name_product']}', price='{$data['price']}', stock='{$data['stock']}', img='{$data['img']}'}'";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE from products where id_product='$id'";
        return $this->db->query($sql);
    }
}