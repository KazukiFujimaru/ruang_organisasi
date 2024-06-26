<x-guest-layout>
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
        <div class="container">
            <form action="{{ route('organisasi.store-divisi', $organisasi->id) }}" method="POST">
                @csrf
                <div id="divisi-container">
                    <div class="divisi-group">
                        <label for="nama">Nama Divisi:</label>
                        <input type="text" name="divisi[0][nama]" required>
                        <label for="keterangan">Keterangan Divisi:</label>
                        <input type="text" name="divisi[0][keterangan]" required>
                    </div>
                </div>
                <button type="button" id="add-divisi">Tambah Divisi</button>
                <button type="submit">Simpan Divisi</button>
            </form>
        </div>

        <script>
            document.getElementById('add-divisi').addEventListener('click', function() {
                let container = document.getElementById('divisi-container');
                let index = container.children.length;
                let divisiGroup = document.createElement('div');
                divisiGroup.classList.add('divisi-group');
                divisiGroup.innerHTML = `
                    <label for="nama">Nama Divisi:</label>
                    <input type="text" name="divisi[${index}][nama]" required>
                    <label for="keterangan">Keterangan Divisi:</label>
                    <input type="text" name="divisi[${index}][keterangan]" required>
                `;
                container.appendChild(divisiGroup);
            });
        </script>
        </section>
    </main>

</x-guest-layout>
