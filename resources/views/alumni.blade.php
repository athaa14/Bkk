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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
</head>
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
                        <div class="row g-3 needs-validation" novalidate>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom01" class="form-label">Nama</label>
                                <input type="text" class="form-control rounded-input" id="validationCustom01"
                                    placeholder="Search Name" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02" class="form-label">Jurusan</label>
                                <select class="form-control" id="validationCustom02"
                                    aria-label="Default select example">
                                    <option selected>pilih jurusan</option>
                                    <option value="1">AKL</option>
                                    <option value="2">BR</option>
                                    <option value="3">DKV</option>
                                    <option value="4">MLOG</option>
                                    <option value="5">MP</option>
                                    <option value="6">RPL</option>
                                    <option value="7">TKJ</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3"> 
                                <label for="searchName" class="form-label">Tahun Lulus</label>
                                <input type="text" class="form-control" id="searchName" placeholder="">
                            </div>
                            <div class="col-md-3 mb-3 d-flex align-items-end">
                                <button type="button" class="btn btn-primary btn-lg"
                                    onclick="searchAlumni()">Search</button>
                            </div>
                            <div class="col-md-9 d-flex justify-content-end">
                                {{-- <a href="{{ route('/') }}" class="btn btn-warning">Export</a> --}}
                            </div>
                              <div class="col-md-5 mb-3">
                                <form action="/upload" method="POST" enctype="multipart/form-data">
                                  @csrf
                                  <div class="input-group">
                                    <input type="file" name="file" class="form-control">
                                    <button type="submit" class="btn btn-warning btn-icon-text">
                                      Import
                                      <i class="mdi mdi-file-upload btn-icon-prepend"></i>
                                    </button>
                                </div>  
                              </form>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nik</th>
                                                    <th>Nama Alumni</th>
                                                    <th>Jurusan</th>
                                                    <th>Tahun Lulus</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="alumni-table">
                                                @foreach ($alumni as $all)
                                                <tr>
                                                    <td class="py-1">{{ $all->nik }}</td>
                                                    <td>{{ $all->nama_lengkap }}</td>
                                                    <td>{{ $all->jurusan }}</td>
                                                    <td>{{ $all->tahun_lulus }}</td>
                                                    <td>
                                                        <!-- Button trigger detail modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $all->nik }}">
                                                            Detail
                                                        </button>
                    
                                                        <!-- Detail Modal -->
                                                        <div class="modal fade" id="exampleModal-{{ $all->nik }}" tabindex="-1" aria-labelledby="exampleModalLabel-{{ $all->nik }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel-{{ $all->nik }}">Detail Alumni</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="col-md-4 d-flex justify-content-center">
                                                                                    <img src="{{ $all->avatar_url }}" class="img-fluid rounded-circle" alt="Avatar" style="width: 150px; height: 150px;">
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <div class="card mb-3">
                                                                                        <div class="card-body">
                                                                                            <h6 class="card-title">Informasi Alumni</h6>
                                                                                            <ul class="list-unstyled">
                                                                                                <li><strong>NIS:</strong> {{ $all->nik }}</li>
                                                                                                <li><strong>Nama:</strong> {{ $all->nama_lengkap }}</li>
                                                                                                <li><strong>Jurusan:</strong> {{ $all->jurusan }}</li>
                                                                                                <li><strong>Tahun Lulus:</strong> {{ $all->tahun_lulus }}</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="accordion" id="accordionExample-{{ $all->nik }}">
                                                                                        <div class="accordion-item">
                                                                                            <h2 class="accordion-header" id="headingOne-{{ $all->nik }}">
                                                                                            </h2>
                                                                                            <div id="collapseOne-{{ $all->nik }}" class="accordion-collapse collapse show" aria-labelledby="headingOne-{{ $all->id }}" data-bs-parent="#accordionExample-{{ $all->id }}">
                                                                                                <div class="accordion-body">
                                                                                                    {{ $all->additional_info }}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                    
                                                        <!-- Edit link -->
                                                        <a href="{{ route('editalumni', $all->nik) }}" class="btn btn-danger btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-left">
                                        {{ $alumni->links('vendor.pagination.bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                  
                    <!-- row end --> 
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
                                        By: <a href="https://www.themewagon.com/"
                                            target="_blank">ThemeWagon</a></span>
                                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                                            href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard
                                            templates</a> from
                                        Bootstrapdash.com</span>
                                </div>
                            </div>
                        </div>
                </div>
                </footer>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html>
