<?php
require_once 'layout/layout.php';
?>
<div class="flex justify-center items-center h-screen">
    <div class="text-center">
        <h1 class="text-4xl font-bold mb-6">Daftar Akun Baru</h1>
        <form action="koneksi/proses_daftar.php" method="post">
            <div class="mb-6">
                <label for="nama" class="block text-base font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl" required>
            </div>
            <div class="mb-6">
                <label for="email" class="block text-base font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-base font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-2xl" required>
            </div>
            <button type="submit" class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Daftar
            </button>
        </form>
    </div>
</div>
<?php
if (isset($_SESSION['nama'])) {
    header("location: login.php");
}
?>
