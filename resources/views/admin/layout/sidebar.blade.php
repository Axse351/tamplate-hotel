<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item">
                <a href="{{ route('admin.app') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.kamar.index') ? 'active' : '' }}">
                <a href="{{ route('admin.kamar.index') }}">
                    <i class="la la-bed"></i>
                    <p>Kamar</p>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.reservasi.index') ? 'active' : '' }}">
                <a href="{{ route('admin.reservasi.index') }}">
                    <i class="la la-book"></i>
                    <p>Reservasi</p>
                </a>
            </li>
        </ul>

    </div>
</div>
