<li class="nav-item {{ request()->is('admin*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">
    <i class="fab fa-accusoft"></i>
    <span>Beranda</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">
<!-- Data Master -->
<div class="sidebar-heading">
    Fitur
</div>

<li class="nav-item {{ request()->is('admin/layanan*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.layanan.index') }}">
        <i class="fas fa-fw fa-wrench"></i>
    <span>Layanan</span></a>
</li>
<li class="nav-item {{ request()->is('admin/siswa*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.tipe_kendaraan.index') }}">
        <i class="fas fa-fw fa-wrench"></i>
    <span>Tipe Kendaraan</span></a>
</li>

<li class="nav-item {{ request()->is('admin/transaksi*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.transaksi.index') }}">
        <i class="fas fa-fw fa-wrench"></i>
    <span>Transaksi</span></a>
</li>

<li class="nav-item {{ request()->is('admin/tentang-kami*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.tentang_kami.index') }}">
        <i class="fas fa-fw fa-wrench"></i>
    <span>Tentang Kami</span></a>
</li>
