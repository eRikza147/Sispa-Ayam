<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$username = $_SESSION['user_username'];

// Ambil entri terbaru dari database
$query_terbaru = "SELECT * FROM riwayat ORDER BY tanggal_input DESC, waktu_input DESC LIMIT 1";
$hasil_terbaru = mysqli_query($koneksi, $query_terbaru);

if ($hasil_terbaru) {
    $data_terbaru = mysqli_fetch_assoc($hasil_terbaru);
} else {
    // Handle kesalahan query
    die(mysqli_error($koneksi));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Hasil Diagnosa</title>
    <link rel="stylesheet" type="text/css" href="../h.css">
    <style type="text/css">
        h1{
            font-size: 24px;
            font-weight: bold;
        }
        h2{
            font-size: 24px;
            font-weight: bold;
        }
        h3{
            font-size: 23px;
            font-weight: bold;
        }
        p{
            font-size: 15px;
        }
        .kop{
            border-bottom: 2px solid #333;
            padding: 25px;
        }
    </style>
</head>
<body>
    <center>
    <br><br><br>
    <div class="container">
        <div class="kop">
            <h1>Sistem Pakar Diagnosa Penyakit Unggas Lokal</h1>
            <h2>Dinas Peternakan Dan Kesehetan Hewan Sumatra Barat</h2>
            <p>Jl. Koto Tinggi No.9, Jati Baru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129</p>
        </div>
        <br><br><br>
        <div class="tampiltabel">
            <h1>Laporan Hasil Diagnosa</h1>
            <form method="post" action="">
                <table>
                    <tr>
                        <td width="150px" height="40px"><label>Nama Peternak:</label></td>
                        <td><input type='text' readonly value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td width="150px" height="40px"><label>Nama Penyakit:</label></td>
                        <td><input type='text' readonly value="<?php echo $data_terbaru["nm_penyakit"]; ?>"></td>
                    </tr>
                    <tr> 
                        <td width="150px" colspan="2" style="text-align: top;"><label>Keterangan :</label></td></tr>
                    <tr>    
                        <td colspan="2"><textarea readonly><?php echo $data_terbaru["keterangan"];?></textarea></td> 
                    </tr>
                    <tr>
                        <td width="150px" colspan="2" style="text-align: top;"><label>Pengendalian :</label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><textarea readonly><?php echo $data_terbaru["pengendalian"]; ?></textarea></td>
                    </tr>
                </table>
            </form>
        </div>
    <br>
    <div class="tandatangan cf">
        <table>
            <tr><td>Padang, ......../........./20.......</td></tr>
            <tr><td>Kepala Dinas</td></tr>
            <tr><td height="100px"></td></tr>
            <tr><td>(........................................)</td></tr>
        </table>
    </div>
    </div>  
    <script type="text/javascript">
        window.onload = function () {
            // Mencetak secara otomatis
            window.print();

            // Memberikan sedikit waktu sebelum mengarahkan kembali (dalam contoh ini, 5 detik)
            // setTimeout(function () {
            //     window.location.href = "diagnosa.php";
            // }, 500); // 500 milidetik (0.5 detik), sesuaikan sesuai kebutuhan Anda
        };
    </script>
</body>
</html>
