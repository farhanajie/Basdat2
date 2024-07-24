<?= $this->extend('_template/default') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <a href="<?= $this->renderSection('create_url') ?>" class="btn btn-primary">Tambah</a>
    </div>
    <div class="card-body">
        <?php
        if (session()->getFlashdata('success')) {
        ?>
            <div class="alert alert-success">
                <?php echo session()->getFlashdata('success'); ?>
            </div>
        <?php
        }
        if (session()->getFlashdata('danger')) {
        ?>
            <div class="alert alert-danger">
                <?php echo session()->getFlashdata('danger'); ?>
            </div>
        <?php
        }
        ?>
    </div>

    <table id="table" class="table table-striped table-bordered">
        <?= $this->renderSection('table') ?>
    </table>

    <script type="text/javascript">
        $(document).ready(function() {
            new DataTable('#table');
        });
    </script>
</div>
<?= $this->endSection() ?>