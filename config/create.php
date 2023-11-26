<?php
session_start();

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ttl = $_POST['ttl'];
    $status = $_POST['status'];
    $pendidikan = $_POST['pendidikan'];
    $jurusan = $_POST['jurusan'];
    $hobby = $_POST['hobby'];
    $email = $_POST['email'];
    $nomer = $_POST['nomer'];
    
    $foto = $_FILES['foto']['name'];
    $target_dir = "../directory/"; 
    $target_file = $target_dir . basename($_FILES['foto']['name']);

    $agama = $_POST['agama'];
    $golongan_darah = $_POST['golongan_darah'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];

    try {
        // PDO connection
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL untuk menyisipkan data ke dalam tabel
        $sql = "INSERT INTO Mahasiswa (nim, nama, jenis_kelamin, ttl, status, pendidikan, jurusan, hobby, email, nomer, foto, agama, golongan_darah, kewarganegaraan, asal_sekolah, tahun_masuk, tahun_lulus) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $nim);
        $stmt->bindParam(2, $nama);
        $stmt->bindParam(3, $jenis_kelamin);
        $stmt->bindParam(4, $ttl);
        $stmt->bindParam(5, $status);
        $stmt->bindParam(6, $pendidikan);
        $stmt->bindParam(7, $jurusan);
        $stmt->bindParam(8, $hobby);
        $stmt->bindParam(9, $email);
        $stmt->bindParam(10, $nomer);
        $stmt->bindParam(11, $foto);
        $stmt->bindParam(12, $agama);
        $stmt->bindParam(13, $golongan_darah);
        $stmt->bindParam(14, $kewarganegaraan);
        $stmt->bindParam(15, $asal_sekolah);
        $stmt->bindParam(16, $tahun_masuk);
        $stmt->bindParam(17, $tahun_lulus);

        // Execute statement
        $stmt->execute();

        // Jika data berhasil disisipkan, pindahkan foto ke folder target
        move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);
        
        // Set notifikasi menggunakan session
        $_SESSION['notification'] = "Data berhasil disisipkan.";
       
        // Redirect kembali ke halaman form.php
        header("Location: /UTS_FEBRIANI/form.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        // Menutup koneksi
        $pdo = null;
    }
}
?>
