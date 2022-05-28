<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Data Fasilitas kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas kamar
baru.</p>
<form method="POST" action="/fasilitas-kamar/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Nama Fasilitas Kamar</label>
<input type="text" name="txtInputNama"
class="form-control" placeholder="Masukan Nama Fasilitas Kamar"
autocomplete="off" autofocus>
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Fasilitas</label>
<input type="text" name="txtInputDeskripsi"
class="form-control" id="exampleFormControlTextareal" placeholder="Masukan Deskripsi Fasilitas Kamar">
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Fasilitas</label>
<input type="file" name="txtInputFoto"
class="form-control" >
</div>
<div class="form-group">
<button class="btn btn-primary"type="submit">Simpan Fasilitas Kamar</button>
</div>
</form>
<?= $this->endSection() ?>