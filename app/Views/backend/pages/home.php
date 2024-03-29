<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active">Home</li>
                    <!-- <li class="breadcrumb-item active">Dashboard v2</li> -->
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cubes"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Produk</span>
                        <span class="info-box-number">
                            <?= $totalProduk?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                </div>
            </div>             -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Penjualan Sukses</span>
                        <span class="info-box-number"><?= $totalPenjualan?></span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Pelanggan</span>
                        <span class="info-box-number"><?= $totalPelanggan?></span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <div class="card-header border-transparent">
                        <h3 class="card-title">Latest Orders</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Pelanggan</th>
                                        <th>Total Produk</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($lastOrder as $data):?>
                                    <tr>
                                        <td><a href="#"><?= $data['id_pes']?></a></td>
                                        <td><?= $data['id_pelanggan']?></td>
                                        <td><?= 'total item'?></td>
                                        <td><span class="badge badge-success"><?= $data['status_pesanan']?></span></td>
                                        <td>
                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?= 'total' ?></div>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer clearfix">
                        <!-- <a href="backend/javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> -->
                        <a href="pesanan" class="btn btn-sm btn-info float-right">View All Orders</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>