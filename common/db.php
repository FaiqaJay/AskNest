<?php
$host = "localhost";
$username = "root";
$password = null;
$dbname = "ask_nest";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed with db: " . $conn->connect_error);
}

?>