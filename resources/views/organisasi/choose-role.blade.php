<x-guest-layout>
    <main class="main-content mt-0">
        <section>
            <div class="container py-4 px-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card border shadow-xs mb-4">
                            <div class="card-header border-bottom pb-0">
                                <h6 class="font-weight-semibold text-lg mb-0">Penentuan role</h6>
                                <p class="text-sm">Pilih jabatan yang sesuai untuk anda pada Organisasi ini</p>
                            </div>
                            <form action="{{ route('organisasi.store-role', $organisasi->id) }}" method="POST" class="p-3">
                                @csrf
                                <label for="role">Pilih Role:</label>
                                <select name="role" id="role" required class="form-select mb-3">
                                    <option value="Ketua">Ketua</option>
                                    <option value="Wakil Ketua">Wakil Ketua</option>
                                    <option value="Sekretaris">Sekretaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Anggota">Anggota</option>
                                </select>

                                <div id="divisi-role-container" style="display: none;">
                                    <label for="divisi" class="form-label">Pilih Divisi:</label>
                                    <select name="divisi_role_id" id="divisi" class="form-select mb-3">
                                        @foreach ($divisis as $divisi)
                                            <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary">Simpan Role</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <x-app.footer />
            </div>
        </section>
    </main>
</x-guest-layout>

<script>
    document.getElementById('role').addEventListener('change', function() {
        if (this.value === 'Anggota') {
            document.getElementById('divisi-role-container').style.display = 'block';
        } else {
            document.getElementById('divisi-role-container').style.display = 'none';
        }
    });
</script>
