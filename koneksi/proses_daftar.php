<?php
require_once 'koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$password = $_POST['password'];

$password = password_hash($password, PASSWORD_DEFAULT);
$query = "INSERT INTO pengguna (nama, email, password) VALUES ('$nama', '$email', '$password')";

if (mysqli_query($conn, $query)) {
    echo "Pendaftaran berhasil!";
    header("location: ../login.php");
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
