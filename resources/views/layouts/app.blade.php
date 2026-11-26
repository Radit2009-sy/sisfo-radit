<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SISFO Akademik')</title>
    <link href="{{ asset('sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
            <div class="sidebar-brand-icon"><i class="fas fa-graduation-cap"></i></div>
            <div class="sidebar-brand-text mx-3">SISFO <sup>Akademik</sup></div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Data Master</div>
        <li class="nav-item {{ request()->routeIs('kelas.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('kelas.index') }}"><i class="fas fa-fw fa-school"></i><span>Data Kelas</span></a></li>
        <li class="nav-item {{ request()->routeIs('siswa.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('siswa.index') }}"><i class="fas fa-fw fa-user-graduate"></i><span>Data Siswa</span></a></li>
        <li class="nav-item {{ request()->routeIs('guru.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('guru.index') }}"><i class="fas fa-fw fa-chalkboard-teacher"></i><span>Data Guru</span></a></li>
        <li class="nav-item {{ request()->routeIs('mapel.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('mapel.index') }}"><i class="fas fa-fw fa-book"></i><span>Data Mata Pelajaran</span></a></li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">Akademik &amp; Nilai</div>
        <li class="nav-item {{ request()->routeIs('nilai.*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('nilai.index') }}"><i class="fas fa-fw fa-star"></i><span>Nilai Siswa</span></a></li>
        <hr class="sidebar-divider d-none d-md-block">
        <div class="text-center d-none d-md-inline"><button class="rounded-circle border-0" id="sidebarToggle"></button></div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="GET" action="{{ url()->current() }}">
                    <div class="input-group">
                        <input type="text" name="q" value="{{ request('q') }}" class="form-control bg-light border-0 small" placeholder="Cari data akademik...">
                        <div class="input-group-append"><button class="btn btn-primary" type="submit"><i class="fas fa-search fa-sm"></i></button></div>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                            <span class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center font-weight-bold" style="width:2rem;height:2rem;font-size:.75rem">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}S</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="container-fluid">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="fas @yield('icon', 'fa-star') text-primary mr-1"></i> @yield('heading')</h1>
                    @yield('action')
                </div>
                @if (session('success'))<div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button class="close" data-dismiss="alert">&times;</button></div>@endif
                @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>@endif
                @yield('content')
            </div>
        </div>
        <footer class="sticky-footer bg-white">
            <div class="container my-auto"><div class="copyright text-center my-auto"><span>Copyright &copy; {{ date('Y') }} Sistem Informasi Akademik (SISFO XI RPL 1)</span></div></div>
        </footer>
    </div>
</div>

<div class="modal fade" id="logoutModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content">
    <div class="modal-header"><h5 class="modal-title">Yakin ingin keluar?</h5><button class="close" data-dismiss="modal">&times;</button></div>
    <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-primary">Logout</button></form>
    </div>
</div></div></div>

<script src="{{ asset('sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('sb-admin-2/js/sb-admin-2.min.js') }}"></script>
</body>
</html>
