<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Produk</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <!-- PRODUK -->
            <?php if (session()->getFlashdata('success_produk')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success_produk') ?>
                </div>
            <?php endif; ?>
            <div class="card col-lg-12">
                <!-- /.card-header -->
                <div class="card-header">
                    <a href="/produk/tambah" class="btn btn-primary btn-sm"> <i class="fas fa-cube"></i> Tambah Produk </a>
                </div>
                <div class="card-body">
                    <table id="tbl-produk" class="table table-hover table-responsive-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kode</th>
                                <th>Department</th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Varian</th>
                                <th>QTY</th>
                                <th>Ukuran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_prod']; ?></td>
                                    <td><?= $data['nama_department']; ?></td>
                                    <td><?= $data['nama_produk']; ?></td>
                                    <td>Rp.<?= number_format($data['harga_produk'],0,',','.'); ?></td>
                                    <td><?= $data['varian_produk']; ?></td>
                                    <td><?= $data['qty_produk']; ?></td>
                                    <td><?= $data['ukuran_produk']; ?></td>
                                    <td>
                                        <a href="produk/detail/<?= $data['id_prod']; ?>" class="btn btn-sm btn-secondary"> <i class="fa fa-eye"></i> </a>
                                        <a href="/produk/edit/<?= $data['id_prod']; ?>" class="btn btn-sm btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <form action="/produk/hapus/<?= $data['id_prod']; ?>" method="POST" class="d-inline">
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

<?= $this->include('backend/component/modal'); ?>
<?= $this->endSection(); ?>