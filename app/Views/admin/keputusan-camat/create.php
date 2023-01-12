<?= $this->extend('layout/page_layout') ?>

<?= $this->section('bottom_lib') ?>
<link href="<?= base_url('assets/css/datePicker/datepicker.css') ?>" rel="stylesheet">
<script src="<?= base_url('assets/js/datePicker/datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/datePicker/datepicker.en.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('page-title') ?>
<h1>Keputusan Camat</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('admin/keputusan-camat') ?>">Keputusan Camat</a></li>
        <li class="breadcrumb-item active">Form <?= ($keputusanCamat) ? 'Edit' : 'Tambah' ?> Keputusan Camat</li>
    </ol>
</nav>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form <?= ($keputusanCamat) ? 'Edit' : 'Tambah' ?> Keputusan Camat</h5>
        <form class="row g-3 " novalidate="" method="post" action="<?= base_url('admin/keputusan-camat/store') ?>">
            <?php if ($keputusanCamat) : ?>
                <input type="hidden" name="id" value="<?= $keputusanCamat['id'] ?>">
            <?php endif; ?>
            <?= csrf_field(); ?>
            <div class="col-md-4">
                <label for="nomor" class="form-label"> Nomor <span class="text-danger">*</span></label>
                <input type="text" placeholder="Masukan nomor" class="form-control <?= $validation->hasError('nomor') ? 'is-invalid' : '' ?>" id="nomor" name="nomor" value="<?= $keputusanCamat["nomor"] ?? old('nomor') ?>">
                <div class="invalid-feedback" required>
                    <?= $validation->getError('nomor') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tanggalKeputusan" class="form-label">Tanggal Keputusan <span class="text-danger">*</span></label>
                <input type="text" readonly placeholder="Masukan Tanggal Keputusan" class="form-control <?= $validation->hasError('tanggalKeputusan') ? 'is-invalid' : '' ?>" id="tanggalKeputusan" name="tanggalKeputusan" value="<?= $keputusanCamat["tanggal_keputusan"] ?? old('tanggalKeputusan') ?>" required>
                <script type="text/javascript">
                    $("#tanggalKeputusan").datepicker({
                        language: "en",
                        autoClose: true,
                        dateFormat: "yyyy-mm-dd"
                    });
                </script>
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggalKeputusan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tentang" class="form-label">Tentang <span class="text-danger">*</span></label>
                <input type="text" placeholder="Masukan tentang" class="form-control <?= $validation->hasError('tentang') ? 'is-invalid' : '' ?>" id="tentang" name="tentang" value="<?= $keputusanCamat["tentang"] ?? old('tentang') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('tentang') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tanggalLaporan" class="form-label">Tanggal Laporan <span class="text-danger">*</span></label>
                <input type="text" readonly placeholder="Masukan Tanggal Laporan" class="form-control <?= $validation->hasError('tanggalLaporan') ? 'is-invalid' : '' ?>" id="tanggalLaporan" name="tanggalLaporan" value="<?= $keputusanCamat["tanggal_laporan"] ?? old('tanggalLaporan') ?>" required>
                <script type="text/javascript">
                    $("#tanggalLaporan").datepicker({
                        language: "en",
                        autoClose: true,
                        dateFormat: "yyyy-mm-dd"
                    });
                </script>
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggalLaporan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="nomorLaporan" class="form-label"> Nomor Laporan <span class="text-danger">*</span></label>
                <input type="text" placeholder="Masukan Nomor Laporan" class="form-control <?= $validation->hasError('nomorLaporan') ? 'is-invalid' : '' ?>" id="nomorLaporan" name="nomorLaporan" value="<?= $keputusanCamat["nomor_laporan"] ?? old('nomorLaporan') ?>">
                <div class="invalid-feedback" required>
                    <?= $validation->getError('nomorLaporan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" value="<?= $keputusanCamat["kecamatan"] ?? old('kecamatan') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('kecamatan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('kelurahan') ? 'is-invalid' : '' ?>" id="kelurahan" name="kelurahan" value="<?= $keputusanCamat["kelurahan"] ?? old('kelurahan') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('kelurahan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" readonly id="tahun" name="tahun" placeholder="Pilih Tahun" value="<?= $keputusanCamat["tahun"] ?? old('tahun') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('tahun') ?>
                </div>
                <script type="text/javascript">
                    $("#tahun").datepicker({
                        language: "en",
                        minView: "years",
                        view: "years",
                        autoClose: true,
                        dateFormat: "yyyy"
                    });
                </script>
            </div>
            <div class="col-md-6">
                <label for="uraianSingkat" class="form-label">Uraian Singkat</label>
                <textarea name="uraianSingkat" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : '' ?>" id="uraianSingkat" cols="30" rows="4"><?= $keputusanCamat["uraian_singkat"] ?? old('uraianSingkat') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('uraianSingkat') ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control <?= $validation->hasError('pangkatGolongan') ? 'is-invalid' : '' ?>" id="keterangan" cols="30" rows="4"><?= $keputusanCamat["keterangan"] ?? old('keterangan') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('keterangan') ?>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary"><?= ($keputusanCamat) ? 'Save' : 'Submit' ?></button>
                <?php if (!$keputusanCamat) : ?>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>