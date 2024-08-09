<?= $this->extend('_template/table'); ?>

<?= $this->section('page_title'); ?>
Data Rak Buku
<?= $this->endSection() ?>

<?= $this->section('create_url') ?>
<?php echo base_url('rak/tambah') ?>
<?= $this->endSection() ?>

<?= $this->section('table'); ?>
<thead>
    <tr>
        <th class="text-center">Kode Rak</th>
        <th class="text-center">Nama Rak</th>
        <th class="text-center">Aksi</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($rak as $rak_row) { ?>
        <tr>
            <td><?php echo $rak_row->kode_rak ?></td>
            <td><?php echo $rak_row->nama_rak ?></td>
            <td class="text-center">
                <div class="btn-group" role="group">
                    <a href="<?php echo base_url('rak/edit/' . $rak_row->id_rak) ?>" class="btn btn-sm btn-success">
                        <i class="fa fa-edit"></i><span class="ms-1 d-none d-sm-inline">Edit</span>
                    </a>
                    <a href="<?php echo base_url('rak/delete/' . $rak_row->id_rak) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <i class="fa fa-trash-alt"></i><span class="ms-1 d-none d-sm-inline">Hapus</span>
                    </a>
                </div>
            </td>
        </tr>
    <?php } ?>
</tbody>
<?= $this->endSection() ?>