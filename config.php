<?php 
$conn = new mysqli("localhost", "root", "", "dbphp7");

if ($conn->connect_error) {

    echo "error:" . $conn->connect_error;
}

?>