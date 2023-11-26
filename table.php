<?php
// Check if there is a notification
if(isset($_SESSION['not'])) {
    echo '<div class="notification">'.$_SESSION['not'].'</div>';

    // Remove the notification after displaying
    unset($_SESSION['not']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Example</title>
    <link rel="icon" href="asset/img/aa.jpg" type="image/x-icon">
    <style>
        body {
            padding: 20px;
        }

        .exportExcel {
            padding: 5px;
            border: 1px solid grey;
            margin: 5px;
            cursor: pointer;
        }

        .notification {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 15px;
        }

        /* Style for action links */
        .action-links {
            display: flex;
            justify-content: space-between;
            max-width: 150px;
            /* Adjust the width as needed */
            margin: auto;
            /* Center the links */
        }

        /* Updated style for action links using Bootstrap classes */
        .action-link {
            text-decoration: none;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .action-link:hover {
            background-color: #3498db;
            color: white;
        }
    </style>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="//cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8"
        src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
</head>

<body>

    <table id="example" class="display" cellspacing="0" width="100%">
        <!-- The table content as you provided -->
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Jenis Kelamin</th>
                <th>Pendidikan</th>
                <th>Foto</th>
                <th class="text-center">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Your PHP code to fetch data from the database and populate the table
// Replace the following with your actual database connection and query logic
            include 'config/koneksi.php';

            try {
                $sql = "SELECT NIM, Nama, Jurusan, Jenis_Kelamin, Pendidikan, Foto FROM Mahasiswa";
                $stmt = $koneksi->prepare($sql);

                // Execute the statement
                $stmt->execute();

                // Fetch the result as an associative array
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if($result) {
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>".$row['NIM']."</td>";
                        echo "<td>".$row['Nama']."</td>";
                        echo "<td>".$row['Jurusan']."</td>";
                        echo "<td>".$row['Jenis_Kelamin']."</td>";
                        echo "<td>".$row['Pendidikan']."</td>";
                        echo "<td><img src='directory/{$row['Foto']}' alt='Foto' width='50'></td>";
                        echo "<td class='action-links'>";
                        echo "<a class='btn btn-primary action-link' href='read.php?nim=".$row['NIM']."'>Read</a>";
                        echo "<a class='btn btn-warning action-link' href='edit.php?nim=".$row['NIM']."'>Edit</a>";
                        echo "<a class='btn btn-danger action-link' href='javascript:void(0);' onclick='confirmDelete(\"".$row['NIM']."\")'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No records found.";
                }
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage();
            }

            // Close the database connection
            $koneksi = null;
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excel',
                        text: 'Export excel',
                        className: 'exportExcel',
                        filename: 'Export excel',
                        exportOptions: {
                            modifier: {
                                page: 'all'
                            }
                        }
                    },
                    {
                        extend: 'copy',
                        text: '<u>C</u>opie presse papier',
                        className: 'exportExcel',
                        key: {
                            key: 'c',
                            altKey: true
                        }
                    },
                    {
                        text: 'INPUT DATA',
                        className: 'exportExcel',
                        action: function () {
                            window.location.href = 'form.php';
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        function confirmDelete(nim) {
            var result = confirm("Are you sure you want to delete the data with NIM " + nim + "?");

            if (result) {
                // If the user confirms, redirect to the delete script
                window.location.href = 'config/delete.php?nim=' + nim;
            }
        }
    </script>

</body>

</html>