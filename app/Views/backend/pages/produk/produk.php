<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
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
            <div class="alert" data-alert="<?= session()->getFlashdata('success')?>"></div>            

            <div class="card col-lg-12">
                <!-- /.card-header -->
                <div class="card-header">
                    <a href="/admin/produk/tambah" class="btn btn-primary"> <i class="fas fa-cube"></i> Tambah Produk </a>
                    <div class="btn-group ml-2">
                        <a href="#" class="btn btn-primary"> Laporan</a>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Hari ini</a>
                            <a class="dropdown-item" href="#minggu" data-toggle="modal">Per Minggu</a>
                            <a class="dropdown-item" href="#">Per Bulan</a>
                            <a class="dropdown-item" href="#">Per Tahun</a>
                            <a class="dropdown-item" href="#">Per Quartal</a>
                            <a class="dropdown-item" href="#">Costum</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="tbl-produk" class="table table-hover table-responsive-sm table-sm">
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
                                <th>Promo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($get as $data) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['id_prod']; ?></td>
                                    <td><?= ucfirst($data['nama_department']); ?></td>
                                    <td><?= ucfirst($data['nama_produk']); ?></td>
                                    <td>Rp.<?= number_format($data['harga_produk'], 0, ',', '.'); ?></td>
                                    <td><?= $data['varian_produk']; ?></td>
                                    <td><?= $data['qty_produk']; ?></td>
                                    <td><?= $data['ukuran_produk']; ?></td>
                                    <td><?= ucwords($data['nama_promo']); ?></td>
                                    <td>
                                        <a href="/admin/produk/detail/<?= $data['id_prod']; ?>" class="btn btn-xs btn-secondary"> <i class="fa fa-eye"></i> </a>
                                        <a href="/admin/produk/edit/<?= $data['id_prod']; ?>" class="btn btn-xs btn-warning"> <i class="fa fa-edit"></i> </a>
                                        <a href="/admin/produk/hapus/<?= $data['id_prod']; ?>" class="btn btn-xs btn-danger tombol-hapus"> <i class="fa fa-trash"></i> </a>
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