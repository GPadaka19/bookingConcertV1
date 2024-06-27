<?php
require_once 'layout/login_layout.php';
require_once 'koneksi/koneksi.php';


// Periksa apakah pengguna telah login dan id_pengguna tersedia di sesi
if (!isset($_SESSION['id_pengguna']) || !isset($_SESSION['nama'])) {
    // Jika tidak, redirect ke halaman login atau tampilkan pesan error
    header("Location: login.php");
    exit();
}

// Mendapatkan ID Acara dari URL
$id_acara = $_GET['id_acara'];

// Query untuk mendapatkan detail acara dan kelas tiket
$querytiket = "SELECT * FROM tiket WHERE id_acara = '$id_acara'";
$resulttiket = mysqli_query($conn, $querytiket);

$queryacara = "SELECT * FROM acara WHERE id_acara = '$id_acara'";
$resultacara = mysqli_query($conn, $queryacara);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pengguna = $_SESSION['id_pengguna'];
    $id_tiket = $_POST['id_tiket'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $total_harga = $_POST['total_harga'];
    $tanggal_pembayaran = date('Y-m-d');
    $id_acara = $_GET['id_acara'];
    $jumlah_tiket = $_POST['jumlah_tiket'];

    $queryTransaksi = "INSERT INTO transaksi (id_pengguna, id_tiket, metode_pembayaran, tanggal_pembayaran, total_harga, id_acara, jumlah_tiket) VALUES ('$id_pengguna', '$id_tiket', '$metode_pembayaran', '$tanggal_pembayaran', '$total_harga', '$id_acara', '$jumlah_tiket')";

    if (mysqli_query($conn, $queryTransaksi)) {
        header("Location: tiket_saya.php");
        exit();
    } else {
        echo "Error: " . $queryTransaksi . "<br>" . mysqli_error($conn);
    }
}
?>

<div class="flex justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">Pesan Tiket <?= mysqli_fetch_assoc($resultacara)['nama_acara']; ?></h1>
        <form id="form-pesan-tiket" method="POST">
            <div class="mb-6">
                <label for="nama" class="block text-base font-medium text-gray-700">Nama</label>
                <label for="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl text-center"><?= $_SESSION['nama']; ?></label>
            </div>
            <div class="mb-6">
                <label for="kelas" class="block text-base font-medium text-gray-700">Pilih Kelas Tiket</label>
                <select name="id_tiket" id="kelas" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl text-center">
                    <?php
                    while ($tiket = mysqli_fetch_assoc($resulttiket)) {
                        echo '<option value="' . $tiket['id_tiket'] . '" data-harga="' . $tiket['harga'] . '">' . $tiket['kelas'] . ' - Rp ' . $tiket['harga'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-6">
                <label for="jumlah_tiket" class="block text-base font-medium text-gray-700">Jumlah Tiket</label>
                <input type="number" name="jumlah_tiket" id="jumlah_tiket" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl text-center" required>
            </div>
            <div class="mb-6">
                <label for="metode_pembayaran" class="block text-base font-medium text-gray-700">Metode Pembayaran</label>
                <select name="metode_pembayaran" id="metode_pembayaran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl text-center">
                    <option value="transfer">Transfer Bank</option>
                    <option value="kartu_kredit">Kartu Kredit</option>
                    <option value="paypal">PayPal</option>
                </select>
            </div>
            <input type="hidden" name="total_harga" id="total_harga">
            <button type="button" onclick="showConfirmationModal()" class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Pesan Tiket
            </button>
        </form>
    </div>
</div>

<!-- Modal -->
<!-- Modal -->
<div id="confirmationModal" class="hidden fixed z-10 inset-0 overflow-y-auto flex items-center justify-center">
    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <!-- Modal content -->
    <div class="inline-block align-center bg-white rounded-lg text-center overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:flex sm:items-start">
                <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicon name: exclamation -->
                    <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Konfirmasi Pesanan</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Silakan periksa kembali detail pesanan Anda sebelum melanjutkan pembayaran.</p>
                        <p id="modal-content" class="text-sm text-gray-500 mt-4"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" onclick="submitForm()">
                Konfirmasi
            </button>
            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="closeModal()">
                Batal
            </button>
        </div>
    </div>
</div>

<script>
    function showConfirmationModal() {
        const kelasSelect = document.getElementById('kelas');
        const selectedKelas = kelasSelect.options[kelasSelect.selectedIndex].text;
        const hargaTiket = parseInt(kelasSelect.options[kelasSelect.selectedIndex].getAttribute('data-harga'));
        const jumlahTiket = parseInt(document.getElementById('jumlah_tiket').value);
        const metodePembayaran = document.getElementById('metode_pembayaran').value;
        const totalHarga = hargaTiket * jumlahTiket;
        const tanggalPembayaran = new Date().toLocaleDateString('id-ID', { day: '2-digit', month: 'short', year: 'numeric' });

        const modalContent = `
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:\t<?= $_SESSION['nama']; ?></td>
                </tr>
                <tr>
                    <td>Kelas Tiket</td>
                    <td>:\t${selectedKelas}</td>
                </tr>
                <tr>
                    <td>Jumlah Tiket</td>
                    <td>:\t${jumlahTiket}</td>
                </tr>
                <tr>
                    <td>Total Harga</td>
                    <td>:\tRp ${totalHarga}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>:\t${metodePembayaran}</td>
                </tr>
                <tr>
                    <td>Tanggal Pembayaran</td>
                    <td>:\t${tanggalPembayaran}</td>
                </tr>
            </table>
        `;

        document.getElementById('modal-content').innerHTML = modalContent;
        document.getElementById('total_harga').value = totalHarga;
        document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('confirmationModal').classList.add('hidden');
    }

    function submitForm() {
        document.getElementById('form-pesan-tiket').submit();
    }
</script>

