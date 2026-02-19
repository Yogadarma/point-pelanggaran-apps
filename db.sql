CREATE DATABASE db_pelanggaran;
USE db_pelanggaran;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username,password)
VALUES ('admin', MD5('admin123'));

CREATE TABLE siswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nis VARCHAR(20)
);

CREATE TABLE jenis_pelanggaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    poin INT
);

CREATE TABLE pelanggaran (
    id INT AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT,
    jenis_id INT,
    tanggal DATE,
    FOREIGN KEY (siswa_id) REFERENCES siswa(id),
    FOREIGN KEY (jenis_id) REFERENCES jenis_pelanggaran(id)
);
