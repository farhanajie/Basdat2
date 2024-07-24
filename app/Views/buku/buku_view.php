<?= $this->extend('_template/table') ?>

<?= $this->section('page_title') ?>
Data Buku
<?= $this->endSection() ?>

<?= $this->section('create_url') ?>
<?php echo base_url('buku/tambah') ?>
<?= $this->endSection() ?>

<?= $this->section('table') ?>
<thead>
    <tr>
        <th class="text-center">No.</th>
        <th class="text-center">Kode</th>
        <th class="text-center">Foto</th>
        <th class="text-center">Judul</th>
        <th class="text-center">Rak</th>
        <th class="text-center">Penulis</th>
        <th class="text-center">Harga</th>
        <th class="text-center">Stok</th>
        <th class="text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php
    $no = 1;
    foreach ($buku as $buku_row) {
    ?>
        <tr>
            <td class="text-center"><?php echo $no++ ?></td>
            <td><?php echo $buku_row->kode_buku ?></td>
            <td><img src="<?php echo base_url('uploads/' . $buku_row->foto) ?>" class="img-thumbnail rounded" width="50" height="50"></td>
            <td><?php echo $buku_row->judul ?></td>
            <td><?php echo $buku_row->nama_rak ?></td>
            <td><?php echo $buku_row->penulis ?></td>
            <td><?php echo "Rp " . number_format($buku_row->harga) ?></td>
            <td><?php echo $buku_row->stok ?></td>
            <td class="text-center">
                <div class="btn-group">
                    <a href="<?php echo base_url('buku/show/' . $buku_row->id_buku); ?>" class="btn btn-sm btn-info">
                        <i class="fas fa-eye"></i><span class="ms-1 d-none d-sm-inline">Lihat</span>
                    </a>
                    <a href="<?php echo base_url('buku/edit/' . $buku_row->id_buku) ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i><span class="ms-1 d-none d-sm-inline">Edit</span>
                    </a>
                    <a href="<?php echo base_url('buku/delete/' . $buku_row->id_buku) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data buku ini?');">
                        <i class="fas fa-trash"></i><span class="ms-1 d-none d-sm-inline">Hapus</span>
                    </a>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
<?= $this->endSection() ?>