<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0">
                            <h6 class="font-weight-semibold text-lg mb-0">Tambah Organisasi</h6>
                            <p class="text-sm">Silakan isi form di bawah untuk menambahkan organisasi baru.</p>
                        </div>
                        <div class="card-body px-0 py-0">
                            <form method="POST" action="{{ route('organisasi.store') }}" enctype="multipart/form-data" class="p-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_pembina" class="form-label">Nama Pembina</label>
                                    <input type="text" class="form-control" id="nama_pembina" name="nama_pembina" required>
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="sejarah" class="form-label">Sejarah</label>
                                    <textarea class="form-control" id="sejarah" name="sejarah"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal_disahkan" class="form-label">Tanggal Disahkan</label>
                                    <input type="date" class="form-control" id="tanggal_disahkan" name="tanggal_disahkan">
                                </div>
                                <div class="mb-3">
                                    <label for="logo_organisasi" class="form-label">Logo Organisasi</label>
                                    <input type="file" class="form-control" id="logo_organisasi" name="logo_organisasi">
                                </div>
                                <div class="mb-3">
                                    <label for="logo_instansi" class="form-label">Logo Instansi</label>
                                    <input type="file" class="form-control" id="logo_instansi" name="logo_instansi">
                                </div>
                                <div class="mb-3">
                                    <label for="ADART" class="form-label">ADART</label>
                                    <input type="file" class="form-control" id="ADART" name="ADART">
                                </div>
                                <div class="mb-3">
                                    <label for="KODE" class="form-label">KODE</label>
                                    <input type="text" class="form-control" id="KODE" name="KODE" required>
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
