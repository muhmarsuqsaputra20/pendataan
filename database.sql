CREATE DATABASE pendataan;
USE pendataan;

CREATE TABLE anggota (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  alamat VARCHAR(200) NOT NULL
);

CREATE TABLE pengguna (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL
);

INSERT INTO anggota (nama, alamat) VALUES
('Contoh Satu', 'Makassar'),
('Contoh Dua', 'Gowa');