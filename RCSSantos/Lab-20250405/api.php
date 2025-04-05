<?php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "20250405-testdb";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die(json_encode([
                "error" => "Database connection failed: " . $this->conn->connect_error
            ]));
        }
    }

    public function getStudentById($std_id) {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_students WHERE std_id = ?");
        $stmt->bind_param("i", $std_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $student = $result->fetch_assoc();
        $stmt->close();
        return $student;
    }

    public function getAllStudents() {
        $stmt = $this->conn->prepare("SELECT * FROM tbl_students");
        $stmt->execute();
        $result = $stmt->get_result();
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        $stmt->close();
        return $students;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

class API {
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    public function handleRequest() {
        header("Content-Type: application/json");
        $std_id = isset($_GET['std_id']) ? intval($_GET['std_id']) : 0;

        if ($std_id > 0) {
            $student = $this->db->getStudentById($std_id);
            echo json_encode(
                $student ? $student : ["error" => "Student not found"],
                JSON_PRETTY_PRINT
            );
        } else {
            $students = $this->db->getAllStudents();
            echo json_encode($students, JSON_PRETTY_PRINT);
        }

        $this->db->closeConnection();
    }
}

$api = new API();
$api->handleRequest();

?>
