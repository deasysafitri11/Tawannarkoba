<?php
echo view('header');
echo view('sidebar');

function kategori_kerawanan($nilai) {
    if ($nilai <= 40) {
        return '<span class="badge text-dark" style="background-color: #ffeb3b;">Siaga</span>';
    } elseif ($nilai <= 70) {
        return '<span class="badge bg-warning text-dark">Waspada</span>';
    } else {
        return '<span class="badge bg-danger">Rawan</span>';
    }
}
?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

             
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kasus Narkoba Per Kecamatan </span></h5>

                        <div class="position-relative">
                            
                            <style>
                            .btn-share {
                                display: inline-flex;
                                align-items: center;
                                padding: 8px 16px;
                                border: 2px solid #ccc;
                                border-radius: 8px;
                                background-color: #f5f5f5;
                                color: #333;
                                font-weight: bold;
                                font-size: 14px;
                                cursor: pointer;
                                transition: all 0.2s ease-in-out;
                            }

                            .btn-share:hover {
                                background-color: #e0e0e0;
                            }

                            .btn-share i {
                                margin-right: 8px;
                                color: #666;
                            }
                        </style>
                           <div class="d-flex justify-content-end mb-3">
                                <div class="dropdown">
                                    <button class="btn-share dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-share-fill"></i> Bagikan
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="#" onclick="copyLink()"><i class="bi bi-link-45deg me-2"></i> Salin Link</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="shareToWhatsApp()"><i class="bi bi-whatsapp me-2"></i> WhatsApp</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="shareToFacebook()"><i class="bi bi-facebook me-2"></i> Facebook</a></li>
                                    <li><a class="dropdown-item" href="#" onclick="shareToTwitter()"><i class="bi bi-twitter-x me-2"></i> Twitter</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div id="reportsChart"></div>
                        </div>

                        <script>
                        function copyLink() {
                            const dummyInput = document.createElement("input");
                            dummyInput.value = window.location.href;
                            document.body.appendChild(dummyInput);
                            dummyInput.select();
                            document.execCommand("copy");
                            document.body.removeChild(dummyInput);
                            alert("Link halaman berhasil disalin!");
                        }

                        document.addEventListener("DOMContentLoaded", () => {
                            fetch("<?= base_url('dashboard/chart-data') ?>")
                                .then(response => response.json())
                                .then(result => {
                                    new ApexCharts(document.querySelector("#reportsChart"), {
                                        series: result.series,
                                        labels: result.series.map(s => s.name),
                                        chart: {
                                            height: 350,
                                            type: 'bar',
                                            toolbar: {
                                                show: true,
                                                tools: {
                                                    download: true
                                                }
                                            }
                                        },
                                        plotOptions: {
                                          bar: {
                                            horizontal: false,
                                            columnWidth: '40%', // 💡 Ubah di sini, bisa 20% - 100%
                                            endingShape: 'rounded'
                                          }
                                        },
                                        xaxis: {
                                             categories: result.categories,
                                              title: { text: 'Kecamatan' }
                                        },
                                        yaxis: {
                                          min: 0,
                                          title: { text: 'Jumlah Kasus' }
                                        },
                                        stroke: { curve: 'smooth', width: 2 },
                                        markers: { size: 4 },
                                        tooltip: {
                                            shared: true,
                                            intersect: false
                                        },
                                        legend: {
                                        show: true,
                                        position: 'top',
                                        horizontalAlign: 'center',
                                        fontSize: '14px',
                                        labels: {
                                          colors: '#333',
                                          useSeriesColors: false
                                        },
                                        markers: {
                                          width: 12,
                                          height: 12
                                        }
                                      }
                                    }).render();
                                })
                                .catch(error => console.error("Gagal memuat data chart:", error));
                        });
                        </script>
                    </div>
                </div>
            </div>

            
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <h5 class="card-title text-center">Tabel Kerawanan</h5>

                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <form method="get" action="<?= base_url('dashboard_aoc') ?>" class="mb-3">
                                    <div class="row g-2 align-items-center">
                                        <div class="col-auto">
                                        <select name="tahun" class="form-select" onchange="this.form.submit()">
                                            <option value="">-- Semua Tahun --</option>
                                            <?php foreach ($tahunList as $t): ?>
                                            <option value="<?= esc($t['tahun']) ?>" <?= ($tahunDipilih == $t['tahun']) ? 'selected' : '' ?>>
                                                <?= esc($t['tahun']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        </div>
                                    </div>
                                    </form>
                                <a href="<?= base_url('kerawanan/tambah') ?>" class="btn btn-primary btn-sm">+ Tambah Data Kerawanan</a>
                            </div>

                            <div>
                                <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="🔍 Cari..." style="width: 200px;">
                            </div>
                        </div>

                        <table id="kerawananTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nama Desa</th>
                                    <th>Bandar</th>
                                    <th>Pengedar</th>
                                    <th>Pengguna</th>
                                    <th>Klien</th>
                                    <th>Kos/THM</th>
                                    <th>Nilai</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($kerawanan)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kerawanan as $row): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($row['tahun']) ?></td>
                                            <td><?= esc($row['desa']) ?></td>
                                            <td><?= esc($row['bandar']) ?></td>
                                            <td><?= esc($row['pengedar']) ?></td>
                                            <td><?= esc($row['pengguna']) ?></td>
                                            <td><?= esc($row['klien']) ?></td>
                                            <td><?= esc($row['kosthm']) ?></td>
                                            <td><?= esc($row['nilaikerawanan']) ?></td>
                                            <td><?= kategori_kerawanan($row['nilaikerawanan']) ?></td>
                                            <td>
                                                <a href="<?= base_url('kerawanan/edit/'.$row['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('kerawanan/hapus/'.$row['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="10" class="text-center text-muted">Data tidak ditemukan. Silakan pilih tahun yang lain atau tambahkan data baru.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </section>
</main>
<script>
function getShareableURL() {
    const currentURL = new URL(window.location.href);
    const tahun = document.querySelector('select[name="tahun"]').value;

    if (tahun) {
        currentURL.searchParams.set('tahun', tahun);
    } else {
        currentURL.searchParams.delete('tahun');
    }

    return currentURL.toString();
}

function shareToWhatsApp() {
    const url = encodeURIComponent(getShareableURL());
    const text = encodeURIComponent("Cek data kerawanan narkoba ini:");
    window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
}

function shareToFacebook() {
    const url = encodeURIComponent(getShareableURL());
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
}

function shareToTwitter() {
    const url = encodeURIComponent(getShareableURL());
    const text = encodeURIComponent("Statistik kerawanan narkoba:");
    window.open(`https://twitter.com/intent/tweet?url=${url}&text=${text}`, '_blank');
}
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("searchInput");
    const table = document.getElementById("kerawananTable");
    const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    searchInput.addEventListener("input", function () {
        const filter = searchInput.value.toLowerCase();

        for (let i = 0; i < rows.length; i++) {
            const rowText = rows[i].textContent.toLowerCase();

            if (rowText.includes(filter)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    });
});
</script>


<?php echo view('footer'); ?>