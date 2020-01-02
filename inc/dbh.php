<?php

class DBH {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Anketa";
    private $conn = null;

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }

    public function __destruct()
    {
        $this->close();
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }

}

?>