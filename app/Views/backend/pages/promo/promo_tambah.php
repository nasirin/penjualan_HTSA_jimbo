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

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="/admin/promo/simpan" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Kode promo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="idPromo" value="<?= $kode ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama promo</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="nama" placeholder="Nama Produk" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Potongan</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= ($validasi->hasError('potongan')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="potongan" placeholder="potongan Produk" value="<?= old('potongan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('potongan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Promo</label>
                        <div class="col-sm-10">
                            <select name="status" id="status" class="form-control">
                                <option value="">--Pilih status--</option>
                                <option value="aktif">Aktif</option>
                                <option value="non aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <a href="/admin/promo" class="btn btn-block btn-secondary">Cancel</a>
                            <!-- <button type="button" class="btn btn-block btn-secondary">Cancel</button> -->
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>