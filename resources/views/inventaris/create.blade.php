<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Tambah Data Inventaris</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk menambahkan data keuangan.</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('inventaris.store') }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sebelum" class="form-label">Sebelum</label>
                                    <input type="number" class="form-control" id="sebelum" name="sebelum" required>
                                </div>
                                <div class="mb-3">
                                    <label for="ditambah" class="form-label">Ditambah</label>
                                    <input type="number" class="form-control" id="ditambah" name="ditambah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="digunakan" class="form-label">Digunakan</label>
                                    <input type="number" class="form-control" id="digunakan" name="digunakan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="sisa" class="form-label">Sisa</label>
                                    <input type="number" class="form-control" id="sisa" name="sisa" required>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="bukti" class="form-label">Bukti</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <x-app.footer />
        </div>
    </main>
</x-app-layout>
