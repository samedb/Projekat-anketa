<?php

function izvrsi_upit($sql) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Anketa";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    } 
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

class DBH {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "Anketa";
    

    public function __construct()
    {
        // Create connection
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }


    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function close() {
        $this->conn->close();
    }

}

?>