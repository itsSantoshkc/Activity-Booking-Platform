<?php
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "success" => false,
        "message" => "Method Not Allowed"
    ]);
    exit;
}


$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';


if (empty($name) || empty($email) || empty($phone) || empty($password)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "All fields are required"
    ]);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Invalid email address"
    ]);
    exit;
}

if (!preg_match('/^\d{10}$/', $phone)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Phone must be 10 digits"
    ]);
    exit;
}

$passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&^#()[\]{}<>~`_+=|\\\\:;\'",.\/?-]).{9,}$/';
if (!preg_match($passwordRegex, $password)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "message" => "Password must be 9+ characters with uppercase, lowercase, digit, and special character"
    ]);
    exit;
}


$hash = password_hash($password, PASSWORD_BCRYPT);



http_response_code(201);
echo json_encode([
    "success" => true,
    "message" => "Registration successful"
]);
