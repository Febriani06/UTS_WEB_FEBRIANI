<?php
include 'koneksi.php';

try {
    $query = "SELECT * FROM mahasiswa";

    $result = $koneksi->query($query);

    if($result) {
        if($result->rowCount() > 0) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<hr>";

                echo "NIM: ".$row['nim']."<br>";
                echo "Nama: ".$row['nama']."<br>";
                echo "Jenis Kelamin: ".$row['jenis_kelamin']."<br>";
                echo "TTL: ".$row['ttl']."<br>";
                echo "Status: ".$row['status']."<br>";
                echo "Pendidikan: ".$row['pendidikan']."<br>";
                echo "Jurusan: ".$row['jurusan']."<br>";
                echo "Hobby: ".$row['hobby']."<br>";
                echo "Email: ".$row['email']."<br>";
                echo "Nomer: ".$row['nomer']."<br>";
                echo "Agama: ".$row['agama']."<br>";
                echo "Golongan Darah: ".$row['golongan_darah']."<br>";
                echo "Kewarganegaraan: ".$row['kewarganegaraan']."<br>";
                echo "Asal Sekolah: ".$row['asal_sekolah']."<br>";
                echo "Tahun Masuk: ".$row['tahun_masuk']."<br>";
                echo "Tahun Lulus: ".$row['tahun_lulus']."<br>";
                echo "<hr>";
            }
        } else {
            echo "Tidak ada data yang ditemukan";
        }
    } else {
        echo "Error: ".$koneksi->errorInfo()[2];
    }
} catch (PDOException $e) {
    die("Error: ".$e->getMessage());
} finally {
    $koneksi = null;
}
?>