<?php

class StudentModel
{
    private $dbh; //database handler
    private $stmt;

    public function __construct()
    {
        // data source name
        $dsn = "mysql:host=localhost;dbname=mymvc";

        try {
            $this->dbh = new PDO($dsn, 'pma', 'pmapass');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllStudents()
    {
        $this->stmt = $this->dbh->prepare("SELECT * from students");
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);;
    }
}
