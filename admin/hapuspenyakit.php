<?php 

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");


$idpenyakit = $_GET['idpenyakit'];


$query = "DELETE FROM penyakit WHERE id_penyakit='$idpenyakit'";
$hapus = mysqli_query($koneksi,$query);

if ($hapus) {
	echo "<script>
			alert('Data Berhasil Dihapus');
			window.location.href='datapenyakit.php';
		 </script>";
	} else {
	echo "<script>
			alert('Data Gagal Dihapus');
			window.location.href='datapenyakit.php';
		 </script>";
	}
 ?>