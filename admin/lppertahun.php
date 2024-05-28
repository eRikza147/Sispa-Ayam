<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_sispaayam1");
$qry_all = mysqli_query($koneksi, "SELECT * FROM riwayat");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" type="text/css" href="../g.css">
    <style type="text/css">
        .filter{
            margin-bottom: 15px;
        }
        .filter label{
            font-weight: bold;
        }
        .filter .select {
            width: 150px;
            margin-left: 10px;
            margin-right: 10px;
            padding: 8px;
            font-size: 13px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }
        .btfilter{
            width: 120px;
            border: none;   
            padding: 10px;
            background-color: skyblue;
            border-radius: 5px;
        }
        .btfilter:hover{
            background-color: lightblue;
        }
        .laporan{
                height: 100vh;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Sistem Pakar Unggas Lokal</h1>
            <ul >
                <li><a href="dasboard.php">Dasboard</a></li>
                <li><a href="datagejala.php">Data Gejala</a></li>
                <li><a href="datapenyakit.php">Data Penyakit</a></li>
                <li><a href="pengetahuan.php">Basis Pengetahuan</a></li>
                <li><a href="lppertahun.php">Laporan</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="laporan cf">
            <div class="tabel">
                <?php
                // Inisialisasi nilai default bulan jika tidak ada yang dipilih
                $selectedMonth = isset($_GET['month']) ? $_GET['month'] : '';

                // Formulir untuk memilih bulan
                echo '<div class="filter">';
                echo '<form method="get" action="cetaklaporan.php?' . http_build_query(array('month' => $selectedMonth)) . '">';
                echo '<label for="month">Pilih Bulan: </label>';
                echo '<select name="month" id="month" class="select">';
                echo '<option value="" ' . ($selectedMonth === '' ? 'selected disabled' : '') . '>---Pilih---</option>'; 
                for ($i = 1; $i <= 12; $i++) {
                    $selected = ($i == $selectedMonth) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
                echo '</select>';
                echo '<input type="submit" value="Cetak Laporan" class="btfilter">';
                echo '</form>';
                echo '</div>';

                // Query untuk mendapatkan data sesuai filter
                $filterQuery = "SELECT * FROM riwayat";
                if ($selectedMonth !== '') {
                    $filterQuery .= " WHERE MONTH(tanggal_input) = $selectedMonth";
                }

                // Ambil dan tampilkan data sesuai kondisi
                echo '<table>';
                echo '<tr style="background-color: lightblue; font-weight: bold;">
                        <td width="30px">No</td>
                        <td width="100px">Tanggal</td>
                        <td width="150px">Nama Peternak</td>
                        <td width="100px">Penyakit</td>
                      </tr>';
                
                $no = 1;
                $qry = mysqli_query($koneksi, $filterQuery);
                
                while ($data = mysqli_fetch_assoc($qry)) { 
                    echo '<tr>
                            <td>' . $no . '</td>
                            <td>' . $data["tanggal_input"] . '</td>
                            <td>' . $data["username"] . '</td>
                            <td>' . $data["nm_penyakit"] . '</td>
                          </tr>';
                    $no++;
                }

                echo '</table>';
                ?>
            </div>
            <div class="chart">
                <canvas id="myChart"></canvas>
            </div>
        </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        <?php
            $qry = mysqli_query($koneksi, "SELECT * FROM riwayat GROUP BY nm_penyakit");
            while($data = mysqli_fetch_assoc($qry)){
                $dataLabel[] = $data['nm_penyakit'];

                $sql = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE nm_penyakit='$data[nm_penyakit]'");
                $res = $sql->num_rows;
                $jmlData[] = $res;
            }
        ?>
        const data = {
            labels: <?php echo json_encode($dataLabel);?>,
            datasets: [{
                label: 'My First Dataset',
                data: <?php echo json_encode($jmlData);?>,
                backgroundColor: [
                'rgb(253, 138, 138)',
                'rgb(255, 203, 203)',
                'rgb(158, 161, 212)',
                'rgb(241, 247, 181)',
                'rgb(168, 209, 209)'
                ],
                hoverOffset: 4
            }]
        };
        const config = {
            type: 'pie',
            data: data,
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        )
    </script>
    <div class="footer">
        <p class="copy">Copyright 2023. Rikza M. Fahira</p>
    </div>
    </div>
</body>
</html>
