<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Edit Data Program</h6>
                            <p class="text-sm">Silakan ubah form di bawah untuk mengedit data Program atau Kegiatan.</p>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('program.update', $program->id) }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $program->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">description</label>
                                    <textarea class="form-control" id="description" name="description">{{ $program->description }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="type" class="form-label">type</label>
                                    <select class="form-select" id="type" name="type" required>
                                        <option value="program kerja" {{ $program->type == 'program kerja' ? 'selected' : '' }}>Program Kerja</option>
                                        <option value="kegiatan" {{ $program->type == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select class="form-select" id="jenis" name="jenis" required>
                                        <option value="harian" {{ $program->jenis == 'harian' ? 'selected' : '' }}>Harian</option>
                                        <option value="mingguan" {{ $program->jenis == 'mingguan' ? 'selected' : '' }}>Mingguan</option>
                                        <option value="bulanan" {{ $program->jenis == 'bulanan' ? 'selected' : '' }}>Bulanan</option>
                                        <option value="tahunan" {{ $program->jenis == 'tahunan' ? 'selected' : '' }}>Tahunan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="terlaksana" {{ $program->status == 'terlaksana' ? 'selected' : '' }}>Terlaksana</option>
                                        <option value="tidak terlaksana" {{ $program->status == 'tidak terlaksana' ? 'selected' : '' }}>Tidak Terlaksana</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $program->tanggal }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="dokumen" class="form-label">Dokumen</label>
                                    <input type="file" class="form-control" id="dokumen" name="dokumen">
                                    @if($program->dokumen)
                                        <p class="mt-2">Dokumen saat ini: <a href="{{ Storage::url($program->dokumen) }}" target="_blank">Lihat Dokumen</a></p>
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
