<?php
require_once 'koneksi.php';

// Mulai sesi
session_start();

// Menangkap data dari form login
$nama = $_POST['nama'];
$password = $_POST['password'];

// Gunakan prepared statements untuk keamanan
$query = $conn->prepare("SELECT * FROM pengguna WHERE nama = ?");
$query->bind_param("s", $nama);
$query->execute();
$result = $query->get_result();

// Cek apakah data ditemukan
if ($result->num_rows > 0) {
    // Ambil data pengguna
    $user = $result->fetch_assoc();
    
    // Cek password
    if (password_verify($password, $user['password'])) {
        // Jika password benar, maka login berhasil
        echo "Login berhasil!";
        
        // Set session
        $_SESSION['nama'] = $nama;
        $_SESSION['id_pengguna'] = $user['id_pengguna'];
        
        // Redirect ke halaman lain
        header("Location: ../login_index.php");
        exit(); // Pastikan untuk menghentikan eksekusi setelah redirect
    } else {
        echo "Password salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}

// Menutup koneksi
$conn->close();
?>
