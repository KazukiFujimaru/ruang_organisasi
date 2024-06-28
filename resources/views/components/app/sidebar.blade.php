<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex align-items-center m-0"
            href="" target="_blank">
            <span class="font-weight-bold text-lg">Ruang Organisasi</span>
        </a>
        <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item"> <!-- Profil Organisasi -->
                    <a class="nav-link  {{ is_current_route('organisasi-profile') ? 'active' : '' }}"
                        href="{{ route('organisasi-profile') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-200 -150 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>Profil</title>
                                <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Profil Organisasi</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Dashboard -->
                    <a class="nav-link  {{ is_current_route('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="0 0 48 48" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>dashboard</title>
                                <g id="dashboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M0,1.71428571 C0,0.76752 0.76752,0 1.71428571,0 L22.2857143,0 C23.2325143,0 24,0.76752 24,1.71428571 L24,5.14285714 C24,6.08962286 23.2325143,6.85714286 22.2857143,6.85714286 L1.71428571,6.85714286 C0.76752,6.85714286 0,6.08962286 0,5.14285714 L0,1.71428571 Z"
                                            id="Path"></path>
                                        <path class="color-background"
                                            d="M0,12 C0,11.0532171 0.76752,10.2857143 1.71428571,10.2857143 L12,10.2857143 C12.9468,10.2857143 13.7142857,11.0532171 13.7142857,12 L13.7142857,22.2857143 C13.7142857,23.2325143 12.9468,24 12,24 L1.71428571,24 C0.76752,24 0,23.2325143 0,22.2857143 L0,12 Z"
                                            id="Path"></path>
                                        <path class="color-background"
                                            d="M18.8571429,10.2857143 C17.9103429,10.2857143 17.1428571,11.0532171 17.1428571,12 L17.1428571,22.2857143 C17.1428571,23.2325143 17.9103429,24 18.8571429,24 L22.2857143,24 C23.2325143,24 24,23.2325143 24,22.2857143 L24,12 C24,11.0532171 23.2325143,10.2857143 22.2857143,10.2857143 L18.8571429,10.2857143 Z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Program Kerja -->
                    <a class="nav-link  {{ is_current_route('program') ? 'active' : '' }}"
                        href="{{ route('program') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-240 -250 1000 1000" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>program</title>
                                <g id="program" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384v38.6C310.1 219.5 256 287.4 256 368c0 59.1 29.1 111.3 73.7 143.3c-3.2 .5-6.4 .7-9.7 .7H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128zM288 368a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm211.3-43.3c-6.2-6.2-16.4-6.2-22.6 0L416 385.4l-28.7-28.7c-6.2-6.2-16.4-6.2-22.6 0s-6.2 16.4 0 22.6l40 40c6.2 6.2 16.4 6.2 22.6 0l72-72c6.2-6.2 6.2-16.4 0-22.6z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Program Kerja</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Keuangan -->
                    <a class="nav-link  {{ is_current_route('keuangan') ? 'active' : '' }}"
                        href="{{ route('keuangan') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-200 -175 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>keuangan</title>
                                <g id="keuangan" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M64 64C28.7 64 0 92.7 0 128V384c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H64zm48 160H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zM96 336c0-8.8 7.2-16 16-16H464c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16zM376 160h80c13.3 0 24 10.7 24 24v48c0 13.3-10.7 24-24 24H376c-13.3 0-24-10.7-24-24V184c0-13.3 10.7-24 24-24z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Keuangan</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Surat -->
                    <a class="nav-link  {{ is_current_route('surat') ? 'active' : '' }}"
                        href="{{ route('surat') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-200 -150 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>surat</title>
                                <g id="surat" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M384 480h48c11.4 0 21.9-6 27.6-15.9l112-192c5.8-9.9 5.8-22.1 .1-32.1S555.5 224 544 224H144c-11.4 0-21.9 6-27.6 15.9L48 357.1V96c0-8.8 7.2-16 16-16H181.5c4.2 0 8.3 1.7 11.3 4.7l26.5 26.5c21 21 49.5 32.8 79.2 32.8H416c8.8 0 16 7.2 16 16v32h48V160c0-35.3-28.7-64-64-64H298.5c-17 0-33.3-6.7-45.3-18.7L226.7 50.7c-12-12-28.3-18.7-45.3-18.7H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H87.7 384z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Surat</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Inventaris -->
                    <a class="nav-link  {{ is_current_route('inventaris') ? 'active' : '' }}"
                        href="{{ route('inventaris') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-150 -150 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>inventaris</title>
                                <g id="inventaris" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="template" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M256 48c0-26.5 21.5-48 48-48H592c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H381.3c1.8-5 2.7-10.4 2.7-16V253.3c18.6-6.6 32-24.4 32-45.3V176c0-26.5-21.5-48-48-48H256V48zM571.3 347.3c6.2-6.2 6.2-16.4 0-22.6l-64-64c-6.2-6.2-16.4-6.2-22.6 0l-64 64c-6.2 6.2-6.2 16.4 0 22.6s16.4 6.2 22.6 0L480 310.6V432c0 8.8 7.2 16 16 16s16-7.2 16-16V310.6l36.7 36.7c6.2 6.2 16.4 6.2 22.6 0zM0 176c0-8.8 7.2-16 16-16H368c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H16c-8.8 0-16-7.2-16-16V176zm352 80V480c0 17.7-14.3 32-32 32H64c-17.7 0-32-14.3-32-32V256H352zM144 320c-8.8 0-16 7.2-16 16s7.2 16 16 16h96c8.8 0 16-7.2 16-16s-7.2-16-16-16H144z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Inventaris</span>
                    </a>
                </li>
                <li class="nav-item"> <!-- Arsip -->
                    <a class="nav-link  {{ is_current_route('view-arsip') ? 'active' : '' }}" href="{{ route('view-arsip') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-200 -175 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>arsip</title>
                                <g id="arsip" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="view-grid" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M128 0C110.3 0 96 14.3 96 32V224h96V192c0-35.3 28.7-64 64-64H480V32c0-17.7-14.3-32-32-32H128zM256 160c-17.7 0-32 14.3-32 32v32h96c35.3 0 64 28.7 64 64V416H576c17.7 0 32-14.3 32-32V192c0-17.7-14.3-32-32-32H256zm240 64h32c8.8 0 16 7.2 16 16v32c0 8.8-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V240c0-8.8 7.2-16 16-16zM64 256c-17.7 0-32 14.3-32 32v13L187.1 415.9c1.4 1 3.1 1.6 4.9 1.6s3.5-.6 4.9-1.6L352 301V288c0-17.7-14.3-32-32-32H64zm288 84.8L216 441.6c-6.9 5.1-15.3 7.9-24 7.9s-17-2.8-24-7.9L32 340.8V480c0 17.7 14.3 32 32 32H320c17.7 0 32-14.3 32-32V340.8z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">Arsip</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer mx-4">
            <ul class="navbar-nav">
                <li class="nav-item" style="margin-top: -10px;"> <!-- LPJ -->
                    <a class="nav-link {{ request()->routeIs('laporan.show') ? 'active' : '' }}"
                    href="{{ route('laporan.show') }}">
                        <div
                            class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                            <svg width="30px" height="30px" viewBox="-250 -150 900 900" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>lpj</title>
                                <g id="lpj" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="view-grid" transform="translate(12.000000, 12.000000)" fill="#FFFFFF"
                                        fill-rule="nonzero">
                                        <path class="color-foreground"
                                            d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"
                                            id="Path"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text ms-1">LPJ</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>