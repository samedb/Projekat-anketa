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

?>