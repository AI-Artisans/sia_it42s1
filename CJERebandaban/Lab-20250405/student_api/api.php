<?php
header("Content-Type: application/json");

// Database connection settings
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = 'activity-20250405';

// Connect to database
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception($conn->connect_error);
    }
} catch (Exception $e) {
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()], JSON_PRETTY_PRINT);
    exit;
}

// Get student ID from query parameter
$std_id = isset($_GET['std_id']) ? intval($_GET['std_id']) : 0;

if ($std_id > 0) {
    try {
        // Prepare and execute query for a single student
        $stmt = $conn->prepare("SELECT * FROM tbl_students WHERE std_id = ?");
        $stmt->bind_param("i", $std_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();
        $stmt->close();
        
        echo json_encode($student ? $student : ["error" => "Student not found"], JSON_PRETTY_PRINT);
    } catch (Exception $e) {
        echo json_encode(["error" => "Failed to fetch student data: " . $e->getMessage()], JSON_PRETTY_PRINT);
    }
} else {
    try {
        // Prepare and execute query for all students
        $stmt = $conn->prepare("SELECT * FROM tbl_students");
        $stmt->execute();
        $result = $stmt->get_result();
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        $stmt->close();
        
        echo json_encode($students, JSON_PRETTY_PRINT);
    } catch (Exception $e) {
        echo json_encode(["error" => "Failed to fetch students data: " . $e->getMessage()], JSON_PRETTY_PRINT);
    }
}

// Close database connection
$conn->close();
?>