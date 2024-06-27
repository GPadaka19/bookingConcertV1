<?php
require_once 'koneksi.php';
session_start();
$nama = $_POST['nama'];
$password = $_POST['password'];
$query = $conn->prepare("SELECT * FROM pengguna WHERE nama = ?");
$query->bind_param("s", $nama);
$query->execute();
$result = $query->get_result();
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        echo "Login berhasil!";
        $_SESSION['nama'] = $nama;
        $_SESSION['id_pengguna'] = $user['id_pengguna'];
        header("Location: ../login_index.php");
        exit();
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}
$conn->close();
?>
