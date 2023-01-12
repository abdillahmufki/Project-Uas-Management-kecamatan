<?= $this->extend('layout/page_layout')?>

<?= $this->section('page-title')?>
    <h1>Aparat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
            <li class="breadcrumb-item active">Aparat</li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Data Aparat</h5>
              <?php if(session()->getFlashdata('message')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?=session()->getFlashdata('message');?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif;?>
              <div style="margin-bottom:var(--bs-card-title-spacer-y)">
                <a class="btn btn-primary btn" href="<?=base_url('admin/aparat/create')?>">
                  Tambah <i class="bi bi-plus"></i>
                </a>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap"  id="table-aparat">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>NIAP</th>
                      <th>NIP</th>
                      <th>Jenis Kelamin</th>
                      <th>Tempat Lahir</th>
                      <th>Tanggal Lahir</th>
                      <th>Agama</th>
                      <th>Pangkat Gol.</th>
                      <th>Jabatan</th>
                      <th>Pendidikan Terakhir</th>
                      <th>Tgl Pengangkatan</th>
                      <th>No. Pengangkatan </th>
                      <th>Tgl Pemberhentian</th>
                      <th>No. Pemberhentian</th>
                      <th>Keterangan</th>
                      <th>Kecamatan</th>
                      <th>Kelurahan</th>
                      <th>Tahun</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- End Default Table Example -->
            </div>
          </div>
        </div>
    </div>
    <div id="confirm-dialog" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="h3">Apakah anda yakin?</h2>
            <p>Data aparat akan dihapus secara permanen</p>
          </div>
          <div class="modal-footer">
            <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </div>
    </div>
  <script type="text/javascript">
    function confirmToDelete(el){
      $("#delete-button").attr("href", el.dataset.href);
      $("#confirm-dialog").modal('show');
    }
    $(document).ready(function() {
      //datatables
      $('#table-aparat').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "ajax": "<?= base_url('admin/aparat/get-aparat')?>",
        "columns": [
          {data:'nama_lengkap'},
          {data:'NIAP'},
          {data:'NIP'},
          {data:'jenis_kelamin'},
          {data:'tempat_lahir'},
          {data:'tanggal_lahir'},
          {data:'agama'},
          {data:'pangkat_golongan'},
          {data:'jabatan'},
          {data:'pendidikan_terakhir'},
          {data:'tanggal_pengangkatan'},
          {data:'nomor_pengangkatan'},
          {data:'tanggal_pemberhentian'},
          {data:'nomor_pemberhentian'},
          {data:'keterangan'},
          {data:'kecamatan'},
          {data:'kelurahan'},
          {data:'tahun'},
          {data:'action',orderable: false}
        ]
      });
    });
  </script>
<?= $this->endSection()?>