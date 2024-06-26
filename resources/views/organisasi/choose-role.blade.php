<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
        <div class="container">
            <form action="{{ route('organisasi.store-role', $organisasi->id) }}" method="POST">
                @csrf
                <label for="role">Pilih Role:</label>
                <select name="role" id="role" required>
                    <option value="Ketua">Ketua</option>
                    <option value="Wakil Ketua">Wakil Ketua</option>
                    <option value="Sekretaris">Sekretaris</option>
                    <option value="Bendahara">Bendahara</option>
                    <option value="Anggota">Anggota</option>
                </select>

                <div id="divisi-role-container" style="display: none;">
                    <label for="divisi">Pilih Divisi:</label>
                    <select name="divisi_role_id" id="divisi">
                        @foreach ($divisis as $divisi)
                            <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit">Simpan Role</button>
            </form>
        </div>

        <script>
            document.getElementById('role').addEventListener('change', function() {
                if (this.value === 'Anggota') {
                    document.getElementById('divisi-role-container').style.display = 'block';
                } else {
                    document.getElementById('divisi-role-container').style.display = 'none';
                }
            });
        </script>
        </section>
    </main>

</x-guest-layout>
