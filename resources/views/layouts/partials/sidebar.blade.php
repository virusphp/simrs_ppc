<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        <div class="c-sidebar-brand-full text-center" alt="RSUD ABEPURA">
            <div class="col-12">
                <img src="{{ asset('img/profile/logo-abepura.png') }}" class="img-fluid" style="max-width:70px">
            </div>
        </div>
        <div class="c-sidebar-brand-minimized" alt="RSUD ABEPURA">
            <div class="col-12">
                <img src="{{ asset('img/profile/logo-abepura.png') }}" class="img-fluid" style="max-width:50px">
            </div>
        </div>
    </div>
    <div class="c-sidebar-brand d-md-none">
        <img src="{{ asset('img/profile/logo-abepura.png') }}" width="120" height="46">
    </div>
    <ul id="sidebar-nav" class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <i class="c-sidebar-nav-icon fa fa-laptop-house"></i> Dashboard</a>
        </li>

        <li class="c-sidebar-nav-title">
            Management Master
        </li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fa fa-laptop-house"></i> Pendaftaran
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Grafik
                    </a>
                </li>
            </ul>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.pendaftaranpasien.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Pasien
                    </a>
                </li>
            </ul>
            
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.pendaftaranrawatjalan.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Rawat Jalan
                    </a>
                </li>
            </ul>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.pendaftaranrawatinap.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Rawat Inap
                    </a>
                </li>
            </ul>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.pendaftaranrawatdarurat.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Rawat Darurat
                    </a>
                </li>
            </ul>

        </li>



        <li class="c-sidebar-nav-title">
            Transaksi
        </li>
        
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.admisipasien.index') }}">
                <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Admisi Pasien
            </a>
        </li>
        
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('pendaftaranpenjadwalan.antreanjkn.index') }}">
                <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Antrean JKN
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('pendaftaran.index') }}">
                <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Pembuatan Sep
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('rujukan.index') }}">
                <i class="c-sidebar-nav-icon fa fa-credit-card"></i> Pembuatan Rujukan
            </a>
        </li>
        <li class="c-sidebar-nav-divider"></li>

        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="c-sidebar-nav-icon fa fa-cogs"></i> Pengaturan</a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-users"> </i>Manage User</a>
                </li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('peranpengguna.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-users"> </i>Manage Peran Pengguna</a>
                </li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('aksespengguna.index') }}">
                        <i class="c-sidebar-nav-icon fa fa-users"> </i>Manage Akses Pengguna</a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>