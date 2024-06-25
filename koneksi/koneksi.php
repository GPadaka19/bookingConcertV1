<?php
// Konfigurasi basis data
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'pemesanan_tiket';

// Membuat koneksi ke basis data
$conn = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}