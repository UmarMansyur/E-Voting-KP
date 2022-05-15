<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="text-right">
        <a class="btn btn-success mb-2" href="#" data-toggle="modal" data-target="#Modal">
            <i class="fas fa-file-excel"></i>
            Download Template
        </a>
    </div>
    <div class="card mb-4 py-3 border-left-primary">
        <form action="<?= site_url('admin/save_import'); ?>" method="POST" class="user" enctype="multipart/form-data">
            <input type="hidden" name="status_memilih" id="" value="belum">
            <input type="hidden" name="status_aktif" id="" value="aktif">
            <input type="hidden" name="level" id="" value="2">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="date" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" name="tahun" id="datePicker">
                    <div class="invalid-feedback"><?= $validation->getError('tahun'); ?></div>
                </div>
                <label for="importdata">Import Data Excel</label>
                <div class="form-group">
                    <input type="file" name="fileimport" class="form-control <?= ($validation->hasError('fileimport')) ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback"><?= $validation->getError('fileimport'); ?></div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-user">Import</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contoh Penggunaan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= site_url('admin/save_template'); ?>">Simpan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>