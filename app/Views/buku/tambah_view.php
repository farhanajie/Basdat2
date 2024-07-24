<?= $this->extend('_template/form') ?>

<?= $this->section('page_title') ?>
Tambah Data Buku
<?= $this->endSection() ?>

<?= $this->section('form_action') ?>
<?php echo base_url('buku/insert') ?>
<?= $this->endSection() ?>

<?= $this->section('form') ?>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="kode_buku" class="form-label">Kode Buku</label>
            <input type="text" class="form-control" id="kode_buku" name="kode_buku" placeholder="Masukkan 3 karakter kode buku" maxlength="3">
        </div>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul buku">
        </div>
        <div class="mb-3">
            <label for="penulis" class="form-label">Penulis</label>
            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Masukkan nama penulis buku">
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan jumlah stok">
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
            <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga buku">
        </div>
        <div class="mb-3">
            <label for="penerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit buku">
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" name="foto" class="form-control" id="foto">
        </div>
    </div>
    <div class="mb-3 col-md-12">
        <label for="sinopsis" class="form-label">Sinopsis</label>
        <textarea name="sinopsis" id="sinopsis" class="form-control" rows="3"></textarea>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#select_dropdown').select2({
            placeholder: "Pilih rak"
            });
        $('#select_dropdown').val(null).trigger('change');
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('book') ?>
<?= $this->endSection() ?>