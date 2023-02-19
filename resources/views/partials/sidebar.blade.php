<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ route("admin.home") }}">
                    <span class="brand-logo">
                        <img src="{{asset('app-assets/images/logo/logo.png')}}" class="flip-image" alt="">
                    </span>
                    <h3 class="brand-text">reBrandz</h3>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                    data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="index.html">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                    <span class="badge badge-light-warning rounded-pill ms-auto me-1">2</span>
                </a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="dashboard-analytics.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Analytics">Analytics</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="dashboard-ecommerce.html"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                </ul>
            </li>
            @can('user_management_access')
            <li class=" navigation-header">
                <span data-i18n="administration">Administration</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="">
                    <i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="user management">User Management</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item
                        {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                        <a class="d-flex align-items-center" href="{{route('admin.permissions.index')}}">
                            <i data-feather="lock"></i>
                            <span class="menu-title text-truncate" data-i18n="permissions">
                                {{ trans('cruds.permission.title') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item
                        {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                        <a class="d-flex align-items-center" href=" {{route('admin.roles.index')}} ">
                            <i data-feather="briefcase"></i>
                            <span class="menu-title text-truncate" data-i18n="roles">
                                {{ trans('cruds.role.title') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item
                        {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                        <a class="d-flex align-items-center" href=" {{route('admin.users.index')}} ">
                            <i data-feather="users"></i>
                            <span class="menu-title text-truncate" data-i18n="users">
                                {{ trans('cruds.user.title') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-item
                        {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                        <a class="d-flex align-items-center" href=" {{route('admin.audit-logs.index')}} ">
                            <i data-feather="file-text"></i>
                            <span class="menu-title text-truncate" data-i18n="audit-log">
                                {{ trans('cruds.auditLog.title') }}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            {{-- menu level --}}
            <li class=" navigation-header">
                <span data-i18n="Misc">Menu Level Guide</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="menu"></i>
                    <span class="menu-title text-truncate" data-i18n="Menu Levels">Menu Levels</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Second Level">Second Level 2.1</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Second Level">Second Level 2.2</span>
                        </a>
                        <ul class="menu-content">
                            <li>
                                <a class="d-flex align-items-center" href="#">
                                    <span class="menu-item text-truncate" data-i18n="Third Level">Third Level 3.1</span>
                                </a>
                            </li>
                            <li>
                                <a class="d-flex align-items-center" href="#">
                                    <span class="menu-item text-truncate" data-i18n="Third Level">Third Level 3.2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="disabled nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather="eye-off"></i>
                    <span class="menu-title text-truncate" data-i18n="Disabled Menu">Disabled Menu</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#" target="_blank">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate" data-i18n="Documentation">Documentation</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#" target="_blank">
                    <i data-feather="life-buoy"></i>
                    <span class="menu-title text-truncate" data-i18n="Raise Support">Raise Support</span>
                </a>
            </li>
        </ul>
    </div>
</div>