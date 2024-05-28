<?php

session_start();
if (isset($_SESSION['admin_username'])) {
    header("location:admin/dasboard.php");
}

 $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan password</li>";
    }
    if (empty($err)) {
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }
 	
    if (empty($err)) {
        $_SESSION['admin_username'] = $username;
        header("location:admin/dasboard.php");
        exit();
    }
}
?>

<?php 


if (isset($_SESSION['user_username'])) {
    header("location:user/beranda.php");
}
 $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");

$username = "";
$password = "";
$err = "";
if (isset($_POST['login'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li>Silakan masukkan username dan password</li>";
    }
 	 if (empty($err)) {
        $sql1 = "select * from user where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($r1['password'] != md5($password)) {
            $err .= "<li>Akun tidak ditemukan</li>";
        }
    }

    if (empty($err)) {
        $_SESSION['user_username'] = $username;
        header("location:user/beranda.php");
        exit();
    }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sistem Pakar</title>
	<link rel="stylesheet" href="d.css">
</head>
<body>
<div class="login">
	<h1>Login</h1>
	<form method="POST" action="">
	<table>
		<tr>
			<td><label for="username">Username</label></td>
			<td><input type="text" name="username" id="username"></td>
		</tr>
		<tr>
			<td><label for="password">Password</label></td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td colspan="2"><button type="submit" name="login">Login</button>
			<button><a href="index.php">Batal</a></button></td>
		</tr>
	</table>
    <h2>Belum punya akun? <a href="register.php" class="daftar">Daftar sekarang</a></h2>
	</form>
</div>
</body>
</html>