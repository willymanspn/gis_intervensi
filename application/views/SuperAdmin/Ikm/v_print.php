<h3><?= $title ?></h3>
<p>Halaman ini berisi data mengenai pemetaan IKM yang telah mengikuti pelatihan <i>E-Commerce </i></p>


<div class="row">
    <div class="col">
        <!-- Doughnut Chart Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Kategori IKM</h6>
            </div>
            <div class="card-body pb-4">
                <div class="chart-pie">
                    <canvas id="myPieChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Doughnut Chart End-->
    <div class="col">
        <!-- Doughnut Chart Start -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">IKM Per-Kecamatan</h6>
            </div>
            <div class="card-body py-1">
                <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
        </div>
        <!-- Doughnut Chart End-->
    </div>
</div>

<div class="row">
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
                            <th>Tahun</th>
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
</div>
<!-- Data Table End -->

<script>
    // Doughnut Chart Start
    var ctx = document.getElementById('myPieChart').getContext('2d');
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Makanan dan Minuman", "Non Makanan dan Minuman"],
            datasets: [{
                data: [
                    <?= $this->db->query("SELECT id_kategori FROM tb_ikm WHERE id_kategori=1")->num_rows() ?>,
                    <?= $this->db->query("SELECT id_kategori FROM tb_ikm WHERE id_kategori=2")->num_rows() ?>,
                ],
                backgroundColor: ['#3863FF', '#FF3940'],
            }],
        },
        options: {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                position: 'bottom'
            },
            tooltips: {
                mode: "dataset"
            }
        },
    });
    // Doughnut Chart End

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
                displayColors: true,
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

    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            lengthChange: false,
            buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    },
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