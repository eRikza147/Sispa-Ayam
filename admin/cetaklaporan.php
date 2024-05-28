<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Perbulan Hasil Diagnosa</title>
    <link rel="stylesheet" href="../h.css">
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
            padding: 10px;
        }
    </style>
</head>
<center>
<body>
<br><br><br>
<div class="container">
    <div class="kop">
        <h1>Sistem Pakar Diagnosa Penyakit Unggas Lokal</h1>
        <h2>Dinas Peternakan Dan Kesehetan Hewan Sumatra Barat</h2>
        <p>Jl. Koto Tinggi No.9, Jati Baru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25129</p>
    </div>
        <br>
    <div class="contadmin" >
        <h3>Laporan Per Bulan Hasil Diagnosa Penyakit Unggas</h3>
        <br><br>
        <?php
            // Koneksi ke database
            $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");

            // Inisialisasi nilai default bulan jika tidak ada yang dipilih
            $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';

            // Query untuk mendapatkan data sesuai filter
            $filterQuery = "SELECT * FROM riwayat";
            if (isset($_GET['month'])) {
                $filterQuery .= " WHERE MONTH(tanggal_input) = $selectedMonth";
            }

            // Ambil data sesuai kondisi
            $data = array();
            $qry = mysqli_query($koneksi, $filterQuery);
            while ($row = mysqli_fetch_assoc($qry)) { 
                $data[] = $row;
            }

            // Tampilkan data sesuai format yang diinginkan, misalnya dalam bentuk tabel HTML
            echo "<table border='1'>
                    <tr style='background-color: lightblue; font-weight: bold;''>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Peternak</th>
                        <th>Penyakit</th>
                    </tr>";
            $no = 1;
            foreach ($data as $row) {
                echo "<tr>
                        <td>".$no."</td>
                        <td>".$row['tanggal_input']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['nm_penyakit']."</td>
                      </tr>";
                $no++;
            }
            echo "</table>";

            // Tutup koneksi ke database
            mysqli_close($koneksi);
            ?>

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
    <script type="text/javascript">
    window.onload = function () {
        // Mencetak secara otomatis
        window.print();

        // Memberikan sedikit waktu sebelum mengarahkan kembali (dalam contoh ini, 5 detik)
       
        // setTimeout(function () {
        //     window.location.href = "lppertahun.php";
        // }, 500); // 500 milidetik (0.5 detik), sesuaikan sesuai kebutuhan Anda
    };
</script>
</div>
</body>
</html>


