
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" href="../css.css">
</head>
<body>
<div class="container">
	<div class="header">
		<h1>Sistem Pakar Unggas Lokal</h1>
		 <ul>
	    	<li><a href="beranda.php">Dashboard</a></li>
	    	<li><a href="diagnosa.php">Diagnosa</a></li>
	    	<li><a href="penyakit.php">Informasi Penyakit</a></li>
	    	<li><a href="riwayat.php">Riwayat</a></li>
	    	<!-- <li><a href="datapasien.php">Data Pasien</a></li> -->
	    	<li><a href="../logout.php">Logout</a></li>
	    </ul>
    </div>
    <div class="contenta">
    	<?php 
    	session_start();
    	$username =$_SESSION['user_username']; ?>
    		<h1>Selamat Datang Peternak <?php echo $username ?></h1>
    </div>
    <div class="footer">
		<p class="copy">Copyright 2023. Rikza M. Fahira</p>
	</div>

</div>
</body>
</html>