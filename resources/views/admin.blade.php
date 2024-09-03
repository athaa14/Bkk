<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('pages/icons/mdi.html') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <x-sidebar-admin/>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <x-navbar-admin/>
      <!-- partial -->
      <div class="main-panel">  
        <div class="content-wrapper">
            <!-- Laporan cards -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <i class="mdi mdi-account-group icon-large text-primary"></i>
                            <div class="ml-3">
                                <h2 class="card-title mb-0">{{ $totalAlumni }}</h2>
                                <p class="card-text">Alumni</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <i class="mdi mdi-domain icon-large text-success"></i>
                            <div class="ml-3">
                                <h2 class="card-title mb-0">{{ $totalPerusahaan }}</h2>
                                <p class="card-text">Perusahaan</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <i class="mdi mdi-briefcase-check icon-large text-info"></i>
                            <div class="ml-3">
                                <h2 class="card-title mb-0">0</h2>
                                <p class="card-text">Alumni Yang Bekerja</p>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body d-flex align-items-center">
                            <i class="mdi mdi-briefcase-remove icon-large text-warning"></i>
                            <div class="ml-3">
                                <h2 class="card-title mb-0">0</h2>
                                <p class="card-text">Alumni Yang Tidak Bekerja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Tahun Pagination -->
            <div class="row mt-3">
                <div class="col-md-12 mx-auto position-relative">
                    <div class="card chart-container position-relative">
                        <!-- Pagination untuk memilih tahun -->
                        <div class="pagination-container" style="position: absolute; top: 10px; right: 20px; z-index: 10;">
                            <button id="prevYear" class="btn btn-primary btn-sm">Prev</button>
                            <span id="currentYear" class="mx-2">2022</span>
                            <button id="nextYear" class="btn btn-primary btn-sm">Next</button>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-center">Jumlah Alumni Bekerja per Tahun</h4>
                            <canvas id="barChart" width="979" height="489" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Import Chart.js -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
            <script>
                const ctx = document.getElementById('barChart').getContext('2d');
    
                // Data per tahun
                const dataByYear = {
                    '2022': {
                        labels: ['PT Telkom', 'PT Chlorine', 'PT ForIT', 'PT Kabayan', 'Scola'],
                        data: [18, 8, 4, 6, 3]
                    },
                    '2023': {
                        labels: ['PT Telkom', 'PT Chlorine', 'PT ForIT', 'PT Kabayan', 'Scola'],
                        data: [7, 15, 5, 8, 4]
                    },
                    '2024': {
                        labels: ['PT Telkom', 'PT Chlorine', 'PT ForIT', 'PT Kabayan', 'Scola'],
                        data: [10, 15, 6, 20, 5]
                    }
                };
    
                // Tahun yang tersedia
                const availableYears = ['2022', '2023', '2024'];
                let currentYearIndex = 0; // Mulai dari tahun pertama
    
                // Inisialisasi grafik
                let barChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dataByYear[availableYears[currentYearIndex]].labels,
                        datasets: [{
                            label: 'Jumlah Alumni Bekerja',
                            data: dataByYear[availableYears[currentYearIndex]].data,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                display: false  // Nonaktifkan legend
                            }
                        }
                    }
                });
    
                // Event listener untuk tombol prev dan next
                document.getElementById('prevYear').addEventListener('click', function() {
                    if (currentYearIndex > 0) {
                        currentYearIndex--;
                        updateChart();
                    }
                });
    
                document.getElementById('nextYear').addEventListener('click', function() {
                    if (currentYearIndex < availableYears.length - 1) {
                        currentYearIndex++;
                        updateChart();
                    }
                });
    
                // Fungsi untuk memperbarui grafik berdasarkan tahun yang dipilih
                function updateChart() {
                    const year = availableYears[currentYearIndex];
                    document.getElementById('currentYear').textContent = year;
                    barChart.data.labels = dataByYear[year].labels;
                    barChart.data.datasets[0].data = dataByYear[year].data;
                    barChart.update();
                }
            </script>
    
            <!-- Footer -->
            <footer class="footer">
                <div class="card">
                    <div class="card-body">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
</body>
</html>