<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Promo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- promo -->
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="card col-lg-12">
                <!-- /.card-header -->
                <div class="card-header">
                    <a href="/promo/tambah" class="btn btn-primary"> <i class="fas fa-tag"></i> Tambah Promo </a>
                </div>
                <div class="card-body">
                    <table id="tbl-produk" class="table table-hover table-responsive-sm table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Promo</th>
                                <th>Potongan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($promo as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_promo']; ?></td>
                                    <td><?= $data['nama_promo']; ?></td>
                                    <td><?= $data['potongan']; ?>%</td>
                                    <td><?= $data['status_promo']; ?></td>
                                    <td>
                                        <a href="/promo/detail/<?= $data['id_promo']; ?>" class="btn btn-sm btn-secondary"> <i class="fa fa-eye"></i> </a>
                                        <a href="/promo/edit/<?= $data['id_promo']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <form action="/promo/hapus/<?= $data['id_promo']; ?>" method="POST" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <!-- <input type="hidden" name="_method" value="delete"> -->
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus data?')"><i class="fa fa-trash"></i> </button>
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
<?= $this->endSection(); ?>