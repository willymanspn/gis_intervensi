    <!-- Main Content Start -->
    <h3> <?= $title ?> </h3>
    <p>Halaman ini berisi form untuk merubah data Kecamatan</p>

    <div class="card shadow">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Edit</h5>
        </div>

        <div class="row">

            <div class="col">
                <div class="card mr-4 my-4">
                    <div class="card-body">
                        <?=
                        // Notifikasi validation
                        validation_errors('<div class="alert alert-danger">', '</div>');

                        // Notifikasi data berhasil diinput
                        if ($this->session->flashdata('pesan')) {
                            echo '<div class="alert alert-success">';
                            echo $this->session->flashdata('pesan');
                            echo '</div>';
                        }
                        ?>

                        <?= form_open('Admin/Kelurahan/editForm/' . $kelurahan->id_kelurahan) ?>

                        <div class="form-group">
                            <label for="exampleInputText1">Kode Kelurahan</label>
                            <input type="text" class="form-control" name="kd_kelurahan" id="exampleInputText1" value="<?= $kelurahan->kd_kelurahan ?>" placeholder="Masukan kode kelurahan">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Nama kelurahan</label>
                            <input type="text" class="form-control" name="nm_kelurahan" id="exampleInputText1" value="<?= $kelurahan->nm_kelurahan ?>" placeholder="Masukan nama kelurahan">
                        </div>

                        <div class="form-group">
                            <label for="inputState">kelurahan</label>
                            <select name="id_kecamatan" id="inputState" class="form-control">
                                <option value="">Pilih kecamatan</option>
                                <?php foreach ($kecamatan as $row) : ?>
                                    <option value="<?= $row->id_kecamatan ?>" <?= $row->id_kecamatan == $kelurahan->id_kecamatan  ? 'selected' : '' ?>> <?= $row->nm_kecamatan ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('Admin/Kecamatan') ?>" style="text-decoration:none">Back</a>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->