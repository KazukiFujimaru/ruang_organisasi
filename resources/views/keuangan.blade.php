<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <div class="d-sm-flex align-items-center">
                                <div>
                                    <h6 class="font-weight-semibold text-lg mb-0">Daftar Keuangan</h6>
                                    <p class="text-sm">Berikut adalah data keuangan anda</p>
                                </div>
                                <div class="ms-auto d-flex">
                                    <button type="button" class="btn btn-sm btn-white me-2">
                                        SALDO : Rp{{ number_format($saldo_terbaru, 0, ',', '.') }}
                                    </button>
                                    <button type="button" onclick="window.location.href = '{{ route('keuangan.create') }}'"
                                            class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                                        <span class="btn-inner--icon">
                                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="d-block me-2">
                                                <path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                                            </svg>
                                        </span>
                                        <span class="btn-inner--text">Tambah Keuangan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" value="Semua" autocomplete="off" checked>
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable1">Semua</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" value="pemasukan" autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Pemasukan</label>
                                    <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" value="pengeluaran" autocomplete="off">
                                    <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Pengeluaran</label>
                                </div>
                            </div>
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Transaksi</th>
                                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Jumlah</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 ps-2">Tanggal</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7 ps-2">Jenis</th>
                                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($keuangans as $keuangan)
                                        <tr data-jenis="{{ strtolower($keuangan->jenis) }}">
                                            <td>
                                                <div class="d-flex px-2">
                                                    <div class="my-auto">
                                                        <h6 class="mb-0 text-sm">{{ $keuangan->nama }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-sm font-weight-normal mb-0">Rp{{ number_format($keuangan->jumlah, 0, ',', '.') }}</p>
                                            </td>
                                            <td class="text-center">
                                                <span class="text-sm font-weight-normal">{{ $keuangan->tanggal }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($keuangan->jenis == 'pemasukan')
                                                    <span class="badge badge-sm border border-success text-success bg-success">
                                                         {{ ucfirst($keuangan->jenis) }} 
                                                    </span>
                                                @else
                                                    <span class="badge badge-sm border border-danger text-danger bg-danger">
                                                        {{ ucfirst($keuangan->jenis) }} 
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                            <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST" id="delete-form-{{ $keuangan->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <i class="fas fa-trash-alt text-danger" style="cursor: pointer; margin-top: 10px;" 
                                                data-bs-toggle="tooltip" data-bs-title="Hapus Data Keuangan" 
                                                onclick="return confirm('Anda yakin ingin menghapus data ini?') && document.getElementById('delete-form-{{ $keuangan->id }}').submit();">
                                                </i>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="border-top py-3 px-3 d-flex">
                                <p class="font-weight-semibold mb-0 text-dark text-sm ms-auto">Jumlah Data Keuangan : {{ $keuangans->count() }}</p>
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
