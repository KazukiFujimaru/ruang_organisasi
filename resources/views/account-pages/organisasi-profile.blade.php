<x-app-layout>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="main-content position-relative bg-gray-100 max-height-vh-90 h-100">
            <div class="pt-7 pb-6 bg-cover"
                style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;">
            </div>
            <div class="container">
                <div class="card card-body py-2 bg-transparent shadow-none">
                    <div class="row">
                    <div class="col-auto">
                        <div class="avatar avatar-2xl rounded-circle position-relative mt-n7 border border-gray-100 border-4">
                            @if($organisasi->logo_organisasi)
                                <img src="{{ asset('storage/' . str_replace('public/', '', $organisasi->logo_organisasi)) }}" alt="Logo Organisasi" class="w-100">
                            @else
                                <img src="{{ asset('images/default_image.png') }}" alt="Default Image" class="w-100">
                            @endif
                        </div>
                    </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h3 class="mb-0 font-weight-bold">
                                {{ $organisasi->nama }}
                                </h3>
                                <p class="mb-0">
                                {{ $organisasi->nama_instansi }}
                                </p>
                            </div>
                        </div>
                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                                <a class="btn btn-sm btn-white" 
                                    href="{{ route('organisasi.edit' , $organisasi->id) }}">Edit</a>
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
                                <h6 class="mb-0 font-weight-semibold text-lg">Deskripsi</h6>
                                <p class="text-sm mb-1">{{ $organisasi->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 mb-4">
                        <div class="card border shadow-xs h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row">
                                    <div class="col-md-8 col-9">
                                        <h6 class="mb-0 font-weight-semibold text-lg">Sejarah Organisasi</h6>
                                        <p class="text-sm mb-1">{{ $organisasi->sejarah }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <!-- Placeholder -->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 mb-4">
                        <div class="card border shadow-xs h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row mb-sm-0 mb-2">
                                    <div class="col-md-8 col-9">
                                        <h6 class="mb-0 font-weight-semibold text-lg">Keterangan Instansi</h6>
                                        <p class="text-sm mb-0">{{ $organisasi->nama_instansi }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3 pt-0">
                                <!-- Placeholder -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card border shadow-xs mb-4">
                <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                    <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Daftar Anggota</h6>
                        <p class="text-sm">Melihat informasi keanggotaan yang ada di organisasi</p>
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
                        <span class="btn-inner--text">Tambah organisasi</span>
                    </a>
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
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Jabatan</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Bergabung</th>
                            <th class="text-secondary opacity-7"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($keanggotaans as $keanggotaan)
                        <tr>
                            <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex align-items-center">
                                <img src="https://demos.creative-tim.com/test/corporate-ui-dashboard/assets/img/team-2.jpg" class="avatar avatar-sm rounded-circle me-2" alt="user1">
                                </div>
                                <div class="d-flex flex-column justify-content-center ms-1">
                                <h6 class="mb-0 text-sm font-weight-semibold">{{$keanggotaan->user->name}}</h6>
                                <p class="text-sm text-secondary mb-0">john@creative-tim.com</p>
                                </div>
                            </div>
                            </td>
                            <td>
                            <p class="text-sm text-dark font-weight-semibold mb-0">{{$keanggotaan->role?->nama}}</p>
                            <p class="text-sm text-secondary mb-0">{{$keanggotaan->divisirole?->nama}}</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <span class="badge badge-sm border border-success text-success bg-success">Aktif</span>
                            </td>
                            <td class="align-middle text-center">
                            <span class="text-secondary text-sm font-weight-normal">{{$keanggotaan->joined_at}}</span>
                            </td>
                            <td class="align-middle">
                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit user">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B"></path>
                                </svg>
                            </a>
                            </td>
                        </tr>
                        @endforeach
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
                                Ruang Organisasi by
                                <a href="https://www.creative-tim.com" class="text-secondary"
                                    target="_blank">Ciboston Tech</a>.
                            </div>
                        </div>
                        </div>
                    </div>
                </div>            
                <x-app.footer />
            </div>
        </div>  
</main>
</x-app-layout>