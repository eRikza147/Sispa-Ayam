<?php 
//koneksi ke database
//gunakan function mysqli_connect
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

//menangkap parameter nis pada link ubah
$idpenyakit = $_GET['idpenyakit'];

//query yg akan menampilkan data yg akan diubah berdasarkan nis
$query = mysqli_query($koneksi, "SELECT * FROM penyakit WHERE id_penyakit='$idpenyakit'");

$tampil = mysqli_fetch_array($query);

 ?>

<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");
// Cek apakah tombol simpan sudah ditekan
if (isset($_POST['simpan'])) {
    //maka ambil data yg baru diubah dalam form
    $idpenyakit = $_POST['idpenyakit'];
    $nmpenyakit = $_POST['nmpenyakit'];
    $ket=$_POST['ket'];
    $pengendalian = $_POST['pengendalian'];

//query update data
$query =  "UPDATE penyakit set 
				nm_penyakit='$nmpenyakit',
                keterangan='$ket',
                pengendalian='$pengendalian'
				WHERE id_penyakit='$idpenyakit'";

$ubah = mysqli_query($koneksi,$query);

    // Pesan data berhasil diedit
    if ($ubah) {
        echo "<script>
            alert('Data Berhasil DiEdit');
            window.location.href = 'datapenyakit.php';
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
    <link rel="stylesheet" type="text/css" href="../gaya.css">
</head>
<body>
<div class="ubahdata penyakit">
    <h2>Edit Data Penyakit</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <td><label for="id">Id Penyakit</label></td>
                    <td><input type="text" name="idpenyakit" id="id" value="<?php echo $tampil["id_penyakit"];?>"></td>
                </tr>

                <tr>
                    <td><label for="nama">Nama Penyakit</label></td>
                    <td><input type="text" name="nmpenyakit" id="nama" value="<?php echo $tampil["nm_penyakit"];?>"></td>
                </tr>

                <tr>
                    <td style="height: 250px;"><label for="ket">Keterangan</label></td>

                    <td><textarea name="ket" id="ket"><?php echo $tampil["keterangan"];?></textarea></td>
                </tr>

                <tr>
                    <td style="height: 250px;"><label for="obt">Pengendalian</label></td>
                    <td><textarea name="pengendalian" id="obt" ><?php echo $tampil["pengendalian"];?></textarea></td>
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
