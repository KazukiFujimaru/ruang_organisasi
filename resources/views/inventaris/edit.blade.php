<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Edit Data Inventaris</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk mengedit data inventaris.</p>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('inventaris.update', $inventaris->id) }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $inventaris->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sebelum" class="form-label">Sebelum</label>
                                    <input type="number" class="form-control" id="sebelum" name="sebelum" value="{{ $inventaris->sebelum }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ditambah" class="form-label">Ditambah</label>
                                    <input type="number" class="form-control" id="ditambah" name="ditambah" value="{{ $inventaris->ditambah }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="digunakan" class="form-label">Digunakan</label>
                                    <input type="number" class="form-control" id="digunakan" name="digunakan" value="{{ $inventaris->digunakan }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sisa" class="form-label">Sisa</label>
                                    <input type="number" class="form-control" id="sisa" name="sisa" value="{{ $inventaris->sisa }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan">{{ $inventaris->keterangan }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti">
                                    @if($inventaris->bukti)
                                        <p>Bukti saat ini: <a href="{{ Storage::url($inventaris->bukti) }}" target="_blank">Lihat Bukti</a></p>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>
</x-app-layout>
