<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Promo</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/admin/promo">Promo</a></li>
                    <li class="breadcrumb-item active">Detail promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card col-lg-5 m-auto bg-info">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Kode Promo :</th>
                        <td><?= $get['id_promo']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama Promo :</th>
                        <td><?= ucwords($get['nama_promo']); ?></td>
                    </tr>
                    <tr>
                        <th>Potongan :</th>
                        <td><?= $get['potongan']; ?> %</td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td><?= ucfirst($get['status_promo']); ?> </td>
                    </tr>
                    <tr>
                        <th colspan="2">Produk :</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>produk 1</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>produk 2</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
                <div class="row justify-content-between">
                    <div>
                        <a href="/admin/promo" class="btn btn-light">Back</a>
                    </div>
                    <div>
                        <a href="/promo/edit/<?= $get['id_promo']; ?>" class="btn btn-warning">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>