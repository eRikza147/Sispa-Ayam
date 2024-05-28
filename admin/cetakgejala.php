<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan Data Gejala</title>
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
        <h3>Laporan Data Gejala</h3>
        <br>
        <table>
            <tr style="background-color: lightblue; font-weight: bold;">
                <th width="50px">No.</th>
                <th width="100px">Id Gejala</th>
                <th width="550px">Nama Gejala</th>
            </tr>

            <?php
          $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");


            $hasil = mysqli_query($koneksi, "SELECT * FROM gejala");

            $no = 1;

            while ($tampil = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $tampil["id_gejala"]; ?></td>
                    <td style="text-align: left;"><?php echo $tampil["nm_gejala"]; ?></td>      
                </tr>
                <?php $no++; } ?>
        </table>
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
        //     window.location.href = "datagejala.php";
        // }, 500); // 500 milidetik (0.5 detik), sesuaikan sesuai kebutuhan Anda
    };
</script>
</div>
</body>
</html>