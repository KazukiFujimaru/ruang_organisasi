<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Daftar Program</h6>
                                    <p class="text-sm">Berikut adalah program kerja organisasi anda</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" class="btn btn-sm btn-white me-2" onclick="resetFilters()">
                                        Semua
                                    </button>
                                    <button type="button" onclick="window.location.href = '{{ route('program.create') }}'"
                                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="d-block me-2">
                                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Tambah Program</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="typeDropdown">
                                        Tipe
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="typeDropdown">
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('type', 'program kerja');">Program Kerja</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('type', 'kegiatan');">Kegiatan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="jenisDropdown">
                                        Jenis
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="jenisDropdown">
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('jenis', 'harian');">Harian</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('jenis', 'mingguan');">Mingguan</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('jenis', 'bulanan');">Bulanan</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('jenis', 'tahunan');">Tahunan</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn bg-gradient-dark dropdown-toggle " data-bs-toggle="dropdown" id="statusDropdown">
                                        Status
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('status', 'terlaksana');">Terlaksana</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;" onclick="updateFilter('status', 'tidak terlaksana');">Tidak Terlaksana</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nama Program
                                            </th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Tipe</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Jenis</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Tanggal Pelaksanaan</th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 text-left"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($programs as $program)
                                        <tr data-type="{{ strtolower($program->type) }}" data-jenis="{{ strtolower($program->jenis) }}" data-status="{{ strtolower($program->status) }}">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h5 class="mb-0 text-sm font-weight-semibold">{{ $program->nama}}</h5>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm text-dark font-weight-semibold mb-0 text-center">{{ ucfirst($program->type) }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="badge badge-sm border border-info text-info bg-info">{{ ucfirst($program->jenis) }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($program->status == 'terlaksana')
                                                    <span class="badge badge-sm border border-success text-success bg-success">
                                                        <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                                                            <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg> {{ ucfirst($program->status) }} 
                                                    </span>
                                                @else
                                                    <span class="badge badge-sm border border-danger text-danger bg-danger">
                                                        <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-1">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg> {{ ucfirst($program->status) }} 
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $program->tanggal }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('program.edit', $program->id) }}" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Edit Program">
                                                    <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                            <form action="{{ route('program.destroy', $program->id) }}" method="POST" id="delete-form-{{ $program->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <i class="fas fa-trash-alt text-danger" style="cursor: pointer; margin-top: 10px;" 
                                                data-bs-toggle="tooltip" data-bs-title="Hapus Program" onclick="return confirm('Anda yakin ingin menghapus data ini?') && document.getElementById('delete-form-{{ $program->id }}').submit();"></i>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="border-top py-3 px-3 d-flex">
                                    <p class="font-weight-semibold mb-0 text-dark text-sm ms-auto">Jumlah Data Program Kerja : {{ $programs->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>
</x-app-layout>

<script>
    var filters = {
        type: '',
        jenis: '',
        status: ''
    };

    function updateFilter(filter, value) {
        filters[filter] = value;
        applyFilters();
    }

    function applyFilters() {
        var rows = document.querySelectorAll('tbody tr');
        rows.forEach(function(row) {
            var typeMatch = filters.type ? row.dataset.type.includes(filters.type) : true;
            var jenisMatch = filters.jenis ? row.dataset.jenis.includes(filters.jenis) : true;
            var statusMatch = filters.status ? row.dataset.status === filters.status : true;


            if (typeMatch && jenisMatch && statusMatch) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function resetFilters() {
        filters = {
            type: '',
            jenis: '',
            status: ''
        };
        applyFilters();
    }
</script>
