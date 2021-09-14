<li class="nav-item {{ request()->is('pelanggan*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pelanggan.index') }}">
    <i class="fab fa-accusoft"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Data Pengguna -->
<div class="sidebar-heading">
    Data Penting
</div>
<li class="nav-item {{ request()->is('pelanggan/transaksi*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('pelanggan.transaksi.index') }}">
    <i class="fas fa-database"></i>
    <span>Transaksi</span></a>
</li>

