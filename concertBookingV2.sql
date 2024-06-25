CREATE DATABASE booking_concert;

USE booking_concert;

CREATE TABLE Pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Acara (
    id_acara INT AUTO_INCREMENT PRIMARY KEY,
    nama_acara VARCHAR(255) NOT NULL,
    tanggal DATE NOT NULL,
    lokasi VARCHAR(255) NOT NULL,
    deskripsi TEXT
);

CREATE TABLE Tiket (
    id_tiket INT AUTO_INCREMENT PRIMARY KEY,
    id_acara INT,
    kelas VARCHAR(50) NOT NULL,
    harga DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_acara) REFERENCES Acara(id_acara)
);

CREATE TABLE Transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_tiket INT,
    metode_pembayaran VARCHAR(100) NOT NULL,
    tanggal_pembayaran DATE NOT NULL,
    FOREIGN KEY (id_tiket) REFERENCES Tiket(id_tiket)
);