<h3><?= $title ?></h3>
<p>Halaman ini berisi mengenai data kelurahan di Kota Bogor</p>

<!-- Data Table Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kecamatan</h6>
    </div>
    <div class="card-body">

        <!-- Insert Button Start -->
        <div class="insert-button mb-2">
            <a href="<?= site_url('Admin/Kelurahan/inputForm/') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Insert Data
            </a>
        </div>
        <!-- Insert Button End -->

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kelurahan</th>
                        <th>Nama Kelurahan</th>
                        <th>Nama Kecamatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kelurahan as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->kd_kelurahan ?></td>
                            <td><?= $row->nm_kelurahan ?></td>
                            <td><?= $row->nm_kecamatan ?></td>
                            <td>
                                <a href="<?= site_url('Admin/Kelurahan/editForm/' . $row->id_kelurahan) ?>" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit Data
                                </a>
                                <a onclick="return confirm('Apakah kamu ingin menghapus data?')" href="<?= site_url('Admin/Kelurahan/deleteData/' . $row->id_kelurahan) ?>" class="btn btn-danger btn-sm">
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