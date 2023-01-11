<?= $this->extend('layout/page_layout') ?>

<?= $this->section('bottom_lib') ?>
<link href="<?= base_url('assets/css/datePicker/datepicker.css') ?>" rel="stylesheet">
<script src="<?= base_url('assets/js/datePicker/datepicker.js') ?>"></script>
<script src="<?= base_url('assets/js/datePicker/datepicker.en.js') ?>"></script>
<?= $this->endSection() ?>

<?= $this->section('page-title') ?>
<h1>Inventarisasi</h1>
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?= base_url('inventaris') ?>">Inventarisasi</a></li>
        <li class="breadcrumb-item active">Form <?= ($inventaris) ? 'Edit' : 'Tambah' ?> Inventarisasi</li>
    </ol>
</nav>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form <?= ($inventaris) ? 'Edit' : 'Tambah' ?> Inventarisasi</h5>
        <form class="row g-3 " novalidate="" method="post" action="<?= base_url('inventaris/store') ?>">
            <?php if ($inventaris) : ?>
                <input type="hidden" name="id" value="<?= $inventaris['id'] ?>">
            <?php endif; ?>
            <?= csrf_field(); ?>
            <div class="col-md-4">
                <label for="jenis" class="form-label">Jenis Barang/Bangunan<span class="text-danger">*</span></label>
                <input type="text" placeholder="Jenis Barang/Bangunan" class="form-control <?= $validation->hasError('jenis_barang_bangunan') ? 'is-invalid' : '' ?>" id="jenis" name="jenis_barang_bangunan" maxlength="255" value="<?= $inventaris["jenis_barang_bangunan"] ?? old('jenis_barang_bangunan') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('jenis_barang_bangunan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label class="form-label">Jumlah Barang/Bangunan berdasarkan sumber</label>
                <br><label for="belisendiri" class="form-label">Dibeli Sendiri</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Dibeli Sendiri" class="form-control <?= $validation->hasError('jml_brg_dibelisendiri') ? 'is-invalid' : '' ?>" id="belisendiri" name="jml_brg_dibelisendiri" maxlength="20" value="<?= $inventaris["jml_brg_dibelisendiri"] ?? old('jml_brg_dibelisendiri') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_brg_dibelisendiri') ?>
                </div>
                <label for="bantuan" class="form-label">Bantuan Pemerintah</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Bantuan Pemerintah" class="form-control <?= $validation->hasError('jml_brg_bantuanpemerintah') ? 'is-invalid' : '' ?>" id="bantuan" name="jml_brg_bantuanpemerintah" maxlength="20" value="<?= $inventaris["jml_brg_bantuanpemerintah"] ?? old('jml_brg_bantuanpemerintah') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_brg_bantuanpemerintah') ?>
                </div>
                <label for="sumbangan" class="form-label">Sumbangan</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Sumbangan" class="form-control <?= $validation->hasError('jml_brg_sumbangan') ? 'is-invalid' : '' ?>" id="sumbangan" name="jml_brg_sumbangan" maxlength="20" value="<?= $inventaris["jml_brg_sumbangan"] ?? old('jml_brg_sumbangan') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('jml_brg_sumbangan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="Jumlah based kondisi" class="form-label">Jumlah Barang/Bangunan Awal Tahun<span class="text-danger">*</span></label>
                <br>
                <label for="baik" class="form-label">Baik</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Awal Tahun Baik" class="form-control <?= $validation->hasError('keadaan_baik_awal') ? 'is-invalid' : '' ?>" id="baik" name="keadaan_baik_awal" maxlength="20" value="<?= $inventaris["keadaan_baik_awal"] ?? old('keadaan_baik_awal') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('keadaan_baik_awal') ?>
                </div>
                <label for="rusak" class="form-label">Rusak</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Awal Tahun Rusak" class="form-control <?= $validation->hasError('keadaan_rusak_awal') ? 'is-invalid' : '' ?>" id="rusak" name="keadaan_rusak_awal" maxlength="20" value="<?= $inventaris["keadaan_rusak_awal"] ?? old('keadaan_rusak_awal') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('keadaan_rusak_awal') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="Jumlah dihapus" class="form-label">Jumlah Dihapus</label>
                <br>
                <label for="hapusrusak" class="form-label">Hapus Rusak</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Dihapus Rusak" class="form-control <?= $validation->hasError('hapus_rusak') ? 'is-invalid' : '' ?>" id="hapusrusak" name="hapus_rusak" maxlength="20" value="<?= $inventaris["hapus_rusak"] ?? old('hapus_rusak') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hapus_rusak') ?>
                </div>
                <label for="hapusjual" class="form-label">Hapus Dijual</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Dihapus Dijual" class="form-control <?= $validation->hasError('hapus_dijual') ? 'is-invalid' : '' ?>" id="hapusjual" name="hapus_dijual" maxlength="20" value="<?= $inventaris["hapus_dijual"] ?? old('hapus_dijual') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hapus_dijual') ?>
                </div>
                <label for="hapussumbang" class="form-label">Hapus Disumbangkan</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Dihapus Disumbangkan" class="form-control <?= $validation->hasError('hapus_disumbangkan') ? 'is-invalid' : '' ?>" id="hapussumbang" name="hapus_disumbangkan" maxlength="20" value="<?= $inventaris["hapus_disumbangkan"] ?? old('hapus_disumbangkan') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hapus_disumbangkan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="tanggalhapus" class="form-label">Tanggal Penghapusan </label>
                <input type="text" class="form-control <?= $validation->hasError('tanggal_penghapusan') ? 'is-invalid' : '' ?>" readonly id="tanggalhapus" name="tanggal_penghapusan" placeholder="Pilih Tanggal Penghapusan" value="<?= $inventaris["tanggal_penghapusan"] ?? old('tanggal_penghapusan') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('tanggal_penghapusan') ?>
                </div>
                <script type="text/javascript">
                    $("#tanggalhapus").datepicker({
                        language: "en",
                        autoClose: true,
                        dateFormat: "yyyy-mm-dd"
                    });
                </script>
            </div>
            <div class="col-md-4">
                <label for="Jumlah based kondisi Akhir" class="form-label">Jumlah Barang/Bangunan Akhir Tahun</label>
                <br>
                <label for="baikAkhir" class="form-label">Baik</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Akhir Tahun Baik" class="form-control <?= $validation->hasError('keadaan_baik_akhir') ? 'is-invalid' : '' ?>" id="baikAkhir" name="keadaan_baik_akhir" maxlength="20" value="<?= $inventaris["keadaan_baik_akhir"] ?? old('keadaan_baik_akhir') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('keadaan_baik_akhir') ?>
                </div>
                <label for="rusakAkhir" class="form-label">Rusak</label>
                <input type="number" placeholder="Jumlah Barang/Bangunan Akhir Tahun Rusak" class="form-control <?= $validation->hasError('keadaan_rusak_akhir') ? 'is-invalid' : '' ?>" id="rusakAkhir" name="keadaan_rusak_akhir" maxlength="20" value="<?= $inventaris["keadaan_rusak_akhir"] ?? old('keadaan_rusak_akhir') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('keadaan_rusak_akhir') ?>
                </div>
            </div>

            <div class="col-md-4">
                <label for="kecamatan" class="form-label">Kecamatan <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('kecamatan') ? 'is-invalid' : '' ?>" id="kecamatan" name="kecamatan" value="<?= $inventaris["kecamatan"] ?? old('kecamatan') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('kecamatan') ?>
                </div>
            </div>
            <div class="col-md-4">
                <label for="kelurahan" class="form-label">Kelurahan <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('kelurahan') ? 'is-invalid' : '' ?>" id="kelurahan" name="kelurahan" value="<?= $inventaris["kelurahan"] ?? old('kelurahan') ?>" required>
                <div class="invalid-feedback">
                    <?= $validation->getError('kelurahan') ?>
                </div>
            </div>

            <div class="col-md-4">
                <label for="tahun" class="form-label">Tahun <span class="text-danger">*</span></label>
                <input type="text" class="form-control <?= $validation->hasError('tahun') ? 'is-invalid' : '' ?>" readonly id="tahun" name="tahun" placeholder="Pilih Tahun" value="<?= $inventaris["tahun"] ?? old('tahun') ?>" required>
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
            <div class="col-md-4">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control <?= $validation->hasError('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" cols="30" rows="4"><?= $inventaris["keterangan"] ?? old('keterangan') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('keterangan') ?>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary"><?= ($inventaris) ? 'Save' : 'Submit' ?></button>
                <?php if (!$inventaris) : ?>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>