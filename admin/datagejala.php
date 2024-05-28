<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
    <link rel="stylesheet" href="../a.css">
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Sistem Pakar Unggas Lokal</h1>
	 <ul >
    	<li><a href="dasboard.php">Dasboard</a></li>
    	<li><a href="datagejala.php">Data Gejala</a></li>
    	<li><a href="datapenyakit.php">Data Penyakit</a></li>
    	<li><a href="pengetahuan.php">Basis Pengetahuan</a></li>
        <li><a href="lppertahun.php">Laporan</a></li>
    	<!-- <li><a href="datapasien.php">Data Pasien</a></li> -->
    	<li><a href="../logout.php">Logout</a></li>
    </ul>
    </div>

    <div class="contadmin" >
        <div class="bttambah">
        <a href="tambahgejala.php">Tambah Gejala</a>   
        <a href="cetakgejala.php">Cetak Laporan</a>
        </div>    
        <table>
            <tr style="background-color: lightblue; font-weight: bold;">
                <th width="50px">No.</th>
                <th width="100px">Kd Gejala</th>
                <th width="550px">Nama Gejala</th>
                <th colspan="2" width="200px">Aksi</th>
            </tr>

            <?php
          $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");


            $hasil = mysqli_query($koneksi, "SELECT * FROM gejala");

            $no = 1;

            while ($tampil = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $tampil["kd_gejala"]; ?></td>
                    <td style="text-align: left;"><?php echo $tampil["nm_gejala"]; ?></td>
                    <td>
                        <button><a href="ubahgejala.php?kdgejala=<?php echo $tampil["kd_gejala"]; ?>">Ubah</a></button>
                    </td>
                    <td>
                        <button><a href="hapusgejala.php?kdgejala=<?php echo $tampil["kd_gejala"]; ?>">Hapus</a></button>
                    </td>
                </tr>
                <?php $no++; } ?>
        </table>
    </div>

    <div class="footer">
    <p class="copy">Copyright 2023. Rikza M. Fahira</p>
    </div>

</div>
</body>
</html>