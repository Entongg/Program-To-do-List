<?php
include "../config.php"; // Menghubungkan ke database

// Memeriksa apakah ada ID yang diberikan lewat URL (GET)
if (isset($_GET['id'])) {
    // Mengambil ID dari parameter GET
    $id = $_GET['id'];

    // Menyiapkan query untuk menghapus data berdasarkan ID
    $query = $mysqli->prepare("DELETE FROM todo_list WHERE id = ?");
    $query->bind_param("i", $id); // "i" untuk integer (ID harus tipe data integer)

    // Eksekusi query
    if ($query->execute()) {
        // Jika berhasil, redirect ke halaman utama
        header("Location: http://localhost/todolist/index.php?halaman=todo&pesan_berhasil_hapus=berhasil");
        exit(); // Menghentikan eksekusi lebih lanjut setelah redirect
    } else {
        // Jika terjadi kesalahan saat menghapus data
        die('Error: ' . $query->error);
    }
} else {
    // Jika ID tidak ditemukan di URL, tampilkan pesan kesalahan
    echo "ID tidak ditemukan!";
}
?>
