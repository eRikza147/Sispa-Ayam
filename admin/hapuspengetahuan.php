xx`<?php 

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");


$idpengetahuan = $_GET['id_pengetahuan'];


$query = "DELETE FROM pengetahuan WHERE id_pengetahuan='$idpengetahuan'";
$hapus = mysqli_query($koneksi,$query);

if ($hapus) {
	echo "<script>
			alert('Data Berhasil Dihapus');
			window.location.href='pengetahuan.php';
		 </script>";
	} else {
	echo "<script>
			alert('Data Gagal Dihapus');
			window.location.href='pengetahuan.php';
		 </script>";
	}
 ?>