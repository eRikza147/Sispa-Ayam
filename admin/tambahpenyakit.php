<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

// Cek apakah tombol simpan sudah ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari setiap elemen dalam form
    $idpenyakit = $_POST['idpenyakit'];
    $nmpenyakit = $_POST['nmpenyakit'];
    $ket=$_POST['ket'];
    $pengendalian = $_POST['pengendalian'];

    // Pastikan kolom nilaitotal memiliki tipe data FLOAT atau DOUBLE di tabel database

    // Query insert data
    $query = "INSERT INTO penyakit (id_penyakit, nm_penyakit, keterangan, pengendalian)
            VALUES ('$idpenyakit', '$nmpenyakit', '$ket', '$pengendalian')";

    $simpan = mysqli_query($koneksi, $query);

    // Pesan data berhasil disimpan
    if ($simpan) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'datapenyakit.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan');
            window.location.href = 'tambahpenyakit.php';
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
	<link rel="stylesheet" type="text/css" href="../gaya.css">
</head>
<body>
<div class="tambahdata penyakit">
	<h2>Input Data Penyakit</h2>
		<form method="POST" action="">
			<table>
				<tr>
					<td><label for="id">Id Penyakit</label></td>
					<td><input type="text" name="idpenyakit" id="id" ></td>
				</tr>

				<tr>
					<td><label for="nama">Nama Penyakit</label></td>
					<td><input type="text" name="nmpenyakit" id="nama" ></td>
				</tr>

				<tr>
					<td style="height: 250px;"><label for="ket">Keterangan</label></td>

					<td><textarea name="ket" id="ket"></textarea></td>
				</tr>

				<tr>
					<td style="height: 250px;"><label for="obt">Pengendalian</label></td>

					<td><textarea name="pengendalian" id="obt"></textarea></td>
				</tr>
				
				<tr>
					<td colspan="2">
						<button type="submit" name="simpan">Simpan</button>
						<button type="submit"><a href="datapenyakit.php">Batal</a></button>
					</td>
				</tr>
			</table>
		</form>
</div>
</body>
</html>
