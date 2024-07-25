<?= $this->extend('_template/form') ?>

<?= $this->section('page_title') ?>
Edit Data Buku
<?= $this->endSection() ?>

<?= $this->section('form_action') ?>
<?php echo base_url('buku/update') ?>
<?= $this->endSection() ?>

<?= $this->section('form') ?>
<div class="row">
    <input type="hidden" name="id_buku" value="<?php echo $buku->id_buku ?>">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukkan 3 karakter kode buku" maxlength="3" value="<?php echo $buku->kode_buku ?>">
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku" value="<?php echo $buku->judul ?>">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan nama penulis buku" value="<?php echo $buku->penulis ?>">
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah stok" value="<?php echo $buku->stok ?>">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="select_dropdown" class="form-label">Rak</label>
            <select name="id_rak" id="select_dropdown" class="form-control">
                <?php foreach ($rak as $rak_row) { ?>
                    <option value="<?php echo $rak_row->id_rak ?>"><?php echo $rak_row->kode_rak . " - " . $rak_row->nama_rak ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga buku" value="<?php echo $buku->harga ?>">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit buku" value="<?php echo $buku->penerbit ?>">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto">
        </div>
    </div>
    <div class="mb-3 col-md-12">
        <label for="sinopsis" class="form-label">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="3"><?php echo $buku->sinopsis ?></textarea>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#select_dropdown').select2({
            placeholder: "Pilih rak"
            });
        $('#select_dropdown').val('<?php echo $buku->id_rak ?>').trigger('change');
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('buku') ?>
<?= $this->endSection() ?>