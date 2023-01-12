<?= $this->extend('layout/page_layout') ?>

<?= $this->section('page-title') ?>
<h1>Inventarisasi</h1>
<nav>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
    <li class="breadcrumb-item active">Inventarisasi</li>
  </ol>
</nav>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Data Inventarisasi</h5>
        <?php if (session()->getFlashdata('message')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif; ?>
        <div style="margin-bottom:var(--bs-card-title-spacer-y)">
        <div class="d-flex flex-row">
          <div>
              <a class="btn btn-primary btn" href="<?= base_url('admin/inventaris/create') ?>">
                Tambah <i class="bi bi-plus"></i>
              </a>
          </div>
          <div style="margin-left: 10px;">
          <form action="<?= base_url('admin/inventaris/export') ?>" method="GET">
                <button type="submit" class="btn btn-success">Download Data Inventaris</button>
              </form>
          </div>
        </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped table-hover dt-responsive display nowrap" id="table-inventaris">
            <thead>
              <tr>
                <th>Jenis Barang/Bangunan</th>
                <th>Jumlah Barang/Bangunan Dibeli Sendiri</th>
                <th>Jumlah Barang/Bangunan Bantuan Pemerintah</th>
                <th>Jumlah Barang/Bangunan Sumbangan</th>
                <th>Jumlah Barang/Bangunan Keadaan Baik Awal Tahun</th>
                <th>Jumlah Barang/Bangunan Keadaan Buruk Awal Tahun</th>
                <th>Jumlah Barang/Bangunan Dihapus (Rusak)</th>
                <th>Jumlah Barang/Bangunan Dihapus (Dijual)</th>
                <th>Jumlah Barang/Bangunan dihapus (Disumbangkan)</th>
                <th>Tgl Penghapusan</th>
                <th>Jumlah Barang/Bangunan Keadaan Baik Akhir Tahun</th>
                <th>Jumlah Barang/Bangunan Keadaan Buruk Akhir Tahun</th>
                <th>Keterangan</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Tahun</th>
                <th>Aksii</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
        <!-- Akhir Tabel -->
      </div>
    </div>
  </div>
</div>
<div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="h3">Apakah anda yakin?</h2>
        <p>Data Inventarisasi akan dihapus secara permanen</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function confirmToDelete(el) {
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
  }
  $(document).ready(function() {
    //dataables
    $('#table-inventaris').DataTable({
      "processing": true, //Feature control the processing indicator.
      "serverSide": true, //Feature control DataTables' server-side processing mode.
      "responsive": true,
      "ajax": "<?= base_url('admin/inventaris/get-inventaris') ?>",
      "columns": [{
          data: 'jenis_barang_bangunan'
        },
        {
          data: 'jml_brg_dibelisendiri'
        },
        {
          data: 'jml_brg_bantuanpemerintah'
        },
        {
          data: 'jml_brg_sumbangan'
        },
        {
          data: 'keadaan_baik_awal'
        },
        {
          data: 'keadaan_rusak_awal'
        },
        {
          data: 'hapus_rusak'
        },
        {
          data: 'hapus_dijual'
        },
        {
          data: 'hapus_disumbangkan'
        },
        {
          data: 'tanggal_penghapusan'
        },
        {
          data: 'keadaan_baik_akhir'
        },
        {
          data: 'keadaan_rusak_akhir'
        },
        {
          data: 'keterangan'
        },
        {
          data: 'kecamatan'
        },
        {
          data: 'kelurahan'
        },
        {
          data: 'tahun'
        },
        {
          data: 'action',
          orderable: false
        }
      ]
    });
  });
</script>
<?= $this->endSection() ?>