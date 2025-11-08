<?php
$host = "localhost";
$user = "root";
$pass = "";

// Step 1: connect without selecting DB
$conn = new mysqli($host, $user, $pass);

// Step 2: create DB if it doesn't exist
$conn->query("CREATE DATABASE IF NOT EXISTS ethiobus");
$conn->select_db("ethiobus");

// Step 3: create table if not exists
$conn->query("
CREATE TABLE IF NOT EXISTS tickets (
  id INT AUTO_INCREMENT PRIMARY KEY,
  fname VARCHAR(50),
  lname VARCHAR(50),
  idnum VARCHAR(20),
  email VARCHAR(100),
  phone VARCHAR(20),
  gender VARCHAR(10),
  from_place VARCHAR(50),
  to_place VARCHAR(50),
  booking_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)
");

if ($conn->connect_error) {
    die(' Database connection failed: ' . $conn->connect_error);
}
?>