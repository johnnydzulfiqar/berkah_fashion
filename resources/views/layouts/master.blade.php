<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - BERKAH FASHIONKU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('/admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('/admin/assets/img/apple-touch-icon.png ') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('/admin/assets/css/style.css') }}" rel="stylesheet">

    <!-- Template Datatables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                {{-- <img src="{{ asset('/admin/assets/img/logo.png') }} " alt=""> --}}
                <span class="d-none d-lg-block">BERKAH FASHIONKU</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->
    </header><!-- End Header -->
    

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{ route('admin.home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            @if (Auth::user()->role == 'pemilik')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{ route('ukuran.index') }}">
                                <i class="bi bi-circle"></i><span>Data Ukuran</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('satuan.index') }}">
                                <i class="bi bi-circle"></i><span>Data Satuan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('warna.index') }}">
                                <i class="bi bi-circle"></i><span>Data Warna</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('produk.index') }}">
                                <i class="bi bi-circle"></i><span>Data Produk</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('status-beli.index') }}">
                                <i class="bi bi-circle"></i><span>Status Pembelian</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('status-produksi.index') }}">
                                <i class="bi bi-circle"></i><span>Status Produksi</span>
                            </a>
                        </li>
                    </ul>
                </li><!-- End Components Nav -->
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-bag-dash"></i><span>Pembelian</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li class="nav-heading">PEMBELIAN</li>
                        <li>
                            <a href="{{ route('belibahanbaku.create') }}">
                                <i class="bi bi-circle"></i><span>Input Pembelian</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('belibahanbaku.index') }}">
                                <i class="bi bi-circle"></i><span>Daftar Pembelian</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-journal-text"></i><span>Bahan Baku </span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li class="nav-heading">BAHAN BAKU</li>
                        <li>
                            <a href="{{ route('bahan_baku.index') }}">
                                <i class="bi bi-circle"></i><span>Data Bahan Baku</span>
                            </a>
                        </li>
                        <hr>
                        <li class="nav-heading">RESTOCK</li>
                        <li>
                            <a href="{{ route('restocks.create') }}">
                                <i class="bi bi-circle"></i><span>Input Restock</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('restocks.index') }}">
                                <i class="bi bi-circle"></i><span>Daftar Restock</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Produksi</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->role == 'pemilik')
                        <li>
                            <a href="{{ route('rencana-produksi.create') }}">
                                <i class="bi bi-circle"></i><span>Input Rencana Produksi</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'pemilik' ||
                            Auth::user()->role == 'cutting' ||
                            Auth::user()->role == 'jahit' ||
                            Auth::user()->role == 'packing')
                        <li>
                            <a href="{{ route('rencana-produksi.index') }}">
                                <i class="bi bi-circle"></i><span>Daftar Rencana Produksi</span>
                            </a>
                        </li>
                        <hr>
                    @endif


                    @if (Auth::user()->role == 'cutting')
                        <li>
                            <a href="{{ route('produksi-pakaian.create') }}">
                                <i class="bi bi-circle"></i><span>Input Produksi Bag.Cutting</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'cutting'||
                         Auth::user()->role == 'pemilik')
                        <li>
                            <a href="{{ route('produksi-pakaian.index') }}">
                                <i class="bi bi-circle"></i><span>Daftar Produksi Bag.Cutting</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'jahit')
                        <li>
                            <a href="{{ route('produksi-pakaian-jahit.create') }}">
                                <i class="bi bi-circle"></i><span>Input Produksi Bag.Jahit</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'jahit'||
                         Auth::user()->role == 'pemilik')
                        <li>
                            <a href="{{ route('produksi-pakaian-jahit.index') }}">
                                <i class="bi bi-circle"></i><span>Daftar Produksi Bag.Jahit</span>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->role == 'packing')
                        <li>
                            <a href="{{ route('produksi-pakaian-packing.create') }}">
                                <i class="bi bi-circle"></i><span>Input Produksi Bag.Packing</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->role == 'packing'||
                        Auth::user()->role == 'pemilik')
                            <li>
                                <a href="{{ route('produksi-pakaian-packing.index') }}">
                                    <i class="bi bi-circle"></i><span>Daftar Produksi Bag.Packing</span>
                                </a>
                            </li>
                    @endif

                </ul>
            </li><!-- End Tables Nav -->
            @if (Auth::user()->role == 'pemilik')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse"
                        href="#">
                        <i class="bi bi-card-list"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                        <li>
                            <a href="{{ route('laporan-pembelian.index') }}">
                                <i class="bi bi-circle"></i><span>Laporan Pembelian</span>
                            </a>
                        </li>

                </li>
                <li>
                    <a href="{{ route('laporan-restock.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Restock</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan-stokbahanbaku.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Bahan Baku</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('laporan-produksi.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Produksi</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('laporan-dataproduksi-pakaian.index') }}">
                        <i class="bi bi-circle"></i><span>Laporan Data Produksi Pakaian</span>
                    </a>
                </li>

                
            </ul>
                <li class="nav-heading">User</li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('tambah_pengguna_form') }}">
                        <i class="bi bi-person-plus"></i>
                        <span>Tambah Pegawai</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('lihat-pengguna.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Semua Pegawai</span>
                    </a>
                </li>
            @endif

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('profil.show') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.logout') }}">
                <i class="bi bi-box-arrow-in-left"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Login Page Nav -->
        </ul>
    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        <section class="main-header">
            <div class="pagetitle">
                <h1>@yield('title1')</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">@yield('title2')</li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
        </section>

        @yield('main')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/admin/assets/js/main.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Template Datatables -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        new DataTable('#datatables');
    </script>

</body>

</html>
