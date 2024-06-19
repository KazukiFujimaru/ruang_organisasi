<x-app-layout>

    <div class="main-content position-relative bg-gray-100 max-height-vh-90 h-100">
        <div class="pt-7 pb-6 bg-cover"
            style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;">
        </div>
        <div class="container">
            <div class="card card-body py-2 bg-transparent shadow-none">
                <div class="row">
                    <div class="col-auto">
                        <div
                            class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
                            <img src="../assets/img/team-2.jpg" alt="profile_image" class="w-100">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h3 class="mb-0 font-weight-bold">
                                Organisasi
                            </h3>
                            <p class="mb-0">
                                Nama Organisasi
                            </p>
                        </div>
                    </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                            <a class="btn btn-sm btn-white {{ is_current_route('organisasi-edit') ? 'hidden' : '' }}" 
                                href="{{ route('organisasi-edit') }}">Edit</a>
                            <button type="button" class="btn btn-sm bg-gradient-danger" data-bs-toggle="modal" data-bs-target="#modal-notification">Hapus</button>
                            <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Notifikasi Penghapusan Akun</h6>
                                        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="py-3 text-center">
                                        <i class="ni ni-bell-55 ni-3x"></i>
                                        <h4 class="text-gradient text-danger mt-4">Anda akan menghapus akun !</h4>
                                        <p>Apakah anda yakin ingin menghapus <br>akun Ruang Organisasi ?</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link btn-white" data-bs-dismiss="modal">Tidak</button>
                                        <button type="button" class="btn btn-white">Ya</button>
                                        <button type="button" class="btn btn-link text-white ml-auto" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container my-3 py-3">
            <div class="row">
                <div class="col-12 col-xl-4 mb-4">
                    <div class="card border shadow-xs h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0 font-weight-semibold text-lg">Notifications settings</h6>
                            <p class="text-sm mb-1">Here you can set preferences.</p>
                        </div>
                        <div class="card-body p-3">
                            <h6 class="text-dark font-weight-semibold mb-1">Account</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault">Email me when someone follows me</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault1">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault1">Email me when someone answers on my
                                            post</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault2" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault2">Email me when someone mentions me</label>
                                    </div>
                                </li>
                            </ul>
                            <h6 class="text-dark font-weight-semibold mt-2 mb-1">Application</h6>
                            <ul class="list-group">
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault3">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault3">New launches and projects</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault4" checked>
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault4">Monthly product updates</label>
                                    </div>
                                </li>
                                <li class="list-group-item border-0 px-0 pb-0">
                                    <div class="form-check form-switch ps-0">
                                        <input class="form-check-input ms-auto" type="checkbox"
                                            id="flexSwitchCheckDefault5">
                                        <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault5">Subscribe to newsletter</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 mb-4">
                    <div class="card border shadow-xs h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 col-9">
                                    <h6 class="mb-0 font-weight-semibold text-lg">Profile information</h6>
                                    <p class="text-sm mb-1">Edit the information about you.</p>
                                </div>
                                <div class="col-md-4 col-3 text-end">
                                    <button type="button" class="btn btn-white btn-icon px-2 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path
                                                d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm mb-4">
                                Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is no. If two equally
                                difficult paths, choose the one more painful in the short term (pain avoidance is
                                creating an illusion of equality).
                            </p>
                            <ul class="list-group">
                                <li
                                    class="list-group-item border-0 ps-0 text-dark font-weight-semibold pt-0 pb-1 text-sm">
                                    <span class="text-secondary">First Name:</span> &nbsp; Noah
                                </li>
                                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                                    <span class="text-secondary">Last Name:</span> &nbsp; Mclaren
                                </li>
                                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                                    <span class="text-secondary">Mobile:</span> &nbsp; +(44) 123 1234 123
                                </li>
                                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                                    <span class="text-secondary">Function:</span> &nbsp; Manager - Organization
                                </li>
                                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                                    <span class="text-secondary">Location:</span> &nbsp; USA
                                </li>
                                <li class="list-group-item border-0 ps-0 text-dark font-weight-semibold pb-1 text-sm">
                                    <span class="text-secondary">Social:</span> &nbsp;
                                    <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                                        <i class="fab fa-linkedin fa-lg"></i>
                                    </a>
                                    <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                                        <i class="fab fa-github fa-lg"></i>
                                    </a>
                                    <a class="btn btn-link text-dark mb-0 ps-1 pe-1 py-0" href="javascript:;">
                                        <i class="fab fa-slack fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4 mb-4">
                    <div class="card border shadow-xs h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row mb-sm-0 mb-2">
                                <div class="col-md-8 col-9">
                                    <h6 class="mb-0 font-weight-semibold text-lg">Internal chat</h6>
                                    <p class="text-sm mb-0">/marketing channel</p>
                                </div>
                                <div class="col-md-4 col-3 text-end">
                                    <button type="button" class="btn btn-white btn-icon px-2 py-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10.5 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zm0 6a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <ul class="list-group">
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/team-1.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Sarah Lamalo</h6>
                                        <p class="mb-0 text-sm text-secondary">Hi! I need more information about ...
                                        </p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/marie.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Vicky Hladynets</h6>
                                        <p class="mb-0 text-sm text-secondary">Hello, Noah!</p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/team-5.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Charles Deluvio</h6>
                                        <p class="mb-0 text-sm text-secondary">Great, thank you!</p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/team-4.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Leio Mclaren</h6>
                                        <p class="mb-0 text-sm text-secondary">Don't worry! 🙏🏻</p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/team-3.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Mateus Campos</h6>
                                        <p class="mb-0 text-sm text-secondary">Call me, please.</p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-1">
                                    <div class="avatar avatar-sm rounded-circle me-2">
                                        <img src="../assets/img/team-2.jpg" alt="kal" class="w-100">
                                    </div>
                                    <div class="d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm font-weight-semibold">Miriam Lore</h6>
                                        <p class="mb-0 text-sm text-secondary">Well done!</p>
                                    </div>
                                    <span class="p-1 bg-success rounded-circle ms-auto me-3">
                                        <span class="visually-hidden">Online</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                    <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Members list</h6>
                        <p class="text-sm">See information about all members</p>
                    </div>
                    <div class="ms-auto d-flex">
                        <button type="button" class="btn btn-sm btn-white me-2"> View all </button>
                        <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                        <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"></path>
                            </svg>
                        </span>
                        <span class="btn-inner--text">Add member</span>
                        </button>
                    </div>
                    </div>
                </div>
                <div class="card-body px-0 py-0">
                    <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked="">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Monitored</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Unmonitored</label>
                    </div>
                    <div class="input-group w-sm-25 ms-auto">
                        <span class="input-group-text text-body">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                        </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                    </div>
                    <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Member</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Function</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Employed</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">John Michael</h6>
                                <p class="text-sm text-secondary mb-0">john@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                            <p class="text-sm text-secondary mb-0">Organization</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">23/04/18</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-3.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user2">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">Alexa Liras</h6>
                                <p class="text-sm text-secondary mb-0">alexa@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Programator</p>
                            <p class="text-sm text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-secondary text-secondary bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">11/01/19</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-1.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user3">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">Laurent Perrier</h6>
                                <p class="text-sm text-secondary mb-0">laurent@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Executive</p>
                            <p class="text-sm text-secondary mb-0">Projects</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">19/09/17</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/marie.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user4">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">Michael Levi</h6>
                                <p class="text-sm text-secondary mb-0">michael@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Programator</p>
                            <p class="text-sm text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-success text-success bg-success">Online</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">24/12/08</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-5.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user5">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">Richard Gran</h6>
                                <p class="text-sm text-secondary mb-0">richard@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Manager</p>
                            <p class="text-sm text-secondary mb-0">Executive</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-secondary text-secondary bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">04/10/21</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-6.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user6">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">Miriam Eric</h6>
                                <p class="text-sm text-secondary mb-0">miriam@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">Programtor</p>
                            <p class="text-sm text-secondary mb-0">Developer</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-secondary text-secondary bg-secondary">Offline</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">14/09/20</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                    <div class="border-top py-3 px-3 d-flex align-items-center">
                    <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
                    <div class="ms-auto">
                        <button class="btn btn-sm btn-white mb-0">Previous</button>
                        <button class="btn btn-sm btn-white mb-0">Next</button>
                    </div>
                    </div>
                </div>
                </div>            
            <footer class="footer pt-3">
                <div class="container-fluid pt-3">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-xs text-muted text-lg-start">
                                Copyright
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>
                                Corporate UI by
                                <a href="https://www.creative-tim.com" class="text-secondary"
                                    target="_blank">Creative Tim</a>.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-xs text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation"
                                        class="nav-link text-xs text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-xs text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license"
                                        class="nav-link text-xs pe-0 text-muted" target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>  
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"></i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Corporate UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-slate-900"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                        onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100" target="_blank"
                    href="https://www.creative-tim.com/product/corporate-ui-dashboard-laravel">Free Download</a>
                <a class="btn btn-outline-dark w-100" target="_blank"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/installation-guide/corporate-ui-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/corporate-ui-dashboard" target="_blank"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/corporate-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Corporate%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fcorporate-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/corporate-ui-dashboard-laravel"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
