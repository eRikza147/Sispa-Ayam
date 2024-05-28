<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" type="text/css" href="../d.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h1>Sistem Pakar Unggas Lokal</h1>
		 <ul>
	    	<li><a href="beranda.php">Dashboard</a></li>
	    	<li><a href="diagnosa.php">Diagnosa</a></li>
	    	<li><a href="penyakit.php">informasi Penyakit</a></li>
	    	<li><a href="riwayat.php">Riwayat</a></li>
	    	<li><a href="../logout.php">Logout</a></li>
	    </ul>
    </div>
   	<div></div>
   	<div class="contadmin">
   			<table>
   				<tr style="background-color: lightblue; font-weight: bold;">
   					<td>No.</td>
   					<td>Tanggal</td>
   					<td>Nama Penyakit</td>
   					<td>Keterangan</td>
   					<td>Pengendalian</td>
 				</tr>  					
 				<?php
				$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
				session_start(); // Mulai sesi

				// Periksa apakah kunci "username" ada dalam sesi
				if (isset($_SESSION['user_username'])) {
				    $query_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '{$_SESSION['user_username']}'");
				    
				    // Periksa apakah data pengguna berhasil diambil
				    if ($query_user) {
				        $user_data = mysqli_fetch_array($query_user);
				        $username = $user_data['username'];

				        $hasil = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE username = '$username'");
				        $no = 1;

				        while ($tampil = mysqli_fetch_array($hasil)) { ?>
				            <tr>
				                <td><?php echo $no ?></td>
				                <td style="width: 100px"><?php echo $tampil["tanggal_input"]; ?></td>
				                <td style="width: 100px"><?php echo $tampil["nm_penyakit"]; ?></td>
				                <td style="text-align: center; width:300px"><?php echo $tampil["keterangan"]; ?></td>
				                <td style="text-align: justify;"><?php echo $tampil["pengendalian"]; ?></td>
				            </tr>
				            <?php $no++;
				        }
				    } 
				} 
				?>

   			</table>
   	</div>

   	<div class="footer">
	<p class="copy">Copyright 2023. Rikza M. Fahira</p>
	</div>

</div>
</body>
</html>