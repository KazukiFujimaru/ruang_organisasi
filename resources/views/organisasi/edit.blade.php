<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
            @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Edit Organisasi</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk mengedit organisasi.</p>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('organisasi.update', $organisasi->id) }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $organisasi->nama }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ $organisasi->nama_instansi }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pembina" class="form-label">Nama Pembina</label>
                                    <input type="text" class="form-control" id="nama_pembina" name="nama_pembina" value="{{ $organisasi->nama_pembina }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $organisasi->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="sejarah" class="form-label">Sejarah</label>
                                    <textarea class="form-control" id="sejarah" name="sejarah">{{ $organisasi->sejarah }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_disahkan" class="form-label">Tanggal Disahkan</label>
                                    <input type="date" class="form-control" id="tanggal_disahkan" name="tanggal_disahkan" value="{{ $organisasi->tanggal_disahkan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="logo_organisasi" class="form-label">Logo Organisasi</label>
                                    <input type="file" class="form-control" id="logo_organisasi" name="logo_organisasi">
                                    @if($organisasi->logo_organisasi)
                                        <p>Logo saat ini: <img src="{{ Storage::url($organisasi->logo_organisasi) }}" width="100" alt="Logo Organisasi"></p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="logo_instansi" class="form-label">Logo Instansi</label>
                                    <input type="file" class="form-control" id="logo_instansi" name="logo_instansi">
                                    @if($organisasi->logo_instansi)
                                        <p>Logo saat ini: <img src="{{ Storage::url($organisasi->logo_instansi) }}" width="100" alt="Logo Instansi"></p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="ADART" class="form-label">ADART</label>
                                    <input type="file" class="form-control" id="ADART" name="ADART">
                                    @if($organisasi->ADART)
                                        <p>ADART saat ini: <a href="{{ Storage::url($organisasi->ADART) }}" target="_blank">Lihat ADART</a></p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="KODE" class="form-label">KODE</label>
                                    <input type="text" class="form-control" id="KODE" name="KODE" value="{{ $organisasi->KODE }}" required>
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
