<?php
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "serviceapartment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch apartments data
$sql = "SELECT title, description, price, address, image FROM apartments";
$result = $conn->query($sql);

$apartments = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $apartments[] = $row;
    }
} else {
    error_log("No apartments found in the database.");
}

$conn->close();

echo json_encode($apartments);
?>
