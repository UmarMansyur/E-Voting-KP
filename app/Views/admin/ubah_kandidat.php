<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-2">
                        <form action="<?= site_url('admin/update_kandidat'); ?>" method="POST" enctype="multipart/form-data" class="user">
                            <input type="hidden" name="id_kandidat" id="" value="<?= $kandidat->id_kandidat; ?>">
                            <input type="hidden" name="gambar_lama" id="" value="<?= $kandidat->gambar_kandidat; ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">No Urut</label>
                                    <select name="no_urut" id="no_urut" class="form-control">
                                        <option value="1" <?= ($kandidat->no_urut) == '1' ? 'selected' : ''; ?>>1</option>
                                        <option value="2" <?= ($kandidat->no_urut) == '2' ? 'selected' : ''; ?>>2</option>
                                        <option value="3" <?= ($kandidat->no_urut) == '3' ? 'selected' : ''; ?>>3</option>
                                    </select>

                                </div>
                                <div class="col-sm-6">
                                    <label for="nama_kandidat">Nama Kandidat</label>
                                    <input type="text" name="nama_kandidat" class="form-control <?= ($validation->hasError('nama_kandidat')) ? 'is-invalid' : ''; ?>" id="exampleLastName" placeholder="Nama Kandidat" value="<?= $kandidat->nama_kandidat; ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nama_kandidat'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="priode">Priode</label>
                                <input type="month" name="priode" class="form-control <?= ($validation->hasError('priode')) ? 'is-invalid' : ''; ?>" value="<?= $kandidat->priode; ?>">
                                <div class="invalid-feedback"><?= $validation->getError('priode'); ?></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="">Visi Misi</label>
                                    <textarea id="summernote" name="visi_misi"><?= $kandidat->visi_misi; ?></textarea>
                                    <div>
                                        <p class="text-danger"><?php echo $validation->getError('visi_misi') ?></p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="gambar_kandidat">Gambar Kandidat</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input <?= ($validation->hasError('gambar_kandidat')) ? 'is-invalid' : ''; ?>" name="gambar_kandidat" id="gambar_kandidat" onchange="previewKandidatImg()">
                                        <label class="custom-file-label" for="customFile"><?= $kandidat->gambar_kandidat; ?></label>
                                        <div class="invalid-feedback"><?= $validation->getError('gambar_kandidat'); ?></div>
                                    </div>
                                    <div class="mt-2">
                                        <img src="/assets/fotokandidat/<?= $kandidat->gambar_kandidat; ?>" class="img-thumbnail imgKandidat-preview" alt="default" style="width: 250px;">
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