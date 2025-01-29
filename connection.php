<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json'); // for api implementation

$response = ["success" => false, "message" => "An error occurred."];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $message = trim($_POST['message']);

    // Validation
    if (empty($name) || empty($email) || empty($mobile) || empty($message)) {
        $response["message"] = "All fields are required.";
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["message"] = "Invalid email format.";
        echo json_encode($response);
        exit;
    }

    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $response["message"] = "Phone number must be 10 digits.";
        echo json_encode($response);
        exit;
    }

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'user_submission');

    if ($conn->connect_error) {
        $response["message"] = "Database connection failed: " . $conn->connect_error;
        echo json_encode($response);
        exit;
    }

    $stmt = $conn->prepare("INSERT INTO user_detail (name, email, mobile, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $mobile, $message);

    if ($stmt->execute()) {
        $response["success"] = true;
        $response["message"] = "Registration successful!";
    } else {
        $response["message"] = "Database error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

echo json_encode($response);
?>
