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
                            ['url' => 'admin/dashboard', 'icon' => 'fa-home', 'text' => 'Dashboard'],
                            ['url' => 'admin/employees', 'icon' => 'fa-users', 'text' => 'Employees'],
                            ['url' => 'admin/jobs', 'icon' => 'fa-briefcase', 'text' => 'Jobs'],
                            ['url' => 'admin/departments', 'icon' => 'fa-building', 'text' => 'Department'],
                            ['url' => 'admin/payroll', 'icon' => 'fa-credit-card', 'text' => 'Pay Roll'],
                            ['url' => 'admin/history-salary', 'icon' => 'fa-history', 'text' => 'History Salary'],
                        ],
                        'employee' => [
                            ['url' => 'employee/dashboard', 'icon' => 'fa-home', 'text' => 'Dashboard'],
                            ['url' => 'employee/my_jobs', 'icon' => 'fa-briefcase', 'text' => 'My Jobs'],
                            ['url' => 'employee/my_salary', 'icon' => 'fa-credit-card', 'text' => 'My Salary'],
                        ],
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

                <!-- My Account (chung cho cả Admin & Employee) -->
                <li class="nav-item">
                    <a href="{{ url($role == '1' ? 'admin/my_account' : 'employee/my_account') }}"
                        class="nav-link @if (Request::segment(2) == 'my_account') active @endif">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>My Account</p>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item">
                    <a href="{{ url('logout') }}" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
