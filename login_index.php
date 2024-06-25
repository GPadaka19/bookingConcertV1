<?php
require_once 'layout/login_layout.php';
require_once 'koneksi/koneksi.php';

// Query untuk mendapatkan data konser yang akan datang
$query = "SELECT * FROM acara";
$result = mysqli_query($conn, $query);

?>
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Konser yang Akan Datang</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php
        while ($konser = mysqli_fetch_assoc($result)) {
            ?>
            <!-- Start of Concert Card -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-bold mb-2"><?= $konser['nama']; ?></h3>
                <p class="text-gray-700 mb-2">Tanggal: <?= date('d F Y', strtotime($konser['tanggal'])); ?></p>
                <p class="text-gray-700">Lokasi: <?= $konser['lokasi']; ?></p>
            </div>
            <!-- End of Concert Card -->
        <?php
        }
        ?>
    </div>
</div>

