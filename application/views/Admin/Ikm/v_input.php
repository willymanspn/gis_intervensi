    <!-- Main Content Start -->
    <h3>Halaman <?= $title ?> </h3>
    <p>Halaman ini berisi form untuk menambahkan data IKM</p>

    <div class="card shadow">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Insert Data Form</h5>
        </div>

        <div class="row">

            <!-- Map View Start -->
            <div class="col">
                <div class="card ml-4 my-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Map View</h6>
                    </div>
                    <div class="card-body">
                        <!-- Map Start -->
                        <div id="map" style="height: 100vh;"></div>
                        <!-- Map Start -->
                    </div>
                </div>
            </div>
            <!-- Map View End -->

            <!-- Table View Start -->
            <div class="col">
                <div class="card mr-4 my-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">IKM Data Form</h6>
                    </div>
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

                        <?= form_open() ?>
                        <div class="form-group">
                            <label for="exampleInputText1">Nama IKM</label>
                            <input type="text" class="form-control" name="nm_ikm" id="exampleInputText1" placeholder="Masukan nama ikm" required>
                        </div>

                        <div class="form-group">
                            <div class="row mx-auto">
                                <label for="exampleFormControlTextarea1">Nama Produk</label>
                            </div>
                            <div class="row mx-auto">
                                <select name="produk_ikm[]" class="selectpicker" multiple data-live-search="true">
                                    <?php foreach ($produk as $row) : ?>
                                        <option value="<?= $row->nm_produk ?>"><?= $row->nm_produk ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="exampleInputText2">Produk</label>
                            <input type="text" class="form-control" name="produk_ikm" id="exampleInputText2" placeholder="Masukan nama produk" required>
                        </div> -->

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" name="alamat_ikm" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText2">Nomor HP</label>
                            <input type="text" class="form-control" name="no_hp" id="exampleInputText2" placeholder="Masukan no.hp" required>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Kecamatan</label>
                            <select name="id_kecamatan" class="form-control" required>
                                <option selected>Pilih kecamatan</option>
                                <?php foreach ($kecamatan as $row) : ?>
                                    <option value="<?= $row->id_kecamatan ?>"><?= $row->nm_kecamatan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Kelurahan</label>
                            <select name="id_kelurahan" class="form-control" required>
                                <option selected>Pilih kelurahan</option>
                                <?php foreach ($kelurahan as $row) : ?>
                                    <option value="<?= $row->id_kelurahan ?>"><?= $row->nm_kelurahan ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputState">Kategori Produk</label>
                            <select name="id_kategori" class="form-control" required>
                                <option selected>Pilih kategori produk</option>
                                <?php foreach ($kategori as $row) : ?>
                                    <option value="<?= $row->id_kategori ?>"><?= $row->nm_kategori ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Tanggal</label>
                            <input type="date" id="Tanggal" name="date_created" class="form-control datepicker" placeholder="Masukan Tanggal" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText3">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="Latitude" placeholder="Masukan latitude" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputText4">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="Longitude" placeholder="Masukan longitude" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <a class="btn btn-warning" href="<?= site_url('Admin/Ikm') ?>" style="text-decoration:none">Back</a>
                        <?= form_close() ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table View End -->

    <!-- Main Content End -->

    <!-- Leaflet Start -->
    <script>
        // var map = L.map('map').setView([lat, lng], 13);
        var map = L.map('map').setView([-6.597629, 106.799568], 13);

        // Layer Peta Start

        // Open Street Base Layer Map
        // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);

        // MapBox Base Layer Map
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11'
        }).addTo(map);

        // Layer Peta End

        // Marker Start
        var latInput = document.querySelector("[name=latitude]");
        var lngInput = document.querySelector("[name=longitude]");

        var curLocation = [0, 0];
        if (curLocation[0] == 0 && curLocation[1] == 0) {
            curLocation = [-6.569434543661321, 106.79954685480082]
        }

        map.attributionControl.setPrefix(false);

        var marker = new L.marker(curLocation, {
            draggable: 'true'
        });

        marker.on('dragend', function(event) {
            var position = marker.getLatLng();
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            $("#Latitude").val(position.lat);
            $("#Longitude").val(position.lng).keyup();
        });

        // Saat dipindahkan maka merubah isi dari Lat dan Lng
        $("#Latitude,#Longitude").change(function() {
            var position = [parseInt($("#Latitude").val()), parseInt($("#Longitude").val())];
            marker.setLatLng(position, {
                draggable: 'true'
            }).bindPopup(position).update();
            map.panTo(position);
        });

        map.on("click", function(e) {
            var lat = e.latlng.lat;
            var lng = e.latlng.lng;
            if (!marker) {
                marker = L.marker(e.latlng).addTo(map);
            } else {
                marker.setLatLng(e.latlng);
            }
            latInput.value = lar;
            lngInput.value = lng;
        });

        map.addLayer(marker);
        // Marker End
    </script>