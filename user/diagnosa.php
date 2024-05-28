<?php
session_start();

$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$chk_gejala = '';
$q = "select * from gejala order by id_gejala";
$q = mysqli_query($koneksi, $q);
while ($r = mysqli_fetch_array($q)) {
  $kd_gejala = $r['kd_gejala'];
  $nm_gejala = $r['nm_gejala'];
  $chk_gejala .= '
    <tr>
        <td align="center"><input type="checkbox" name="gejala[]" class="flat" value="' . $r['id_gejala'] . '">' . $kd_gejala . ' - ' . $nm_gejala . '</td>
    </tr>';
}
?>
<script type="text/javascript">
  $(document).ready(function() {
    $('#frm').submit(function() {
      if (!$('input[type=checkbox]:checked').length) {
        $('#chkmod').modal('show');
        return false;
      }
      return true;
    });

  });
</script>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" href="../i.css">
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
        <div class="content">
            
        	<div class="tampilgejala">
            	<form id="form1" name="form1"  method="post" action="prosesdiagnosa.php">
                    <h1>Silahkan pilih gejala yang dialami!</h1>
            		<div class="cexbox1">
                        <table class="tabelcex">
                            <tbody>
                            <?php echo $chk_gejala; ?>
                            </tbody>
                        </table>
                	</div>

                <button type="submit" name="proses"  class="btncek">CEK PENYAKIT</button>
            </div>
           	   </form>
         <div class="footer">
            <p class="copy">Copyright 2023. Rikza M. Fahira</p>
         </div>

    </div>
</body>

</html>
