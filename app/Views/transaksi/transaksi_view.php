<?= $this->extend('_template/table') ?>

<?= $this->section('page_title') ?>
Data Transaksi
<?= $this->endSection() ?>

<?= $this->section('create_url') ?>
<?php echo base_url('transaction/create') ?>
<?= $this->endSection() ?>

<?= $this->section('table') ?>
<thead>
    <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Judul Buku</th>
        <th class="text-center">Harga Satuan</th>
        <th class="text-center">Jumlah</th>
        <th class="text-center">Total Harga</th>
        <th class="text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php $no = 1 ?>
    <?php foreach ($transaksi as $transaksi_row) { ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td><?php echo $transaksi_row->tanggal_transaksi ?></td>
            <td><?php echo $transaksi_row->judul ?></td>
            <td><?php echo 'Rp ' . number_format($transaksi_row->harga) ?></td>
            <td><?php echo $transaksi_row->jumlah ?></td>
            <td><?php echo 'Rp ' . number_format($transaksi_row->harga_total) ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?php echo base_url('transaksi/edit/' . $transaksi_row->id_transaksi) ?>" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="<?php echo base_url('transaksi/delete/' . $transaksi_row->id_transaksi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data transaksi ini?');">
                        <i class="fa fa-trash-alt"></i>
                    </a>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
<?= $this->endSection() ?>