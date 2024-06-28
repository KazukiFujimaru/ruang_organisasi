<x-guest-layout>
    <main class="main-content  mt-0">
        <section>
            <div class="container py-4 px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card border shadow-xs mb-4">
                            <div class="card-header border-bottom pb-0">
                                <h6 class="font-weight-semibold text-lg mb-0">Tambah Divisi</h6>
                                <p class="text-sm">Silakan isi form di bawah untuk menambahkan divisi pada organisasi anda sesuai dengan yang anda miliki.</p>
                            </div>
                            <form action="{{ route('organisasi.store-divisi', $organisasi->id) }}" method="POST" class="p-3">
                                @csrf
                                <div id="divisi-container" class="mb-3">
                                    <div class="divisi-group">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="nama" class="form-label">Nama Divisi:</label>
                                                <input type="text" class="form-control" name="divisi[0][nama]" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="keterangan" class="form-label">Keterangan Divisi:</label>
                                                <input type="text" class="form-control" name="divisi[0][keterangan]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="button" id="add-divisi" class="btn btn-secondary">Tambah Divisi</button>
                                    <button type="submit" class="btn btn-primary">Simpan Divisi</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <x-app.footer />
            </div>


            <script>
                document.getElementById('add-divisi').addEventListener('click', function() {
                    let container = document.getElementById('divisi-container');
                    let index = container.querySelectorAll('.divisi-group').length;
                    let divisiGroup = document.createElement('div');
                    divisiGroup.classList.add('divisi-group', 'mb-3');

                    divisiGroup.innerHTML = `
                        <div class="row g-3 align-items-center">
                            <div class="col-md-5">
                                <label for="nama" class="form-label">Nama Divisi:</label>
                                <input type="text" class="form-control" name="divisi[${index}][nama]" required>
                            </div>
                            <div class="col-md-5">
                                <label for="keterangan" class="form-label">Keterangan Divisi:</label>
                                <input type="text" class="form-control" name="divisi[${index}][keterangan]" required>
                            </div>
                            <div class="col-md-2 d-flex">
                                <button type="button" class="btn btn-danger btn-sm" style="margin-top: 45px;" onclick="removeDivisi(this)">Hapus Divisi</button>
                            </div>
                        </div>
                    `;
                    container.appendChild(divisiGroup);
                });

                function removeDivisi(button) {
                    button.closest('.divisi-group').remove();
                }
            </script>



        </section>
    </main>
</x-guest-layout>
