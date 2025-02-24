@php
    $menuItems = [
        ['route' => 'dashboard', 'icon' => 'fa-home', 'label' => 'Bảng điều khiển'],
        ['route' => 'employees', 'icon' => 'fa-users', 'label' => 'Nhân viên'],
        ['route' => 'jobs', 'icon' => 'fa-briefcase', 'label' => 'Công việc'],
        ['route' => 'job_history', 'icon' => 'fa-history', 'label' => 'Lịch sử công việc'],
        ['route' => 'job_grades', 'icon' => 'fa-star', 'label' => 'Cấp bậc công việc'],
        ['route' => 'regions', 'icon' => 'fa-asterisk', 'label' => 'Vùng miền'],
        ['route' => 'countries', 'icon' => 'fa-flag', 'label' => 'Quốc gia'],
        ['route' => 'locations', 'icon' => 'fa-map-marker-alt', 'label' => 'Địa điểm'],
        ['route' => 'departments', 'icon' => 'fa-building', 'label' => 'Phòng ban'],
        ['route' => 'manager', 'icon' => 'fa-user', 'label' => 'Quản lý'],
    ];
@endphp

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60"
        width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @foreach ($segments as $key => $segment)
            <li class="breadcrumb-item mt-2">
                <a href="{{ '/' . implode('/', array_slice($segments, 0, $key + 1)) }}">
                    {{ ucfirst($segment) }}
                </a>
            </li>
        @endforeach
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('logout') }}">
                <i class="fas fa-sign-out-alt"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">System</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                @foreach ($menuItems as $item)
                    <li class="nav-item">
                        <a href="{{ url('admin/' . $item['route']) }}"
                            class="nav-link @if (Request::segment(2) == $item['route']) active @endif">
                            <i class="nav-icon fa {{ $item['icon'] }}"></i>
                            <p>{{ $item['label'] }}</p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </nav>
    </div>
</aside>
