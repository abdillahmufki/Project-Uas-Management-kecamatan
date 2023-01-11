<?= $this->extend('layout/page_layout')?>

<?= $this->section('page-title')?>
    <h1><?= $title ?></h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?= $title ?></h5>
              <?php if(session()->getFlashdata('message')) :?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <?=session()->getFlashdata('message');?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php endif;?>
              <div style="margin-bottom:var(--bs-card-title-spacer-y)">
                <a class="btn btn-primary btn" href="<?=base_url('admin/users/create')?>">
                  Tambah <i class="bi bi-plus"></i>
                </a>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-hover dt-responsive display nowrap"  id="table-users">
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Role</th>
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
            <p><?= $title ?> akan dihapus secara permanen</p>
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
      $('#table-users').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "ajax": "<?= base_url('admin/users/getAll')?>",
        "columns": [
          {data:'username'},
          {data:'email'},
          {data:'name'},
          {data:'action',orderable: false}
        ]
      });
    });
  </script>
<?= $this->endSection()?>