<h3><?= $title ?></h3>
<p>Halaman ini berisi data mengenai pemetaan IKM yang telah mengikuti pelatihan <i>E-Commerce </i></p>

<!-- Data Table Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data IKM</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Produk</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Kecamatan</th>
                        <th>kelurahan</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($location as $row) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nm_ikm ?></td>
                            <td><?= $row->produk_ikm ?></td>
                            <td><?= $row->alamat_ikm ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td><?= $row->nm_kecamatan ?></td>
                            <td><?= $row->nm_kelurahan ?></td>
                            <td><?= $row->nm_kategori ?></td>
                            <td><?= date('Y', strtotime($row->date_created)) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data Table End -->

<script>
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            lengthChange: false,
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ],
            columnDefs: [{
                targets: -1,
                visible: false
            }]
        });
        table.buttons().container()
            .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
    });
</script>