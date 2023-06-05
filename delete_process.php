<?php
// Lakukan koneksi ke database (asumsikan sudah terkoneksi)
require 'server/config.php';

$_id = $_GET['id'];
// Periksa apakah tombol hapus diklik0
if (isset($_POST['delete_button'])) {
    // Eksekusi pernyataan SQL DELETE
    $sql = "DELETE FROM transaksi WHERE transaksi.id = $_id";
    $result = mysqli_query($conn, $sql);
    // Gantilah 'nama_tabel' dengan nama tabel yang sesuai, dan 'kondisi' dengan kondisi yang ingin Anda gunakan.
    // if (mysqli_query($conn, $sql) ) {
    //     echo "Data berhasil dihapus.";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
}

// Tutup koneksi ke database (jika diperlukan)
?>
