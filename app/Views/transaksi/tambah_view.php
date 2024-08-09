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
            <label for="datetimepicker" class="form-label">Tanggal Transaksi</label>
            <input type="text" class="form-control datetimepicker-input" id="datetimepicker" name="tanggal_transaksi" data-toggle="datetimepicker" data-target="#datetimepicker" placeholder="Masukkan tanggal dan waktu transaksi">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
        <label for="metode_bayar" class="form-label">Metode Pembayaran</label>
        <select name="metode_bayar" id="metode_bayar" class="form-select">
            <option value="" hidden selected>Pilih metode pembayaran</option>
            <option value="Cash">Cash</option>
            <option value="Cash">QRIS</option>
            <option value="Debit">Debit</option>
            <option value="Kredit">Kredit</option>
        </select>
        </div>
    </div>
</div>

<button type="button" id="add_row" class="btn"><i class="fa-solid fa-circle-plus"></i> Tambah Baris</button>
<button type="button" id="del_row" class="btn"><i class="fa-solid fa-circle-minus"></i> Hapus Baris</button>
<div class="row">
    <table id="table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">Buku</th>
                <th class="text-center">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="id_buku[]" class="form-select select_dropdown">
                        <?php
                        foreach ($buku as $buku_row) {
                            if ($buku_row->stok > 0) {
                        ?>
                            <option value="<?php echo $buku_row->id_buku ?>"><?php echo $buku_row->judul . " - Rp " . $buku_row->harga . " - Stok: " . $buku_row->stok ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="jumlah[]" placeholder="Masukkan jumlah buku">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        // Init DataTable
        var table = new DataTable('#table', {
            paging: false,
            searching: false,
            ordering: false,
            info: false
        });

        // Init DateTimePicker
        DateTime.use(moment);
        $('#datetimepicker').dtDateTime({
            format: 'yyyy-MM-DD HH:mm:ss',
            buttons: {
                today: true,
                clear: true
            }
        });
        $('#datetimepicker').val(moment().format('yyyy-MM-DD HH:mm:ss'));

        // Init Select Dropdown
        function initSelect() {
            $('.select_dropdown').select2({
                placeholder: "Pilih buku"
            });
            $('.select_dropdown').val(null).trigger('change');
        }
        initSelect();

        // Add Row
        var strBuku = '<select name="id_buku[]" class="form-select select_dropdown"><?php foreach ($buku as $buku_row) { if($buku_row->stok > 0) { ?><option value="<?php echo $buku_row->id_buku ?>"><?php echo $buku_row->judul . " - Rp" . $buku_row->harga . " - Stok: " . $buku_row->stok ?></option><?php }} ?></select>';

        var strJumlah = '<input type="number" class="form-control" name="jumlah[]" placeholder="Masukkan jumlah buku">';

        $('#add_row').click(function() {
            table.row.add([
                strBuku, strJumlah
            ]).draw();
            initSelect();
        });

        // Delete Row
        $('#del_row').click(function() {
            if (table.rows().count() > 1) {
                table.row(':last').remove().draw();
            }
        });
    });
</script>
<?= $this->endSection() ?>

<?= $this->section('back_url') ?>
<?php echo base_url('transaksi') ?>
<?= $this->endSection() ?>