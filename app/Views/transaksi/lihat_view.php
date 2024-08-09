<?= $this->extend('_template/default') ?>

<?= $this->section('page_title') ?>
Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Tanggal Transaksi</dt>
                    <dd><?php echo $transaksi[0]->tanggal_transaksi ?></dd>
                </dl>
            </div>
            <div class="col-md-6">
                <dl class="dl-horizontal">
                    <dt>Metode Pembayaran</dt>
                    <dd><?php echo $transaksi[0]->metode_bayar ?></dd>
                </dl>
            </div>
        </div>
        <table id="table" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Buku</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transaksi as $trxbuku) { ?>
                    <tr>
                        <td><a href="<?= base_url('buku/lihat/' . $trxbuku->id_buku) ?>"><?php echo $trxbuku->judul ?></a></td>
                        <td><?php echo 'Rp ' . number_format($trxbuku->harga); ?></td>
                        <td><?php echo $trxbuku->jumlah ?></td>
                        <td><?php echo 'Rp ' . number_format($trxbuku->subtotal); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Harga</th>
                    <th><?php echo 'Rp ' . number_format($transaksi[0]->harga_total); ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="card-footer">
        <a href="<?php echo base_url('transaksi'); ?>" class="btn btn-outline-danger">Kembali</a>
    </div>
</div>
<?= $this->endSection() ?>