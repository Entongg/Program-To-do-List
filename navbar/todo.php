<?php
    include "config.php";
    $hasil = mysqli_query($mysqli, "SELECT * FROM todo_list;");

    if (isset($_GET['pesan_berhasil_tambah'])) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Ditambahkan!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if (isset($_GET['pesan_berhasil_edit'])) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Diedit!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
    if (isset($_GET['pesan_berhasil_hapus'])) {
        echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil Dihapus!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
    }
?>

<h2 style="text-align: center; margin-bottom: 20px;">Tabel Todo List</h2>

<!-- Button trigger modal -->
<button style="float: right;" type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fa fa-plus"></i> Tambah
</button>

<!-- Modal for Adding Task -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Todo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Form to Add Task -->
        <form action="navbar/aksi_tambah.php" method="POST">
          <div class="mb-3">
            <label for="tugas" class="form-label">Nama Tugas</label>
            <input type="text" class="form-control" id="tugas" name="tugas" required>
          </div>
          <div class="mb-3">
            <label for="jangka_waktu" class="form-label">Jangka Waktu</label>
            <input type="date" class="form-control" id="jangka_waktu" name="jangka_waktu" required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <select class="form-control" id="keterangan" name="keterangan" required>
                <option value="Selesai">Selesai</option>
                <option value="Belum Selesai">Belum Selesai</option>
                <option value="Sedang Mengerjakan">Sedang Mengerjakan</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Todo List Table -->
<table class="table table-striped table-bordered table-hover text-center">
  <thead>
    <tr>
      <th>No</th>
      <th>Tugas</th>
      <th>Jangka Waktu</th>
      <th>Keterangan</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    while ($row = mysqli_fetch_array($hasil)) {
      echo "<tr>
        <td>$no</td>
        <td>$row[tugas]</td>
        <td>$row[jangka_waktu]</td>
        <td>$row[keterangan]</td>
        <td>
          <a href='index.php?halaman=edit_todo&id=$row[id]' class='btn btn-warning btn-sm'>Edit</a> 
          <a href='navbar/aksi_hapus_todo.php?id=$row[id]' onclick='return confirm(\"Apakah Anda yakin ingin menghapus?\")' class='btn btn-danger btn-sm'>Hapus</a>
        </td>
      </tr>";
      $no++;
    }
    ?>
  </tbody>
</table>
