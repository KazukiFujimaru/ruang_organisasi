<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        @if($organisasi)
        <div class="container-fluid py-4 px-5">
            <div class="col-md-12">
                    <div class="d-md-flex align-items-center mb-3 mx-2">
                        <div class="mb-md-0 mb-3">
                            <h3 class="font-weight-bold mb-0">Hello, {{ $organisasi->nama }}</h3>
                            <h3 class="font-weight-bold mb-0">Hello, {{ $organisasi->nama_instansi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="my-0">
            <div class="row">
                <div class="position-relative overflow-hidden">
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-body text-start p-3 w-100">
                            <div
                                class="icon icon-shape icon-sm bg-dark text-white text-center border-radius-sm d-flex align-items-center justify-content-center mb-3">
                                <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                                    <path fill-rule="evenodd"
                                        d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="w-100">
                                        <p class="text-sm text-secondary mb-1">Jumlah anggota</p>
                                        <h4 class="mb-2 font-weight-bold">$99,118.5</h4>
                                        <div class="d-flex align-items-center">
                                            <span class="text-sm text-success font-weight-bolder">
                                                <i class="fa fa-chevron-up text-xs me-1"></i>10.5%
                                            </span>
                                            <span class="text-sm ms-1">from $89,740.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <h3 class="font-weight-bold mb-0">tidak ada data organisasi</h3>
        @endif
    </main>
</x-app-layout>