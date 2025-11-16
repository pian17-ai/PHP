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

    public function getStudentById($id)
    {
        $this->db->query("SELECT * from " . $this->table . " WHERE id=:id");

        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function insert($data)
    {
        $query =    "INSERT into students
                    VALUES 
                    (null, :name, :nrp, :email, :major)";

        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('nrp', $data['nrp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('major', $data['major']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($id) {
        $query = "DELETE from students where id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
