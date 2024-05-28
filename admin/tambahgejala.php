<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

// Cek apakah tombol simpan sudah ditekan
if (isset($_POST['simpan'])) {
    // Ambil data dari setiap elemen dalam form
    $idgejala = $_POST['idgejala'];
    $nmgejala = $_POST['nmgejala'];

    // Pastikan kolom nilaitotal memiliki tipe data FLOAT atau DOUBLE di tabel database

    // Query insert data
    $query = "INSERT INTO gejala (id_gejala, nm_gejala)
            VALUES ('$idgejala', '$nmgejala')";

    $simpan = mysqli_query($koneksi, $query);

    // Pesan data berhasil disimpan
    if ($simpan) {
        echo "<script>
            alert('Data Berhasil Disimpan');
            window.location.href = 'datagejala.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Disimpan');
            window.location.href = 'tambahgejala.php';
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
	<link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
<div class="tambahdata">
	<h2>Input Data Gejala</h2>
		<form method="POST" action="">
			<table>
				<tr>
					<td><label for="id">Id Gejala</label></td>
					<td><input type="text" name="idgejala" id="id" ></td>
				</tr>

				<tr>
					<td><label for="nama">Nama Gejala</label></td>
					<td><input type="text" name="nmgejala" id="nama" ></td>
				</tr>

				
				<tr>
					<td colspan="2">
						<button type="submit" name="simpan">Simpan</button>
						<button type="submit"><a href="datagejala.php">Batal</a></button>
					</td>
				</tr>
			</table>
		</form>
</div>
</body>
</html>
