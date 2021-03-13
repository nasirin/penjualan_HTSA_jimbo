<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form Tambah User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/user">User</a></li>
                    <li class="breadcrumb-item active">Form Tambah User</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="/user/simpan" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Nama user <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Email user <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Password user <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Notelp user <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" name="notelp" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Alamat user <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <a href="/user" class="btn btn-block btn-secondary">Cancel</a>                            
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>