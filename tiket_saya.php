<?php
require_once 'layout/login_layout.php';
require_once 'koneksi/koneksi.php';

// Query untuk mendapatkan data transaksi pengguna
$queryTransaksi = "SELECT * FROM transaksi WHERE id_pengguna = '" . $_SESSION['id_pengguna'] . "'";
$resultTransaksi = mysqli_query($conn, $queryTransaksi);

?>
<div class="container mx-auto mt-10 w-full mb-6">
    <h2 class="text-2xl font-bold mb-4">Tiket Saya</h2>
    <div class="flex flex-col gap-8">
        <?php
        while ($transaksi = mysqli_fetch_assoc($resultTransaksi)) {
            // Query untuk mendapatkan data acara
            $queryAcara = "SELECT * FROM acara WHERE id_acara = '" . $transaksi['id_acara'] . "'";
            $resultAcara = mysqli_query($conn, $queryAcara);
            $acara = mysqli_fetch_assoc($resultAcara);

            // Query untuk mendapatkan data pengguna
            $queryPengguna = "SELECT * FROM pengguna WHERE id_pengguna = '" . $transaksi['id_pengguna'] . "'";
            $resultPengguna = mysqli_query($conn, $queryPengguna);
            $pengguna = mysqli_fetch_assoc($resultPengguna);
            ?>
            <div class="bg-white rounded-lg shadow-md p-6 w-4/5 mx-auto hover:scale-105 transition duration-500 ease-in-out flex flex-row justify-between items-center mb-4">
                <img src="img/<?= $acara['gambar']; ?>" alt="Gambar Konser" class="w-1/2 mb-4" style="height: 300px; object-fit: contain; object-position: center;">
                <div class="w-1/2 pl-4">
                    <h3 class="text-xl font-bold mb-2"><?= $acara['nama_acara']; ?></h3>
                    <p class="text-gray-700 mb-2">Nama Pemesan: <?= $pengguna['nama']; ?></p>
                    <p class="text-gray-700 mb-2">Tanggal Acara: <?= date('d F Y', strtotime($acara['tanggal'])); ?></p>
                    <p class="text-gray-700">Total Bayar: Rp <?= $transaksi['total_harga']; ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>