<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Department</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Department</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="container-fluid">
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php elseif (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="card col-lg-12">
                <!-- /.card-header -->
                <div class="card-header">
                    <a href="#m-department" data-toggle="modal" class="btn btn-primary btn-sm"> <i class="fas fa-building"></i> Tambah Department </a>
                </div>
                <div class="card-body">
                    <table id="tbl-department" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($department as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_department']; ?></td>
                                    <td>
                                        <a href="#u-department<?= $data['id_depart']; ?>" data-toggle="modal" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <form action="/depart/hapus/<?= $data['id_depart'] ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data?')"> <i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('backend/component/modal'); ?>
<?= $this->endSection(); ?>