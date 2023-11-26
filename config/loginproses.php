<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

try {
    $sql = "SELECT * FROM user WHERE email = :email AND password = :password";

    $stmt = $koneksi->prepare($sql);

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    session_start();

    if ($result) {
        $_SESSION['message'] = "Login successful! Welcome back, $email!";
        header("Location: /UTS_FEBRIANI/table.php");
        exit();
    } else {
        $_SESSION['message'] = "Login failed. Please check your email and password.";
        header("Location: /UTS_FEBRIANI/login.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $koneksi = null;
}
?>
