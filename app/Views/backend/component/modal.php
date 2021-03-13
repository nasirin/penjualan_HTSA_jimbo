<!-- DEPARTMENT -->
<!-- tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="m-department">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title m-auto"> <i class="fa fa-building"></i> Tambah Department</h5>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="/department/simpan">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <input type="text" class="form-control <?= ($validasi->hasError('department')) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" name="department" placeholder="Nama Department" value="<?= old('department') ?>">
                            <div class="invalid-feedback">
                                <?= $validasi->getError('department') ?>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ubah -->
<?php foreach ($department as $data) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="u-department<?= $data['id_depart']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title m-auto"> <i class="fa fa-building"></i> Ubah Department</h5>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="/department/ubah/<?= $data['id_depart']; ?>">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="PUT">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Department</label>
                                <input type="hidden" name="id" value="<?= $data['id_depart']; ?>">
                                <input type="text" class="form-control <?= ($validasi->hasError('department')) ? 'is-invalid' : '' ?>" id="exampleInputEmail1" name="department" placeholder="Nama Department" value="<?= (old('department')) ? old('department') : $data['nama_department'] ?>">
                                <div class="invalid-feedback">
                                    <?= $validasi->getError('department') ?>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>