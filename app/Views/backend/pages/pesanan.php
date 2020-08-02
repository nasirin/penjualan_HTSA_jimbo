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
                    <li class="breadcrumb-item active">Pesanan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <!-- /.card-header -->
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
                                <td>Rp.<?= number_format($data['qty_pesanan'] * $data['harga_produk'],0,',','.'); ?></td>
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
<?= $this->endSection(); ?>