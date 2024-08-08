<?= $this->extend('_template/table') ?>

<?= $this->section('page_title') ?>
Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('create_url') ?>
<?php echo base_url('transaksi/tambah') ?>
<?= $this->endSection() ?>

<?= $this->section('table') ?>
<thead>
    <tr>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Harga Total</th>
        <th class="text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1 ?>
    <?php foreach ($transaksi as $transaksi_row) { ?>
        <tr>
            <td class="text-center"><?php echo $transaksi_row->tanggal_transaksi ?></td>
            <td class="text-center"><?php echo 'Rp ' . number_format($transaksi_row->harga_total) ?></td>
            <td class="text-center">
                <a href="<?php echo base_url('transaksi/delete/' . $transaksi_row->id_transaksi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data transaksi ini?');">
                    <i class="fa fa-trash-alt"></i> Hapus
                </a>
            </td>
        </tr>
    <?php } ?>
</tbody>
<?= $this->endSection() ?>