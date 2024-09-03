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
      <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
  </head>

  <body>
      <div class="container-scroller d-flex">
          <!-- partial:./partials/_sidebar.html -->
          <x-sidebar-admin />
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">
              <!-- partial:./partials/_navbar.html -->
              <x-navbar-admin />
              <!-- partial -->
              <div class="main-panel">
                  <h6 class="mt-2 mb-4" style="color: #4C4C4C;"></h6>
                  <div class="content-wrapper">
                      <div class="">
                        <form class="row g-3 needs-validation" novalidate>
                          <div class="d-flex justify-content-end align-items-end w-100">
                              <div class="col-md-5 mb-3">
                                  <label for="validationCustom01" class="form-label">Nama Perusahaan</label>
                                  <input type="text" class="form-control rounded-input" id="validationCustom01"
                                      placeholder="Search Name Perusahaan" required>
                                  <div class="valid-feedback">
                                      Looks good!
                                  </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                  <label for="validationCustom02" class="form-label">Role</label>
                                  <select class="form-control" id="validationCustom02" aria-label="Default select example">
                                      <option selected>Pilih Role</option>
                                      <option value="Admin">Admin</option>
                                      <option value="Perusahaan">Perusahaan</option>
                                      <option value="Alumni">Alumni</option>
                                  </select>
                              </div>
                              <div class="col-md-3 mb-3 d-flex align-items-end">
                                  <button type="button" class="btn btn-primary btn-lg" onclick="searchAlumni()">Search</button>
                              </div>
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
                                                    <th>Nama Pengguna</th>
                                                    <th>Role</th>
                                                    <th>Aksi</th> <!-- Tambahkan kolom baru untuk aksi -->
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0" id="alumni-list">
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td>
                                                            <!-- Tombol Pemantauan -->
                                                            <button type="button" class="btn btn-primary   btn-icon-text" data-toggle="modal" data-target="#monitoringModal" data-username="{{ $user->username }}">
                                                                <i class="mdi mdi-monitor btn-icon-prepend"></i> Pemantauan
                                                            </button>
                                                            <!-- Monitoring Modal -->
                                                            <div class="modal fade" id="monitoringModal" tabindex="-1" role="dialog" aria-labelledby="monitoringModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog" role="document">
                                                                  <div class="modal-content">
                                                                      <div class="modal-header">
                                                                          <h5 class="modal-title" id="monitoringModalLabel">Pemantauan Pengguna</h5>
                                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                              <span aria-hidden="true">&times;</span>
                                                                          </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                          <!-- Isi modal sesuai kebutuhan -->
                                                                          <p>Anda sedang memantau pengguna: <span id="modalUsername"></span></p>
                                                                          <!-- Tambahkan informasi tambahan atau aksi lainnya di sini -->
                                                                      </div>
                                                                      <div class="modal-footer">
                                                                          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <nav aria-label="Page navigation">
                                            <ul class="pagination justify-content-end mt-3" id="pagination">
                                                {{ $users->links('pagination::bootstrap-4') }}
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    




                      <!-- row end -->
                      {{-- <div class="row">
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
                      </div> --}}
                      <footer class="footer">
                          <div class="card">
                              <div class="card-body">
                                  <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                      <span
                                          class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
                                          ©
                                          bootstrapdash.com 2020</span>
                                      <span
                                          class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed
                                          By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                                      <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                              href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                              templates</a> from
                                          Bootstrapdash.com</span>
                                  </div>
                              </div>
                          </div>
                      </footer>
                  </div>
                  <!-- row end -->
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
