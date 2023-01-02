<?= $this->extend('layout/page_layout')?>

<?= $this->section('page-title')?>
    <h1>Aparat</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
              <div style="margin-bottom:var(--bs-card-title-spacer-y)">
                <a class="btn btn-primary" href="<?=base_url('aparat-new')?>">
                  Tambah <i class="bi bi-plus"></i>
                </a>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap"  id="table-aparat">
                  <thead>
                    <tr>
                      <!-- <th scope="col">#</th> -->
                      <th scope="col">Nama</th>
                      <th scope="col">NIAP</th>
                      <th scope="col">NIP</th>
                      <th scope="col">Jenis Kelamin</th>
                      <th scope="col">Tempat Lahir</th>
                      <th scope="col">Tanggal Lahir</th>
                      <th scope="col">Agama</th>
                      <th scope="col">Pangkat Gol.</th>
                      <th scope="col">Jabatan</th>
                      <th scope="col">Pendidikan Terakhir</th>
                      <th scope="col">Tgl Pengangkatan</th>
                      <th scope="col">No. Pengangkatan </th>
                      <th scope="col">Tgl Pemberhentian</th>
                      <th scope="col">No. Pemberhentian</th>
                      <th scope="col">Keterangan</th>
                      <th scope="col">Kecamatan</th>
                      <th scope="col">Kelurahan</th>
                      <th scope="col">Tahun</th>
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
  <script type="text/javascript">
    $(document).ready(function() {
      //datatables
      $('#table-aparat').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "ajax": "<?= base_url('get-aparat')?>",
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
          {data:'kecamatan_id'},
          {data:'kelurahan_id'},
          {data:'tahun'}
        ]

        //Set column definition initialisation properties.
        // "columnDefs": [
        //   { 
        //       "targets": [ 0 ], //first column / numbering column
        //       "orderable": false, //set not orderable
        //   },
        // ],
      });
    });
  </script>
<?= $this->endSection()?>