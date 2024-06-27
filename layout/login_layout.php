<?php
session_start();
if (isset($_SESSION['id_pengguna']) || isset($_SESSION['nama'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="login_index.php" class="text-white text-2xl font-bold">Pemesanan tiket</a>
        <ul class="flex space-x-4">
            <li><a href="profil.php" class="text-white"><?= $_SESSION['nama']; ?></a></li>
            <li><a href="koneksi/logout.php" class="text-white">Logout</a></li>
        </ul>
    </div>
</nav>
</body>
</html>

<?php
} else {
    header("location: login.php");
}
