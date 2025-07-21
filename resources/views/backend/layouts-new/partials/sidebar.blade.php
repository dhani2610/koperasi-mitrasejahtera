<style>
    .menu-inner {
        background-color: #000 !important;
    }

    .layout-menu {
        background-color: #000 !important;
    }

    .menu-item a.menu-link {
        color: #ccc !important;
    }

    .menu-item.active > a.menu-link,
    .menu-item.open > a.menu-link,
    .menu-sub .menu-item.active > a.menu-link {
        background-color: #1a1a1a !important;
        color: #fff !important;
    }

    .menu-sub .menu-link div {
        color: #ccc;
    }

    .menu-sub .menu-item.active .menu-link div {
        color: #fff !important;
    }

    .app-brand .demo {
        color: #fff !important;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
    style="border-right: 3px solid rgba(114, 113, 113, 0.52);">
    
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <img src="{{ asset('assets/img/logos/logo.png') }}" style="max-width: 40%">
            <span class="demo fw-bold ms-2" style="color: white">Dashboard</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle text-white"></i>
        </a>
    </div>

    @php
        $usr = Auth::guard('admin')->user();
    @endphp

    <div class="menu-inner-shadow" style="background: black!important"></div>

    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        @if ($usr->can('anggota.view') || $usr->can('jenis.angsuran.view'))
        <li class="menu-item {{ Request::routeIs('anggota') || Request::routeIs('jenis-angsuran') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layer"></i>
                <div data-i18n="Layouts">Master Data</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('anggota') ? 'active' : '' }}">
                    <a href="{{ route('anggota') }}" class="menu-link">
                        <div data-i18n="Anggota">Anggota</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('jenis-angsuran') ? 'active' : '' }}">
                    <a href="{{ route('jenis-angsuran') }}" class="menu-link">
                        <div data-i18n="Jenis Angsuran">Jenis Angsuran</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        @if ($usr->can('admin.view') || $usr->can('role.view'))
        <li class="menu-item {{ Request::routeIs('admin.admins.index') || Request::routeIs('admin.roles.index') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Layouts">Management Users</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.admins.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.admins.index') }}" class="menu-link">
                        <div data-i18n="Users">Users</div>
                    </a>
                </li>
                <li class="menu-item {{ Request::routeIs('admin.roles.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}" class="menu-link">
                        <div data-i18n="Role Permissions">Role Permissions</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

    </ul>
</aside>
