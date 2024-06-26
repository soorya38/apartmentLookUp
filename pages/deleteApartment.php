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

$response = array('success' => false);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $apartmentId = intval($_POST['id']);

        // Prepare the SQL statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM apartments WHERE id = ?");
        $stmt->bind_param("i", $apartmentId);

        if ($stmt->execute()) {
            $response['success'] = true;
        } else {
            $response['error'] = "Error deleting record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $response['error'] = "No apartment ID provided";
    }
} else {
    $response['error'] = "Invalid request method";
}

$conn->close();

echo json_encode($response);
?>
