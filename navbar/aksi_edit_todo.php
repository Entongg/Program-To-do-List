<?php
include "../config.php";

// Ambil data dari form
$id = $_POST['id'];
$tugas = $_POST['tugas'];
$jangka_waktu = $_POST['jangka_waktu'];
$keterangan = $_POST['keterangan'];

// Menyiapkan query menggunakan prepared statement untuk menghindari SQL Injection
$query = $mysqli->prepare("UPDATE todo_list SET tugas = ?, jangka_waktu = ?, keterangan = ? WHERE id = ?");
$query->bind_param("sssi", $tugas, $jangka_waktu, $keterangan, $id);

// Eksekusi query
if ($query->execute()) {
    // Redirect setelah berhasil memperbarui data
    header("Location: http://localhost/todolist/index.php?halaman=todo&pesan_berhasil_edit=berhasil");
    exit(); // Pastikan tidak ada kode lain yang dieksekusi setelah redirect
} else {
    // Jika terjadi kesalahan saat eksekusi query
    die('Error: ' . $query->error);
}
?>
