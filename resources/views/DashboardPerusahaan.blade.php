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
   <x-sidebar-perusahaan/>   
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <x-navbar-perusahaan/>
      <!-- partial -->  
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
           <div class="col-lg-12 grid-margin stretch-card justify-content-center">
            <div class="col-md-10">
              <div class="card">
                <div class="card-body">
                  <!-- Isi tabel yang besar -->
                  <p class="card-title text-center">Grafik Lamaran Masuk</p>
                  <p class="text-muted text-center">25% more traffic than previous years</p>
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="d-flex justify-content-between traffic-status ">

                        <div class="item">
                          <p class="mb-">Chlorine</p>
                          <h5 class="font-weight-bold mb-0">93,956</h5>
                          <div class="color-border"></div>
                        </div>
                        <div class="item">
                          <p class="mb-">ForIt</p>
                          <h5 class="font-weight-bold mb-0">58,605</h5>
                          <div class="color-border"></div>
                        </div>
                        <div class="item">
                          <p class="mb-">Pt Telkom</p>
                          <h5 class="font-weight-bold mb-0">78,254</h5>
                          <div class="color-border"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <canvas id="audience-chart"></canvas>
                </div>
              </div>
            </div>
           </div>
          </div>
          <div class="">
            </form>
          </div>
          <div class="row">
          </div>
          <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-briefcase text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold">Bekerja</h5>
                      <p class="mt-2 text-white card-text">300+ Alumni</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-school text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold">Melanjutkan <br> Pendidikan</h5>
                      <p class="mt-2 text-white card-text">400+ Alumni</p>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-store text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <h5 class="text-white font-weight-bold">Berwirausaha</h5>
                      <p class="mt-2 text-white card-text">200+ Alumni</p>
                    </div>
                  </div>
                </div>
              </div>              
            </div>
          </div>
          <footer class="footer">
            <div class="card">
              <div class="card-body">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
                </div>
              </div>
            </div>
          </footer>
          <!-- row end -->
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