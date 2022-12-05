<h3>Halaman Kecamatan</h3>
<p>Halaman ini berisi mengenai data kecamatan di Kota Bogor</p>

<!-- Data Table Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kecamatan</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>

        <!-- Insert Button Start -->
        <div class="insert-button mb-2">
            <a href="<?= site_url('SuperAdmin/Kecamatan/inputForm/') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Insert Data
            </a>
        </div>
        <!-- Insert Button End -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kecamatan</th>
                        <th>Nama Kecamatan</th>
                        <th>Geojson Kecamatan</th>
                        <th>Warna Kecamatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kecamatan as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->kd_kecamatan ?></td>
                            <td><?= $row->nm_kecamatan ?></td>
                            <td><?= $row->gj_kecamatan ?></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-lg disable w-50" style="background-color: <?= $row->wr_kecamatan ?>;"></a>
                            </td>
                            <td>
                                <a href="<?= site_url('SuperAdmin/Kecamatan/editForm/' . $row->id_kecamatan) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit Data
                                </a>
                                <a onclick="return confirm('Apakah kamu ingin menghapus data?')" href="<?= site_url('SuperAdmin/Kecamatan/deleteData/' . $row->id_kecamatan) ?>" class="btn btn-danger btn-sm">
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