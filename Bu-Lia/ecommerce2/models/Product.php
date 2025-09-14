<?php

require_once __DIR__ . '/../config/connection.php';

class Product {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->conn;
    }

    public function getProducts() {
        $sql = "SELECT * from products";
        return $this->db->query($sql);
    }

    public function getProduct($id) {
        $sql = "SELECT * from products where id_product='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function insert($data) {
        $sql = "INSERT into products values ('{$data['id']}', '{$data['name']}', '{$data['desc']}', '{$data['price']}', '{$data['stock']}', '{$data['img']}')";
        return $this->db->query($sql);
    }

    public function update($data) {
        $sql = "UPDATE products set id_product='{$data['id']}', name_product='{$data['name']}', description='{$data['desc']}', price='{$data['price']}', stock='{$data['stock']}', img='{$data['img']}' where id_product='{$data['id']}'";
        return $this->db->query($sql);
    }

    public function delete ($id) {
        $sql = "DELETE from products where id_product='$id'";
        return $this->db->query($sql);
    }
}