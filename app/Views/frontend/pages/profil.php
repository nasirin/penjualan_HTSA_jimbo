<?php

use App\Database\Migrations\Pelanggan;
?>
<?= $this->extend('frontend/layout/home'); ?>
<?= $this->section('content'); ?>
<?= $this->include('frontend/component/header4'); ?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="/backend/dist/img/user4-128x128.jpg" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?= $pelanggan['nama'] ?></h3>

                        <p class="text-muted text-center"><?= session('id') ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Email</b> <a class="float-right"><?= $pelanggan['email'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>No. Telepon</b> <a class="float-right"><?= $pelanggan['notelp'] ?></a>
                            </li>
                            <li class="list-group-item">
                                <strong>Alamat</strong>

                                <p class="text-muted text-justify"><?= $pelanggan['alamat'] ?></p>
                            </li>
                        </ul>

                        <a href="/logout" onclick="return confirm('Ingin Keluar ?')" class="btn btn-danger btn-block"><b>Logout</b></a>
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Belanjaan</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ubah profil</a></li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <?php if ($pesananHead) : ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="row justify-content-between">
                                                <div class="card-title">
                                                    <h4><?= $pesananHead['id_pesanan'] ?></h4>
                                                </div>
                                                <div>
                                                    <p><?= $pesananHead['created_at'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Produk</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pesananBody as $data) : ?>
                                                        <tr>
                                                            <td><?= $data['nama_produk'] ?></td>
                                                            <td><?= 'Rp ' . number_format($data['harga_produk'], 0, ',', '.') ?></td>
                                                            <td><?= $data['qty_pesanan'] ?></td>
                                                            <td><?= 'Rp ' . number_format($data['harga_produk'] * $data['qty_pesanan'], 0, ',', '.') ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row justify-content-between">
                                                <a href="/pesanan/invoice/<?= $pesananHead['id_pesanan'] ?>" target="_blank" class="btn btn-success">Cetak Invoice</a>
                                                <a href="/pesanan/konfirmasi/<?= $pesananHead['id_pesanan'] ?>" class="btn btn-success">Konfirmasi</a>
                                                <a href="/pesanan/batal/<?= $pesananHead['id_pesanan'] ?>" class="btn btn-danger">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="card">
                                        <p class="text-center">Anda Belum Memiliki Pesanan Aktif</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">
                                <form class="form-horizontal" action="/profil/ubah/<?= session('id') ?>" method="post">
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" value="<?= $pelanggan['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" name="nama" placeholder="Name" value="<?= $pelanggan['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Telepon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName2" name="notelp" value="<?= $pelanggan['notelp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" name="alamat" value="<?= $pelanggan['alamat'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-success">Ubah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>