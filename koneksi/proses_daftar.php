<?php
require_once 'koneksi.php';

// Menangkap data dari form daftar
$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

// Mengenkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk menambahkan data ke basis data
$query = "INSERT INTO pengguna (nama, email, password) VALUES ('$nama', '$email', '$password')";

// Menjalankan query
if (mysqli_query($conn, $query)) {
    echo "Pendaftaran berhasil!";
    header("location: ../index.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

// Menutup koneksi
mysqli_close($conn);

