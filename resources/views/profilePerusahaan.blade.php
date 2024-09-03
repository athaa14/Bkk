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
      {{-- @include('components.navbar-alumni') --}}
      <!-- partial -->
      <div class="main-panel">
        <h6 class="mt-2 mb-4" style="color: #4C4C4C;"></h6>
        <div class="content-wrapper">
          <div class="col-lg-12 mb-4 order-0">
              <div class="card mb-4">
                  <h5 class="card-header">Settings Profile</h5>
                  <!-- Account -->
                  <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img src="images/faces/face5.jpg" alt="user-avatar" class="d-block rounded mr-4"
                              height="90px" width="90px" id="uploadedAvatar" />
                          <div class="button-wrapper">
                              <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                  <span class="d-none d-sm-block">Upload new photo</span>
                                  <i class="bx bx-upload d-block d-sm-none"></i>
                                  <input type="file" id="upload" class="account-file-input" hidden
                                      accept="image/png, image/jpeg" />
                              </label>
                              <button type="button"
                                  class="btn btn-outline-secondary account-image-reset mb-4">
                                  <i class="bx bx-reset d-block d-sm-none"></i>
                                  <span class="d-none d-sm-block">Reset</span>
                              </button>

                              <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <form id="formAccountSettings" method="POST" onsubmit="return false">
                          <div class="row g-3 ">
                              <div class="mb-3 col-md-6">
                                  <label for="username" class="form-label" >Username</label>
                                  <input class="form-control" type="text" id="username" name="username"
                                      value="{{$perusahaanLogin->username}}" autofocus />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                                  <input type="text" class="form-control" id="tahun_lulus" name="tahun_lulus"
                                      placeholder="" maxlength="6" value="{{$perusahaanLogin->nama_perusahaan}}" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
                                  <input class="form-control" type="text" name="bidang_usaha" id="bidang_usaha"
                                      value="{{$perusahaanLogin->bidang_usaha}}" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="no_telepon" class="form-label">No Telepon</label>
                                  <input class="form-control" type="text" name="no_telepon" id="no_telepon"
                                      value="{{$perusahaanLogin->jenis_kelamin}}" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="alamat" class="form-label">Alamat</label>
                                  <input class="form-control" type="text" name="alamat" id="alamat"
                                      value="{{$perusahaanLogin->alamat}}" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="alamat" class="form-label">Alamat Lengkap</label>
                                  <input class="form-control" type="text" id="alamat" name="alamat"
                                      {{-- value="{{$alumniLogin->alamat}}" placeholder="" /> --}}
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="provinsi" class="form-label">Provinsi</label>
                                  <input type="text" class="form-control" id="provinsi"
                                      name="provinsi" value="" />
                              </div>
                              {{-- <div class="mb-3 col-md-6">
                                  <label class="form-label" for="phoneNumber">No telp</label>
                                  <div class="input-group input-group-merge">
                                      <span class="input-group-text">US (+1)</span>
                                      <input type="number" id="phoneNumber" name="phoneNumber"
                                          class="form-control" placeholder="202 555 0111" />
                                  </div>
                              </div> --}}
                              <div class="mb-3 col-md-6">
                                  <label for="kota" class="form-label">Kota/Kabupaten</label>
                                  <input type="text" class="form-control" id="kota" name="kota"
                                      placeholder="" value="" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="kecamatan" class="form-label">Kecamatan</label>
                                  <input class="form-control" type="text" id="kecamatan" name="kecamatan"
                                      placeholder="" value="" />
                              </div>
                              <div class="mb-3 col-md-6">
                                  <label for="kelurahan" class="form-label">Kelurahan</label>
                                  <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                      placeholder="" maxlength="6" value="" />
                              </div>
                          </div>
                          <div class="mt-2">
                              <a href="admin.html" type="submit" class="btn btn-primary me-2">Save changes</a>
                          </div>
                      </form>
                  </div>
                  <!-- /Account -->
              </div>

              <!--/ Total Revenue -->

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