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

<script>
    function searchAlumni() {
        // Get search input values
        const name = document.getElementById('searchName').value.toLowerCase();
        const jurusan = document.getElementById('searchJurusan').value;
        const tahunLulus = document.getElementById('searchTahunLulus').value;

        // Get table rows
        const rows = document.querySelectorAll('#alumniTable tr');

        rows.forEach(row => {
            // Get data attributes for the row
            const rowName = row.getAttribute('data-nama').toLowerCase();
            const rowJurusan = row.getAttribute('data-jurusan');
            const rowTahunLulus = row.getAttribute('data-tahun');

            // Check if the row matches the search criteria
            const isNameMatch = name === '' || rowName.includes(name);
            const isJurusanMatch = jurusan === '' || rowJurusan === jurusan;
            const isTahunLulusMatch = tahunLulus === '' || rowTahunLulus === tahunLulus;

            // Show or hide row based on match
            if (isNameMatch && isJurusanMatch && isTahunLulusMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>


<body>
    <div class="container-scroller d-flex">
        <!-- partial:./partials/_sidebar.html -->
        <x-sidebar-alumni />
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:./partials/_navbar.html -->
            @include('components.navbar-alumni')
            <!-- partial -->
            {{-- <div class="main-panel">
                <div class="content-wrapper">

                    <!-- Isi tabel yang besar -->

                    <div class="">
                      <div class="row g-3 needs-validation" novalidate>
                        <div class="col-md-3 mb-3">
                            <label for="searchName" class="form-label">Nama</label>
                            <input type="text" class="form-control rounded-input" id="searchName" placeholder="Search Name">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="searchJurusan" class="form-label">Jurusan</label>
                            <select class="form-control" id="searchJurusan">
                                <option value="">Pilih Jurusan</option>
                                <option value="AKL">AKL</option>
                                <option value="BR">BR</option>
                                <option value="DKV">DKV</option>
                                <option value="MLOG">MLOG</option>
                                <option value="MP">MP</option>
                                <option value="RPL">RPL</option>
                                <option value="TKJ">TKJ</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="searchTahunLulus" class="form-label">Tahun Lulus</label>
                            <select class="form-control" id="searchTahunLulus">
                                <option value="">Tahun Lulus</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 d-flex align-items-end">
                            <button type="button" class="btn btn-primary btn-lg" onclick="searchAlumni()">Search</button>
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
                                                    <th>Nis</th>
                                                    <th>Nama Alumni</th>
                                                    <th>Jurusan</th>
                                                    <th>Tahun Lulus</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="alumniTable">
                                                @foreach ($alumni as $all)
                                                <tr data-nis="{{ $all->nis }}" data-nama="{{ $all->nama }}" data-jurusan="{{ $all->jurusan }}" data-tahun="{{ $all->tahun_lulus }}">
                                                    <td class="py-1">{{ $all->nis }}</td>
                                                    <td>{{ $all->nama }}</td>
                                                    <td>{{ $all->jurusan }}</td>
                                                    <td>{{ $all->tahun_lulus }}</td>
                                                    <td>
                                                        <!-- Button trigger detail modal -->
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#adminModal-{{ $all->id }}">
                                                            Detail
                                                        </button>
                                                        <!-- Detail Modal -->
                                                        <div class="modal fade" id="adminModal-{{ $all->id }}" tabindex="-1" aria-labelledby="adminModalLabel-{{ $all->id }}" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="adminModalLabel-{{ $all->id }}">Detail Alumni</h5>
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
                                                                                                <li><strong>NIS:</strong> {{ $all->nis }}</li>
                                                                                                <li><strong>Nama:</strong> {{ $all->nama }}</li>
                                                                                                <li><strong>Jurusan:</strong> {{ $all->jurusan }}</li>
                                                                                                <li><strong>Tahun Lulus:</strong> {{ $all->tahun_lulus }}</li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="accordion" id="accordionExampleAdmin-{{ $all->id }}">
                                                                                        <div class="accordion-item">
                                                                                            <h2 class="accordion-header" id="headingAdminOne-{{ $all->id }}">
                                                                                            </h2>
                                                                                            <div id="collapseAdminOne-{{ $all->id }}" class="accordion-collapse collapse show" aria-labelledby="headingAdminOne-{{ $all->id }}" data-bs-parent="#accordionExampleAdmin-{{ $all->id }}">
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
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

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
                                                <h5 class="text-white font-weight-bold">Melanjutkan <br> Pendidikan
                                                </h5>
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
                                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                                                Free <a href="https://www.bootstrapdash.com/"
                                                    target="_blank">Bootstrap dashboard templates</a> from
                                                Bootstrapdash.com</span>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                    <!-- row end -->
                    <!-- row end -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:./partials/_footer.html -->
                <!-- partial -->
            </div> --}}
            <div class="main-panel">
                <div class="content-wrapper">
                    <h2 class="mb-4 text-center" style="color: #333;">Info Lowongan Pekerjaan</h2>
                    <div class="row" id="job-listings">
                        <!-- Job listings will be dynamically inserted here -->
                    </div>
                    <footer class="footer mt-4">
                        <div class="container">
                            <div class="text-center">
                                <span class="text-muted">© 2024 Karier Sebelas. All rights reserved.</span>
                            </div>
                        </div>
                    </footer>
                </div>

            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
            <script>
                const jobListings = [
                    {
                    title: "Marketing Manager",
                    company: "PT Marriot House",
                    location: "Surabaya, Indonesia",
                    type: "Fulltime",
                    salary: "10,5jt - 13,5jt",
                    experience: "2 tahun",
                    logo: "https://logo.clearbit.com/marriott.com",
                    deskripsi: `
                    <strong>Tentang pekerjaan ini</strong><br><br>
                    <strong>Manajer Pemasaran Industri</strong><br>
                    Bergabunglah dengan tim kami sebagai Manajer Pemasaran Industri, di mana Anda akan mengidentifikasi peluang pasar, mengembangkan rencana pemasaran yang terarah, dan melakukan analisis kesenjangan strategi. Wawasan Anda akan mendukung lini depan kami dan mendorong pertumbuhan industri yang berkelanjutan. Anda juga akan memberikan wawasan permintaan yang berharga kepada tim perencanaan produk kami dan mengoptimalkan kinerja tim melalui manajemen pemasaran yang efektif.<br><br>
                    <strong>Tanggung jawab pekerjaan:</strong><br>
                    - Wawasan Pasar: Secara proaktif temukan pergeseran pasar yang menciptakan peluang atau menimbulkan tantangan.<tr></tr>Analisis masalah pelanggan dan pilih solusi yang mengatasi kebutuhan tersebut secara efektif. Fokus pada industri seperti Pendidikan Tinggi, Pemerintah, Kesehatan, Perhotelan, dan perusahaan lainnya.<br>
                    - Manajemen pasar: Merencanakan dan melaksanakan inisiatif khusus industri untuk mendorong pertumbuhan. Mengembangkan dan memelihara sumber daya utama untuk memberdayakan fokus industri kami. Memilih, memanfaatkan, dan mempertahankan saluran industri inti untuk menjangkau pelanggan secara efektif. Membina kolaborasi eksternal untuk meningkatkan jangkauan dan nilai industri.<br>
                    - Pemberdayaan Penjualan: Melengkapi tim penjualan dengan perangkat yang diperlukan untuk meraih kesuksesan. Memberikan pelatihan penjualan yang komprehensif untuk mendukung aktivitas pra-penjualan. Menawarkan dukungan yang terarah kepada klien utama dan proyek berdampak tinggi. Memandu dan mendukung terciptanya model penjualan khusus industri yang efektif.<br>
                    - Menghasilkan Permintaan: Menyelaraskan model industri dengan aktivitas pemasaran nasional. Merencanakan dan melaksanakan kampanye pemasaran nasional untuk menghasilkan permintaan. Mengembangkan program pemasaran lokal dan regional yang disesuaikan dengan setiap segmen industri.<br><br>
                    <strong>Syarat pekerjaan:</strong><br>
                    - Minimal 5 tahun pengalaman kerja di luar negeri dengan klien industri sasaran, dengan preferensi untuk Pendidikan Tinggi, Pemerintah/Sektor Publik, Perhotelan, Layanan Kesehatan, atau MNC.<br>
                    - Pemikiran produk yang kuat dan kemampuan yang terbukti untuk mengidentifikasi peluang dan tren pasar.<br>
                    - Pengalaman yang terbukti dengan proyek Go-to-Market (GTM) yang sukses merupakan keuntungan yang signifikan.<br>
                    - Kemampuan teknis dalam produk dan solusi TIK, termasuk keakraban dengan merek seperti Aruba, Ruckus, Huawei, Cisco, dan H3C.<br>
                    - Keterampilan analitis yang sangat baik dengan kemampuan untuk mengumpulkan, menganalisis, dan memanfaatkan wawasan permintaan pelanggan untuk menginformasikan keputusan strategis.<br>
                    - Keterampilan komunikasi, koordinasi, dan persuasi yang luar biasa untuk berkolaborasi secara efektif dengan pemangku kepentingan internal dan eksternal.<br>
                    - Keterampilan komunikasi internal dan eksternal yang sangat baik.
                    `
                },
                {
                    title: "Software Engineer",
                    company: "PT Telkom",
                    location: "Bandung, Indonesia",
                    type: "Fulltime",
                    salary: "6,8jt - 9,8jt",
                    experience: "1 tahun",
                    logo: "https://logo.clearbit.com/telkom.co.id",
                    deskripsi: `
                    <strong>Tentang pekerjaan ini</strong><br>
                    <strong>Deskripsi Pekerjaan:</strong><br>
                    - Development Report di Oracle EBS<br>
                    - Development Aplikasi APEX, integrasi antara existing system maupun satellite system<br>
                    - Memimpin tim backend dan memberikan peningkatan sesuai dengan perkembangan teknologi<br>
                    - Melakukan eksplorasi terhadap penggunaan flutter, ORDS dan Oracle APEX<br><br>
                    <strong>Syarat Pekerjaan:</strong><br>
                    - Minimal lulusan S1/S2 (jurusan Teknik Informatika/Sistem Informasi)<br>
                    - Memiliki pengalaman kerja minimal 5-7 tahun sebagai senior technical developer/developer lead/data engineer<br>
                    - Memiliki pengalaman bekerja di perusahaan manufaktur, distributor atau service menjadi nilai plus<br>
                    - Menguasai Oracle Developer (EBS, RMS), Form, Report, Workflow<br>
                    - Menguasai Python, Javascript, SQL/MySQL/PLSQL, HTML, CSS, Jquery, dan ETL Tools (Talend, Pentaho, Oracle RETL)
                    `
                },
                {
                    title: "Software Engineer",
                    company: "PT Tokopedia",
                    location: "Jakarta, Indonesia",
                    type: "Fulltime",
                    salary: "9,8jt - 12,8jt",
                    experience: "1,5 tahun",
                    logo: "https://logo.clearbit.com/tokopedia.com",
                    deskripsi: `
                    <strong>Tentang pekerjaan ini</strong><br>
                    <strong>Job Description</strong><br>
                    - Development Report di Oracle EBS<br>
                    - Development Aplikasi APEX, integrasi antara existing system maupun satellite system<br>
                    - Memimpin tim backend dan memberikan peningkatan sesuai dengan perkembangan teknologi<br>
                    - Melakukan eksplorasi terhadap penggunaan flutter, ORDS dan Oracle APEX<br><br>
                    <strong>Job Requirement</strong><br>
                    - Minimal lulusan S1/S2 (jurusan Teknik Informatika/Sistem Informasi)<br>
                    - Memiliki pengalaman kerja minimal 5-7 tahun sebagai senior technical developer/developer lead/data engineer<br>
                    - Memiliki pengalaman bekerja di perusahaan manufaktur, distributor atau service menjadi nilai plus<br>
                    - Menguasai Oracle Developer (EBS, RMS), Form, Report, Workflow<br>
                    - Menguasai Python, Javascript, SQL/MySQL/PLSQL, HTML, CSS, Jquery, dan ETL Tools (Talend, Pentaho, Oracle RETL)
                    `
                },
                {
                    title: "Marketing Manager",
                    company: "PT Alfamart",
                    location: "Yogyakarta, Indonesia",
                    type: "Fulltime",
                    salary: "4,8jt - 7,8jt",
                    experience: "5 bulan",
                    logo: "https://logo.clearbit.com/alfamart.co.id",
                    deskripsi: `
                    <strong>Tentang pekerjaan ini</strong><br>
                    <strong>Job Description</strong><br>
                    - Development Report di Oracle EBS<br>
                    - Development Aplikasi APEX, integrasi antara existing system maupun satellite system<br>
                    - Memimpin tim backend dan memberikan peningkatan sesuai dengan perkembangan teknologi<br>
                    - Melakukan eksplorasi terhadap penggunaan flutter, ORDS dan Oracle APEX<br><br>
                    <strong>Job Requirement</strong><br>
                    - Minimal lulusan S1/S2 (jurusan Teknik Informatika/Sistem Informasi)<br>
                    - Memiliki pengalaman kerja minimal 5-7 tahun sebagai senior technical developer/developer lead/data engineer<br>
                    - Memiliki pengalaman bekerja di perusahaan manufaktur, distributor atau service menjadi nilai plus<br>
                    - Menguasai Oracle Developer (EBS, RMS), Form, Report, Workflow<br>
                    - Menguasai Python, Javascript, SQL/MySQL/PLSQL, HTML, CSS, Jquery, dan ETL Tools (Talend, Pentaho, Oracle RETL)
                    `
                }
                ];


                function createJobCard(job) {
                const modalId = `jobModal-${job.title.replace(/\s+/g, '-')}`;
                return `
                    <div class="col-md-6 mb-4">
                    <div class="card job-card h-100 shadow-sm">
                        <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="${job.logo}" alt="${job.company} logo" class="company-logo mr-3">
                            <h5 class="card-title mb-0">${job.title}</h5>
                        </div>
                        <h6 class="company-name">${job.company}</h6>
                        <p class="card-text">
                            <i class="fas fa-map-marker-alt"></i> ${job.location}<br>
                            <i class="fas fa-briefcase"></i> ${job.type}<br>
                            <i class="fas fa-money-bill-wave"></i> ${job.salary}<br>
                            <i class="fas fa-user-clock"></i> Pengalaman ${job.experience}
                        </p>
                        <button class="btn btn-primary apply-btn" data-bs-toggle="modal" data-bs-target="#${modalId}">
                            Selengkapnya
                        </button>
                        </div>
                    </div>
                    </div>
                    
                    <div class="modal fade" id="${modalId}" tabindex="-1" aria-labelledby="${modalId}Label" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="${modalId}Label">${job.title} - ${job.company}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>${job.deskripsi}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Lamar Sekarang</button>
                        </div>
                        </div>
                    </div>
                    </div>
                `;
                }



                $(document).ready(function() {
                    const jobListingsContainer = $('#job-listings');
                    jobListings.forEach(job => {
                        jobListingsContainer.append(createJobCard(job));
                    });

                    //   $('.apply-btn').on('click', function() {
                    //     const jobTitle = $(this).data('job');
                    //     const company = $(this).data('company');
                    //     alert(`Anda akan melamar untuk posisi ${jobTitle} di ${company}. Silakan lanjutkan ke halaman aplikasi.`);
                    //   });
                });
            </script>

            <style>
                .job-card {
                    transition: transform 0.3s ease-in-out;
                }

                .job-card:hover {
                    transform: translateY(-5px);
                }

                .company-logo {
                    width: 50px;
                    height: 50px;
                    object-fit: contain;
                }

                .company-name {
                    color: #666;
                    font-size: 0.9rem;
                }

                .apply-btn {
                    transition: background-color 0.3s ease;
                }

                .apply-btn:hover {
                    background-color: #0056b3;
                }

                .card-text i {
                    width: 20px;
                    color: #007bff;
                    margin-right: 5px;
                }
            </style>
            <!-- content-wrapper ends -->
            <!-- partial:./partials/_footer.html -->
            <!-- partial -->
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
