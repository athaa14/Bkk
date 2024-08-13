<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="pages/icons/mdi.html">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
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
          <div class="row">
            <div class="card mb-4 md-4 col-md-3" style="width: 18rem;">
              <div class="card-body">
                <i class="mdi mdi-account menu-icon d-flex justify-content-center large-icon"></i>
                <h5 class="card-title text-center">Riwayat Akun Alumni</h5>
                <a href="laporanakunalumni.html" class="btn btn-primary d-flex justify-content-center">Detail</a>
              </div>
            </div>
            <div class="card mb-4 md-4 col-md-3" style="width: 18rem;">
              <div class="card-body">
                <i class="mdi mdi-domain menu-icon d-flex justify-content-center large-icon"></i>
                <h5 class="card-title text-center">Riwayat Akun Perusahaan</h5>
                <a href="laporanakunperusahaan.html" class="btn btn-primary d-flex justify-content-center">Detail</a>
              </div>
            </div>
            <div class="card mb-4 md-4 col-md-3" style="width: 18rem;">
              <div class="card-body">
                <i class="mdi mdi-bulletin-board menu-icon d-flex justify-content-center large-icon"></i>
                <h5 class="card-title text-center">Riwayat Data<br> Loker</h5>
                <a href="laporandataloker.html" class="btn btn-primary d-flex justify-content-center">Detail</a>
              </div>
            </div>
            <div class="card mb-4 md-4 col-md-3" style="width: 18rem;">
              <div class="card-body">
                <i class="mdi mdi-file-document-box-outline menu-icon d-flex justify-content-center large-icon"></i>
                <h5 class="card-title text-center">Riwayat Data Lamaran</h5>
                <a href="laporandatalamaran.html" class="btn btn-primary d-flex justify-content-center">Detail</a>
              </div>
            </div>
          </div>
          <!-- Isi tabel yang besar -->
          <div class="card">
            <div class="card-body">
              <p class="card-title text-center">Grafik Alumni</p>
              <p class="text-muted text-center">25% more traffic than previous week</p>
              <div class="row mb-3">
                <div class="col-md-12">
                  <div class="d-flex justify-content-between traffic-status ">

                    <div class="item">
                      <p class="mb-3">Bekerja</p>
                      <h5 class="font-weight-bold mb-0">93,956</h5>
                      <div class="color-border"></div>
                    </div>
                    <div class="item">
                      <p class="mb-3">Pendidikan</p>
                      <h5 class="font-weight-bold mb-0">58,605</h5>
                      <div class="color-border"></div>
                    </div>
                    <div class="item">
                      <p class="mb-3">Berwirausaha</p>
                      <h5 class="font-weight-bold mb-0">78,254</h5>
                      <div class="color-border"></div>
                    </div>
                  </div>
                </div>
              </div>
              <canvas id="audience-chart"></canvas>
            </div>
          </div>

          <div class="">
            <form class="row g-3 needs-validation" novalidate>
              <div class="col-md-3 mb-3">
                <label for="validationCustom01" class="form-label">Masukan Nama</label>
                <input type="text" class="form-control rounded-input" id="validationCustom01" value="Search Name"
                  required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom02" class="form-label">Jurusan</label>
                <select class="form-control" id="validationCustom02" aria-label="Default select example">
                  <option selected>pilih jurusan</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="searchName" class="form-label">Tahun Lulus</label>
                <input type="text" class="form-control" id="searchName" placeholder="">
              </div>
              <div class="col-md-3 mb-3 d-flex align-items-end">
                <button type="button" class="btn btn-primary btn-lg" onclick="button()">Search</button>
              </div>
              <div class="col-md-6 mb-3">
                <button type="button" class="btn btn-danger btn-icon-text" onclick="exportData()">Export
                  <i class="mdi mdi-file-check btn-icon-prepend"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Nama Lengkap</th>
                          <th>Jurusan</th>
                          <th>Tahun Lulus</th>
                          <th>Jenis Kelamin</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1"><img src="images/faces/face1.jpg" alt="image" /></td>
                          <td class="py-1">Herman Beck</td>
                          <td>RPL</td>
                          <td>2023</td>
                          <td>Laki-laki</td>
                          <td>
                            <!-- Button trigger modal -->
                            <!-- <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                              data-bs-target="#exampleModal">
                              detail
                            </a> -->
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    Nama Lengkap: Herman Beck<br> Jurusan: RPL<BR> Tahun Lulus: 2023<br> Jenis Kelamin: Laki-laki
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face2.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            Messsy Adam
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face3.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            <!-- <img src="images/faces/face3.jpg" alt="image"/> -->
                            John Richards
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face4.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            <!-- <img src="images/faces/face4.jpg" alt="image"/> -->
                            Peter Meggik
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face5.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            <!-- <img src="images/faces/face5.jpg" alt="image"/> -->
                            Edward
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face6.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            <!-- <img src="images/faces/face6.jpg" alt="image"/> -->
                            John Doe
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="images/faces/face7.jpg" alt="image" />
                          </td>
                          <td class="py-1">
                            <!-- <img src="images/faces/face7.jpg" alt="image"/> -->
                            Henry Tom
                          </td>
                          <td>
                            RPL
                          </td>
                          <td>
                            2023
                          </td>
                          <td>
                            Laki-laki
                          </td>
                          <td>
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" class="btn btn-primary btn-sm">Detail</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                              aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                      aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    ...
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                      data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>  
                            <a href="editalumni.html" class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
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
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
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
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
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
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                    bootstrapdash.com 2020</span>
                  <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a
                      href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                      href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from
                    Bootstrapdash.com</span>
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
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/file-upload.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="js/bootstrap.js"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/dash"></script>
  <!-- End custom js for this page-->
</body>

</html>