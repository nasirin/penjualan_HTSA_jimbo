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
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Department</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="alert" data-alert="<?= session()->getFlashdata('success') ?>"></div>

            <div class="card col-lg-12">
                <!-- /.card-header -->
                <div class="card-header">
                    <a href="#m-department" data-toggle="modal" class="btn btn-primary btn-sm"> <i class="fas fa-building"></i> Tambah Department </a>
                </div>
                <div class="card-body">
                    <table id="tbl-department" class="table table-hover table-responsive-sm table-sm">
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
                                        <a href="/department/hapus/<?= $data['id_depart'] ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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