{{-- <ul>
    <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
    <li><a href="{{ route('user.peminjaman') }}">Peminjaman Buku</a></li>
    <li><a href="{{ route('user.pengembalian') }}">Pengembalian Buku</a></li>
    <li><a href="{{ route('user.pesan') }}">Pesan</a></li>
    <li><a href="{{ route('user.profil') }}">Profil Saya</a></li>
</ul>     --}}

<li class="sidebar-title">Menu</li>

<li class="sidebar-item  {{ request()->is('user/dashboard*') ? 'active' : '' }}">
    <a href="{{ route('user.dashboard') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Dashboard</span>
    </a>
</li>

<li class="sidebar-item has-sub {{ request()->is('user/form_peminjaman*', 'user/peminjaman*') ? 'active' : '' }}">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-bookmark-fill"></i>
        <span>Peminjaman</span>
    </a>
    <ul class="submenu {{ request()->is('user/form_peminjaman*') ? 'active' : '' }}">
        <li class="submenu-item {{ request()->is('user/form_peminjaman*') ? 'active' : '' }}">
            <a href="{{ route('user.form_peminjaman') }}">Form Peminjaman</a>
        </li>
        <li class="submenu-item {{ request()->is('user/peminjaman*') ? 'active' : '' }}">
            <a href="{{ route('user.peminjaman') }}">Riwayat Peminjaman</a>
        </li>
    </ul>
</li>

<li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-arrow-counterclockwise"></i>
        <span>Pengembalian</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item {{ request()->is('user/form_pengembalian*') ? 'active' : '' }}">
            <a href="{{ route('user.form_pengembalian') }}">Form Pengembalian</a>
        </li>
        <li class="submenu-item {{ request()->is('user/pengembalian*') ? 'active' : '' }}">
            <a href="{{ route('user.pengembalian') }}">Riwayat Pengembalian</a>
        </li>
    </ul>
</li>

<li class="sidebar-item  has-sub">
    <a href="#" class='sidebar-link'>
        <i class="bi bi-envelope-fill"></i>
        <span>Pesan</span>
    </a>
    <ul class="submenu ">
        <li class="submenu-item ">
            <a href="form-element-input.html">Masuk</a>
        </li>
        <li class="submenu-item ">
            <a href="form-element-input-group.html">Terkirim</a>
        </li>
    </ul>
</li>

<li class="sidebar-item  {{ request()->is('user/profil*') ? 'active' : '' }}">
    <a href="{{ route('user.profil') }}" class='sidebar-link'>
        <i class="bi bi-grid-fill"></i>
        <span>Profil</span>
    </a>
</li>

<li class="sidebar-item">
    <a href="{{ route('logout') }}" class='sidebar-link'
        onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-right"></i>
        <span>Logout</span>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</li>
