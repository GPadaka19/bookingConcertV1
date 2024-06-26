<?php
require_once 'layout/login_layout.php';
require_once 'koneksi/koneksi.php';

// Mendapatkan ID Acara dari URL
$id_acara = $_GET['id_acara'];

// Query untuk mendapatkan detail acara dan kelas tiket
$querytiket = "SELECT * FROM tiket where id_acara = '$id_acara'";
$resulttiket = mysqli_query($conn, $querytiket);

$queryacara = "SELECT * FROM acara where id_acara = '$id_acara'";
$resultacara = mysqli_query($conn, $queryacara);

?>

<div class="flex justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">Pesan Tiket <?= mysqli_fetch_assoc($resultacara)['nama_acara']; ?></h1>
        <form action="koneksi/proses_pesan.php" method="post">
            <div class="mb-6">
                <label for="kelas" class="block text-base font-medium text-gray-700">Pilih Kelas Tiket</label>
                <select name="kelas" id="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl">
                    <?php
                    while ($tiket = mysqli_fetch_assoc($resulttiket)) {
                        echo '<option value="' . $tiket['id_tiket'] . '">' . $tiket['kelas'] . ' - Rp ' . $tiket['harga'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Pesan Tiket
            </button>
        </form>
    </div>
</div>
