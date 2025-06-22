<?php
echo view('header'); // memanggil file view header.php
echo view('sidebar'); // memanggil file view sidebar.php
?>

<main id="main" class="main">
    <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Hayyy</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Tanggal</a></li>
                    <li><a class="dropdown-item" href="#">Bulan</a></li>
                    <li><a class="dropdown-item" href="#">Tahun</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pelapor <span>|Tahun ini</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>
                    <div class="ps-3">
                      <h6>145</h6>                    
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Tanggal</a></li>
                    <li><a class="dropdown-item" href="#">Bulan</a></li>
                    <li><a class="dropdown-item" href="#">Tahun</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Pelaku <span>|Tahun ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                      <h6>264</h6>                     
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->
      
            <!-- Customers Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Tanggal</a></li>
                    <li><a class="dropdown-item" href="#">Bulan</a></li>
                    <li><a class="dropdown-item" href="#">Tahun</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Jumlah pelaku <span>|Keseluruhan</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa fa-user-circle" aria-hidden="true"></i>
                    </div>
                    <div class="ps-3">
                      <h6>64</h6>                     
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Tanggal</a></li>
                    <li><a class="dropdown-item" href="#">Bulan</a></li>
                    <li><a class="dropdown-item" href="#">Tahun</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Kasus Narkoba Pada Tiap Kecamatan<span>/Periode 2019-2023</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: '2019',
                          data: [31, 40, 28, 51, 42, 82, 56, 19, 5, 12, 20, 7, 22, 2, 21, 18],
                        }, {
                          name: '2020',
                          data: [11, 32, 45, 32, 34, 52, 41, 22, 5, 12, 9, 11, 8, 27, 4, 10]
                        }, {
                          name: '2021',
                          data: [15, 11, 32, 18, 9, 24, 11, 50, 22, 9, 45, 20, 9, 32, 23, 15]
                        }, {
                          name: '2022',
                          data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
                        }, {
                          name: '2023',
                          data: [23, 10, 30, 17, 5, 9, 2, 15, 20, 8, 32, 9, 3, 4, 1, 6]                                                                                           
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'dateletter',
                          categories: ["Cilacap Selatan", "Cilacap Tengah", "Cilacap Utara", "Cipari", "Gandrungmangu", "Jeruklegi", "Karang Pucung", "Kawunganten", "Kedungreja", "Kesugihan", "Kroya", "Majenang", "Maos", "Nusawungu", "Sampang", "Sidareja"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Tanggal</a></li>
                    <li><a class="dropdown-item" href="#">Bulan</a></li>
                    <li><a class="dropdown-item" href="#">Tahun</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Data <span>| Per Tahun</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal</th>
                        <th scope="col">Kasus</th>
                        <th scope="col">Umur</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">sukimin</a></th>
                        <td>asalnya ini</td>
                        <td><a href="#" class="text-primary">narkoba</a></td>
                        <td>100</td>
                        
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">paijo</a></th>
                        <td>kotawaru</td>
                        <td><a href="#" class="text-primary">ganja</a></td>
                        <td>9</td>
                        <!-- <td><span class="badge bg-warning">Pending</span></td> -->
                      </tr>                    
                      <tr>
                        <!-- <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td> -->
                        <!-- <td>$67</td> -->
                        <!-- <td><span class="badge bg-danger">Rejected</span></td> -->
                      </tr>                   
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->           
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">                               
       

      </div>
    </section>
</main>

<?php
echo view('footer'); // memanggil file view footer.php
?>
