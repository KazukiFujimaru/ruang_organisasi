<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <div class="main-content position-relative bg-gray-100 max-height-vh-90 h-100">
            <div class="pt-7 pb-6 bg-cover" style="background-image: url('../assets/img/header-orange-purple.jpg'); background-position: bottom;">
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
                                <h3 class="mb-0 font-weight-bold">{{ $organisasi->nama }}</h3>
                                <p class="mb-0">{{ $organisasi->nama_instansi }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 text-sm-end">
                            <a class="btn btn-sm btn-white" href="{{ route('organisasi.edit', $organisasi->id) }}">Edit</a>
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
                                                <h4 class="text-gradient text-danger mt-4">Anda akan menghapus akun!</h4>
                                                <p>Apakah anda yakin ingin menghapus <br>akun Ruang Organisasi?</p>
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
                    <div class="card-header border pb-0">
                        <div>
                            <h6 class="font-weight-semibold text-lg mb-0">Daftar Anggota</h6>
                            <p class="text-sm">Melihat informasi keanggotaan yang ada di organisasi</p>
                        </div>
                        <div class="d-sm-flex align-items-center">
                            <div class="card-body px-0 py-0">
                                <div class="border py-3 px-3 d-sm-flex align-items-center">
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
                                                                <img src="">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center ms-1">
                                                                <h6 class="mb-0 text-sm font-weight-semibold">{{$keanggotaan->user->name}}</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-sm text-dark font-weight-semibold mb-0">{{$keanggotaan->role?->nama_role}}</p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if ($keanggotaan->status_keanggotaan === 'aktif')
                                                            <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-secondary">Tidak Aktif</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary text-sm font-weight-semibold">{{ \Carbon\Carbon::parse($keanggotaan->created_at)->format('d M Y')}}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="javascript:;" class="text-secondary font-weight-semibold text-sm" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
