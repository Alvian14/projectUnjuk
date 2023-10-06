
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>umkm mikro</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="website icon" href="assets/img/logoUnjuk.png">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

    </style>
</head>
<body>
    <div class="wrapper">
        <div class="navigasi">
            <h1>Dashboard</h1>
            <table border="1">
               <tr>
                <th>ID Akun</th>
                <th>Email</th>
                <th>Pasword</th>
                <th>ID Pengguna</th>
               </tr>

               <?php
                include "koneksi.php";
                $no=1;
                $ambilData = mysqli_query($conn, "select * from akun");
                while ($tampil = mysqli_fetch_array($ambilData)){
                    echo "
                    <tr>
                        <td>$tampil[id_akun]</td>
                        <td>$tampil[email]</td>
                        <td>$tampil[password]</td>
                        <td>$tampil[id_pengguna]</td>
                    </tr>";


                    $no++;
                }
               
               
               ?>
            </table>
        </div>
    </div>
</body>
</html>