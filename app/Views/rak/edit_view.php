<?= $this->extend('_template/form') ?>

<?= $this->section('page_title') ?>
Edit Rak Buku
<?= $this->endSection() ?>

<?= $this->section('form_action') ?>
<?php echo base_url('rak/update') ?>
<?= $this->endSection() ?>

<?= $this->section('form') ?>
<div class="row">
    <input type="hidden" name="id_rak" value="<?php echo $rak->id_rak ?>">
    <div class="col-md-6">
        <div class="form-group">
            <label for="kode_rak" class="form-label">Kode Rak</label>
            <input type="text" class="form-control" id="kode_rak" name="kode_rak" value="<?php echo $rak->kode_rak ?>" placeholder="Masukkan 3 karakter kode rak" maxlength="3">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_rak" class="form-label">Nama Rak</label>
            <input type="text" class="form-control" id="nama_rak" name="nama_rak" value="<?php echo $rak->nama_rak ?>" placeholder="Masukkan nama rak">
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('rak') ?>
<?= $this->endSection() ?>