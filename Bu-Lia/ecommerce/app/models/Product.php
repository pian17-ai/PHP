<?php
class Product {
    private $conn;
    private $table = "products";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->table}";
        return mysqli_query($this->conn, $sql);
    }

    public function getById($id) {
        $sql = "SELECT * FROM {$this->table} WHERE id_product='$id'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function insert($data) {
        $sql = "INSERT INTO {$this->table} (id_product, name_product, price, stock, img) 
                VALUES ('{$data['id_product']}', '{$data['name_product']}', '{$data['price']}', '{$data['stock']}', '{$data['img']}')";
        return mysqli_query($this->conn, $sql);
    }

    public function update($data) {
        $sql = "UPDATE {$this->table} 
                SET name_product='{$data['name_product']}', price='{$data['price']}', stock='{$data['stock']}', img='{$data['img']}'
                WHERE id_product='{$data['id_product']}'";
        return mysqli_query($this->conn, $sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM {$this->table} WHERE id_product='$id'";
        return mysqli_query($this->conn, $sql);
    }
}
