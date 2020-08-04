<!-- DEPARTMENT -->
<!-- tambah -->
<div class="modal fade" tabindex="-1" role="dialog" id="minggu">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title m-auto"> <i class="fa fa-building"></i> Laporan Mingguan</h5>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="#">
                    <?= csrf_field(); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="department" placeholder="Nama Department" value="<?= old('department') ?>">
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