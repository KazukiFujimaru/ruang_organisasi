<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Tambah Data Surat</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk menambahkan data Surat-Menyurat.</p>
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
                            <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                    <input type="string" class="form-control" id="nomor_surat" name="nomor_surat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select class="form-select" id="jenis" name="jenis" required>
                                        <option value="masuk">Masuk</option>
                                        <option value="keluar">Keluar</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal</label>
                                    <input type="text" class="form-control" id="perihal" name="perihal" required>
                                </div>
                                <div class="mb-3">
                                    <label for="asal_surat" class="form-label">Asal Surat</label>
                                    <input type="text" class="form-control" id="asal_surat" name="asal_surat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dokumen" class="form-label">Dokumen</label>
                                    <input type="file" class="form-control" id="dokumen" name="dokumen">
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
