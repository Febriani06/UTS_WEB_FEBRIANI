<?php
// Panggil skrip koneksi
require_once 'koneksi.php';

// Start the session
session_start();

// Check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPaassword = $_POST['confirmPassword'];

    // Check if password and confirm password match
    if($password !== $confirmPaassword) {
        $_SESSION['message'] = "Password and Confirm Password do not match.";
        header('Location: ../register.php');
        exit();
    }

    // Hash the password


    try {
        // SQL untuk melakukan INSERT ke tabel users
        $sql = "INSERT INTO user (email, password) VALUES (:email, :password)";

        // Siapkan pernyataan SQL menggunakan metode prepare
        $stmt = $koneksi->prepare($sql);

        // Bind parameter
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        // Eksekusi pernyataan SQL
        $stmt->execute();

        // Set session message
        $_SESSION['message'] = "User registered successfully.";

        // Redirect to login page
        header('Location: ../login.php');
        exit();
    } catch (PDOException $e) {
        // Handle error if needed
        $_SESSION['message'] = "Error: ".$e->getMessage();
        header('Location: ../register.php');
        exit();
    }
} else {
    // Redirect to register page if form is not submitted
    header('Location: ../register.php');
    exit();
}
?>