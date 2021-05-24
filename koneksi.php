<?php
$host         = "localhost";
$username     = "ajisukmo_jisuk";
$password     = "sukmo1976666";
$dbname       = "ajisukmo_amanah";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
