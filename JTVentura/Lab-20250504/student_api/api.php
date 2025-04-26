<?php

// Set the content type to application/json
header("Content-Type: application/json");

// Database connection settings
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "20250405-testdb";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

// Get the student ID from the GET request
$std_id = isset($_GET['std_id']) ? intval($_GET['std_id']) : 0;

// Check if a student ID is provided
if ($std_id > 0) {
    // Prepare a SQL query to retrieve a single student
    $stmt = $conn->prepare("SELECT * FROM tbl_students WHERE std_id = ?");
    $stmt->bind_param("i", $std_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $student = $result->fetch_assoc();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Output the student data or an error message
    echo json_encode($student ? $student : ["error" => "Student not found"], JSON_PRETTY_PRINT);
} else {
    // Prepare a SQL query to retrieve all students
    $stmt = $conn->prepare("SELECT * FROM tbl_students");
    $stmt->execute();
    $result = $stmt->get_result();
    $students = [];

    // Fetch all student data
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Output the student data
    echo json_encode($students, JSON_PRETTY_PRINT);
}

?>