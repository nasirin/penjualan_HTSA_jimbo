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
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/admin/produk">Produk</a></li>
                    <li class="breadcrumb-item active">Form tambah produk</li>
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
                <form action="/admin/produk/simpan" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">Kode Produk <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="idProduk" value="<?= $kode ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Department<small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <select name="department" id="" class="form-control <?= ($validasi->hasError('department')) ? 'is-invalid' : '' ?>">
                                <option value="">--- Pilih Department --- </option>
                                <?php foreach ($department as $data) : ?>
                                    <option value="<?= $data['id_depart']; ?>"><?= $data["nama_department"]; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('department') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama<small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validasi->hasError('nama')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="nama" placeholder="Nama Produk" value="<?= old('nama'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('nama') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Varian<small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validasi->hasError('varian')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="varian" placeholder="Varian Produk" value="<?= old('varian'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('varian') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Harga<small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= ($validasi->hasError('harga')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="harga" placeholder="Harga Produk" value="<?= old('harga'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('harga') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity<small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= ($validasi->hasError('qty')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="qty" placeholder="Quantity Produk" value="<?= old('qty'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('qty') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Size <small class="text-danger">*</small></label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control <?= ($validasi->hasError('size')) ? 'is-invalid' : '' ?>" id="inputPassword3" name="size" placeholder="Size Produk" value="<?= old('size'); ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('size') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 mr-2 col-form-label">Gambar <small class="text-danger">*</small></label>
                        <div class="row col-sm-10 align-items-center">
                            <img src="/img/icon/default.jpg" class="img-thumbnail col-sm-5 col-lg-2 mr-2 mb-2 img-preview" alt="gambar produk">
                            <div class="custom-file col-sm-5 mb-2 ">
                                <input type="file" class="custom-file-input <?= ($validasi->hasError('gambar')) ? 'is-invalid' : '' ?>" id="gambar" name="gambar">
                                <label class="custom-file-label" for="customFile">Gambar produk</label>
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('gambar') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi <small class="text-danger">*</small> </label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="keterangan" class="form-control <?= ($validasi->hasError('keterangan')) ? 'is-invalid' : '' ?>" cols="30" rows="10" placeholder="Deskripsi produk"> <?= old('keterangan'); ?></textarea>
                            <div class="invalid-feedback">
                                <?= $validasi->getError('keterangan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Promo</label>
                        <div class="col-sm-10">
                            <select name="promo" id="" class="form-control">
                                <option value="">--- Pilih promo --- </option>
                                <?php foreach ($promo as $data) : ?>
                                    <option value="<?= $data['id_promo']; ?>"><?= ucwords($data["nama_promo"]); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <a href="/admin/produk" class="btn btn-block btn-secondary">Cancel</a>                            
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