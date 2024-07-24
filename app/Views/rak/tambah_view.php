<?= $this->extend('_template/form') ?>

<?= $this->section('page_title') ?>
Tambah Rak Buku
<?= $this->endSection() ?>

<?= $this->section('form_action') ?>
<?php echo base_url('rak/insert') ?>
<?= $this->endSection() ?>

<?= $this->section('form') ?>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="kode_rak" class="form-label">Kode Rak</label>
            <input type="text" class="form-control" id="kode_rak" name="kode_rak" placeholder="Masukkan 3 karakter kode rak" maxlength="3">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_rak" class="form-label">Nama Rak</label>
            <input type="text" class="form-control" id="nama_rak" name="nama_rak" placeholder="Masukkan nama rak">
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('rak') ?>
<?= $this->endSection() ?>