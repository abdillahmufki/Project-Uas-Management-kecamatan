<?= $this->extend('layout/page_layout')?>

<?= $this->section('bottom_lib')?>
    <link href="<?= base_url('assets/css/datePicker/datepicker.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/datePicker/datepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/datePicker/datepicker.en.js') ?>"></script>
<?= $this->endSection()?>

<?= $this->section('page-title')?>
    <h1>Aparat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('admin/aparat')?>">Aparat</a></li>
            <li class="breadcrumb-item active">Form <?= ($aparat) ? 'Edit' : 'Tambah' ?> Aparat</li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form <?= ($aparat) ? 'Edit' : 'Tambah' ?> Aparat</h5>
            <form class="row g-3 " novalidate="" method="post" action="<?= base_url('admin/aparat/store')?>">
              <?php if($aparat) : ?>
                <input type="hidden" name="id" value="<?=$aparat['id']?>">
              <?php endif; ?>
                <?=csrf_field();?>
                <div class="col-md-4">
                    <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Nama Lengkap" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''?>" id="nama" name="nama" maxlength="60" value="<?= $aparat["nama_lengkap"] ?? old('nama')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('nama')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="niap" class="form-label">NIAP <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan NIAP" class="form-control <?= $validation->hasError('niap') ? 'is-invalid' : ''?>" id="niap" name="niap" maxlength="18" value="<?= $aparat["NIAP"] ?? old('niap')?>">
                    <div class="invalid-feedback" required>
                        <?=$validation->getError('niap')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nip" class="form-label">NIP <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan NIP" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : ''?>" id="nip" name="nip" maxlength="18" value="<?= $aparat["NIP"] ?? old('nip')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('nip')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin <span class="text-danger">*</span></label>
                    <select id="jenisKelamin" class="form-select <?= $validation->hasError('jenisKelamin') ? 'is-invalid' : ''?>" name="jenisKelamin" required>
                        <option value="">Pilih Jeni Kelamin</option>
                        <option <?=( ($aparat["jenis_kelamin"] ?? old('jenisKelamin')) == "Laki - laki") ? 'selected' : '' ?> value="Laki - laki">Laki - laki</option>
                        <option <?=( ($aparat["jenis_kelamin"] ?? old('jenisKelamin')) == "Perempuan") ? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('jenisKelamin')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tempatLahir" class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('tempatLahir') ? 'is-invalid' : ''?>" placeholder="Masukan Tempat Lahir" id="tempatLahir" name="tempatLahir" value="<?= $aparat["tempat_lahir"] ?? old('tempatLahir')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('tempatLahir')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('tanggalLahir') ? 'is-invalid' : ''?>" readonly id="tanggalLahir" name="tanggalLahir" placeholder="Pilih Tanggal Lahir" value="<?= $aparat["tanggal_lahir"] ?? old('tanggalLahir')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('tanggalLahir')?>
                    </div>
                    <script type="text/javascript">
                        $("#tanggalLahir").datepicker({
                            language:"en",
                            autoClose:true,
                            dateFormat:"yyyy-mm-dd"
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <label for="agama" class="form-label">Agama <span class="text-danger">*</span></label>
                    <select id="agama" class="form-select <?= $validation->hasError('agama') ? 'is-invalid' : ''?>" name="agama" required>
                        <option value="">Pilih Agama</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Islam") ? 'selected' : '' ?> value="Islam">Islam</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Kristen") ? 'selected' : '' ?> value="Kristen">Kristen</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Hindu") ? 'selected' : '' ?> value="Hindu">Hindu</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Buddha") ? 'selected' : '' ?> value="Buddha">Buddha</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Katolik") ? 'selected' : '' ?> value="Katolik">Katolik</option>
                        <option <?=( $aparat["agama"] ?? old('agama') == "Kong Hu Chu") ? 'selected' : '' ?> value="Kong Hu Chu">Kong Hu Chu</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('agama')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pangkatGolongan" class="form-label">Pangkat Golongan</label>
                    <input type="text" placeholder="Masukan Pangkat Golongan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="pangkatGolongan" name="pangkatGolongan" value="<?= $aparat["pangkat_golongan"] ?? old('pangkatGolongan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('pangkatGolongan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" placeholder="Masukan Jabatan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="jabatan" name="jabatan" value="<?= $aparat["jabatan"] ?? old('jabatan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('jabatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
                    <select id="pendidikanTerakhir" class="form-select <?= $validation->hasError('pendidikanTerakhir') ? 'is-invalid' : ''?>" name="pendidikanTerakhir">
                        <option value="">Pilih Pendidikan</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "SD") ? 'selected' : '' ?> value="SD">SD</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "SMP") ? 'selected' : '' ?> value="SMP">SMP</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "SMA/SMK") ? 'selected' : '' ?> value="SMA/SMK">SMA/SMK</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "D3") ? 'selected' : '' ?> value="D3">D3</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "S1") ? 'selected' : '' ?> value="S1">S1</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "S2") ? 'selected' : '' ?> value="S2">S2</option>
                        <option <?=( $aparat["pendidikan_terakhir"] ?? old('pendidikanTerakhir') == "S3") ? 'selected' : '' ?> value="S3">S3</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('pendidikanTerakhir')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalPengangkatan" class="form-label">Tanggal Pengangkatan</label>
                    <input type="text" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="tanggalPengangkatan" name="tanggalPengangkatan" readonly placeholder="Pilih Tanggal Pengangkatan" value="<?= $aparat["tanggal_pengangkatan"] ?? old('tanggalPengangkatan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('tanggalPengangkatan')?>
                    </div>
                    <script type="text/javascript">
                        $("#tanggalPengangkatan").datepicker({
                            language:"en",
                            autoClose:true,
                            dateFormat:"yyyy-mm-dd"
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <label for="nomorPengangkatan" class="form-label">Nomor Pengangkatan</label>
                    <input type="text" placeholder="Masukan Nomor Pengangkatan" class="form-control <?= $validation->hasError('nomorPengangkatan') ? 'is-invalid' : ''?>" id="nomorPengangkatan" name="nomorPengangkatan" value="<?= $aparat["nomor_pengangkatan"] ?? old('nomorPengangkatan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nomorPengangkatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalPemberhentian" class="form-label">Tanggal Pemberhentian</label>
                    <input type="text" class="form-control <?= $validation->hasError('tanggalPemberhentian') ? 'is-invalid' : ''?>" id="tanggalPemberhentian" name="tanggalPemberhentian" readonly placeholder="Pilih Tanggal Pemberhentian" value="<?= $aparat["tanggal_pemberhentian"] ?? old('tanggalPemberhentian')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('tanggalPemberhentian')?>
                    </div>
                    <script type="text/javascript">
                        $("#tanggalPemberhentian").datepicker({
                            language:"en",
                            autoClose:true,
                            dateFormat:"yyyy-mm-dd"
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <label for="nomorPemberhentian" class="form-label">Nomor Pemberhentian</label>
                    <input type="text" placeholder="Masukan Nomor Pemberhentian" class="form-control <?= $validation->hasError('nomorPemberhentian') ? 'is-invalid' : ''?>" id="nomorPemberhentian" name="nomorPemberhentian" value="<?= $aparat["nomor_pemberhentian"] ?? old('nomorPemberhentian')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nomorPemberhentian')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : ''?>" id="kecamatan" name="kecamatan" value="<?= $aparat["kecamatan"] ?? old('kecamatan')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('kecamatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('kelurahan') ? 'is-invalid' : ''?>" id="kelurahan" name="kelurahan" value="<?= $aparat["kelurahan"] ?? old('kelurahan')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('kelurahan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : ''?>" readonly id="tahun" name="tahun" placeholder="Pilih Tahun" value="<?= $aparat["tahun"] ?? old('tahun')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('tahun')?>
                    </div>
                    <script type="text/javascript">
                        $("#tahun").datepicker({
                            language:"en",
                            minView:"years",
                            view:"years",
                            autoClose:true,
                            dateFormat:"yyyy"
                        });
                    </script>
                </div>
                <div class="col-md-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="keterangan" cols="30" rows="4"><?= $aparat["keterangan"] ?? old('keterangan')?></textarea>
                    <div class="invalid-feedback">
                        <?=$validation->getError('keterangan')?>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><?= ($aparat) ? 'Save' : 'Submit' ?></button>
                    <?php if(!$aparat) : ?>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection()?>