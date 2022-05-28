<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>

<h2>Penambahan Data Fasilitas Hotel</h2>
<p>Silahkan gunakan form dibawah ini untuk mendata fasilitas hotel
baru.</p>
<form method="POST" action="/fasilitas-hotel/update" enctype="multipart/form-data">
<div class="form-group">
    <input type="hidden" name="id_fasilitas_hotel" value="<?=$detailFasilitasHotel[0]['id_fasilitas_hotel'];?>">
<label class="font-weight-bold">Nama Fasilitas Hotel</label>
<input type="text" name="txtInputNama"
class="form-control" placeholder="Masukan Nama Fasilitas Hotel" value="<?=$detailFasilitasHotel[0]['nama_fasilitas'];?>"
autocomplete="off" autofocus> 
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi Fasilitas</label>
<input type="text" name="txtInputDeskripsi"
class="form-control" id="exampleFormControlTextareal" placeholder="Masukan Deskripsi Fasilitas Hotel" value="<?=$detailFasilitasHotel[0]['deskripsi'];?>">
</div>

<div class="form-group">
<button class="btn btn-primary"type="submit">Simpan Fasilitas Hotel</button>
</div>
</form>
<?= $this->endSection() ?>