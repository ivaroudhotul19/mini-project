<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <img src="/images/jumbotron.png" class="img-fluid" alt="" srcset=""> 
        </div>  
        <div class="sidebar-menu">
            @can('user')
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/mahasiswa" class="sidebar-link">
                        <i class="fas fa-child"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>
            </ul>
            @endcan
            @can('admin')
            <ul class="menu">
                <li class='sidebar-title'>Main Menu</li>
                <li class="sidebar-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="/dashboard" class="sidebar-link">
                        <i class="fas fa-school"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('dashboard/mahasiswa*') ? 'active' : '' }}">
                    <a href="/dashboard/mahasiswa" class='sidebar-link'>
                        <i class="fas fa-child"></i>
                        <span>Data Mahasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <li class="sidebar-item {{ Request::is('dashboard/matakuliah*') ? 'active' : '' }}">
                        <a href="/dashboard/matakuliah" class='sidebar-link'>
                            <i class="fas fa-book-reader"></i>
                            <span>Data Matakuliah</span>
                        </a>
                    </li>  
                    <li class="sidebar-item {{ Request::is('dashboard/nilai*') ? 'active' : '' }}">
                        <a href="/dashboard/nilai" class='sidebar-link'>
                            <i class="fas fa-chart-bar"></i>
                            <span>Data Nilai</span>
                        </a>
                    </li>
                </li>
            </ul>
            @endcan
        </div>
    </div>
</div>