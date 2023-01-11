<?= $this->extend('layout/page_layout')?>

<?= $this->section('bottom_lib')?>
    <link href="<?= base_url('assets/css/datePicker/datepicker.css') ?>" rel="stylesheet">
    <script src="<?= base_url('assets/js/datePicker/datepicker.js') ?>"></script>
    <script src="<?= base_url('assets/js/datePicker/datepicker.en.js') ?>"></script>
<?= $this->endSection()?>

<?= $this->section('page-title')?>
    <h1><?= $title ?></h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url('/')?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url('users')?>"><?= $title ?></a></li>
            <li class="breadcrumb-item active">Form <?= ($users) ? 'Edit' : 'Tambah' ?> <?= $title ?></li>
        </ol>
    </nav>
<?= $this->endSection()?>
<?= $this->section('content')?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form <?= ($users) ? 'Edit' : 'Tambah' ?> <?= $title ?></h5>
            <form class="row g-3 " novalidate="" method="post" action="<?= base_url('admin/users/store')?>">
            <?php if($users) : ?>
                <input type="hidden" name="id" value="<?=$users['id']?>">
            <?php endif; ?>
                <?=csrf_field();?>
                <div class="col-md-12">
                    <label for="fullname" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Nama Lengkap" class="form-control <?= $validation->hasError('fullname') ? 'is-invalid' : ''?>" id="fullname" name="fullname" maxlength="60" value="<?= $users["fullname"] ?? old('fullname')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('fullname')?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Username" class="form-control <?= $validation->hasError('username') ? 'is-invalid' : ''?>" id="username" name="username" maxlength="60" value="<?= $users["username"] ?? old('username')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('username')?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="text" placeholder="Masukan Email" class="form-control <?= $validation->hasError('email') ? 'is-invalid' : ''?>" id="email" name="email" maxlength="60" value="<?= $users["email"] ?? old('email')?>" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('email')?>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" placeholder="Masukan Password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : ''?>" id="password" name="password" value="" required>
                    <div class="invalid-feedback">
                        <?=$validation->getError('password')?>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="jenisKelamin" class="form-label">Role <span class="text-danger">*</span></label>
                    <select id="role" class="form-select <?= $validation->hasError('role') ? 'is-invalid' : ''?>" name="role" required>
                        <option value="">Pilih Role</option>
                        <?php foreach ($roles as $role) : ?>
                            <option <?=( ($role->name ?? old('role')) == "admin") ? 'selected' : '' ?> value="<?= $role->name  ?>"><?= ucfirst($role->name)  ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                        <?=$validation->getError('role')?>
                    </div>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary"><?= ($users) ? 'Save' : 'Submit' ?></button>
                    <?php if(!$users) : ?>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection()?>