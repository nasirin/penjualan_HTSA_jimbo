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
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Pesanan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="btn-group">
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
                <table id="tbl-pesanan" class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Pembayaran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pesanan as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['id_pes']; ?></td> <!-- INV bulan tahun increment -->
                                <td><?= $data['nama']; ?></td>
                                <td>Rp.<?= number_format($data['qty_pesanan'] * $data['harga_produk'], 0, ',', '.'); ?></td>
                                <td><?= $data['status_pesanan']; ?></td>
                                <td>
                                    <!-- jika status belom di bayar jangan tampilkan print -->
                                    <a href="/pesanan/detail/<?= $data['id_pes']; ?>" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                    <a href="/pesanan/invoice" class="btn btn-info btn-sm"> <i class="fa fa-file"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?= $this->include('backend/component/modal-report'); ?>
<?= $this->endSection(); ?>