<li class="nav-item">
    <a href="{{ url('home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Beranda
        </p>
    </a>
</li>

{{-- @if ($user->level == 1) --}}
    <li class="nav-header">DATA MASTER</li>
    <li class="nav-item">
        <a href="{{ url('paket') }}" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
                Paket
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ url('outlet') }}" class="nav-link">
            <i class="nav-icon fas fa-tasks"></i>
            <p>
                Outlet
            </p>
        </a>
    </li>
    <li class="nav-header">TRANSAKSI</li>
    <li class="nav-item">
        <a href="{{ url('transaksi') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
                Transaksi
            </p>
        </a>
    </li>
    {{-- <li class="nav-header">REPORT</li>
    <li class="nav-item">
        <a href="{{ url('laporan') }}" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>
                Laporan
            </p>
        </a>
    </li> --}}
{{-- @elseif ($user->level == 2) --}}
    {{-- <li class="nav-header">TRANSAKSI</li>
    <li class="nav-item">
        <a href="{{ url('transaksi') }}" class="nav-link">
            <i class="nav-icon fas fa-shopping-cart"></i>
            <p>
                Transaksi
            </p>
        </a>
    </li> --}}
{{-- @else --}}
    {{-- <li class="nav-header">REPORT</li>
    <li class="nav-item">
        <a href="{{ url('laporan') }}" class="nav-link">
            <i class="nav-icon fas fa-print"></i>
            <p>
                Laporan
            </p>
        </a>
    </li> --}}
{{-- @endif --}}
