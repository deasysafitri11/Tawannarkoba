<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta Kerawanan Narkoba</title>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; margin: 0; padding: 0; }
    .navbar-bnn { background-color: rgba(26, 113, 200, 0.4); color: white; padding: 10px 0; }
    .navbar-bnn h1 { font-size: 1.8rem; margin: 0; }
    .navbar-bnn small { font-size: 0.9rem; color: #eee; }
    #map { width: 100% !important; height: 500px !important; margin-top: 20px; }
    .bg-light { background-color: #f8f9fa !important; }
    .text-danger { color: #d12317 !important; }
    .text-warning { color: #d98e43 !important; }
    .text-success { color: #d0e362 !important; }
  </style>
</head>
<body>

<header class="navbar-bnn shadow-sm mb-4">
  <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
    <div class="d-flex align-items-center mb-3 mb-md-0">
      <img src="<?= base_url('public/images/bnn.png'); ?>" alt="Logo BNN" height="65" class="me-3">
      <div>
        <h1 class="fw-bold mb-1">Tawan Narkoba</h1>
        <small>Kabupaten Cilacap | BNNK Cilacap</small>
      </div>
    </div>
    <div class="d-flex flex-wrap gap-2">
      <a href="<?= base_url(); ?>" class="btn btn-light">Beranda</a>
      <a href="https://cilacapkab.bnn.go.id/" target="_blank" class="btn btn-outline-light">Situs BNN</a>
      <a href="<?= base_url('login'); ?>" class="btn btn-outline-light">Login Admin</a>
    </div>
  </div>
</header>

<main class="main container">
  <div class="card mb-3">
    <div class="card-body">
      <h5 class="card-title">Peta Kerawanan Narkoba <span>| Tahun</span></h5>
      <label for="filter-tahun" class="form-label fw-bold">Pilih Tahun:</label>
      <select id="filter-tahun" class="form-select" style="width: auto; display: inline-block;"></select>
      <div id="map"></div>
    </div>
  </div>

  <div class="container-fluid py-2 bg-light border-top mt-2">
    <div class="row text-center">
      <div class="col-md-2"><strong>Status Kerawanan:</strong></div>
      <div class="col-md-2 text-danger">Rawan</div>
      <div class="col-md-2 text-warning">Siaga</div>
      <div class="col-md-2 text-success">Waspada</div>
      <div class="col-md-2"><strong>Sumber Data:</strong> BNNK Cilacap 2024</div>
      <div class="col-md-2"><strong>Hubungi Kami:</strong> bnnkcilacap@gmail.com</div>
    </div>
    <div class="row mt-2">
      <div class="col text-center text-muted small">
        <strong>Petunjuk:</strong> Klik wilayah pada peta untuk melihat detail jumlah kasus & status kerawanan.
      </div>
    </div>
  </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="<?= base_url('public/uploads/Cilacap.geojson'); ?>"></script>
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

    const tahunAwal = $('#filter-tahun').val();
    loadPetaKerawanan(tahunAwal);

    $('#filter-tahun').on('change', function () {
      const tahunDipilih = $(this).val();
      loadPetaKerawanan(tahunDipilih);
    });
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

</body>
</html>
