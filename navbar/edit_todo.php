<?php
include("config.php");

// Memastikan ID ada dalam query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $hasil = mysqli_query($mysqli, "SELECT * FROM todo_list WHERE id = '$id'");
    $row = mysqli_fetch_array($hasil);

    // Jika data tidak ditemukan
    if (!$row) {
        die('Tugas tidak ditemukan');
    }
} else {
    die('ID tidak ditemukan');
}
?>

<div class="d-flex justify-content-center">
    <div class="card col-md-6 shadow-lg border-light rounded">
        <div class="card-header bg-primary text-white">
            <h4><i class="bi bi-pencil-square"></i> Edit Tugas</h4>
        </div>
        <form action="navbar/aksi_edit_todo.php" method="POST">
            <div class="card-body">
                <div class="mb-3">
                    <label for="tugas" class="form-label">Nama Tugas</label>
                    <input type="text" class="form-control" id="tugas" name="tugas" value="<?=$row['tugas']?>" required>
                    <input type="hidden" name="id" value="<?=$row['id']?>" required>
                </div>
                <div class="mb-3">
                    <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
                    <input type="date" class="form-control" id="jangka_waktu" name="jangka_waktu" value="<?=$row['jangka_waktu']?>" required>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <select class="form-control" id="keterangan" name="keterangan" required>
                        <option value="Selesai" <?php echo ($row['keterangan'] == 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Belum Selesai" <?php echo ($row['keterangan'] == 'Belum Selesai') ? 'selected' : ''; ?>>Belum Selesai</option>
                        <option value="Sedang Mengerjakan" <?php echo ($row['keterangan'] == 'Sedang Mengerjakan') ? 'selected' : ''; ?>>Sedang Mengerjakan</option>
                    </select>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="index.php?halaman=todo">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left-circle"></i> Kembali
                    </button>
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap Icons CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    <?php if (isset($_GET['pesan_berhasil_edit'])): ?>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Tugas berhasil diedit!',
            icon: 'success',
            confirmButtonText: 'Tutup'
        });
    <?php endif; ?>
</script>
