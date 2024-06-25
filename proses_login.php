<?php
require_once 'koneksi.php';

// Menangkap data dari form login
$nama = $_POST['nama'];
$password = $_POST['password'];

// Query untuk memilih data pengguna berdasarkan email
$query = "SELECT * FROM pengguna WHERE nama = '$nama'";

// Menjalankan query
$result = mysqli_query($conn, $query);

// Cek apakah data ditemukan
if (mysqli_num_rows($result) > 0) {
    // Ambil data pengguna
    $user = mysqli_fetch_assoc($result);
    // Cek password
    if (password_verify($password, $user['password'])) {
        // Jika password benar, maka login berhasil
        echo "Login berhasil!";
    session_start();
    $_SESSION['nama'] = $nama;
    header("location: ../login_index.php");
    } else {
        echo "Password salah!";
    }
} else {
    echo "Email tidak ditemukan!";
}

// Menutup koneksi
mysqli_close($conn);
