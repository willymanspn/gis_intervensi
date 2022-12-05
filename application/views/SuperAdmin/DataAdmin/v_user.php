<h3><?= $title ?></h3>
<p>Halaman ini berisi mengenai data User (admin)</p>

<!-- Data Table Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Admin</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>
        <!-- Insert Button Start -->
        <div class="insert-button mb-2">
            <a href="<?= site_url('Auth/register') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Insert Data
            </a>
        </div>
        <!-- Insert Button End -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Admin</th>
                        <th class="text-center">Username Admin</th>
                        <!-- <th class="text-center">Password Admin</th> -->
                        <th class="text-center">Foto Admin</th>
                        <th class="text-center">Role Admin</th>
                        <th class="text-center">Tanggal Masuk</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($admin as $row) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $row->nm_user ?></td>
                            <td class="text-center"><?= $row->username ?></td>
                            <!-- <td class="text-center"><?= $row->password ?></td> -->
                            <td class="text-center">
                                <img src="<?= img('profile/') . $row->ft_user ?>" style="width: 50px;" alt="Avatar">
                            </td>
                            <td class="text-center"><?= $row->nm_role ?></td>
                            <td class="text-center"><?= date('d-M-Y', $row->date_created) ?></td>
                            <td>
                                <a href="<?= site_url('SuperAdmin/DataUser/editForm/' . $row->id_user) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit Data
                                </a>
                                <a onclick="return confirm('Apakah kamu ingin menghapus data?')" href="<?= site_url('SuperAdmin/DataUser/deleteData/' . $row->id_user) ?>" class="btn btn-danger btn-sm">
                                    <i class="fas fa-eraser"></i> Delete Data
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data Table End -->