<?php
if (isset($_GET['nama_penyakit']) && isset($_GET['keterangan']) && isset($_GET['pengendalian']) && isset($_GET['list_data'])) {
    $nama_penyakit = $_GET['nama_penyakit'];
    $keterangan = $_GET['keterangan'];
    $pengendalian = $_GET['pengendalian'];
    $list_data = urldecode($_GET['list_data']);

    // Sekarang Anda dapat menggunakan variabel-variabel ini untuk mencetak informasi yang sesuai.
    echo "<p>Nama Penyakit: " . htmlspecialchars($nama_penyakit) . "</p>";
    echo "<p>Keterangan: " . htmlspecialchars($keterangan) . "</p>";
    echo "<p>Pengendalian: " . htmlspecialchars($pengendalian) . "</p>";

    // Menampilkan list_data
    echo "<h3>Gejala Yang dipilih</h3>";
    echo "<div class='tampiltabel'>";
    echo "<table class='table1'>";
    echo "<tbody>";
    echo $list_data;
    echo "</tbody>";
    echo "</table>";
    echo "</div>";

    // Selanjutnya, Anda dapat mengatur tata letak cetakan dan gaya sesuai kebutuhan Anda.
} else {
    // Jika parameter tidak diberikan, Anda dapat menampilkan pesan yang sesuai atau mengalihkan pengguna ke halaman lain.
    echo "Tidak ada data untuk dicetak.";
}
?>
