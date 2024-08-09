<?= $this->extend('_template/default') ?>

<?= $this->section('page_title') ?>
Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Buku</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="card-footer">
        <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-outline-danger">Kembali</a>
    </div>
</div>
<?= $this->endSection() ?>