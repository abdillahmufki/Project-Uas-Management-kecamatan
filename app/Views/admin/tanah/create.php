<?= $this->extend('layout/page_layout')?>

<?= $this->section('bottom_lib')?>
    <link href="<?= base_url('assets/css/datePicker/datepicker.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/datePicker/datepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/datePicker/datepicker.en.js') ?>"></script>
<?= $this->endSection()?>

<?= $this->section('page-title')?>
    <h1>Tanah</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('admin/tanah')?>">Data Tanah</a></li>
            <li class="breadcrumb-item active">Form <?= ($tanah) ? 'Edit' : 'Tambah' ?> Tanah</li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form <?= ($tanah) ? 'Edit' : 'Tambah' ?> Tanah</h5>
            <form class="row g-3 " novalidate="" method="post" action="<?= base_url('admin/tanah/store')?>">
              <?php if($tanah) : ?>
                <input type="hidden" name="id" value="<?=$tanah['id']?>">
              <?php endif; ?>
                <?=csrf_field();?>
                <div class="col-md-4">
                    <label for="namaPemilik" class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Nama Pemilih" class="form-control <?= $validation->hasError('namaPemilik') ? 'is-invalid' : ''?>" id="namaPemilik" name="namaPemilik" maxlength="60" value="<?= $tanah["nama_pemilik"] ?? old('namaPemilik')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('namaPemilik')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="luasTanah" class="form-label">Luas Tanah<span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Luas Tanah" class="form-control <?= $validation->hasError('luasTanah') ? 'is-invalid' : ''?>" id="luasTanah" name="luasTanah" value="<?= $tanah["luas_tanah"] ?? old('luasTanah')?>">
                    <div class="invalid-feedback" required>
                        <?=$validation->getError('luasTanah')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="statusTanah" class="form-label">Status Tanah<span class="text-danger">*</span></label>
                    <select id="statusTanah" class="form-select <?= $validation->hasError('statusTanah') ? 'is-invalid' : ''?>" name="statusTanah" required>
                        <option value="">Pilih Status Tanah</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "HM") ? 'selected' : '' ?> value="HM">HM</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "HGB") ? 'selected' : '' ?> value="HGB">HGB</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "HP") ? 'selected' : '' ?> value="HP">HP</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "HGU") ? 'selected' : '' ?> value="HGU">HGU</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "HPL") ? 'selected' : '' ?> value="HPL">HPL</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "MA") ? 'selected' : '' ?> value="MA">MA</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "VP") ? 'selected' : '' ?> value="VP">VP</option>
                        <option <?=( ($tanah["status_tanah"] ?? old('statusTanah')) == "TN") ? 'selected' : '' ?> value="TN">TN</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('statusTanah')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="statusSertifikat" class="form-label">Status Sertifikat<span class="text-danger">*</span></label>
                    <select id="statusSertifikat" class="form-select <?= $validation->hasError('statusSertifikat') ? 'is-invalid' : ''?>" name="statusSertifikat" required>
                        <option value="">Pilih Status Tanah</option>
                        <option <?=( ($tanah["status_sertifikat"] ?? old('statusSertifikat')) == "Sudah") ? 'selected' : '' ?> value="Sudah">Sudah</option>
                        <option <?=( ($tanah["status_sertifikat"] ?? old('statusSertifikat')) == "Belum") ? 'selected' : '' ?> value="Belum">Belum</option>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('statusSertifikat')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="penggunaanTanah" class="form-label">Penggunaan Tanah <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Penggunaan Tanah" class="form-control <?= $validation->hasError('penggunaanTanah') ? 'is-invalid' : ''?>" id="penggunaanTanah" name="penggunaanTanah"  value="<?= $tanah["penggunaan_tanah"] ?? old('penggunaanTanah')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('penggunaanTanah')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : ''?>" id="kecamatan" name="kecamatan" value="<?= $tanah["kecamatan"] ?? old('kecamatan')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('kecamatan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('kelurahan') ? 'is-invalid' : ''?>" id="kelurahan" name="kelurahan" value="<?= $tanah["kelurahan"] ?? old('kelurahan')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('kelurahan')?>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : ''?>" readonly id="tahun" name="tahun" placeholder="Pilih Tahun" value="<?= $tanah["tahun"] ?? old('tahun')?>" required>
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
                    <textarea name="keterangan" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : ''?>" id="keterangan" cols="30" rows="4"><?= $tanah["keterangan"] ?? old('keterangan')?></textarea>
                    <div class="invalid-feedback">
                        <?=$validation->getError('keterangan')?>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><?= ($tanah) ? 'Save' : 'Submit' ?></button>
                    <?php if(!$tanah) : ?>
                      <button type="reset" class="btn btn-secondary">Reset</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection()?>