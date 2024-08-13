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
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    <x-sidebar-alumni/>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <x-navbar-alumni/>
      <!-- partial -->
      <div class="main-panel">
        <h6 class="mt-2 mb-4" style="color: #4C4C4C;"></h6>
        <div class="content-wrapper">
          <h5 class="card-header">Lowongan Pekerjaan</h5>
          <div class="row mb-4">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Marketing Manager</h5>
                  <p class="card-text">PT Marriot House<br> - Fulltime<br> - Surabaya, Indonesia<br> - 10,5jt - 13,5jt<br> - Dibutuhkan Pengalaman selama 2 tahun</p>
                  <a href="index.html" class="btn btn-primary">Lamar Cepat</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Software engineer</h5>
                  <p class="card-text">PT Telkom<br> - Fulltime<br> - Bandung, Indonesia<br> - 6,8jt - 9,8jt<br> - Dibutuhkan Pengalaman selama 1 tahun</p>
                  <a href="index.html" class="btn btn-primary">Lamar Cepat</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Software engineer</h5>
                  <p class="card-text">PT Chlorine<br> - Fulltime<br> - Bandung, Indonesia<br> - 9,8jt - 12,8jt<br> - Dibutuhkan Pengalaman selama 1,5 tahun</p>
                  <a href="index.html" class="btn btn-primary">Lamar Cepat</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Marketing Manager</h5>
                  <p class="card-text">PT Alfamart<br> - Fulltime<br> - Yogyakarta, Indonesia<br> - 4,8jt - 7,8jt<br> - Dibutuhkan Pengalaman selama 5 bulan</p>
                  <a href="index.html" class="btn btn-primary">Lamar Cepat</a>
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->


          <div class="content-backdrop fade"></div>
        <footer class="footer">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                            bootstrapdash.com 2020</span>
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By:
                            <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                templates</a> from
                            Bootstrapdash.com</span>
                    </div>
                </div>
            </div>
        </footer>
      </div>


    </div>
      <!-- content-wrapper ends -->
      <!-- partial:./partials/_footer.html -->
      <!-- partial -->
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