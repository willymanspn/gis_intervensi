    <!-- Main Content Start -->
    <h3> <?= $title ?> </h3>
    <p>Halaman ini berisi form untuk menambahkan data kelurahan</p>

    <div class="card shadow">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Input</h5>
        </div>

        <div class="row ml-3">

            <div class="col">
                <div class="card mr-4 my-4">
                    <div class="card-body">
                        <?=
                        // Notifikasi validation
                        validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                        <?= $this->session->flashdata('message') ?>

                        <?= form_open() ?>

                        <div class="form-group">
                            <label for="exampleInputText1">Kode Kelurahan</label>
                            <?= form_error('kd_kelurahan', '<small class="text-danger">', '</small>') ?>
                            <input type="text" class="form-control" name="kd_kelurahan" id="exampleInputText1" placeholder="Masukan kode kelurahan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Nama Kelurahan</label>
                            <?= form_error('nm_kelurahan', '<small class="text-danger">', '</small>') ?>
                            <input type="text" class="form-control" name="nm_kelurahan" id="exampleInputText1" placeholder="Masukan nama kelurahan">
                        </div>

                        <div class="form-group">
                            <label for="inputState">Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" required>
                                <option selected>Pilih kecamatan</option>
                                <?php foreach ($kecamatan as $row) : ?>
                                    <option value="<?= $row->id_kecamatan ?>"><?= $row->nm_kecamatan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('SuperAdmin/Kelurahan') ?>" style="text-decoration:none">Back</a>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->