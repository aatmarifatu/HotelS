<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel</h2>
<p>Berikut ini daftar Fasilitas Hotel yang
sudah terdaftar dalam database.</p>
<p>
<a href="/fasilitas-hotel/tambah" class="btn btn-primary
btn-sm">Tambah Fasilitas Hotel</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nama Fasilitas Hotel</th>
<th>Deskripsi Fasilitas Hotel</th>
<th>Foto Fasilitas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach ($ListFasilitashotel as $row) : ?>
<tr>
    <td><?= $row['nama_fasilitas'] ?></td>
    <td><?= $row['deskripsi'] ?></td>
    <td><img src="/gambar/<?= $row['foto'] ?>"width="300px" alt=""></td>
    <td class="text-center">
       <a href="/fasilitas-hotel/edit/<?= $row['id_fasilitas_hotel']?>" class="btn btn-info btn-sm mr-1">edit</a>
       <a href="/fasilitas-hotel/hapus/<?= $row['id_fasilitas_hotel']?>" class="btn btn-info btn-sm mr-1">hapus</a>
       <a href="fasilitas-hotel/editfoto/<?= $row['id_fasilitas_hotel']?>" class="btn btn-info btn-sm mr-1">foto</a>
     </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?= $this->endSection() ?>