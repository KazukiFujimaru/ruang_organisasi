<nav class="navbar bg-slate-900 navbar-expand-lg flex-wrap top-0 px-0 py-0">
    <div class="container py-2">
        <nav aria-label="breadcrumb">
            <div class="d-flex align-items-center">
                <span class="px-3 font-weight-bold text-lg text-white me-4">Ruang Organisasi</span>
                <li class="nav-item px-3 py-3 border-radius-sm  d-flex align-items-center">
                <a href="{{ route('dashboard') }}" class="nav-link text-white p-0">
                    <i class="fas  fa-house"></i>
                </a>
            </li>            
            </div>
        </nav>
        <ul class="navbar-nav d-none d-lg-flex">
        </ul>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <ul class="navbar-nav ms-md-auto  justify-content-end">
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </a>
                </li>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" class="cursor-pointers">
                            <path fill-rule="evenodd"
                                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                    aria-labelledby="dropdownMenuButton">
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
                <li class="nav-item d-flex align-items-center ps-2">
                    <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <div class="avatar avatar-sm position-relative">
                        <img src="{{ asset('..asset/img/team-2.jpg') }}" alt="profile_image" class="w-100 border-radius-md">
                    </div>
                </li>
                </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
