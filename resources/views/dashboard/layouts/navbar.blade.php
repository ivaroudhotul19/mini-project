<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
            <li class="dropdown">
                <a href="#" data-bs-toggle="dropdown"
                    class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar me-1">
                        <img src={{ asset("images/user.PNG") }} alt="" srcset="">
                    </div>
                    @can('admin')
                        <div class="d-none d-md-block d-lg-inline-block text-primary">
                            Hi, {{ auth()->user()->username }}
                            <i class="fas fa-angle-down"></i>
                        </div>
                    @endcan
                    @can('user')
                        <div class="d-none d-md-block d-lg-inline-block text-primary">
                            Hi, {{ auth()->user()->username }}
                            <i class="fas fa-angle-down"></i>
                        </div>
                    @endcan
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href=""><i class="far fa-smile"></i> Available</a>
                    <div class="dropdown-divider"></div>
                    <form action="/logout" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>      
                </div>
            </li>
        </ul>
    </div>
</nav>