    <!-- Main Content Start -->
    <h3> <?= $title ?> </h3>
    <p>Halaman ini berisi form untuk merubah data Kecamatan</p>

    <div class="card shadow">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Form Edit</h5>
        </div>


        <?=
        // Notifikasi validation
        validation_errors('<div class="alert alert-danger">', '</div>');
        ?>

        <div class="row">

            <div class="col">
                <div class="card mr-4 my-4">
                    <div class="card-body">
                        <?= $this->session->flashdata('message') ?>
                        <?= form_open_multipart('SuperAdmin/DataUser/editForm/' . $admin->id_user) ?>

                        <div class="form-group">
                            <label for="exampleInputText1">Nama admin</label>
                            <input type="text" class="form-control" name="nm_user" id="exampleInputText1" value="<?= $admin->nm_user ?>">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Username Admin</label>
                            <input type="text" class="form-control" name="username" id="exampleInputText1" value="<?= $admin->username ?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText1">Password Admin</label>
                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                            <input type="password" class="form-control" name="password" id=" exampleInputText1">
                        </div>


                        <div class="form-group">
                            <label for="formFileSm" class="form-label">Foto Admin</label>
                            <input class="form-control form-control-sm" name="ft_user" value="<?= $admin->ft_user ?>" id="formFileSm" type="file">
                        </div>

                        <div class="form-group">
                            <label for="inputState">Role Admin</label>
                            <select name="id_role" id="inputState" class="form-control">
                                <?php foreach ($role as $row) : ?>
                                    <option value="<?= $row->id_role ?>" <?= $row->id_role == $admin->id_role  ? 'selected' : '' ?>> <?= $row->nm_role ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('SuperAdmin/DataUser') ?>" style="text-decoration:none">Back</a>

                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content End -->