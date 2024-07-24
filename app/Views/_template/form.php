<?= $this->extend('_template/default') ?>

<?= $this->section('content') ?>
<form action="<?= $this->renderSection('form_action') ?>" method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            <?php
            $errors = session()->getFlashdata('errors');
            if ($errors) {
            ?>
                <div class="alert alert-danger" role="alert">
                    Ada kesalahan saat input data, yaitu:
                    <ul>
                        <?php foreach ($errors as $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?= $this->renderSection('form') ?>

        </div>
        <div class="card-footer">
            <a href="<?= $this->renderSection('back_url') ?>" class="btn btn-outline-danger">Kembali</a>
            <button type="submit" class="btn btn-primary float-right">Simpan</button>
        </div>
    </div>
</form>
<?= $this->endSection() ?>