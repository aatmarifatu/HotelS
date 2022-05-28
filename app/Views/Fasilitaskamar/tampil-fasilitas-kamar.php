<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Kamar</h2>
<p>Berikut ini daftar Fasilitas Kamar yang
sudah terdaftar dalam database.</p>
<p>
<a href="/fasilitas-kamar/tambah" class="btn btn-primary
btn-sm">Tambah Fasilitas Kamar</a>
</p>
<table class="table table-sm table-hovered">
<thead class="bg-light text-center">
<tr>
<th>Nama Fasilitas Kamar</th>
<th>Deskripsi Fasilitas Kamar</th>
<th>Foto Fasilitas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php foreach ($ListFasilitaskamar as $row) : ?>
<tr>
    <td><?= $row['nama_fasilitas_kamar'] ?></td>
    <td><?= $row['deskripsi'] ?></td>
    <td><img src="/gambar/<?= $row['foto'] ?>"width="300px" alt=""></td>
    <td class="text-center">
       <a href="/fasilitas-kamar/edit/<?= $row['id_fasilitas_kamar']?>" class="btn btn-info btn-sm mr-1">edit</a>
       <a href="/fasilitas-kamar/hapus/<?= $row['id_fasilitas_kamar']?>" class="btn btn-info btn-sm mr-1">hapus</a>
       <a href="/fasilitas-kamar/editfoto/<?= $row['id_fasilitas_kamar']?>" class="btn btn-info btn-sm mr-1">foto</a>
     </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?= $this->endSection() ?>