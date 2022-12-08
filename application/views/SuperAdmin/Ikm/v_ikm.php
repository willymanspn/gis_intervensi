<h3>Halaman <?= $title ?></h3>
<p>Halaman ini berisi data mengenai pemetaan IKM yang telah mengikuti pelatihan <i>E-Commerce </i></p>

<!-- Map Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tampilan Peta</h6>
    </div>
    <div class="card-body">
        <!-- Map -->
        <div id="map" style="height: 55vh;"></div>
    </div>
</div>
<!-- Map End-->

<!-- Data Table Start -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Data IKM</h6>
    </div>
    <div class="card-body">
        <?= $this->session->flashdata('message') ?>

        <!-- Insert & Print Button Start -->
        <div class="insert-button mb-2">
            <a href="<?= site_url('SuperAdmin/Ikm/inputForm') ?>" class="btn btn-success">
                <i class="fas fa-plus"></i> Insert Data
            </a>
        </div>
        <!-- Insert & Print Button End -->

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
                        <th>Action</th>
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
                            <td>
                                <a href="<?= site_url('SuperAdmin/Ikm/editForm/' . $row->id_ikm) ?>" class="btn-circle btn-primary btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="return confirm('Apakah kamu ingin menghapus data?')" href="<?= site_url('SuperAdmin/Ikm/deleteData/' . $row->id_ikm) ?>" class="btn-circle btn-danger btn-sm">
                                    <i class="fas fa-eraser"></i>
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

<!-- Leaflet Start -->
<script>
    // var map = L.map('map').setView([lat, lng], 13);
    var map = L.map('map').setView([-6.597629, 106.799568], 13);

    // Map Layer Start

    // MapBox Base Layer Map

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    }).addTo(map);

    // Map Layer End

    // Marker Start
    // Custom Icon Marker Start
    var myIcon = L.icon({
        iconUrl: '<?= base_url('/assets/icons/markers/home.png') ?>',
        iconSize: [45, 45], // size of the icon
        iconAnchor: [22, 50], // point of the icon which will correspond to marker's location
        popupAnchor: [-3, -45] // point from which the popup should open relative to the iconAnchor
    });

    var shopIcon = L.icon({
        iconUrl: '<?= base_url('/assets/icons/markers/shop.png') ?>',
        iconSize: [45, 45], // size of the icon
        iconAnchor: [22, 40], // point of the icon which will correspond to marker's location
        popupAnchor: [-3, -35] // point from which the popup should open relative to the iconAnchor
    });
    // Custom Icon Marker End

    // Add Marker Start
    // My Location
    var myLocation = L.marker([-6.56972513394455, 106.799511615914], {
        icon: myIcon
    }).bindPopup("<b>Nama : </b>DINKUKMDAGIN <br> <b>Alamat : </b> Jl. Dadali No.4, RT.03/RW.06 ").addTo(map);

    // Industry Location
    <?php foreach ($location as $row) : ?>
        L.marker([<?= $row->latitude ?>, <?= $row->longitude ?>], {
                icon: shopIcon
            })
            .bindPopup("<b>Nama IKM</b> : <?= $row->nm_ikm ?><br>" +
                "<b>Produk IKM</b>      : <?= $row->produk_ikm ?><br>" +
                "<b>Alamat</b>          : <?= $row->alamat_ikm ?><br>" +
                "<b>Nomor HP</b>        : <?= $row->no_hp ?><br>" +
                "<b>Kecamatan</b>       : <?= $row->nm_kecamatan ?><br>" +
                "<b>Kelurahan</b>       : <?= $row->nm_kelurahan ?><br>" +
                "<b>Kategori</b>        : <?= $row->nm_kategori ?><br>")
            .addTo(map);
    <?php endforeach ?>
    // Add Marker Start

    // GeoJson Start

    // View GeoJSON Dinamis Start
    <?php foreach ($g_kecamatan as $row) : ?>
        $.getJSON("<?= base_url('assets/geojson/' . $row->gj_kecamatan) ?>", function(data) {
            geoLayer = L.geoJson(data, {
                style: function(feature) {
                    return {
                        color: '<?= $row->wr_kecamatan ?>',
                    }
                }
            }).addTo(map);
            // Menampilkan informasi wilayah
            geoLayer.eachLayer(function(layer) {
                layer.bindPopup("<?= $row->nm_kecamatan ?>");
            });
        });
    <?php endforeach ?>
    // View GeoJSON Dinamis End

    // GeoJson End
</script>
<!-- Leaflet End -->