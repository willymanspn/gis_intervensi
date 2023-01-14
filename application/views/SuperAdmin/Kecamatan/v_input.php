    <!-- Main Content Start -->
    <h3> <?= $title ?> </h3>
    <p>Halaman ini berisi form untuk menambahkan data Kecamatan</p>

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
                        validation_errors('<div class="alert alert-danger">', '</div>');
                        ?>

                        <?= $this->session->flashdata('message') ?>

                        <?= form_open_multipart() ?>

                        <div class="form-group">
                            <label for="exampleInputText1">Kode Kecamatan</label>
                            <input type="text" class="form-control" name="kd_kecamatan" id="exampleInputText1" placeholder="Masukan kode kecamatan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Nama Kecamatan</label>
                            <input type="text" class="form-control" name="nm_kecamatan" id="exampleInputText1" placeholder="Masukan nama kecamatan">
                        </div>

                        <div class="form-group">
                            <label for="formFileSm" class="form-label">GeoJson Kecamatan</label>
                            <input class="form-control form-control-sm" name="gj_kecamatan" id="formFileSm" type="file">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Warna Kecamatan</label>
                            <input type="color" class="form-control form-control-color" name="wr_kecamatan" id="exampleInputText1" value="#563d7c" title="Pilih warna kecamatan">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('SuperAdmin/Kecamatan') ?>" style="text-decoration:none">Back</a>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->