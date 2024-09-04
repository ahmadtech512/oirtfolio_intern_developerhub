<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_form (name, email, subject, question) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $question);

// Set parameters and execute
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$question = $_POST['question'];
$stmt->execute();

echo "New record created successfully";

$stmt->close();
$conn->close();
?>
