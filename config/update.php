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

    $agama = $_POST['agama'];
    $golongan_darah = $_POST['golongan_darah'];
    $kewarganegaraan = $_POST['kewarganegaraan'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $tahun_masuk = $_POST['tahun_masuk'];
    $tahun_lulus = $_POST['tahun_lulus'];

    $foto = $_FILES['foto']['name'];
    $target_dir = "../directory/";
    $target_file = $target_dir . basename($_FILES['foto']['name']);

    try {
        $sql = "UPDATE mahasiswa SET nama=?, jenis_kelamin=?, ttl=?, status=?, pendidikan=?, jurusan=?, hobby=?, email=?, nomer=?, foto=?, agama=?, golongan_darah=?, kewarganegaraan=?, asal_sekolah=?, tahun_masuk=?, tahun_lulus=? WHERE nim=?";
        
        $stmt = $koneksi->prepare($sql);
        
        $stmt->bindParam(1, $nama);
        $stmt->bindParam(2, $jenis_kelamin);
        $stmt->bindParam(3, $ttl);
        $stmt->bindParam(4, $status);
        $stmt->bindParam(5, $pendidikan);
        $stmt->bindParam(6, $jurusan);
        $stmt->bindParam(7, $hobby);
        $stmt->bindParam(8, $email);
        $stmt->bindParam(9, $nomer);
        $stmt->bindParam(10, $foto);
        $stmt->bindParam(11, $agama);
        $stmt->bindParam(12, $golongan_darah);
        $stmt->bindParam(13, $kewarganegaraan);
        $stmt->bindParam(14, $asal_sekolah);
        $stmt->bindParam(15, $tahun_masuk);
        $stmt->bindParam(16, $tahun_lulus);
        $stmt->bindParam(17, $nim);
        
        if ($stmt->execute()) {
            move_uploaded_file($_FILES['foto']['tmp_name'], $target_file);

            $_SESSION['not'] = "Data berhasil diupdate.";

            header("Location: /UTS_FEBRIANI/table.php");
            exit();
        } else {
            echo "Error updating record.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt = null;
        $koneksi = null;
    }
}

?>
