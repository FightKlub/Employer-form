<?php
// filepath: c:\Users\jerom\OneDrive\Desktop\AVTI\store_employer.php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employer_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$age = $_POST['age'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Handle file upload
$photo = $_FILES['photo'];
$photoPath = "uploads/" . basename($photo['name']);
if (!move_uploaded_file($photo['tmp_name'], $photoPath)) {
    die("Failed to upload photo.");
}

// Insert data into the database
$sql = "INSERT INTO employers (name, age, address, phone, email, photo_path) 
        VALUES ('$name', '$age', '$address', '$phone', '$email', '$photoPath')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>