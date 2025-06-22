<?php
echo view('header');
echo view('sidebar');
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tawan Narkoba</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Tawan Narkoba</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Full width column -->
            <div class="col-12">
                <div class="card info-card customers-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Peta Kerawanan Narkoba <span>| 2024 </span></h5>
                        <div id="map" style="width: 100%; height: 500px;"></div>
                    </div>
                </div>
            </div><!-- End Full Width Column -->
        </div>
    </section>
</main>

<!-- Tambahkan style untuk memastikan peta benar-benar full -->
<style>
    #map {
        width: 100% !important;
        height: 500px !important;
    }
</style>

<script type="text/javascript" src="<?php echo base_url('public/uploads/Cilacap.geojson'); ?>"></script>
<script type="text/javascript">
    var lat = <?php echo $kabupaten['latitude']; ?>;
    var lng = <?php echo $kabupaten['longitude']; ?>;
    var zoomLevel = 10;

    var map = new L.map('map').setView([lat, lng], zoomLevel);
    var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    function getData(nama_kecamatan, nama_kelurahan) {
        $.ajax({
            url: '<?php echo site_url('getdata'); ?>',
            type: 'GET',
            data: {
                nama_kecamatan: nama_kecamatan,
                nama_kelurahan: nama_kelurahan
            },
            success: function(response) {
                var isi = '';
                var obj = JSON.stringify(response);
                var res = JSON.parse(obj);
                res.map(function(item) {
                    isi = `Jumlah Kasus : ${item.jml_kasus}<br>Jumlah Klien : ${item.jml_klien}`;
                    $('.leaflet-popup-content').append(`<br>${isi}`);
                });
            }
        });
    }

    var kerawanan = [];

    $.ajax({
        url: '<?php echo site_url('getdatakerawanan'); ?>',
        type: 'GET',
        success:function(response) {
            var obj = JSON.stringify(response);
            var res = $.parseJSON(obj);
            kerawanan = res;

            function style(feature) {
                let warna = {
                    fillColor: '#d0e362', // default WASPADA
                    weight: 2,
                    opacity: 1,
                    color: '#DC3545',
                    dashArray: '3',
                    fillOpacity: 0.7
                };

                kerawanan.map(function(item) {
                    if (
                        feature.properties.village.includes(item.nama_kelurahan) &&
                        feature.properties.district.includes(item.nama_kecamatan)
                    ) {
                        if (item.jml_kasus >= 2) {
                            warna.fillColor = '#d12317';
                            feature.properties.kerawanan = 'RAWAN';
                        } else if (item.jml_kasus >= 1) {
                            warna.fillColor = '#d98e43';
                            feature.properties.kerawanan = 'SIAGA';
                        } else {
                            feature.properties.kerawanan = 'WASPADA';
                        }
                    }
                });

                return warna;
            }

            function onEachFeature(feature, layer) {
                layer.on('click', function(e) {
                    let namaKecamatan = feature.properties.district;
                    let namaKelurahan = feature.properties.village;

                    layer.bindPopup(
                        `Desa/Kel : ${namaKelurahan}<br>Kecamatan: ${namaKecamatan}<br>Tingkat Kerawanan : ${feature.properties.kerawanan}`
                    ).openPopup();

                    getData(namaKecamatan, namaKelurahan);
                });

                L.marker(layer.getBounds().getCenter(), {
                    icon: L.divIcon({
                        className: 'text-danger fw-bold',
                        iconSize: [100, 10]
                    })
                }).addTo(map);
            }

            function filterCilacap(feature) {
                return feature.properties.regency.includes('Cilacap');
            }

            const geojson = new L.geoJson(kecamatan, {
                style: style,
                onEachFeature: onEachFeature,
                filter: filterCilacap
            }).addTo(map);
        }
    });

    var legend = L.control({position: 'bottomright'});
    legend.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'info legend');
        div.innerHTML += '<i style="background: #FFC107"></i> Area Cilacap<br>';
        div.innerHTML += '<i style="background: #DC3545"></i> Batas Kecamatan<br>';
        return div;
    };
    legend.addTo(map);
</script>

<?php
echo view('footer');
?>
