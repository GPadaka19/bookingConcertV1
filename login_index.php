<?php
require_once 'layout/login_layout.php';
require_once 'koneksi/koneksi.php';

// Query untuk mendapatkan data konser yang akan datang
$query = "SELECT * FROM acara";
$result = mysqli_query($conn, $query);

?>
<div class="container mx-auto mt-10 w-full">
    <h2 class="text-2xl font-bold mb-4">Konser yang Akan Datang</h2>
    <div class="flex flex-col gap-8">
        <?php
        while ($konser = mysqli_fetch_assoc($result)) {
            ?>
            <div class="bg-white rounded-lg shadow-md p-6 w-4/5 justify-center mx-auto hover:scale-105 transition duration-500 ease-in-out">
            <img src="img/<?= $konser['gambar']; ?>" alt="Gambar Konser" class="w-full mb-4" style="height: 300px; object-fit: contain; object-position: center; width: 100%;">
            <h3 class="text-xl font-bold mb-2"><?= $konser['nama_acara']; ?></h3>
            <p class="text-gray-700 mb-2">Tanggal: <?= date('d F Y', strtotime($konser['tanggal'])); ?></p>
            <p class="text-gray-700">Lokasi: <?= $konser['lokasi']; ?></p>
            <p class="text-gray-700">Deskripsi: <?= $konser['deskripsi']; ?></p>
        <a href="login_pesan.php?id_acara=<?= $konser['id_acara']; ?>" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Pesan Tiket
        </a>
        </div>
        <?php
        }
        ?>
    </div>
</div>
