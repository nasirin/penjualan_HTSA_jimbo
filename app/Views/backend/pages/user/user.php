<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                    <a href="/user/tambah" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Tambah User </a>
                </div>
                <div class="card-body">
                    <table id="tbl-department" class="table table-hover table-responsive-sm table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($user as $data):?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td><?= $data['nama_user']?></td>
                                    <td><?= $data['email_user']?></td>
                                    <td><?= $data['notelp_user']?></td>
                                    <td><?= $data['alamat_user']?></td>
                                    <td>
                                        <a href="/user/ganti/<?= $data['id_user']?>" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="/user/hapus/<?= $data['id_user']?>" class="btn btn-xs btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>