<nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-1 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="">pages/{{ str_replace('-', ' ', Request::path()) }}</a>
            </ol>
        </nav>
    </div>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="mb-1 font-weight-bold breadcrumb-text text-white d-flex justify-content-between align-items-center">
            <div class="flex-grow-1">
                <form method="POST" action="{{ route('logout') }}" class="d-flex justify-content-end">
                    @csrf
                    <a href="{{ route('logout') }}" class="btn btn-sm btn-white mb-0 w-100" onclick="event.preventDefault(); this.closest('form').submit();" style="text-align: center;">
                        Log out
                    </a>
                </form>
            </div>
        </div>
        <ul class="navbar-nav justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a class="nav-link text-body p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item dropdown px-3 pe-2 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="cursor-pointers">
                        <path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z" clip-rule="evenodd" />
                    </svg>
                </a>
                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                    <li class="mb-2">
                        <a class="dropdown-item border-radius-md" href="javascript:;">
                            <div class="d-flex py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="text-sm font-weight-normal mb-0">
                                        <span class="font-weight-bold">Notification Feature</span>
                                    </h6>
                                    <p class="text-xs text-secondary mb-0 d-flex align-items-center ">
                                        <i class="fa fa-clock opacity-6 me-1"></i>
                                        Coming Soon
                                    </p>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ps-2 d-flex align-items-center">
                {{ auth()->user()->name }}
                <a class="nav-link position-relative ms-0 ps-2 py-2 {{ is_current_route('profile-user') ? 'active' : '' }}" href="{{ route('user') }}">
                    <img src="../assets/img/default-avatar.png" class="avatar avatar-sm" alt="avatar" />
                </a>
            </li>
        </ul>
    </div>
</nav>
<!-- End Navbar -->
