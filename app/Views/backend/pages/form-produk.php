<?= $this->extend('backend/layout/home'); ?>

<?= $this->section('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Form Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"> <a href="/produk">Produk</a></li>
                    <li class="breadcrumb-item active">Form Produk</li>
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
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                            <select name="" id="" class="form-control">
                                <option value="">--Pilih-- </option>
                                <option value="">--Pilih-- </option>
                                <option value="">--Pilih-- </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="nama" placeholder="Nama Produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Varian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" name="varian" placeholder="Varian Produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" id="inputPassword3" name="harga" placeholder="Harga Produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" id="inputPassword3" name="qty" placeholder="Quantity Produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Size</label>
                        <div class="col-sm-10">
                            <input type="number" min="0" class="form-control" id="inputPassword3" name="size" placeholder="Size Produk">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 mr-2 col-form-label">Gambar</label>
                        <div class="row col-sm-10 align-items-center">
                            <img src="/img/icon/default.jpg" class="img-thumbnail col-sm-5 col-lg-2 mr-2 mb-2" alt="">
                            <div class="custom-file col-sm-5 mb-2 ">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Gambar produk</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10" placeholder="Deskripsi produk"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-2">
                            <button type="button" class="btn btn-block btn-secondary">Cancel</button>
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