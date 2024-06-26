<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Edit Data Surat</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk mengedit data Surat-Menyurat.</p>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('surat.update', $surat->id) }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                @method('PUT') <!-- Menyertakan metode PUT -->

                                <div class="mb-3">
                                    <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $surat->nomor_surat }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $surat->tanggal }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select class="form-select" id="jenis" name="jenis" required>
                                        <option value="masuk" {{ $surat->jenis == 'masuk' ? 'selected' : '' }}>Masuk</option>
                                        <option value="keluar" {{ $surat->jenis == 'keluar' ? 'selected' : '' }}>Keluar</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="perihal" class="form-label">Perihal</label>
                                    <input type="text" class="form-control" id="perihal" name="perihal" value="{{ $surat->perihal }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="asal_surat" class="form-label">Asal Surat</label>
                                    <input type="text" class="form-control" id="asal_surat" name="asal_surat" value="{{ $surat->asal_surat }}" required>
                                </div>

                                <div class="mb-3">
                                    <label for="dokumen" class="form-label">Dokumen</label>
                                    <input type="file" class="form-control" id="dokumen" name="dokumen">
                                    @if($surat->dokumen)
                                        <p>Dokumen saat ini: <a href="{{ Storage::url($surat->dokumen) }}" target="_blank">Lihat Dokumen</a></p>
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
