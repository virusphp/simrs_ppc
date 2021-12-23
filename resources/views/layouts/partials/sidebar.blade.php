<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <div class="c-sidebar-brand-full text-center" alt="RSUD RSUD KRATON">
            <div class="col-12">
                <img src="{{ asset('img/profile/logo.png') }}" class="img-fluid" style="max-width:70px">
            </div>
        </div>
        <div class="c-sidebar-brand-minimized" alt="RSUD KRATON">
            <div class="col-12">
                <img src="{{ asset('img/profile/logo.png') }}" class="img-fluid" style="max-width:50px">
            </div>
        </div>
    </div>
    <div class="c-sidebar-brand d-md-none">
        <img src="{{ asset('img/profile/logo.png') }}" width="120" height="46">
    </div>
    <ul id="sidebar-nav" class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="c-sidebar-nav-icon fa fa-laptop-house"></i> Dashboard</a>
        </li>

        <li class="c-sidebar-nav-title">
            Management Master
        </li>

        <li class="c-sidebar-nav-divider"></li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fa fa-cogs"></i> Pengaturan</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-users"> </i>Manage User</a>
                </li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                        <i class="c-sidebar-nav-icon fa fa-users"> </i>Manage Akses Pengguna</a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>