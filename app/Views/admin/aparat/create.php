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
            <li class="breadcrumb-item"><a href="<?=base_url('aparat')?>">Aparat</a></li>
            <li class="breadcrumb-item active">Form Aparat</li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="card">
        <?php if(session()->setFlashdata('pesan')) :?>
          <div class="alert alert-success">
            <?=session()->getFlashdata('pesan');?>
          </div>
        <?php endif;?>
        <div class="card-body">
            <h5 class="card-title">Form Aparat</h5>
            <form class="row g-3 " novalidate="" method="post" action="store-aparat">
                <?=csrf_field();?>
                <div class="col-md-4">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" placeholder="Masukan Nama Lengkap" class="form-control <?= $validation->hasError('nama') ? 'is-invalid' : ''?>" id="nama" name="nama" maxlength="18" value="<?=old('nama')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('nama')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="niap" class="form-label">NIAP</label>
                    <input type="text" placeholder="Masukan NIAP" class="form-control <?= $validation->hasError('niap') ? 'is-invalid' : ''?>" id="niap" name="niap" maxlength="18" value="<?=old('niap')?>">
                    <div class="invalid-feedback" required>
                        <?=$validation->getError('niap')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="text" placeholder="Masukan NIP" class="form-control <?= $validation->hasError('nip') ? 'is-invalid' : ''?>" id="nip" name="nip" maxlength="18" value="<?=old('nip')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('nip')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                    <select id="jenisKelamin" class="form-select <?= $validation->hasError('jenisKelamin') ? 'is-invalid' : ''?>" name="jenisKelamin" required>
                        <option>Pilih Jeni Kelamin</option>
                        <option <?=(old('nip') == "Laki - laki") ? 'checked' : '' ?> value="Laki - laki">Laki - laki</option>
                        <option <?=(old('nip') == "Perempuan") ? 'checked' : '' ?> value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('jenisKelamin')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control <?= $validation->hasError('tempatLahir') ? 'is-invalid' : ''?>" placeholder="Masukan Tempat Lahir" id="tempatLahir" name="tempatLahir" value="<?=old('tempatLahir')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('tempatLahir')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                    <input type="text" class="form-control <?= $validation->hasError('tanggalLahir') ? 'is-invalid' : ''?>" readonly id="tanggalLahir" name="tanggalLahir" placeholder="Pilih Tanggal Lahir" value="<?=old('tanggalLahir')?>">
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
                    <label for="agama" class="form-label">Agama</label>
                    <select id="agama" class="form-select <?= $validation->hasError('agama') ? 'is-invalid' : ''?>" name="agama">
                        <option>Pilih Agama</option>
                        <option <?=(old('agama') == "Islam") ? 'checked' : '' ?> value="Islam">Islam</option>
                        <option <?=(old('agama') == "Kristen") ? 'checked' : '' ?> value="Kristen">Kristen</option>
                        <option <?=(old('agama') == "Hindu") ? 'checked' : '' ?> value="Hindu">Hindu</option>
                        <option <?=(old('agama') == "Buddha") ? 'checked' : '' ?> value="Buddha">Buddha</option>
                        <option <?=(old('agama') == "Katolik") ? 'checked' : '' ?> value="Katolik">Katolik</option>
                        <option <?=(old('agama') == "Kong Hu Chu") ? 'checked' : '' ?> value="Kong Hu Chu">Kong Hu Chu</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('agama')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pangkatGolongan" class="form-label">Pangkat Golongan</label>
                    <input type="text" placeholder="Masukan Pangkat Golongan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="pangkatGolongan" name="pangkatGolongan" value="<?=old('pangkatGolongan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('pangkatGolongan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" placeholder="Masukan Jabatan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="jabatan" name="jabatan" value="<?=old('jabatan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('jabatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="pendidikanTerakhir" class="form-label">Pendidikan Terakhir</label>
                    <select id="pendidikanTerakhir" class="form-select <?= $validation->hasError('pendidikanTerakhir') ? 'is-invalid' : ''?>" name="pendidikanTerakhir">
                        <option>Pilih Pendidikan</option>
                        <option <?=(old('agama') == "SD") ? 'checked' : '' ?> value="SD">SD</option>
                        <option <?=(old('agama') == "SMP") ? 'checked' : '' ?> value="SMP">SMP</option>
                        <option <?=(old('agama') == "SMA/SMK") ? 'checked' : '' ?> value="SMA/SMK">SMA/SMK</option>
                        <option <?=(old('agama') == "D3") ? 'checked' : '' ?> value="D3">D3</option>
                        <option <?=(old('agama') == "S1") ? 'checked' : '' ?> value="S1">S1</option>
                        <option <?=(old('agama') == "S2") ? 'checked' : '' ?> value="S2">S2</option>
                        <option <?=(old('agama') == "S3") ? 'checked' : '' ?> value="S3">S3</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('pendidikanTerakhir')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalPengangkatan" class="form-label">Tanggal Pengangkatan</label>
                    <input type="text" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="tanggalPengangkatan" name="tanggalPengangkatan" readonly placeholder="Pilih Tanggal Pengangkatan" value="<?=old('tanggalPengangkatan')?>">
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
                    <input type="text" placeholder="Masukan Nomor Pengangkatan" class="form-control <?= $validation->hasError('nomorPengangkatan') ? 'is-invalid' : ''?>" id="nomorPengangkatan" name="nomorPengangkatan" value="<?=old('nomorPengangkatan')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nomorPengangkatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tanggalPemberhentian" class="form-label">Tanggal Pemberhentian</label>
                    <input type="text" class="form-control <?= $validation->hasError('tanggalPemberhentian') ? 'is-invalid' : ''?>" id="tanggalPemberhentian" name="tanggalPemberhentian" readonly placeholder="Pilih Tanggal Pemberhentian" value="<?=old('tanggalPemberhentian')?>">
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
                    <input type="text" placeholder="Masukan Nomor Pemberhentian" class="form-control <?= $validation->hasError('nomorPemberhentian') ? 'is-invalid' : ''?>" id="nomorPemberhentian" name="nomorPemberhentian" value="<?=old('tanggalPemberhentian')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nomorPemberhentian')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kecamatanId" class="form-label">Kecamatan</label>
                    <input type="text" class="form-control <?= $validation->hasError('kecamatanId') ? 'is-invalid' : ''?>" id="kecamatanId" name="kecamatanId" value="<?=old('kecamatanId')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('kecamatanId')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kelurahanId" class="form-label">Kelurahan</label>
                    <input type="text" class="form-control <?= $validation->hasError('kelurahanId') ? 'is-invalid' : ''?>" id="kelurahanId" name="kelurahanId" value="<?=old('kelurahanId')?>">
                    <div class="invalid-feedback">
                        <?=$validation->getError('kelurahanId')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label">Tahun</label>
                    <input type="text" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : ''?>" readonly id="tahun" name="tahun" placeholder="Pilih Tahun" value="<?=old('tahun')?>">
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
                    <textarea name="keterangan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : ''?>" id="keterangan" cols="30" rows="4"><?=old('keterangan')?></textarea>
                    <div class="invalid-feedback">
                        <?=$validation->getError('keterangan')?>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection()?>