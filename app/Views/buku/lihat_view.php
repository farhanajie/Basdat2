<?= $this->extend('_template/default') ?>

<?= $this->section('page_title') ?>
Data Buku
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo base_url('uploads/' . $buku->foto) ?>" class="img-fluid">
            </div>
            <div class="col-md-8">
                <dl class="dl-horizontal">
                    <dt>Judul</dt>
                    <dd><?php echo $buku->judul ?></dd>
                    <dt>Rak</dt>
                    <dd><?php echo $buku->nama_rak ?></dd>
                    <dt>Penulis</dt>
                    <dd><?php echo $buku->penulis ?></dd>
                    <dt>Penerbit</dt>
                    <dd><?php echo $buku->penerbit ?></dd>
                    <dt>Harga</dt>
                    <dd><?php echo 'Rp ' . number_format($buku->harga); ?></dd>
                    <dt>Stok</dt>
                    <dd><strong><?php echo $buku->stok ?></strong></dd>
                    <dt>Sinopsis</dt>
                    <dd><?php echo $buku->sinopsis ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a href="<?php echo base_url('buku'); ?>" class="btn btn-outline-danger">Kembali</a>
    </div>
</div>
<?= $this->endSection() ?>