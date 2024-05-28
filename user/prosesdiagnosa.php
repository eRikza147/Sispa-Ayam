<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" href="../j.css">
    <style type="text/css">
        .proses .h4{
            font-size: 20px;
            text-decoration: underline;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .bttambah{
            margin-top: 35px;
            margin-left: 30px;
        }
        .proses {
            width: 960px;
            height: 100%;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Sistem Pakar Unggas Lokal</h1>
            <ul>
                <li><a href="beranda.php">Dashboard</a></li>
                <li><a href="diagnosa.php">Diagnosa</a></li>
                <li><a href="penyakit.php">Informasi Penyakit</a></li>
                <li><a href="riwayat.php">Riwayat</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="proses">
            <h3 class="h4">Hasil Diagnosa</h3>
            <h3>Gejala yang dipilih</h3>
            <?php
            session_start();
            $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
            $username = $_SESSION['user_username'];
            function arrays_are_equal($array1, $array2)
            {
                array_multisort($array1);
                array_multisort($array2);
                return (serialize($array1) === serialize($array2));
            }

            if (isset($_POST['proses'])) {
                $arr_gejala_terpilih = isset($_SESSION['arr_gejala_terpilih']) ? $_SESSION['arr_gejala_terpilih'] : array();
                $tanggal = date('Y-m-d');
                $waktu_input = date("H:i:s.u");

                $arr_gejala_terpilih = array();
                $list_data = '';
                $no = 0;

                for ($i = 0; $i < count($_POST['gejala']); $i++) {
                    $gejala = $_POST['gejala'][$i];
                    $arr_gejala_terpilih[] = $gejala;
                    $rgejala = mysqli_fetch_array(mysqli_query($koneksi, "SELECT kd_gejala,nm_gejala FROM gejala where id_gejala = " . $gejala));
                    $list_data .= '
                    <tr>
                        <td>' . ++$no . '.    ' . '</td>

                        <td>' . '  ' . ' ' . $rgejala['kd_gejala'] . ' - ' . $rgejala['nm_gejala'] . '</td>
                    </tr>
                    ';
                }

                $id_kecanduan_hasil = '';
                $nama_kecanduan_hasil = '';
                $deskripsi_hasil = '';
                $solusi_hasil = '';

                $sql1 = mysqli_query($koneksi, "SELECT id_penyakit, nm_penyakit, keterangan, pengendalian FROM penyakit ORDER BY id_penyakit");
                while ($r = mysqli_fetch_array($sql1)) {
                    $id_kecanduan = $r['id_penyakit'];
                    $nama_kecanduan = $r['nm_penyakit'];
                    $deskripsi = $r['keterangan'];
                    $solusi = $r['pengendalian'];

                    $arr_gejala_kecanduan = array();
                    $sql_at = mysqli_query($koneksi, "SELECT id_gejala FROM pengetahuan WHERE id_penyakit='$id_kecanduan' ORDER BY id_gejala");

                    while ($r_at = mysqli_fetch_array($sql_at)) {
                        $id_gejala = $r_at['id_gejala'];
                        $arr_gejala_kecanduan[] = $id_gejala;
                    }

                    if (arrays_are_equal($arr_gejala_terpilih, $arr_gejala_kecanduan)) {
                        $id_kecanduan_hasil = $id_kecanduan;
                        $nama_kecanduan_hasil = $nama_kecanduan;
                        $deskripsi_hasil = $deskripsi;
                        $solusi_hasil = $solusi;
                    }
                }
                if ($nama_kecanduan_hasil != '') {
                    // Simpan ke tabel hasil dengan menyertakan id_gejala

                    $q = "INSERT INTO riwayat (username, id_penyakit, nm_penyakit, keterangan, pengendalian, tanggal_input, waktu_input) 
                        VALUES ('$username', '$id_kecanduan_hasil',  '$nama_kecanduan_hasil','$deskripsi_hasil', '$solusi_hasil', '$tanggal', '$waktu_input' )";
                    mysqli_query($koneksi, $q);
                } else {
                    $nama_kecanduan_hasil = '<p>Mohon maaf penyakit tidak ditemukan, silahkan melakukan konsultasi lebih lanjut kepada dokter hewan</p>';
                    $btncetak = ' ';
                }
                $tbl_hasil = '';

                $tbl_hasil .= '
                <tr>
                    <td width="150">Nama Peternak:</td>
                    <td><strong>' . $username . '</strong></td>
                </tr>
                <tr>
                    <td width="120">Nama Penyakit:</td>
                    <td>' . $nama_kecanduan_hasil . '</td>
                </tr>';

                if (!empty($id_kecanduan_hasil)) {
                    $tbl_hasil .= '
                    <tr>
                        <td width="150">Keterangan</td>
                        <td><strong>' . $deskripsi_hasil . '</strong></td>
                    </tr>
                    <tr>
                        <td width="150">Pengendalian</td>
                        <td><strong>' . $solusi_hasil . '</strong></td>
                    </tr>';
                }

                if (!empty($id_kecanduan_hasil)) {
                    $rusername = $username;
                    $rkecanduan = mysqli_fetch_array(mysqli_query($koneksi, "select * from penyakit where id_penyakit='" . $id_kecanduan_hasil . "'"));
                    $rdeskripsi = mysqli_fetch_array(mysqli_query($koneksi, "select * from penyakit where id_penyakit='" . $id_kecanduan_hasil . "'"));
                    $rsolusi = mysqli_fetch_array(mysqli_query($koneksi, "select * from penyakit where id_penyakit='" . $id_kecanduan_hasil . "'"));

                    $tbl_hasil = '
                    <tr>
                        <td width="150" style="color: black;"><strong>Nama Peternak:</td>
                        <td style="color: black;">' . $username . '</td>
                    </tr>

                    <tr>
                        <td width="150" style="color: black;"><strong>Nama Penyakit :</td>
                        <td style="color: black;">' . $rkecanduan['kd_penyakit'] . ' - ' . $rkecanduan['nm_penyakit'] . '</td>
                    </tr>

                    <tr>
                        <td width="150" style="color: black;"><strong>Keterangan :</td>
                        <td style="color: black;">' . $rkecanduan['keterangan'] . '</td>
                    </tr>

                    <tr>
                        <td width="150" style="color: black;"><strong>Pengendalian</td>
                        <td style="color: black;">' . $rkecanduan['pengendalian'] . '</td>
                    </tr>
                                 
                    ';
                    $btncetak = '
                        <a href="bp.php">Cetak Hasil</a> 
                    ';
                }
            }
            ?>


            <div class='tampiltabel'>
                <table class="table1">
                    <tbody>
                        <?php echo $list_data; ?>
                    </tbody>
                </table>
            </div>

            <h3>Hasil analisa</h3>
            <div class='tampiltabel'>
                <table class="table2">
                    <tbody>
                        <?php echo $tbl_hasil; ?>
                    </tbody>
                </table>
            <div>

            <div class="bttambah">
                <a href="diagnosa.php">Ulangi Konsultasi</a> 
                <?php echo $btncetak; ?>
            </div>
        </div>
            
</div>
</div>  

<div class="footer">
                <p class="copy">Copyright 2023. Rikza M. Fahira</p>
            </div>    
</body>
</html>
