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
            <a href="login_index.php" class="text-white text-2xl font-bold">Pemesanan Tiket</a>
            <div class="dropdown relative">
                <button class="text-white dropdown-toggle py-2 px-2 rounded-full bg-white hover:bg-gray-200 transition duration-300 ease-in-out" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false" onclick="toggleDropdown()">
                    <img width="24" height="24" src="https://img.icons8.com/material/24/administrator-male--v1.png" alt="administrator-male--v1"/>
                </button>
                <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-2" aria-labelledby="dropdownMenuButton" id="dropdownMenu" style="display: none;">
                    <a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100" href="tiket_saya.php">Tiket Saya</a>
                    <a class="dropdown-item block px-4 py-2 text-gray-700 hover:bg-gray-100" href="koneksi/logout.php">Logout</a>
                </div>
            </div>
        </div>
        <script>
            function toggleDropdown() {
                var dropdownMenu = document.getElementById('dropdownMenu');
                if (dropdownMenu.style.display === "none") {
                    dropdownMenu.style.display = "block";
                } else {
                    dropdownMenu.style.display = "none";
                }
            }
        </script>
    </nav>
</body>
</html>

<?php
} else {
    header("location: login.php");
}
