<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-2">
                        <form action="<?= site_url('admin/save_kandidat'); ?>" method="POST" enctype="multipart/form-data" class="user">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">No Urut</label>
                                    <select name="no_urut" id="no_urut" class="form-control <?= ($validation->hasError('no_urut')) ? 'is-invalid' : ''; ?>">
                                        <option></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('no_urut'); ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nama_kandidat">Nama Kandidat</label>
                                    <input type="text" name="nama_kandidat" class="form-control <?= ($validation->hasError('nama_kandidat')) ? 'is-invalid' : ''; ?>" id="exampleLastName" placeholder="Nama Kandidat" value="<?= old('nama_kandidat'); ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nama_kandidat'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="priode">Priode</label>
                                <input type="month" name="priode" class="form-control <?= ($validation->hasError('priode')) ? 'is-invalid' : ''; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('priode'); ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Visi Misi</label>
                                    <textarea id="summernote" name="visi_misi"></textarea>
                                    <div>
                                        <p class="text-danger"><?php echo $validation->getError('visi_misi') ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="gambar_kandidat">Gambar Kandidat</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar_kandidat')) ? 'is-invalid' : ''; ?>" name="gambar_kandidat" id="gambar_kandidat" onchange="previewKandidatImg()">
                                        <label class="custom-file-label" for="customFile">Tambah Gambar..</label>
                                        <div class="invalid-feedback"><?= $validation->getError('gambar_kandidat'); ?></div>
                                    </div>
                                    <div class="mt-2">
                                        <img src="/assets/fotokandidat/default.jpg" class="img-thumbnail imgKandidat-preview" alt="default" style="width: 250px;">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>