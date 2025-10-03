<?php

require_once __DIR__ . '/../config/connection.php';

class Orders
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->conn;
    }

    public function getOrders()
    {
        $sql = "SELECT o.*, p.name_product, p.img, p.price, p.description
                FROM orders o
                JOIN products p ON o.id_product = p.id_product";
        return $this->db->query($sql);
    }

    public function getOrder($id)
    {
        $sql = "SELECT o.*, p.name_product, p.img, p.price, p.description
                FROM orders o
                JOIN products p ON o.id_product = p.id_product
                WHERE o.id_order = '$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function insert($data)
    {
        $id_product = $data['id_product'];
        $user_id    = $data['user_id'];
        $quantity   = $data['quantity'];
        $price      = $data['price'];

        $sql = "INSERT INTO orders (id_product, user_id, quantity, price_at_order, created_at)
                VALUES ('$id_product', '$user_id', '$quantity', '$price', NOW())";

        return $this->db->query($sql);
    }

    public function updateQuantity($id_order, $quantity)
    {
        $sql = "UPDATE orders SET quantity = '$quantity' WHERE id_order = '$id_order'";
        return $this->db->query($sql);
    }

    public function delete($id_order)
    {
        $sql = "DELETE FROM orders WHERE id_order = '$id_order'";
        return $this->db->query($sql);
    }
}
