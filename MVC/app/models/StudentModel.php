<?php

class StudentModel
{

    private $table = 'students';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllStudents()
    {
        $this->db->query("SELECT * from " . $this->table);
        return $this->db->resultSet();
    }

    public function getStudentById($id) {
        $this->db->query("SELECT * from " . $this->table . " WHERE id=:id");

        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
