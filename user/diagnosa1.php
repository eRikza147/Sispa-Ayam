<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" href="../h.css">
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
            	<form id="form1" name="form1"  method="post" action="diagnosa.php" style="display:<?php echo isset($_POST['submit']) ? 'none' : 'block'; ?>;">
                    <h1>Silahkan pilih gejala yang dialami!</h1>
            		<div class="cexbox">
                		<?php
                			$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");
							$tampil = "SELECT * FROM gejala";
                			$query = mysqli_query($koneksi, $tampil);



                			while ($hasil = mysqli_fetch_array($query)) {
                                  
                    			echo "<input type='checkbox' value='" . $hasil['id_gejala'] . "' name='gejala[]' /> " . $hasil['nm_gejala'] . "<br>";
                			}
               			 ?>
                		</div>

                <button type="submit" name="submit" onclick="checkDiagnosa(); hideForm();" class="btncek">CEK PENYAKIT</button>

           	   </form>

                <?php	
                    session_start();
					if( isset($_POST['submit'])){

					    $gejala = $_POST['gejala'];
					    $jumlah_dipilih = count($gejala);
					    $tanggal_input = date("Y-m-d");
                        $waktu_input = date("H:i:s.u");
                        $username = $_SESSION['user_username'];
					    for($x=0;$x<$jumlah_dipilih;$x++){
					        $tampil ="select DISTINCT p.id_penyakit, p.nm_penyakit, p.keterangan, p.pengendalian from pengetahuan b, penyakit p where b.id_gejala='$gejala[$x]' and p.id_penyakit=b.id_penyakit group by id_penyakit";
					        $result = mysqli_query($koneksi, $tampil);
					        $hasil  = mysqli_fetch_array($result);   
					                    
					    }
					        $koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam");
					        $querySimpan = "INSERT INTO riwayat (username, id_penyakit, nm_penyakit, keterangan, pengendalian, tanggal_input, waktu_input) VALUES ('$username', '" . $hasil['id_penyakit'] . "', '" . $hasil['nm_penyakit'] . "', '" . $hasil['keterangan'] . "', '" . $hasil['pengendalian'] . "', '$tanggal_input', '$waktu_input')";
					            	mysqli_query($koneksi, $querySimpan);
					   
                     }

					    
				?>

            <div class="tampiltabel" style="display: <?php echo isset($_POST['submit']) ? 'block' : 'none'; ?>;">
                <h1>Hasil diagnosa</h1>
                <form name="printForm" method="post">
                <table>
                     <tr>
                        <td width="150px" height="40px"><label>Nama Peternak</label></td>
                        <td><input type='text' readonly value="<?php echo $username;?>"></td>
                     </tr>       
					<tr>
                        <td width="150px" height="40px"><label>Id Penyakit</label></td>
                        <td><input type='text' readonly value="<?php echo $hasil["id_penyakit"];?>"></td>
                    </tr>
                    <tr>
                        <td width="150px" height="40px"><label>Nama Penyakit</label></td>
                        <td><input type='text' readonly value="<?php echo $hasil["nm_penyakit"];?>"></td> 
                    </tr>
                    <tr> 
                        <td width="150px" colspan="2" style="text-align: top;"><label>Keterangan :</label></td></tr>
                    <tr>    
                        <td colspan="2"><textarea readonly><?php echo $hasil["keterangan"];?></textarea></td> 
                    </tr>
                    <tr> 
                        <td width="150px" colspan="2" style="text-align: top;"><label>Pengendalian :</label></td></tr>
                    <tr>	
                        <td colspan="2"><textarea readonly><?php echo $hasil["pengendalian"];?></textarea></td> 
                    </tr>
					                              
                </table>
                <div class="bttambah">
                <a href="bp.php">CetakHalaman</a>
                </div>
                </form>
            </div>        

        </div>

<!--         <script>
            function printPage() {
                window.print();
            }
        </script> -->
        <script language="JavaScript" type="text/javascript">
            function hideForm() {
                var form = document.getElementById("form1");
                form.style.display = "none";
            }

            function checkDiagnosa() {
                return confirm('Apakah sudah benar gejalanya?');
            }
        </script>    

    
       
         <div class="footer">
            <p class="copy">Copyright 2023. Rikza M. Fahira</p>
         </div>

    </div>
</body>

</html>
