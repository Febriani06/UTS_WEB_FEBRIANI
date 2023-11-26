<?php
include 'koneksi.php';

session_start();

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "DELETE FROM mahasiswa WHERE NIM = ?";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(1, $nim);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $_SESSION['not'] = "Record with NIM $nim has been deleted successfully.";

            header("Location: /UTS_FEBRIANI/table.php");
            exit();
        } else {
            echo "No records found with NIM $nim.";
        }
    } catch (PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
} else {
    echo "Invalid request. Please provide a valid NIM.";
}
?>
