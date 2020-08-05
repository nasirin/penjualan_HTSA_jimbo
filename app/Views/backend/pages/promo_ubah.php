<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form Tambah Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/admin/produk">Promo</a></li>
                    <li class="breadcrumb-item active">Form tambah promo</li>
                </ol>
            </div>
        </div>
    </div>
</div>
  <!-- promo -->
  <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="/promo/ubah/<?= $get['id_promo']; ?>" method="POST">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="created" value="<?= $get['created_at']; ?>">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Kode promo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="idPromo" value="<?= $get['id_promo'] ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama promo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="nama" placeholder="Nama Produk" value="<?= (old('nama')) ?? $get['nama_promo']; ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Potongan</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= ($validasi->hasError('potongan')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="potongan" placeholder="potongan Produk" value="<?= (old('potongan')) ?? $get['potongan']; ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('potongan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Promo</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control <?= ($validasi->hasError('status')) ? 'is-invalid' : '' ?>">
                                <option value="">--Pilih status--</option>
                                <option value="aktif" <?= $get['status_promo'] == 'aktif' ? 'selected' : ''; ?>>Aktif</option>
                                <option value="non aktif" <?= $get['status_promo'] == 'non aktif' ? 'selected' : ''; ?>>Non Aktif</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('status') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <a href="/admin/promo" class="btn btn-block btn-secondary">Cancel</a>
                            <!-- <button type="button" class="btn btn-block btn-secondary">Cancel</button> -->
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-block btn-warning">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>