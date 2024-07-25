<?= $this->extend('_template/form') ?>

<?= $this->section('page_title') ?>
Tambah Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('form_action') ?>
<?php echo base_url('transaksi/insert') ?>
<?= $this->endSection() ?>

<?= $this->section('form') ?>
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="select_dropdown" class="form-label">Buku</label>
            <select name="id_buku" id="select_dropdown" class="form-control">
                <?php
                foreach ($buku as $buku_row) {
                    if ($buku_row->stok > 0) {
                ?>
                    <option value="<?php echo $buku_row->id_buku ?>"><?php echo $buku_row->judul . ' (Rp ' . number_format($buku_row->harga) . ') - Stok: ' . $buku_row->stok ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan jumlah buku">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="datetimepicker" class="form-label">Tanggal Transaksi</label>
            <input type="text" class="form-control datetimepicker-input" id="datetimepicker" name="tanggal_transaksi" data-toggle="datetimepicker" data-target="#datetimepicker" placeholder="Masukkan tanggal dan waktu transaksi">
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#select_dropdown').select2({
            placeholder: "Pilih buku"
        });
        $('#select_dropdown').val(null).trigger('change');
        
        DateTime.use(moment);
        $('#datetimepicker').dtDateTime({
            format: 'yyyy-MM-DD HH:mm:ss',
            buttons: {
                today: true,
                clear: true
            }
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('transaksi') ?>
<?= $this->endSection() ?>