<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Penambahan Data Fasilitas kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas kamar
baru.</p>
<form method="POST" action="/fasilitas-kamar/update" enctype="multipart/form-data">
<div class="form-group">
    <input type="hidden" name="id_fasilitas_kamar" value="<?=$detailFasilitasKamar[0]['id_fasilitas_kamar'];?>">
<label class="font-weight-bold">Nama Fasilitas Kamar</label>
<input type="text" name="txtInputNama"
class="form-control" placeholder="Masukan Nama Fasilitas Kamar" value="<?=$detailFasilitasKamar[0]['nama_fasilitas_kamar'];?>"
autocomplete="off" autofocus> 
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Fasilitas</label>
<input type="text" name="txtInputDeskripsi"
class="form-control" id="exampleFormControlTextareal" placeholder="Masukan Deskripsi Fasilitas Kamar" value="<?=$detailFasilitasKamar[0]['deskripsi'];?>">
</div>
</div>
<div class="form-group">
<label class="font-weight-bold">Harga Kamar</label>
<input type="text" name="txtInputHarga"
class="form-control" id="exampleFormControlTextareal" placeholder="Masukan Deskripsi harga kamar" value="<?=$detailFasilitasKamar[0]['deskripsi'];?>">
</div>
<div class="form-group">
<button class="btn btn-primary"type="submit">Simpan Fasilitas Kamar</button>
</div>
</form>
<?= $this->endSection() ?>