<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MyAps</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('template/setting/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('template/setting/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('template/setting/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{ url('template/setting/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-car fa-2x"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Bengkel Mobil Online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            @if(session()->get('role') == 'admin')
            @include('components._sidebar_admin');
            @elseif(session()->get('role') == 'pelanggan')
            @include('components._sidebar_pelanggan');
            @endif
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">
                                    @if(session()->get('role') == 'admin')
                                    {{$transaksi->count()}}
                                    @else
                                    {{$myTransaksi->count()}}
                                    @endif
                                </span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Transaksi Butuh Konfirmasi
                                </h6>
                                @if(session()->get('role') == 'admin')
                                @foreach($transaksi as $tran)
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">
                                            {{\Carbon\Carbon::parse($tran->waktu)->isoFormat('D MMMM Y')}} |

                                            @if($tran->status == 'menunggu')
                                            <div class="ml-1 badge badge-warning">Menunggu</div>
                                            @elseif($tran->status == 'diproses')
                                            <div class="ml-1 badge badge-info">Diproses</div>
                                            @elseif($tran->status == 'cancel')
                                            <div class="ml-1 badge badge-danger">Dicancel</div>
                                            <div class="ml-1 badge badge-alert"> Alasan :{{($tran->alasan)}}</div>
                                            @else
                                            <div class="ml-1 badge badge-success">Selesai</div>
                                            @endif
                                        </div>
                                        <span class="font-weight-bold">{{DB::table('pelanggan')->where('id',$tran->pelanggan_id)->first()->nama}} | {{-- {{ DB::table('layanan')->where('id',$myTran->layanan_id)->first()->nama}} --}}</span>
                                    </div>
                                </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('admin.transaksi.index') }}">Kelola Transaksi</a>
                                @else
                                @foreach($myTransaksi as $myTran)
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">
                                            {{\Carbon\Carbon::parse($myTran->waktu)->isoFormat('D MMMM Y')}} |

                                            @if($myTran->status == 'menunggu')
                                            <div class="ml-1 badge badge-warning">Menunggu</div>
                                            @elseif($myTran->status == 'diproses')
                                            <div class="ml-1 badge badge-info">Diproses</div>
                                            @elseif($myTran->status == 'cancel')
                                            <div class="ml-1 badge badge-danger">Dicancel</div>
                                            <div class="ml-1 badge badge-alert"> Alasan :{{($myTran->alasan)}}</div>

                                            @else
                                            <div class="ml-1 badge badge-success">Selesai</div>
                                            @endif
                                        </div>
                                        <span class="font-weight-bold">{{DB::table('pelanggan')->where('id',$myTran->pelanggan_id)->first()->nama}} | {{-- {{ DB::table('layanan')->where('id',$myTran->layanan_id)->first()->nama}} --}}</span>
                                    </div>
                                </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500" href="{{ route('pelanggan.transaksi.index') }}">Kelola Transaksi</a>
                                @endif
                            </div>
                        </li>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->guard(session()->get('role'))->user()->nama}}</span>
                                <img class="img-profile rounded-circle" src="{{ url('template/setting/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div> -->

                                @if(session()->get('role') == 'admin')
                                <form action="{{ route('admin.logout') }}" method="post" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item" id="logout-button">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </a>
                                </form>
                                @else

                                <form action="{{ route('pelanggan.logout') }}" method="post" id="logout-form">
                                    @csrf
                                    <a class="dropdown-item" id="logout-button">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Keluar
                                    </a>
                                </form>
                                @endif
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Start Your Day With Positive Thinking</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apa Anda yakin ingin keluar dari aplikasi ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tekan tombol "Ya" dibawah ini jika ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Tidak</a>

                    @if(session()->get('role') == 'admin')
                    <form action="{{ route('admin.logout') }}" method="post">
                        @else
                        <form action="{{ route('pelanggan.logout') }}" method="post">
                            @endif
                            @csrf
                            <button type="submit" class="btn btn-primary">Ya</button>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('template/setting/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('template/setting/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('template/setting/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('template/setting/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ url('template/setting/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('template/setting/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ url('template/setting/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('template/setting/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('template/setting/js/demo/datatables-demo.js') }}"></script>
    <script>
        var goFS = document.getElementById("goFS");
        goFS.addEventListener("click", function() {
            document.body.requestFullscreen();
        }, false);
    </script>
    @stack('scripts')
</body>

</html>
<script>
    var form = document.getElementById("logout-form");

    document.getElementById("logout-button").addEventListener("click", function() {
        form.submit();
    });
</script>