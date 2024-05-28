<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$query = "SELECT COUNT(*) as jumlah FROM gejala";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$jumlah1 = $row['jumlah'];

 ?>
<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$query = "SELECT COUNT(*) as jumlah FROM penyakit";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$jumlah2 = $row['jumlah'];

 ?>
 <?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$query = "SELECT COUNT(*) as jumlah FROM pengetahuan";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);
$jumlah3 = $row['jumlah'];

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" href="../d.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h1>Sistem Pakar Unggas Lokal</h1>
		 <ul>
	    	<li><a href="dasboard.php">Dasboard</a></li>
	    	<li><a href="datagejala.php">Data Gejala</a></li>
	    	<li><a href="datapenyakit.php">Data Penyakit</a></li>
	    	<li><a href="pengetahuan.php">Basis Pengetahuan</a></li>
	    	<li><a href="lppertahun.php">Laporan</a></li>
	    	<!-- <li><select>
	    		<option>Laporan</option>
	    		<option></option>
	    		<option><a href="#">Laporan 2</a></option>
	    	</select></li> -->
	    	<li><a href="../logout.php">Logout</a></li>
	    </ul>
    </div>
    <div class="contenta">
    		<div class="jumlah cf">
    			<div class="aplo1 cf">
    				<img src="../gejala.png" width="50px"  height="50px">
    				<h1>Gejala <?php echo $jumlah1; ?></h1>
    			</div>
    			<div class="aplo2 cf">
    				<img src="../penyakit.png" width="50px"  height="50px">
    				<h1>Penyakit <?php echo $jumlah2; ?></h1>
    			</div>
    			<div class="aplo3 cf">
    				<img src="../pengetahuan.png" width="50px"  height="50px">
    				<h1>Basis Pengetahuan <?php echo $jumlah3; ?></h1>
    			</div>

    		</div>
    		<h1>Selamat Datang Admin</h1>
    </div>
    <div class="footer">
		<p class="copy">Copyright 2023. Rikza M. Fahira</p>
	</div>

</div>
</body>
</html>