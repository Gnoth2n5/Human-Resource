<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/dashboard') }}" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">HR</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="" class="d-block">{{ Auth::user()->full_name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @php
                    $role = Auth::user()->is_role;
                    $routes = [
                        'admin' => [
                            ['url' => 'admin/dashboard', 'icon' => 'fa-home', 'text' => 'Trang chủ'],
                            ['url' => 'admin/employees', 'icon' => 'fa-users', 'text' => 'Nhân viên'],
                            ['url' => 'admin/jobs', 'icon' => 'fa-briefcase', 'text' => 'Công việc'],
                            ['url' => 'admin/departments', 'icon' => 'fa-building', 'text' => 'Phòng ban'],
                            ['url' => 'admin/payroll', 'icon' => 'fa-credit-card', 'text' => 'Lương'],
                            ['url' => 'admin/history-salary', 'icon' => 'fa-history', 'text' => 'Lịch sử lương'],
                        ],
                        'employee' => [['url' => 'employee/dashboard', 'icon' => 'fa-home', 'text' => 'Trang chủ']],
                    ];
                @endphp

                @foreach ($routes[$role == '1' ? 'admin' : 'employee'] as $route)
                    <li class="nav-item">
                        <a href="{{ url($route['url']) }}"
                            class="nav-link @if (Request::segment(2) == Arr::get(explode('/', $route['url']), 1)) active @endif">
                            <i class="nav-icon fa {{ $route['icon'] }}"></i>
                            <p>{{ $route['text'] }}</p>
                        </a>
                    </li>
                @endforeach

                <!-- Tài khoản của tôi (chung cho cả Admin & Employee) -->
                <li class="nav-item">
                    <a href="{{ url($role == '1' ? 'admin/my_account' : 'employee/my_account') }}"
                        class="nav-link @if (Request::segment(2) == 'my_account') active @endif">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>Tài khoản của tôi</p>
                    </a>
                </li>

                <!-- Đăng xuất -->
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Đăng xuất</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
