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
                                    <h6 class="font-weight-semibold text-lg mb-0">Daftar Surat</h6>
                                    <p class="text-sm">Berikut adalah data dokumentasi surat anda</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" onclick="window.location.href = '{{ route('surat.create') }}'"
                                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="d-block me-2">
                                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Tambah Surat</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" value="Semua" autocomplete="off" checked>
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable1">Semua</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" value="masuk" autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Masuk</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" value="keluar" autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Keluar</label>
                                </div>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Nomor Surat
                                            </th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 ps-2">
                                                Tanggal</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-secondary text-xs font-weight-semibold opacity-7">
                                                Perihal</th>
                                            <th class="text-secondary opacity-7"></th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($surats as $surat)
                                        <tr data-jenis="{{ strtolower($surat->jenis) }}">
                                            <td>
                                                    <div class="d-flex flex-column justify-content-center ms-1">
                                                        <h6 class="mb-0 text-sm font-weight-semibold">{{ $surat->nomor_surat}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-center text-sm text-dark font-weight-semibold mb-0">{{ $surat->tanggal}}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="badge badge-sm border border-info text-info bg-info">{{ ucfirst($surat->jenis)}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-sm font-weight-normal">{{ $surat->perihal}}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="{{ route('surat.edit', $surat->id) }}" class="text-secondary font-weight-bold text-xs"
                                                    data-bs-toggle="tooltip" data-bs-title="Edit Data Surat">
                                                    <svg width="14" height="14" viewBox="0 0 15 16"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z"
                                                            fill="#64748B" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" id="delete-form-{{ $surat->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <i class="fas fa-trash-alt text-danger" style="cursor: pointer; margin-top: 10px;" 
                                                data-bs-toggle="tooltip" data-bs-title="Hapus Data Surat" onclick="return confirm('Anda yakin ingin menghapus data ini?') && document.getElementById('delete-form-{{ $surat->id }}').submit();"></i>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top py-3 px-3 d-flex">
                                <p class="font-weight-semibold mb-0 text-dark text-sm ms-auto">Jumlah Data Keuangan : {{ $surats->count() }}</p>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil elemen-elemen radio button
        var radioButtons = document.querySelectorAll('input[name="btnradiotable"]');
        
        // Tambahkan event listener ke setiap radio button
        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                // Dapatkan nilai jenis yang dipilih
                var selectedType = this.value;

                // Dapatkan semua baris tabel
                var rows = document.querySelectorAll('tbody tr');
                
                // Tampilkan atau sembunyikan baris berdasarkan jenis yang dipilih
                rows.forEach(function(row) {
                    var jenis = row.dataset.jenis;
                    if (selectedType === 'Semua' || jenis === selectedType.toLowerCase()) {
                        row.style.display = 'table-row';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });
    });
    </script>
</x-app-layout>
