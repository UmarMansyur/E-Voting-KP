<?= $this->extend('layout/template'); ?>

<?= $this->section('page-content'); ?>

<div class="container-fluid">
    <div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-2">
                        <form action="<?= site_url('admin/update_siswa'); ?>" method="POST" class="user">
                            <input type="hidden" name="siswa_userid" id="siswa_userid" value="<?= $siswa->siswa_userid; ?>">
                            <input type="hidden" name="id" value="<?= $siswa->id; ?>">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="nis_siswa">NIS</label>
                                    <input type="text" name="nis_siswa" class="form-control <?= ($validation->hasError('nis_siswa')) ? 'is-invalid' : ''; ?>" id="exampleFirstName" placeholder="Nis Siswa" value="<?= $siswa->nis_siswa; ?>" readonly>
                                    <div class="invalid-feedback"><?= $validation->getError('nis_siswa'); ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="nama_siswa">Nama</label>
                                    <input type="text" name="nama_siswa" class="form-control <?= ($validation->hasError('nama_siswa')) ? 'is-invalid' : ''; ?>" id="exampleLastName" placeholder="Nama Siswa" value="<?= $siswa->nama_siswa; ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('nama_siswa'); ?></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Kelas</label>
                                    <select name="kelas" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" id="kelas">
                                        <optgroup label="Pilihan Sebelumnya">
                                            <option value="<?= $siswa->kelas; ?>"><?= $siswa->kelas; ?></option>
                                        </optgroup>
                                        <optgroup label="MIPA">
                                            <option value="X MIPA 1">X MIPA 1</option>
                                            <option value="X MIPA 2">X MIPA 2</option>
                                            <option value="X MIPA 3">X MIPA 3</option>
                                            <option value="X MIPA 4">X MIPA 4</option>
                                            <option value="XI MIPA 1">XI MIPA 1</option>
                                            <option value="XI MIPA 2">XI MIPA 2</option>
                                            <option value="XI MIPA 3">XI MIPA 3</option>
                                            <option value="XI MIPA 4">XI MIPA 4</option>
                                            <option value="XII MIPA 1">XII MIPA 1</option>
                                            <option value="XII MIPA 2">XII MIPA 2</option>
                                            <option value="XII MIPA 3">XII MIPA 3</option>
                                            <option value="XII MIPA 4">XII MIPA 4</option>
                                        </optgroup>
                                        <optgroup label="IPA">
                                            <option value="X IPA 1">X IPA 1</option>
                                            <option value="X IPA 2">X IPA 2</option>
                                            <option value="X IPA 3">X IPA 3</option>
                                            <option value="X IPA 4">X IPA 4</option>
                                            <option value="XI IPA 1">XI IPA 1</option>
                                            <option value="XI IPA 2">XI IPA 2</option>
                                            <option value="XI IPA 3">XI IPA 3</option>
                                            <option value="XI IPA 4">XI IPA 4</option>
                                            <option value="XII IPA 1">XII IPA 1</option>
                                            <option value="XII IPA 2">XII IPA 2</option>
                                            <option value="XII IPA 3">XII IPA 3</option>
                                            <option value="XII IPA 4">XII IPA 4</option>
                                        </optgroup>
                                        <optgroup label="IPS">
                                            <option value="X IPS 1">X IPS 1</option>
                                            <option value="X IPS 2">X IPS 2</option>
                                            <option value="X IPS 3">X IPS 3</option>
                                            <option value="X IPS 4">X IPS 4</option>
                                            <option value="XI IPS 1">XI IPS 1</option>
                                            <option value="XI IPS 2">XI IPS 2</option>
                                            <option value="XI IPS 3">XI IPS 3</option>
                                            <option value="XI IPS 4">XI IPS 4</option>
                                            <option value="XII IPS 1">XII IPS 1</option>
                                            <option value="XII IPS 2">XII IPS 2</option>
                                            <option value="XII IPS 3">XII IPS 3</option>
                                            <option value="XII IPS 4">XII IPS 4</option>
                                        </optgroup>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('kelas'); ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" id="jenis_kelamin">
                                        <option selected value="<?= old('jenis_kelamin'); ?>"><?= old('jenis_kelamin'); ?></options>
                                        <option <?= ($siswa->jenis_kelamin) == 'L' ? 'selected' : ''; ?> value="L">Laki-laki</option>
                                        <option <?= ($siswa->jenis_kelamin) == 'P' ? 'selected' : ''; ?> value="P">Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback"><?= $validation->getError('jenis_kelamin'); ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_memilih">Status Memilih</label>
                                <input type="text" class="form-control" name="status_memilih" id="status_memilih" value="<?= $siswa->status_memilih; ?>" <?= ($siswa->status_memilih) == 'sudah' ? 'readonly' : 'readonly'; ?>>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="">Status Aktif</label>
                                    <select name="status_aktif" class="form-control" id="">
                                        <option selected value="aktif">Aktif</option>
                                        <option value="tidak">Tidak Aktif</option>
                                    </select>
                                </div>
                                <input type="hidden" name="level" value="2">
                                <div class="col-sm-6">
                                    <label for="password">Password Login</label>
                                    <input type="text" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" value="<?= $siswa->password; ?>">
                                    <div class="invalid-feedback"><?= $validation->getError('password'); ?></div>
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