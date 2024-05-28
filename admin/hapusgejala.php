<?php 

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");


$kdgejala = $_GET['kdgejala'];


$query = "DELETE FROM gejala WHERE kd_gejala='$kdgejala'";
$hapus = mysqli_query($koneksi,$query);

if ($hapus) {
	echo "<script>
			alert('Data Berhasil Dihapus');
			window.location.href='datagejala.php';
		 </script>";
	} else {
	echo "<script>
			alert('Data Gagal Dihapus');
			window.location.href='datagejala.php';
		 </script>";
	}
 ?>