<?php

header("Content-Type: application/json");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "20250405-testdb";
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error) {
	die(json_encode(["error" => "Database connection failed: " . $conn->connect_error]));
}

$std_id = isset($_GET['std_id']) ? intval($_GET['std_id']) : 0;

if($std_id > 0) {
	$stmt = $conn->prepare("SELECT * FROM tbl_students WHERE std_id = ?");
	$stmt->bind_param("i", $std_id);
	$stmt->execute();
	$result = $stmt->get_result();
	$student = $result->fetch_assoc();
	
	$stmt->close();
	$conn->close();
	
	echo json_encode($student ? $student : ["error" => "Student not found"], JSON_PRETTY_PRINT);
} else {
	$stmt = $conn->prepare("SELECT * FROM tbl_students");
	$stmt->execute();
	$result = $stmt->get_result();
	
	$students = [];
	while($row = $result->fetch_assoc()) {
		$students[] = $row;
	}
	
	$stmt->close();
	$conn->close();
	
	echo json_encode($students, JSON_PRETTY_PRINT);
}
