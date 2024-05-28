<?php 
$koneksi=mysqli_connect("localhost", "root", "", "db_sispaayam");

if (isset($_POST['daftar'])) {
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$query = mysqli_query($koneksi, "INSERT INTO user (nama, alamat, username, password) VALUES ( '$nama', '$alamat','$username', '$password')");
	
	if ($query) {
        echo "<script>
            alert('Berhasil Dafar');
            window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Dafar');
            window.location.href = 'register.php';
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
	<link rel="stylesheet" href="css.css">
</head>
<body>
<div class="login">
	<h1>Daftar</h1>
	<form method="POST" action="">
	<table>
		<tr>
			<td><label for="name">Nama</label></td>
			<td><input type="text" name="nama" id="name"></td>
		</tr>
		<tr>
			<td><label for="alamat">Alamat</label></td>
			<td><input type="text" name="alamat" id="alamat"></td>
		</tr>
		<tr>
			<td><label for="username">Username</label></td>
			<td><input type="text" name="username" id="username"></td>
		</tr>
		<tr>
			<td><label for="password">Password</label></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" name="daftar">Daftar</button>
			<button><a href="login.php">Batal</a></button></td>
		</tr>
	</table>
	</form>
</div>
</body>
</html>