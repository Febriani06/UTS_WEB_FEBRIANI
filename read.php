<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIODATA</title>
    <link rel="icon" href="asset/img/aa.jpg" type="image/x-icon">
</head>
<style>
    body {
        font-family: Georgia, 'Times New Roman', Times, serif;
        background-color: darkgray;
    }

    .container {
        padding-left: 200px;
        padding-right: 200px;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .box {
        box-shadow: 0 0 10px rgba(0, 0, 0, 1.5);
        /* Added color value and corrected the syntax */
        border-radius: 40px;
        padding: 50px;
        background-color: azure;
    }


    .boxgambar {
        background-color: azure;
        justify-content: center;
        text-align: center;
    }

    img {
        border: 12px solid rgba(0, 0, 0, 0.555);
        /* Set border color to black and thickness to 2 pixels */
        /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); */

    }
</style>

<body>
    <div class="container">
        <div class="box">
            <div><a href="table.php" style="text-decoration: none;">Back</a></div>
            <h1 style="text-align: center;">BIODATA</h1>
            <hr style="width: 650px;">
            <hr style="width: 650px;">

            <table align="center" cellpadding="10px" width="650px">
                <?php
                // Include the database connection file
                include 'config/koneksi.php';

                // Check if the 'nim' parameter is set in the URL
                if(isset($_GET['nim'])) {
                    $nim = $_GET['nim'];

                    try {
                        // PDO query to retrieve the data based on the 'nim' parameter
                        $sql = "SELECT * FROM mahasiswa WHERE nim = ?";
                        $stmt = $koneksi->prepare($sql);

                        // Bind the parameter to the statement
                        $stmt->bindParam(1, $nim);

                        // Execute the statement
                        $stmt->execute();

                        // Fetch the data as an associative array
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);

                        // Close the statement
                        $stmt = null;
                        ?>
                        <tr>
                            <td>Nim</td>
                            <td> :
                                <?php echo $row['nim']; ?>
                            </td>
                            <td rowspan="8">
                                <div class="boxgambar">
                                    <img src="directory/<?php echo $row['foto']; ?>" style="height: 200px; width: 170px;"
                                        alt="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:
                                <?php echo $row['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:
                                <?php echo $row['jenis_kelamin']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>ttl</td>
                            <td>:
                                <?php echo $row['ttl']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td>:
                                <?php echo $row['status']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>pendidikan</td>
                            <td>:
                                <?php echo $row['pendidikan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>jurusan</td>
                            <td>:
                                <?php echo $row['jurusan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>hobby</td>
                            <td>:
                                <?php echo $row['hobby']; ?>
                            </td>
                        </tr>
                    </table>
                    <hr style="width: 650px;">
                    <hr style="width: 650px;">
                    <table align="center" cellpadding="10px" width="400px">
                        <tr>
                            <td>Nomer</td>
                            <td>:
                                <?php echo $row['nomer']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:
                                <?php echo $row['agama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Golongan Darah</td>
                            <td>:
                                <?php echo $row['golongan_darah']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>:
                                <?php echo $row['kewarganegaraan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah</td>
                            <td>:
                                <?php echo $row['asal_sekolah']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Masuk</td>
                            <td>:
                                <?php echo $row['tahun_masuk']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Lulus</td>
                            <td>:
                                <?php echo $row['tahun_lulus']; ?>
                            </td>
                        </tr>
                    </table>
                    <hr style="width: 650px;">
                    <hr style="width: 650px;">
                    <?php
                    } catch (PDOException $e) {
                        echo "Error: ".$e->getMessage();
                    }
                } else {
                    echo '<div style="text-align: center; color: red;">Invalid item selected for editing.</div>';
                }
                // Close the database connection
                $koneksi = null;
                ?>
        </div>

    </div>
</body>

</html>