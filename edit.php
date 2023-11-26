

<?php
// Include database connection file
include 'config/koneksi.php';

// Check if 'nim' parameter is set in the URL
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    try {
        // PDO query to retrieve existing data based on 'nim'
        $sql = "SELECT * FROM Mahasiswa WHERE nim = ?";
        $stmt = $koneksi->prepare($sql);

        // Bind the parameter to the statement
        $stmt->bindParam(1, $nim);

        // Execute the statement
        $stmt->execute();

        // Fetch the data as an associative array
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Close the statement
        $stmt = null;

        // Close the database connection (optional in PDO)
        // $koneksi = null; // You can keep the connection open for subsequent queries if needed
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    // If 'nim' is not set, redirect to an error page or handle it accordingly
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
    <!-- Include Bootstrap stylesheet -->
    <link rel="icon" href="asset/img/aa.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="cssfrom.css">
</head>

<body>
    <div>
       <a href="table.php" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-decoration: none; padding-left: 20px; " >Back</a>
    </div>
    <div class="container mt-4">
        <form method="POST" action="config/update.php" enctype="multipart/form-data">
            <div class="banner2">
                <h1> <marquee behavior="left" direction="left" style="width: 1000px; font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">Welcome Febriani To From Edit Student </marquee></h1>
            </div>
            <br />
            <!-- Include the 'nim' as a hidden input field for identification -->
            <input type="hidden" name="nim" value="<?php echo $row['nim']; ?>">

            <!-- Personal Information -->
            <fieldset class="border p-2">
                <legend class="w-auto">Personal Information</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nim">NIM<span>*</span></label>
                        <input id="nim" type="text" name="nim" class="form-control" required
                            value="<?php echo $row['nim']; ?>" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nama">Nama<span>*</span></label>
                        <input id="nama" type="text" name="nama" class="form-control" required
                            value="<?php echo $row['nama']; ?>">
                    </div>
                    <!-- Include the rest of the fields and populate them with existing data -->
                    <div class="form-group col-md-6">
                        <label for="jenis_kelamin">Jenis Kelamin<span>*</span></label>
                        <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                            <option value="laki-laki" <?php echo ($row['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                            <option value="perempuan" <?php echo ($row['jenis_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                        </select>
                    </div>
                    <!-- Continue populating the rest of the fields -->
                    <div class="form-group col-md-6">
                        <label for="ttl">TTL<span>*</span></label>
                        <input id="ttl" type="text" name="ttl" class="form-control" required
                            value="<?php echo $row['ttl']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="status">Status<span>*</span></label>
                        <input id="status" type="text" name="status" class="form-control" required
                            value="<?php echo $row['status']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="pendidikan">Pendidikan<span>*</span></label>
                        <select id="pendidikan" name="pendidikan" class="form-control" required>
                            <option value="s1" <?php echo ($row['pendidikan'] == 's1') ? 'selected' : ''; ?>>S1</option>
                            <option value="d3" <?php echo ($row['pendidikan'] == 'd3') ? 'selected' : ''; ?>>D3</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jurusan">Jurusan<span>*</span></label>
                        <input id="jurusan" type="text" name="jurusan" class="form-control" required
                            value="<?php echo $row['jurusan']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hobby">Hobby<span>*</span></label>
                        <input id="hobby" type="text" name="hobby" class="form-control" required
                            value="<?php echo $row['hobby']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email<span>*</span></label>
                        <input id="email" type="email" name="email" class="form-control" required
                            value="<?php echo $row['email']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nomer">Nomer<span>*</span></label>
                        <input id="nomer" type="tel" name="nomer" class="form-control" required
                            value="<?php echo $row['nomer']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="foto">Foto<span>*</span></label>
                        <input id="foto" type="file" name="foto" class="form-control" accept="image/*">
                        <!-- Display the existing file path -->
                        <input type="text" class="form-control mt-2" value="directory/<?php echo $row['foto']; ?>"
                            readonly>
                    </div>

                </div>
            </fieldset>

            <!-- Additional Information -->
            <br />

            <fieldset class="border p-2">
                <legend class="w-auto">Additional Information</legend>
                <div class="form-row">
                    <!-- Include the fields for additional information and populate them with existing data -->
                    <div class="form-group col-md-6">
                        <label for="agama">Agama</label>
                        <input id="agama" type="text" name="agama" class="form-control"
                            value="<?php echo $row['agama']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="golongan_darah">Golongan Darah</label>
                        <input id="golongan_darah" type="text" name="golongan_darah" class="form-control"
                            value="<?php echo $row['golongan_darah']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <input id="kewarganegaraan" type="text" name="kewarganegaraan" class="form-control"
                            value="<?php echo $row['kewarganegaraan']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="asal_sekolah">Asal Sekolah</label>
                        <input id="asal_sekolah" type="text" name="asal_sekolah" class="form-control"
                            value="<?php echo $row['asal_sekolah']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tahun_masuk">Tahun Masuk</label>
                        <input id="tahun_masuk" type="text" name="tahun_masuk" class="form-control"
                            value="<?php echo $row['tahun_masuk']; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tahun_lulus">Tahun Lulus</label>
                        <input id="tahun_lulus" type="text" name="tahun_lulus" class="form-control"
                            value="<?php echo $row['tahun_lulus']; ?>">
                    </div>
                </div>
            </fieldset>

            <div class="form-group mt-4 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>