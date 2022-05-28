<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Perubahan Foto Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah foto kamar</p>
<form method="POST" action="/fasilitas-hotel/updatefoto" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Id Fasilitas Hotel</label>
<input type="hidden" name="foto" class="form-control" value="<?=$detailfasilitasHotel[0]['foto'];?>">
<input type="text" name="txtInputNo"
class="form-control"  value="<?=$detailfasilitasHotel[0]['id_fasilitas_hotel'];?>" readonly>
</div>
<div class="form-group">
<label class="font-weight-bold">Foto Kamar</label><br/>
<?php
if (!empty($detailfasilitasHotel[0]['foto'])) {
    echo '<img src="'.base_url("/gambar/".$detailfasilitasHotel[0]['foto']).'"width="150">';
}
?>
<input type="file" name="txtInputFoto" class="form-control">


</div>
<div class="form-group">
<button class="btn btn-primary">Update Foto Kamar</button>
</div>
</form>
<?= $this->endSection() ?>