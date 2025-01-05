<?php
require 'Connection.php';

$Name = htmlspecialchars($_POST["Name"], ENT_QUOTES, 'UTF-8');
$Email = htmlspecialchars($_POST["Email"], ENT_QUOTES, 'UTF-8');
$Mobile = htmlspecialchars($_POST["Mobile"], ENT_QUOTES, 'UTF-8');
$Password = $_POST["Password"];
$ConfirmPassword = $_POST["ConfirmPassword"];
$about = htmlspecialchars($_POST["about"], ENT_QUOTES, 'UTF-8');

// File validation and upload
$allowedTypes = ['image/jpeg', 'image/png'];
if (!in_array($_FILES['file']['type'], $allowedTypes)) {
    die("Invalid file type. Only JPG and PNG are allowed.");
}

$file_name = resizeImage($_FILES['file']['tmp_name'], 250, 250, $_FILES['file']['type'], 'entrepreneur_Image/');

// Check for duplicate email or mobile
$checkQuery = $con->prepare("SELECT * FROM entrepreneur WHERE Email = ? OR Mobile = ?");
$checkQuery->bind_param("ss", $Email, $Mobile);
$checkQuery->execute();
$result = $checkQuery->get_result();

if ($result->num_rows > 0) {
    die("<script>alert('Email or Mobile Number Has Already Been Taken');</script>");
}

// Password hashing and insertion
if ($Password === $ConfirmPassword) {
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
    $query = $con->prepare("INSERT INTO entrepreneur (Name, Email, Mobile, Password, about, file_name) VALUES (?, ?, ?, ?, ?, ?)");
    $query->bind_param("ssisss", $Name, $Email, $Mobile, $hashedPassword, $about, $file_name);

    if ($query->execute()) {
        echo "<script>alert('Registration Successful'); window.location.href='entrepreneur_login.php';</script>";
    } else {
        die("Error: " . $con->error);
    }
} else {
    echo "<script>alert('Password Does Not Match');</script>";
}
?>
