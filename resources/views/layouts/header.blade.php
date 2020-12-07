<div class="header d-print-none">
    <div class="header-container">
        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>

            <div class="header-logo">
                <a href="{{ url('/') }}">
                    <span class="text-white ml-1">
                        Test
                    </span>
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <ul class="navbar-nav">
                    <li class="nav-item mr-3">
                    </li>
                </ul>
            </div>

            <div class="header-body-right">
                <ul class="navbar-nav">

                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                            <figure class="avatar avatar-sm">
                                <img src="{{ asset('/assets/gogi/assets/media/image/user/man_avatar3.jpg') }}"
                                     class="rounded-circle"
                                     alt="avatar">
                            </figure>
                            <span class="ml-2 d-sm-inline d-none">Test</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="text-center py-4">
                                <figure class="avatar avatar-lg mb-3 border-0">
                                    <img src="{{ asset('/assets/gogi/assets/media/image/user/man_avatar3.jpg') }}"
                                         class="rounded-circle" alt="image">
                                </figure>
                                <h5 class="text-center">Test</h5>
                                <div class="mb-3 small text-center text-muted">Test</div>
                            </div>
                            <div class="list-group">
                                {{-- <a href="" class="list-group-item" data-toggle="modal" data-target="#modal-profile">
                                    <i class="fas fa-user mr-1"></i>
                                    Profil Saya
                                </a> --}}
                                <a href="" class="list-group-item text-danger">
                                   <i class="fas fa-sign-out-alt mr-1"></i>
                                   Logout
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item header-toggler">
                <a href="#" class="nav-link">
                    <i data-feather="arrow-down"></i>
                </a>
            </li>
        </ul>
    </div>
</div>