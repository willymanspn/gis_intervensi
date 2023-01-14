<h3>Halaman Dashboard</h3>
<p>Halaman ini berisi ringkasan mengenai data-data </p>

<!-- Data Calculation Start -->
<!-- Content Row -->
<div class="row mt-5">

    <!-- Admin Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Admin </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_adm ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Industri Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Industri Kecil Menengah (IKM)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_ikm ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-industry fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kecamatan Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kecamatan & Kelurahan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_kec ?> & <?= $num_kel ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $num_kat ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-project-diagram fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Calculation End -->

<div class="row mt-5">
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Map Vew</h6>
            </div>
            <div class="card-body">
                <!-- Map -->
                <div id="map" style="height: 46vh;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kecamatan Bogor</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar pt-4 pb-2">
                    <canvas id="myBarChart" width="350" height="296"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Leaflet Start -->
<script>
    // var map = L.map('map').setView([lat, lng], 13);
    var map = L.map('map').setView([-6.597629, 106.799568], 12);

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
    }).bindPopup("<h6><b>Nama : </b>DINKUKMDAGIN</h6> <br> <h6><b>Alamat : </b> Jl. Dadali No.4, RT.03/RW.06 </h6>").addTo(map);

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
                "<b>Kecamatan</b>       : <?= $row->nm_kelurahan ?><br>" +
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

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Bar Chart Example
    var ctx = document.getElementById("myBarChart");
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Bogor Selatan", "Bogor Timur", "Bogor Tengah", "Bogor Barat", "Bogor Utara", "Tanah Sareal"],
            datasets: [{
                label: "Total",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: [
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=1")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=2")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=3")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=4")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=5")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kecamatan FROM tb_ikm WHERE id_kecamatan=6")->num_rows() ?>,
                ],
                backgroundColor: ['#3863FF', '#FF3940', '#39CB3A', '#FFF000', '#F237FF', '#A94A89'],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'kecamatan'
                    },
                    gridLines: {
                        display: true,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 25,
                        maxTicksLimit: 7,
                        padding: 5,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                }
            },
        }
    });
</script>
<!-- Leaflet End -->