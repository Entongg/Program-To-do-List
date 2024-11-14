<?php
include "../config.php";

// Menangkap data yang dikirim dari form
$tugas = $_POST['tugas'];
$jangka_waktu = $_POST['jangka_waktu'];
$keterangan = $_POST['keterangan'];

// Menggunakan Prepared Statements untuk menghindari SQL Injection
$stmt = $mysqli->prepare("INSERT INTO todo_list (tugas, jangka_waktu, keterangan) VALUES (?, ?, ?)");
if ($stmt === false) {
    // Jika query gagal disiapkan
    die('Error preparing statement: ' . $mysqli->error);
}

// Bind parameter ke query
$stmt->bind_param('sss', $tugas, $jangka_waktu, $keterangan);

// Menjalankan query
if ($stmt->execute()) {
    // Jika query berhasil dijalankan
    header("Location: http:/todolist/index.php?halaman=todo&pesan_berhasil_tambah=berhasil");
    exit();
} else {
    // Jika query gagal dijalankan
    echo "Error executing query: " . $stmt->error;
}

// Menutup statement
$stmt->close();
?>
