<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");

// Cek apakah tombol simpan sudah ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari setiap elemen dalam form
    $idpenyakit = $_POST['idpenyakit'];
    $idgejala = $_POST['idgejala'];

    // Pastikan kolom nilaitotal memiliki tipe data FLOAT atau DOUBLE di tabel database

    // Query insert data
    $query = "INSERT INTO pengetahuan (id_penyakit, id_gejala)
              VALUES ('$idpenyakit', '$idgejala')";

    $simpan = mysqli_query($koneksi, $query);

    // Pesan data berhasil disimpan
    if ($simpan) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'pengetahuan.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan');
            window.location.href = 'tambahpengetahuan.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" type="text/css" href="../d.css">
</head>
<body>
<div class="tambahdata">
	<h2>Input Basis Pengetahuan</h2>
		<form method="POST" action="">
			<table>
				<tr>
					<td><label for="nama1">Nama Penyakit</label></td>
					<td><select name="idpenyakit" class="select">
						<option value="">--Pilih--</option>
						<?php 
						$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
						$query1 = mysqli_query($koneksi, "SELECT * FROM penyakit") or die (mysqli_error($koneksi));
						 while ($tampil1 = mysqli_fetch_array($query1)) {
						 	echo '<option value="'.$tampil1["id_penyakit"].'">'.$tampil1["id_penyakit"].' '.$tampil1["nm_penyakit"].'</option>';
						 }
						 ?>
					</select></td>
				</tr>
				<tr>
					<td><label for="nama2">Nama Gejala</label></td>
					<td><select name="idgejala" class="select">
						<option value="">--Pilih--</option>
						<?php 
						$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
						$query1 = mysqli_query($koneksi, "SELECT * FROM gejala") or die (mysqli_error($koneksi));
						 while ($tampil1 = mysqli_fetch_array($query1)) {
						 	echo '<option value="'.$tampil1["id_gejala"].'">'.$tampil1["id_gejala"].' '.$tampil1["nm_gejala"].'</option>';
						 }
						 ?>
					</select></td>
				</tr>

				<tr>
					<td colspan="2">
						<button type="submit" name="simpan">Simpan</button>
						<button type="submit"><a href="pengetahuan.php">Batal</a></button>
					</td>
				</tr>
			</table>
		</form>
</div>
</body>
</html>
