<?php 
//koneksi ke database
//gunakan function mysqli_connect
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

//menangkap parameter nis pada link ubah
$kdgejala = $_GET['kdgejala'];

//query yg akan menampilkan data yg akan diubah berdasarkan nis
$query = mysqli_query($koneksi, "SELECT * FROM gejala WHERE kd_gejala='$kdgejala'");

$tampil = mysqli_fetch_array($query);

 ?>

<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");
// Cek apakah tombol simpan sudah ditekan
if (isset($_POST['simpan'])) {
    //maka ambil data yg baru diubah dalam form
    $kdgejala = $_POST['kdgejala'];
    $nmgejala = $_POST['nmgejala'];

//query update data
$query =  "UPDATE gejala set 
				nm_gejala='$nmgejala'
				WHERE kd_gejala='$kdgejala'";

$ubah = mysqli_query($koneksi,$query);

    // Pesan data berhasil diedit
    if ($ubah) {
        echo "<script>
            alert('Data Berhasil DiEdit');
            window.location.href = 'datagejala.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal DiEdit');
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
<div class="ubahdata">
    <h2>Edit Data Gejala</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="id">Kd Gejala</label></td>
                    <td><input type="text" name="kdgejala" id="id" value="<?php echo $tampil["kd_gejala"];?>"></td>
                </tr>

                <tr>
                    <td><label for="nama">Nama Gejala</label></td>
                    <td><input type="text" name="nmgejala" id="nama" value="<?php echo $tampil["nm_gejala"];?>"></td>
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
