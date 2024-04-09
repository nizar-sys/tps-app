@php
    $routeActive = Route::currentRouteName();
@endphp

<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="ni ni-tv-2 text-primary"></i>
        <span class="nav-link-text">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'users.index' ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="fas fa-users text-warning"></i>
        <span class="nav-link-text">Users</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'regions.index' ? 'active' : '' }}" href="{{ route('regions.index') }}">
        <i class="fas fa-map text-success"></i>
        <span class="nav-link-text">Data Wilayah</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'districts.index' ? 'active' : '' }}" href="{{ route('districts.index') }}">
        <i class="fas fa-map text-danger"></i>
        <span class="nav-link-text">Data Kecamatan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'villages.index' ? 'active' : '' }}" href="{{ route('villages.index') }}">
        <i class="fas fa-map text-primary"></i>
        <span class="nav-link-text">Data Desa</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'votings.index' ? 'active' : '' }}" href="{{ route('votings.index') }}">
        <i class="fas fa-map text-warning"></i>
        <span class="nav-link-text">Data TPS</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'supports.index' ? 'active' : '' }}" href="{{ route('supports.index') }}">
        <i class="fas fa-users text-dark"></i>
        <span class="nav-link-text">Data Dukungan</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'categories.index' ? 'active' : '' }}"
        href="{{ route('categories.index') }}">
        <i class="fas fa-box text-dark"></i>
        <span class="nav-link-text">Data Kategori</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ $routeActive == 'logistics.index' ? 'active' : '' }}" href="{{ route('logistics.index') }}">
        <i class="fas fa-box text-dark"></i>
        <span class="nav-link-text">Data Barang</span>
    </a>
</li>
