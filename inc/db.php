<?php

define("SERVER_NAME", "localhost");
define("USER_NAME", "root");
define("PASSWORD", "");
define("DB_NAME", "Anketa");

function izvrsi_upit($sql, $tipovi = null, ...$atributi){
    $conn = new mysqli(SERVER_NAME, USER_NAME, PASSWORD, DB_NAME);
    if ($conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
    } 
    
    $stmt = $conn->prepare($sql);
    if (isset($tipovi) && isset($atributi)) 
        $stmt->bind_param($tipovi, ...$atributi);
    $stmt->execute();
    $result = $stmt->get_result();
    $conn->close();
    return $result;
}

?>