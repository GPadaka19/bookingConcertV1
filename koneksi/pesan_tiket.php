<?php
include 'login_index.php';
include 'proses_tiket.php';

if (isset($_POST['pesan_tiket'])) {
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_tiket = $_POST['id_tiket'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $tanggal_pembayaran = date('Y-m-d');

    $query = "INSERT INTO transaksi (id_pengguna, id_tiket, metode_pembayaran, tanggal_pembayaran) VALUES ('$id_pengguna', '$id_tiket', '$metode_pembayaran', '$tanggal_pembayaran')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Tiket berhasil dipesan!";
    } else {
        echo "Gagal memesan tiket. Silakan coba lagi.";
    }
}
?>
