<?php 

require_once __DIR__ . '../config/connection.php';

class User {
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->conn;
    }

    public function getUsers() {
        $sql = "SELECT * from users";
        return $this->db->query($sql);
    }

    public function getUser($id) {
        $sql = "SELECT * from users where id_user='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    public function insert ($data) {
        $sql = "INSERT into users values (id_user='{$data['id']}', name='{$data['name']}', email='{$data['email']}', password='{$data['$password']}', phone='{$data['phone']}', address='{$data['address']}')";
        return $this->db->query($sql);
    }

    public function update($data) {
        $sql = "UPDATE users set id_user='{$data['user']}', name='{$data['name']}', email='{$data['email']}', password='{$data['password']}', phone='{$data['phone']}', address='{$data['address']}'";
        return $this->db->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE from users where id_user='$id'";
        return $this->db->query($sql);
    }
}