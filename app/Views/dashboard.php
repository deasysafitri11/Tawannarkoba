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
                      <a href="<?= site_url('dashboard/ujiKNN'); ?>" class="btn btn-sm btn-primary mb-3 mt-3">Lakukan Klasifikasi KNN</a>
                        <h5 class="card-title" id="judul-peta">Peta Kerawanan Narkoba | Tahun 2023</h5>
                        <label for="filter-tahun" class="form-label fw-bold">Pilih Tahun:</label>
                        <select id="filter-tahun" class="form-select" style="width: auto; display: inline-block;"></select>
                        <div id="map"></div>
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
  var lat = <?= $kabupaten['latitude']; ?>;
  var lng = <?= $kabupaten['longitude']; ?>;
  var zoomLevel = 11;

  var map = new L.map('map').setView([lat, lng], zoomLevel);
  var layer = new L.TileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
  var geojsonLayer; // untuk menyimpan layer agar bisa di-refresh

  function getData(nama_kecamatan, nama_kelurahan, tahun) {
    $.ajax({
      url: '<?= site_url('peta/getdata'); ?>',
      type: 'GET',
      data: { nama_kecamatan: nama_kecamatan, nama_kelurahan: nama_kelurahan, tahun: tahun },
      success: function (response) {
        var isi = '';
        response.forEach(function (item) {
          isi += `
            <br>Jumlah Ungkap Kasus Narkotika : ${item.jml_kasus ?? '0'}
            <br>Barang Bukti Narkotika : ${item.barang_bukti ?? '-'}
            <br>Bandar : ${item.jml_bandar ?? '0'}
            <br>Jumlah Pengguna Narkotika : ${item.jml_pengguna ?? '0'}
            <br>Jumlah Lokasi Hiburan : ${item.jml_hiburan ?? '0'}
            <br>Jumlah Hunian Kos-kosan : ${item.jml_kos ?? '0'}
          `;
        });
        $('.leaflet-popup-content').append(isi);
      }
    });
  }

  function loadPetaKerawanan(tahun) {
    $.ajax({
      url: '<?= site_url('peta/getdatakerawanan'); ?>',
      type: 'GET',
      data: { tahun: tahun },
      success: function (response) {
        let kerawanan = response;

        // hapus layer lama jika ada
        if (geojsonLayer) {
          map.removeLayer(geojsonLayer);
        }

        function style(feature) {
        let warna = {
          fillColor: '#eef8b9ff', // default WASPADA
          weight: 2,
          opacity: 1,
          color: '#DC3545',
          dashArray: '3',
          fillOpacity: 0.7
        };

        kerawanan.forEach(function (item) {
          if (
            feature.properties.village.includes(item.nama_kelurahan) &&
            feature.properties.district.includes(item.nama_kecamatan)
          ) {
            feature.properties.kerawanan = item.tingkat_kerawanan;
            if (item.tingkat_kerawanan === 'RAWAN') warna.fillColor = '#d12317';
            else if (item.tingkat_kerawanan === 'WASPADA') warna.fillColor = '#d98e43';
            else warna.fillColor = '#d0e362';
          }
        });

        return warna;
      }

        // function style(feature) {
        //   let warna = {
        //     fillColor: '#d0e362', // WASPADA default
        //     weight: 2,
        //     opacity: 1,
        //     color: '#DC3545',
        //     dashArray: '3',
        //     fillOpacity: 0.7
        //   };

        //   kerawanan.forEach(function (item) {
        //     if (
        //       feature.properties.village.includes(item.nama_kelurahan) &&
        //       feature.properties.district.includes(item.nama_kecamatan)
        //     ) {
        //       if (item.jml_kasus >= 2) {
        //         warna.fillColor = '#d12317';
        //         feature.properties.kerawanan = 'RAWAN';
        //       } else if (item.jml_kasus >= 1) {
        //         warna.fillColor = '#d98e43';
        //         feature.properties.kerawanan = 'SIAGA';
        //       } else {
        //         feature.properties.kerawanan = 'WASPADA';
        //       }
        //     }
        //   });

        //   return warna;
        // }

        function onEachFeature(feature, layer) {
          layer.on('click', function (e) {
            let namaKecamatan = feature.properties.district;
            let namaKelurahan = feature.properties.village;

            layer.bindPopup(
              `Desa/Kel : ${namaKelurahan}<br>Kecamatan: ${namaKecamatan}<br>Tingkat Kerawanan : ${feature.properties.kerawanan}`
            ).openPopup();

            getData(namaKecamatan, namaKelurahan, tahun);
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

        // tampilkan GeoJSON dengan style & filter
        geojsonLayer = new L.geoJson(kecamatan, {
          style: style,
          onEachFeature: onEachFeature,
          filter: filterCilacap
        }).addTo(map);
      }
    });
  }

  // Ketika halaman pertama kali dibuka
  $(document).ready(function () {
    const tahunSelect = $('#filter-tahun');
    const currentYear = new Date().getFullYear();

    for (let i = 0; i < 10; i++) {
        const tahun = currentYear - i;
        tahunSelect.append(`<option value="${tahun}" ${i === 0 ? 'selected' : ''}>${tahun}</option>`);
    }

    const tahunAwal = tahunSelect.val();
    updateJudulPeta(tahunAwal);
    loadPetaKerawanan(tahunAwal);

    tahunSelect.on('change', function () {
        const tahunDipilih = $(this).val();
        updateJudulPeta(tahunDipilih);
        loadPetaKerawanan(tahunDipilih);
    });

    function updateJudulPeta(tahun) {
        $('#judul-peta').text(`Peta Kerawanan Narkoba | Tahun ${tahun}`);
    }
    });

  // Legend
  var legend = L.control({ position: 'bottomright' });
  legend.onAdd = function (map) {
    var div = L.DomUtil.create('div', 'info legend');
    div.innerHTML += '<i style="background: #d12317"></i> Rawan<br>';
    div.innerHTML += '<i style="background: #d98e43"></i> Siaga<br>';
    div.innerHTML += '<i style="background: #d0e362"></i> Waspada<br>';
    return div;
  };
  legend.addTo(map);
</script>

<?php
echo view('footer');
?>
